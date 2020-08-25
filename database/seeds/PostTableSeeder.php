<?php

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    public function run()
    {
        factory(Post::class, 40)->create();
    }
}
