<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::paginate(config('number-items.number-product'));

        return view('client.products.index', compact(['categories', 'products']));
    }

    public function detailProduct($id)
    {
        $product = Product::findOrFail($id);
        $productRelates = Product::where('category_id', $product->category_id)->where('id', '<>', $id)
            ->orderBy('updated_at', 'desc')->paginate(config('number-items.number_related'));
        $rates = $product->rates();
        $countRate = $rates->count();
        $rating = ceil($rates->avg('rating'));

        return view('client.products.detail', compact(['product', 'product_relates', 'countRate', 'rating']));
    }
}
