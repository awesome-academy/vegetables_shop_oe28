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
        $orders = Order::orderBy('updated_at', 'desc')->get();

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
        Order::where('id', $id)->update(['status' => $request->status]);
        $order = Order::findOrFail($id);
        $orderItems = $order->orderItems;
        if (isset($product_id)) {
            $products = Product::whereIn('id', $product_id)->get();
        }
        if ($order->status == config('number-items.deliveried')) {
            foreach ($orderItems as $orderItem) {
                $weight = (float) $orderItem->weight;
                $product = Product::where('id', $orderItem['product_id'])->first();
                $weight_available = (float) $product->weight_available;
                Product::where('id', $orderItem['product_id'])->update([
                    'weight_available' => (float) $weight_available - $weight,
                ]);
                $product_id [] = $orderItem['product_id'];
            }
        }

        return redirect()->back();
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
