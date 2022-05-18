<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        $userIsAdmin = $user->isAdmin();
        if ($userIsAdmin) {
            $post = Post::join('users', 'posts.users_id', 'users.id')
                            ->select('*', 'posts.id as id_post')
                            ->get();
            $postArr = [
                'postArr' => $post,
                'userIsAdmin' => $userIsAdmin,
                'userId' => $user->id,
                'avatar' => 'images/'
            ];
        } else {
            $post = Post::join('users', 'posts.users_id', 'users.id')
                            ->select('*', 'posts.id as id_post')
                            ->where('users_id', $user->id)
                            ->orWhere('visibility', 1)
                            ->get();
            $postArr = [
                'postArr' => $post,
                'userIsAdmin' => $userIsAdmin,
                'userId' => $user->id,
                'avatar' => 'images/'
            ];
        }
        
        return view('home', $postArr);
    }
}
