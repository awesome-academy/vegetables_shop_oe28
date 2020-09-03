<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
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
        return view('client.checkout.index');
    }

    public function postCheckout(OrderRequest $request)
    {
        if(!empty(Session::has('Cart'))) {
            $cart = Session::get('Cart');
        }
        if (isset($cart)) {
            $order = Order::create([
                'name' => $request->name,
                'address' => $request->address . ', ' . $request->calc_shipping_provinces . ',' . $request->calc_shipping_district,
                'phone' => $request->phone,
                'payment_method' => $request->payment_method,
                'email' => $request->email,
                'note' => $request->note,
                'price_order' => $cart->totalPrice,
            ]);
            foreach ($cart->products as $product) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product['productInfo']->id,
                    'total_price' => $product['price'],
                ]);
            }
            Session::forget('Cart');
        }

        return redirect()->route('client.homepage')->with('success', trans('messages.bill_success'));
    }
}
