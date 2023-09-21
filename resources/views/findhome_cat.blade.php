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
            <button id="gotoPageButton" class="btn btn-outline-dark">ข้อมูลข่าวสาร</button>
            <script>
                document.getElementById("gotoPageButton").addEventListener("click", function() {
                window.location.href = "http://127.0.0.1:8000/home";
                });
            </script>
        </div>
        <div class="custom-menu-item">
            <button id="gotoPageButton2" class="btn btn-danger">หาบ้านให้สัตว์</button>
            <script>
                document.getElementById("gotoPageButton2").addEventListener("click", function() {
                window.location.href = "http://127.0.0.1:8000/findhome"; // เปลี่ยน URL เป็น URL ของหน้าที่คุณต้องการไป
                });
            </script>
        </div>
    </div>

</div>
<div class="block">
<h3>หาบ้านให้สัตว์</h3>
<div class="col-7">
<div class="d-flex flex-row mb-3">
    <div class="custom-menu-item">
        <div class="length_dog">
            <button type="submit"  id="gotoPageButton1" class="btn btn-outline-dark">สุนัข</button>
            <script>
                document.getElementById("gotoPageButton1").addEventListener("click", function() {
                window.location.href = "http://127.0.0.1:8000/findhome/dog"; // เปลี่ยน URL เป็น URL ของหน้าที่คุณต้องการไป
                });
            </script>
        </div>
    </div>
    <div class="custom-menu-item">
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
<div class="help">
<button class="btn btn-outline-dark"><a href="/form/post/pet">โพสต์หาบ้านให้สัตว์</a></button>
</div> 
</div>
</div>
    <div class="news">
        <h3>หาบ้านให้น้องแมว</h3>
    </div>
    <div class="card-body">
        @forelse ($cats as $cat)
            <div class="card-text">
            <a href="/detail/dog/{{$cat->id}}"><img class="imgsize" src="{{asset('storage/Image/'.$cat->pet_photo)}}"  ></a>
            <h3>{{$cat->name}}</h3>
            <p>{{$cat->gender}}</p>
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


