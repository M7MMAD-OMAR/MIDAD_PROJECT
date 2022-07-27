<?php

use App\Models\Post;
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

    $posts = collect($files)
        ->map(function ($file) {
        return  \Spatie\YamlFrontMatter\YamlFrontMatter::parseFile($file);
        })->map(function ($object) {
            return new Post(
                $object->matter('title'),
                $object->slug,
                $object->date,
                $object->excerpt,
                $object->body(),
            );
        });

    return view('posts', compact('posts'));
});

Route::get('/posts/{slug}', function ($slug) {
    return view('post', [
        'post_content' => \App\Models\Post::find($slug),
    ]);
});
