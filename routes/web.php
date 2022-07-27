<?php

use Illuminate\Support\Facades\File;
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
    $files = File::files(resource_path('posts'));
    $objects = [];
    foreach ($files as $file) {

    $objects[] = \Spatie\YamlFrontMatter\YamlFrontMatter::parseFile($file);
    }
//    dd($object);
//    $posts = \App\Models\Post::all();
    return view('posts', compact('objects'));
});

Route::get('/posts/{slug}', function ($slug) {
    return view('post', [
        'file_content' => \App\Models\Post::find($slug),
    ]);
});
