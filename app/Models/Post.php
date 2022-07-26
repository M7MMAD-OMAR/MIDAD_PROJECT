<?php

namespace App\Models;

class Post
{
    public static function find($slug) {
        if (! is_file($path = resource_path('posts/'. $slug))) {
            return abort(404);
        }

        return cache()->remember('posts.{$slug}', 5, fn() => file_get_contents($path));
    }
}
