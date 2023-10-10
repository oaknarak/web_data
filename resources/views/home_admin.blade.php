@extends('layouts.master')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/news.css') }}">
    <div class="custom-div2">
        <div class="colorinimg">

        </div>
        <div class="img">
            <img class="imgdog"
                src="https://media.istockphoto.com/id/1399405977/photo/couple-of-friends-a-cat-and-a-dog-run-merrily-through-a-summer-flowering-meadow.jpg?s=170667a&w=0&k=20&c=lW9ymQDCT5Pe3n3N9d2q8HFICapTte2Ll-xEWRbFSqc=" width="50px"
                alt="">
        </div>
    </div>
    <div class="custom-menu">
        <div class="custom-menu-item admin">
            <button id="gotoPageButton77" class="btn btn-success">การทำงานแอดมิน</button>
            <script>
                document.getElementById("gotoPageButton77").addEventListener("click", function() {
                    window.location.href = "http://127.0.0.1:8000/profile";
                });
            </script>
        </div>

    </div>


    <div class="news">
        <h3>ข้อมูลข่าวสาร</h3>
    </div>
    <div class="card-body">
        @forelse ($news_posts as $news_post)
            <div class="card-text">
                <a href="/news/detail/{{ $news_post->id }}"><img class="imgsizenews"
                        src="{{ asset('storage/Image/' . $news_post->photo) }}"></a>
                <h3>{{ $news_post->header }}</h3>
                <p>{{ $news_post->post_type->type }}</p>
                {{-- <a href="/detail/dog/{{$news_post->id}}" class="btn btn-primary">ดูเพิ่มเติม</a> --}}
                <div class="card-footer">
                    <small
                        class="text-body-secondary">{{ thaidate('โพสต์เมื่อวันที่ j F พ.ศ.Y', $news_post->created_at) }}</small>
                </div>
            </div>
        @empty
        <div class="nonews">
            ไม่มีข้อมูล
        </div>
        @endforelse
    </div>
@endsection
