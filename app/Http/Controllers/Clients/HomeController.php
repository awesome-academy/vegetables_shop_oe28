<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::take(config('number-items.number_product'))->get();

        return view('client.homepage.index', compact(['categories', 'products']));
    }

    public function introduce()
    {
        return view('client.homepage.introduce');
    }

    public function delivery()
    {
        return view('client.homepage.delivery');
    }

    public function getCheckout()
    {
        if (!empty(Session::has('Cart'))) {
            $cart = Session::get('Cart');
        }
        if (isset($cart)) {
            $products = $cart->products;
        }
        foreach ($products as $product) {
            $limitProduct = ((float) $product['productInfo']->weight_available / (float) str_replace(',', '.', $product['productInfo']->weight_item));
            if ($product['quantity'] > $limitProduct) {
                return redirect()->back()->with('error', trans('clients.can_buy') . ' ' . $limitProduct . ' ' . trans('clients.item') . ' ' . $product['productInfo']->name);
            }
        }

        return view('client.checkout.index');
    }

    public function postCheckout(OrderRequest $request)
    {
        if(!empty(Session::has('Cart'))) {
            $cart = Session::get('Cart');
        }
        if (isset($cart)) {
            if (Auth::check()) {
                $order = Order::create([
                    'name' => $request->name,
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'payment_method' => $request->payment_method,
                    'email' => $request->email,
                    'note' => $request->note,
                    'price_order' => $cart->totalPrice,
                    'user_id' => Auth::user()->id,
                    'status' => config('number-items.accept'),
                ]);
            } else {
                $order = Order::create([
                    'name' => $request->name,
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'payment_method' => $request->payment_method,
                    'email' => $request->email,
                    'note' => $request->note,
                    'price_order' => $cart->totalPrice,
                    'status' => config('number-items.accept'),
                ]);
            }
            foreach ($cart->products as $product) {
                $weight_item = str_replace(',', '.', $product['productInfo']->weight_item);
                $weight = $product['quantity'] * (float) $weight_item;
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product['productInfo']->id,
                    'total_price' => $product['price'],
                    'weight' => $weight,
                ]);
            }
            Session::forget('Cart');
        }

        return redirect()->route('client.homepage')->with('success', trans('messages.bill_success'));
    }
}
