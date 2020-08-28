<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request, $id) {
        try {
            $product = Product::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            return back()->withErrors($exception->getMessage())->withInput();
        }
        if (isset($product)) {
            $cart = $this->checkCart();
            $cart->add($product, $product->id);
            $request->session()->put('Cart', $cart);
        }

        return view('client.homepage.cart');
    }

    public function deleteItemCart(Request $request, $id)
    {

        $cart = $this->checkCart();
        $cart->deleteItemCart($id);
        $this->putToSession($request, $cart);

        return view('client.homepage.cart');
    }

    public function viewCart()
    {
        return view('client.cart.index');
    }

    public function deleteListItemCart(Request $request, $id)
    {
        $cart = $this->checkCart();
        $cart->deleteItemCart($id);
        $this->putToSession($request, $cart);

        return view('client.cart.list-cart');
    }

    public function saveListItemCart(Request $request, $id, $quantity)
    {
        $cart = $this->checkCart();
        $cart->updateItemListCart($id, $quantity);
        $this->putToSession($request, $cart);

        return view('client.cart.list-cart');
    }

    public function checkCart()
    {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $cart = new Cart($oldCart);

        return $cart;
    }

    public function putToSession(Request $request, $cart)
    {
        if (count($cart->products) > 0) {
            $request->session()->put('Cart', $cart);
        } else {
            $request->session()->forget('Cart');
        }
    }
}
