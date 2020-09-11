<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\ViewShareController;
use App\Models\Post;

class PostController extends ViewShareController
{
    public function index()
    {
        $posts = Post::paginate(10);
        $post_recents = Post::latest('updated_at')->take(6)->get();

        return view('client.post.index', compact(['posts', 'post_recents', 'count']));
    }
}
