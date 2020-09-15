<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\ViewShareController;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends ViewShareController
{
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
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
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $product = Post::findOrFail($id);
        $product->delete();

        $images = Image::where('post_id', $product->id)->update(['post_id' => 0]);

        return redirect()->route('posts.index')->with('success', trans('messages.delete_success'));
    }
}
