<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        $orderItems = $order->orderItems;
        foreach ($orderItems as $orderItem) {
            $product_id [] = $orderItem['product_id'];
            $totalPrices[] = $orderItem['total_price'];
        }
        if (isset($product_id)) {
            $products = Product::whereIn('id', $product_id)->get();
        }
        return view('admin.orders.show', compact(['order', 'products', 'totalPrices']));
    }

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
