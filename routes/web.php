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
    return view('posts');
});

Route::get('/posts/{slug}', function ($slug) {
    $path = resource_path('posts/'. $slug);

//    if (! file_exists($path)) {
//        return abort(404);
//    }
    return view('post', [
        'file_content' => file_get_contents($path),
    ]);
});
