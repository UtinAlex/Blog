<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    /**
     * Возвращает главную страницу
     */
    public function getHomePage()
    {
        
        $post = Post::where('visibility', 1)->get();
        $postArr = [
            'postArr' => $post
        ];

        return view('welcome', $postArr);
    }
}
