<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\ViewShareController;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class OrderController extends ViewShareController
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
            $productId[] = $orderItem['product_id'];
            $totalPrices[] = $orderItem['total_price'];
        }
        if (isset($productId)) {
            $products = Product::whereIn('id', $productId)->withTrashed()->get();
        }
        return view('admin.orders.show', compact(['order', 'products', 'totalPrices']));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        try {
            $order = Order::findOrFail($id);
        } catch (ModelNotFoundException $exception) {

            return back()->withErrors($exception->getMessage())->withInput();
        }
        Order::where('id', $id)->update(['status' => $request->status]);
        $orderItems = $order->orderItems;
        foreach ($orderItems as $orderItem) {
            $productId[] = $orderItem['product_id'];
        }
        if (isset($productId)) {
            $products = Product::whereIn('id', $productId)->get();
        }

        if ($order->status == config('number-items.deliveried')) {
            foreach ($orderItems as $orderItem) {
                $weight = (float) $orderItem->weight;
                $product = Product::where('id', $orderItem['product_id'])->first();
                $weightAvailable = (float) $product->weight_available;
                Product::where('id', $orderItem['product_id'])->update([
                    'weight_available' => (float) $weightAvailable - $weight,
                ]);
            }
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        //
    }
}
