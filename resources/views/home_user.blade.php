@extends('layouts.master_user')
@section('content')
@if(session('Errors'))
    <script>
        alert("ท่านเคยติดต่อรับเลี้ยงแล้ว กรุณารอรับการติดต่อจากเจ้าของ")
    </script>
@endif
@if(session('success_adopt'))
    <script>
        alert("คุณติดต่อรับเลี้ยงสำเร็จ กรุณารอรับการติดต่อจากเจ้าของ")
    </script>
@endif
    <div class="custom-div2" >
        <div class="colorinimg">
            
        </div>
        <div class="img">
            <img class="imgdog" src="https://media.istockphoto.com/id/1399405977/photo/couple-of-friends-a-cat-and-a-dog-run-merrily-through-a-summer-flowering-meadow.jpg?s=170667a&w=0&k=20&c=lW9ymQDCT5Pe3n3N9d2q8HFICapTte2Ll-xEWRbFSqc=" width="50px"  alt="">
        </div>
    </div>
    <div class="custom-menu">
        <div class="custom-menu-item  item1">
            <button id="gotoPageButton" class="btn btn-danger">ข้อมูลข่าวสาร</button>
            <script>
                document.getElementById("gotoPageButton").addEventListener("click", function() {
                window.location.href = "http://127.0.0.1:8000/home";
                });
            </script>
        </div>
        <div class="custom-menu-item item2">
            <button id="gotoPageButton3" class="btn btn-outline-dark">รับอุปการะสัตว์</button>
            <script>
                document.getElementById("gotoPageButton3").addEventListener("click", function() {
                window.location.href = "http://127.0.0.1:8000/findhome/dog"; 
                });
            </script>
        </div>
        <div class="custom-menu-item help">
            <button id="gotoPageButton8" class="btn btn-outline-dark">โพสต์หาบ้านให้สัตว์</button>
            <script>
                document.getElementById("gotoPageButton8").addEventListener("click", function() {
                window.location.href = "http://127.0.0.1:8000/form/post/pet"; 
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
            // ถ้าผู้ใช้เลือก "แสดงข่าวทั้งหมด" ให้แสดงข่าวทั้งหมด
            newsCards.forEach(function(card) {
                card.style.display = "block";
            });
        } else {
            // ถ้าผู้ใช้เลือกประเภทข่าวใดๆ ให้ซ่อนข่าวทั้งหมดก่อน
            newsCards.forEach(function(card) {
                card.style.display = "none";
            });

            // แสดงข่าวที่มีประเภทข่าวที่ผู้ใช้เลือก
            document.querySelectorAll(`.${selectedType}-news`).forEach(function(card) {
                card.style.display = "block";
            });
        }
    });
</script>


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