@extends('layouts.master_user')
@section('content')
<div class="roweiei">
    <div class="custom-div2" >
        <div class="colorinimg">
            
        </div>
        <div class="img">
            <img class="imgdog" src="https://media.istockphoto.com/id/1399405977/photo/couple-of-friends-a-cat-and-a-dog-run-merrily-through-a-summer-flowering-meadow.jpg?s=170667a&w=0&k=20&c=lW9ymQDCT5Pe3n3N9d2q8HFICapTte2Ll-xEWRbFSqc=" width="50px"  alt="">
        </div>
    </div>
</div>
<div class="custom-menu">
    <div class="custom-menu-item  item1">
        <button id="gotoPageButton" class="btn btn-outline-dark">ข้อมูลข่าวสาร</button>
        <script>
            document.getElementById("gotoPageButton").addEventListener("click", function() {
            window.location.href = "http://127.0.0.1:8000/home";
            });
        </script>
    </div>
    <div class="custom-menu-item help">
        <button class="btn btn-primary"><a href="/form/post/pet">โพสต์หาบ้านให้สัตว์</a></button>
    </div> 
    <div class="custom-menu-item item2">
        <button id="gotoPageButton3" class="btn btn-danger">หาบ้านให้สัตว์</button>
        <script>
            document.getElementById("gotoPageButton3").addEventListener("click", function() {
            window.location.href = "http://127.0.0.1:8000/findhome/dog"; // เปลี่ยน URL เป็น URL ของหน้าที่คุณต้องการไป
            });
        </script>
    </div>
   
</div>
    <div class="custom-menu-item-dog">
        <div class="length_dog">
            <button type="submit" id="gotoPageButton1" class="btn btn-outline-dark">สุนัข</button>
            <script>
                document.getElementById("gotoPageButton1").addEventListener("click", function() {
                window.location.href = "http://127.0.0.1:8000/findhome/dog"; // เปลี่ยน URL เป็น URL ของหน้าที่คุณต้องการไป
                });
            </script>
        </div>
    </div>
    <div class="custom-menu-item-cat">
        <div>
            <button  id="gotoPageButton4" class="btn btn-danger">แมว</button>
            <script>
                document.getElementById("gotoPageButton4").addEventListener("click", function() {
                window.location.href = "http://127.0.0.1:8000/findhome/cat"; // เปลี่ยน URL เป็น URL ของหน้าที่คุณต้องการไป
                });
            </script>
        </div>
    </div>
</div>
</div> 
</div>
</div>
    <div class="news">
        <h3>หาบ้านให้น้องแมว</h3>
    </div>
    <div class="card-body">
        @forelse ($cats as $cat)
            <div class="card-text">
            <a href="/detail/cat/{{$cat->id}}"><img class="imgsizenews" src="{{asset('storage/Image/'.$cat->pet_photo)}}"  ></a>
            <h3>{{$cat->name}}</h3>
            @if ($cat->gender=='F')
                <p>เพศเมีย</p>
            @else
                <p>เพศผู้</p>
            @endif
            {{-- <a href="/detail/dog/{{$cat->id}}" class="btn btn-primary">ดูเพิ่มเติม</a> --}}
                <div class="card-footer">
                    <small class="text-body-secondary">{{thaidate('โพสต์เมื่อวันที่ j F พ.ศ.Y',$cat->created_at)}}</small>
                </div>
            </div>
        @empty
            ไม่มีข้อมูล
        @endforelse
    </div>
@endsection


