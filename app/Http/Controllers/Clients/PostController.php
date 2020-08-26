<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10);
        $post_recents = Post::latest('updated_at')->take(6)->get();

        return view('client.post.index', compact(['posts', 'post_recents', 'count']));
    }
}
