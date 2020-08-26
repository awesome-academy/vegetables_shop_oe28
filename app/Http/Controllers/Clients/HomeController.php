<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

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
}
