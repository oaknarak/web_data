<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('./css/sam.css')}}">
</head>
<body>
    <div class="card-body">
                @foreach ($news_posts as $news_post)
                <div class="card-text">
                    <a href="{{ url('/detail/post/' . $news_post->id) }}">
                        <img class="imgsize" src="{{asset('storage/Image/'.$news_post->photo)}}"
                            alt="" width="100px" height="100px">
                    </a>
                    <h3>{{ $news_post->header }}</h3>
                    <ul>
                        <li>{{ $news_post->type }}</li>
                        <li>{{ $news_post->detail }}</li>
                        <li>{{ $news_post->created_at }}</li>
                    </ul>
                </div>
                @endforeach
            </div>
    </body>
</html>