@extends('layouts.master_user')
@section('content')
<div class="roweiei">
    <div class="custom-div2" >
        <div class="container">
            <div class="colorinimg">
                <center><img class="imgdog" src="https://image.posttoday.com/media/content/2019/08/01/16E2CB2CC41B4CB980FC4480DC146122.jpg" width="50px" alt=""></center>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="custom-menu">
        <div class="custom-menu-item">
            <button id="gotoPageButton" class="btn btn-danger">ข้อมูลข่าวสาร</button>
            <script>
                document.getElementById("gotoPageButton").addEventListener("click", function() {
                window.location.href = "http://127.0.0.1:8000/home";
                });
            </script>
        </div>
        <div class="custom-menu-item">
            <button id="gotoPageButton3" class="btn btn-outline-dark">หาบ้านให้สัตว์</button>
            <script>
                document.getElementById("gotoPageButton3").addEventListener("click", function() {
                window.location.href = "http://127.0.0.1:8000/findhome/dog"; // เปลี่ยน URL เป็น URL ของหน้าที่คุณต้องการไป
                });
            </script>
        </div>
    </div>
</div>
<div class="col-7">
<div class="d-flex flex-row mb-3">
</div>
</div>
<div class="help">
<button class="btn btn-outline-dark"><a href="/form/post/pet">โพสต์หาบ้านให้สัตว์</a></button>
</div> 
</div>
</div>
<div class="news">
    <h3>ข้อมูลข่าวสาร</h3>
</div>
<div class="card-body">
    @forelse ($news_posts as $news_post)
        <div class="card-text">
        <a href="/detail/dog/{{$news_post->id}}"><img class="imgsize" src="{{asset('storage/Image/'.$news_post->photo)}}"  ></a>
        <h3>{{$news_post->header}}</h3>
        <p>{{$news_post->post_type->type}}</p>
        {{-- <a href="/detail/dog/{{$news_post->id}}" class="btn btn-primary">ดูเพิ่มเติม</a> --}}
            <div class="card-footer">
                <small class="text-body-secondary">{{thaidate('โพสต์เมื่อวันที่ j F พ.ศ.Y',$news_post->created_at)}}</small>
            </div>
        </div>
    @empty
        ไม่มีข้อมูล
    @endforelse
</div>
    {{-- <div class="row row-cols-1 row-cols-md-3 g-4 mb-3">
        @forelse ($news_posts as $news_post)
        <div class="col">
            <div class="card h-100">
                <a href="/detail/post/{{$news_post->id}}"><img src="{{asset('storage/Image/'.$news_post->photo)}}" class="card-img-top" ></a>
                    <div class="card-body">
                        <h5 class="card-title">{{$news_post->header}}</h5>
                        <p class="detail-content ellipsis card-content-detail ">{{$news_post->detail}}</p>
                        <a href="" class="btn btn-primary">ดูเพิ่มเติม</a>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">{{thaidate('โพสต์เมื่อวันที่ j F พ.ศ.Y',$news_post->created_at)}}</small>
                    </div>
            </div>
        </div>
        @empty
            ไม่มีข้อมูล
        @endforelse
    </div> --}}
    {{-- <h4>น้องสัตว์ต้องการบ้าน</h4>
    <div class="row row-cols-1 row-cols-md-3 g-4 mb-3">
        @forelse ($post_adopts as $post_adopt)
        <div class="col">
            <div class="card h-100">
                <a href="/detail/post/{{$post_adopt->id}}"><img src="{{asset('storage/Image/'.$post_adopt->pet_photo)}}" class="card-img-top" ></a>
                    <div class="card-body">
                        <h5 class="card-title">{{$post_adopt->name}}</h5>
                        <p class="detail-content ellipsis card-content-detail ">{{$post_adopt->detail}}</p><br>
                        <p class="detail-content ellipsis card-content-detail ">{{$post_adopt->user->name}}</p>
                        <a href="" class="btn btn-primary">ดูเพิ่มเติม</a>
                        @if ($post_adopt->user->id == Auth::user()->id)
                        @else
                            <a href="/adopt/{{$post_adopt->id}}" class="btn btn-primary">ติดต่อขอรับเลี้ยง</a>
                        @endif
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">{{thaidate('โพสต์เมื่อวันที่ j F พ.ศ.Y',$post_adopt->created_at)}}</small>
                    </div>
            </div>
        </div>
        @empty
            ไม่มีข้อมูล
        @endforelse
    </div> --}}
@endsection