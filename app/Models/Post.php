<?php

namespace App\Models;

use Illuminate\Support\Facades\File;

class Post
{

    public $title;
    public $slug;
    public $date;
    public $excerpt;
    public $body;

    public function __construct($title, $slug, $date, $excerpt, $body) {
        $this->title = $title;
        $this->slug = $slug;
        $this->date = $date;
        $this->excerpt = $excerpt;
        $this->body = $body;
    }

    public static function all()
    {

        $files = File::files(resource_path('posts'));

        return collect($files)
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
    }


    public static function find($slug)
    {
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }


}
