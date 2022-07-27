<?php

namespace App\Models;

use Illuminate\Support\Facades\File;

class Post
{

    public static function all()
    {
        $files = File::allFiles(resource_path('posts'));

        return array_map(function ($file) {
            return $file->getContents();
        }, $files);
    }



    public static function find($slug) {
        if (! is_file($path = resource_path('posts/'. $slug))) {
            return abort(404);
        }

        return cache()->remember('posts.{$slug}', 5, fn() => file_get_contents($path));
    }


}
