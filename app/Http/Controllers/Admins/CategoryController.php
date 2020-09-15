<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\ViewShareController;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;

class CategoryController extends ViewShareController
{
    public function index()
    {
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->all());

        return redirect()->route('categories.index')->with('success', trans('messages.add_success'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.categories.edit', compact('category'));
    }

    public function update(StoreCategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', trans('messages.update_success'));
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', trans('messages.delete_success'));
    }
}
