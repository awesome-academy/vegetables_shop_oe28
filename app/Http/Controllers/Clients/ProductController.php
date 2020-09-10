<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Rate;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::simplePaginate(config('number_items.number-product'));

        return view('client.products.index', compact(['categories', 'products']));
    }

    public function detailProduct($id)
    {
        try {
            $product = Product::findOrFail($id);
        } catch (ModelNotFoundException $exception) {

            return back()->withErrors($exception->getMessage())->withInput();
        }
        $productRelates = Product::where('category_id', $product->category_id)
            ->where('id', '<>', $id)
            ->orderBy('updated_at', 'desc')
            ->paginate(config('number-items.number_related'));
        $rates = $product->rates->sortByDesc('created_at');
        $countRate = $rates->count();
        $rating = ceil($rates->avg('rating'));
        $rateByUser = Rate::where('user_id', Auth::id())->count();

        return view('client.products.detail', compact([
            'product',
            'productRelates',
            'countRate',
            'rating',
            'rates',
            'rateByUser',
        ]));
    }
}
