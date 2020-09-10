<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;

class RateController extends Controller
{
    public function comment(Request $request)
    {
        if ($this->checkBought(Auth::id(), $request->product_id)) {
            $rate = Rate::where('user_id', Auth::id())
                ->where('product_id', $request->product_id)->count();
        }
        if ($rate < 1) {
            $data = $request->all();
            $data['user_id'] = Auth::id();
            $rate = Rate::create($data);
            $data['name'] = $rate->user['name'];
            $data['date'] = date('d-m-Y', strtotime($rate->created_at));
            $data['rating'] = $rate->rating;

            return response()->json($data);
        }
    }

    public function checkBought($userId, $productId)
    {
        $orders = Order::where('user_id', $userId)->get();
        foreach ($orders as $order) {
            $orderItem[] = $order->orderItems;
        }
        for ($i = 0; $i < count($orderItem); $i++) {
            for($j = 0; $j < count($orderItem[$i]); $j++) {
                $oItem[] = $orderItem[$i][$j];
            }
        }
        foreach ($oItem as $item) {
            $data[] = $item->product_id;
        }
        if (in_array($productId, $data)) {
            return true;
        }

        return false;
    }
}
