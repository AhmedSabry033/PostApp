<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', 'PostController@index')->name('posts.index');
Route::post('/posts/store', 'PostController@store')->name('posts.store');

//Route::get('/posts', 'PostController@index')->name('posts')->middleware(['auth']);
//Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts');

// Route::group(['middleware' => ['auth']], function() {
//     Route::get('/posts', 'PostController@index')->name('posts');
// });


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
