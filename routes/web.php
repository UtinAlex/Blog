<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return response()->json('OK');
// });

Route::get('/', [BlogController::class, 'getHomePage']);
Auth::routes(['verify' => true]);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified')->name('home');
Route::middleware(['auth', 'verified'])->prefix('blog')->group(function () {
    Route::get('/avatar', [BlogController::class, 'getFormAvatar'])->name('avatar');
    Route::post('/upload-avatar{userId}', [BlogController::class, 'uploadAvatar'])->name('uploadAvatar');
    Route::get('/visibility', [BlogController::class, 'visibility'])->name('visibility');

    Route::get('/create', [PostController::class, 'create'])->name('create');
    Route::post('/store', [PostController::class, 'store'])->name('store');
    Route::get('/edit', [PostController::class, 'edit'])->name('edit');
    Route::put('/update', [PostController::class, 'update'])->name('update');
    Route::delete('/destroy', [PostController::class, 'update'])->name('destroy');
});