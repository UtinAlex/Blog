<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

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
            $post = Post::all();
            $postArr = [
                'postArr' => $post,
                'userIsAdmin' => $userIsAdmin,
                'userId' => $user->id
            ];
        } else {
            $post = Post::where('users_id', $user->id)
                ->orWhere('visibility', 1)
                ->get();
            $postArr = [
                'postArr' => $post,
                'userIsAdmin' => $userIsAdmin,
                'userId' => $user->id
            ];
        }
        
        return view('home', $postArr);
    }
}
