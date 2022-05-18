<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

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
});