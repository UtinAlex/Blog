<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Возвращает главную страницу
     */
    public function getHomePage()
    {
        // $fieldsForm = Form::all()->toArray();
        // $fieldsFormArr = ['fieldsForm' => $fieldsForm];
        return view('welcome');
    }
}
