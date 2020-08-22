<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $suppliers = Supplier::all();

        return view('admin.products.create', compact(['categories', 'suppliers']));
    }

    public function store(StoreProductRequest $request)
    {
        if (!isset($request->image_path[0])) {
            return redirect()->back()->with('error_image', trans('messages.image_error'));
        }
        $product = Product::create($request->all());
        $images = $request->image_path;
        foreach ($images as $image) {
            Image::create([
                'product_id' => $product->id,
                'image_path' => $image,
            ]);
        }

        return redirect()->route('products.index')->with('success', trans('messages.add_success'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        try {
            $product = Product::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            return back()->withErrors($exception->getMessage())->withInput();
        }
        $categories = Category::all();
        $suppliers = Supplier::all();

        return view('admin.products.edit', compact(['product', 'categories', 'suppliers']));
    }

    public function update(StoreProductRequest $request, $id)
    {
        if (!isset($request->image_path[0])) {
            return redirect()->back()->with('error_image', trans('messages.image_error'));
        }
        try {
            $product = Product::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            return back()->withErrors($exception->getMessage())->withInput();
        }
        $product->update($request->all());
        foreach ($product->images as $image) {
            $image->delete();
        }
        $images = $request->image_path;
        foreach ($images as $image) {
            Image::create([
                'product_id' => $product->id,
                'image_path' => $image,
            ]);
        }

        return redirect()->route('products.index')->with('success', trans('messages.update_success'));
    }

    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            return back()->withErrors($exception->getMessage())->withInput();
        }
        $product->delete();

        return redirect()->route('products.index')->with('success', trans('messages.delete_success'));
    }
}
