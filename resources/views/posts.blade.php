<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>posts</title>
    <style>
        body {
            background-color: #2d3748;
            color: #f7fafc;
            display: flex;
            justify-content: center;
            align-content: center;
        }

        body div {
            margin: 80px 0;
        }

        a {
            color: #f7fafc;
        }
    </style>
</head>
<body>

    <div>
        <artisan>
            @foreach($posts as $post)
                <h1><a href="/posts/{{$post->slug}}">{{$post->title}}</a></h1>
                <div>
                    {{$post->excerpt}}
                </div>

        @endforeach
    </div>

</body>
</html>
