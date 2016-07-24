<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;

class BlogController extends Controller
{
    public function getSingle($slug)
    {
        $post=Post::where('slug','=', $slug)->first();
        
        return view('blog.single')->withPost($post);
    }

    public function getList(){
        $posts = Post::orderBy('created_at','DESC')->paginate(5);

        return view('blog.list')->withPosts($posts);  
    }
}
