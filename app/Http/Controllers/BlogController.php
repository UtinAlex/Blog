<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class BlogController extends Controller
{
    /**
     * Возвращает главную страницу
     */
    public function getHomePage()
    {
        $post = Post::join('users', 'posts.users_id', 'users.id')
                        ->where('visibility', 1)
                        ->get();
        $postArr = [
            'postArr' => $post,
            'avatar' => 'images/'
        ];

        return view('welcome', $postArr);
    }

    /**
     * Возвращает форму загрузки аватарки
     */
    public function getFormAvatar(Request $request)
    {   
        $postArr = [
            'userId' => $request->userId
        ];        

        return view('avatarForm', $postArr);
    }

    /**
     * Загружает аватарки
     */
    public function uploadAvatar(Request $request, $userId)
    {
        if($request->isMethod('post')){

            if($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/images', $fileName);
            
                $user = User::find($userId);
                $user->avatar = $fileName;
                $user->save();
            
            }
         }

        return redirect()->route('home');
    }
}
