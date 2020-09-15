<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\View;

class ViewShareController extends Controller
{
    public function __construct()
    {
        $categories = Category::all();

        View::share('categories', $categories);
    }
}
