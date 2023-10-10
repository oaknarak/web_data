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


    <div class="selecttype">
        <select name="typepost" id="typepost">
            <option value="" selected>แสดงข่าวทั้งหมด</option>
            @php
                $types = [];
            @endphp
            @foreach ($news_posts as $news_post)
                @if (!in_array($news_post->post_type->type, $types))
                    <option value="{{$news_post->post_type->type}}">{{$news_post->post_type->type}}</option>
                    @php
                        $types[] = $news_post->post_type->type;
                    @endphp
                @endif
            @endforeach
        </select>
    </div>

    <div class="card-body">
        @forelse ($news_posts as $news_post)
        <div class="card-text {{$news_post->post_type->type}}-news">
            <a href="/news/detail/{{$news_post->id}}"><img class="imgsizenews" src="{{asset('storage/Image/'.$news_post->photo)}}"  ></a>
            <h3>{{$news_post->header}}</h3>
            <p>{{$news_post->post_type->type}}</p>
            <div class="card-footer">
                <small class="text-body-secondary">{{thaidate('โพสต์เมื่อวันที่ j F พ.ศ.Y',$news_post->created_at)}}</small>
            </div>
        </div>
        @empty
            ไม่มีข้อมูล
        @endforelse
    </div>
    <script>
        const selectElement = document.getElementById("typepost");
        const newsCards = document.querySelectorAll(".card-text");

        selectElement.addEventListener("change", function() {
            const selectedType = this.value;

            if (selectedType === "") {
                newsCards.forEach(function(card) {
                    card.style.display = "block";
                });
            } else {

                newsCards.forEach(function(card) {
                    card.style.display = "none";
                });

                document.querySelectorAll(`.${selectedType}-news`).forEach(function(card) {
                    card.style.display = "block";
                });
            }
        });
    </script>
@endsection
