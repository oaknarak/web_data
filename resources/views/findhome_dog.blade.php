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
    <div class="custom-menu-item item2">
        <button id="gotoPageButton3" class="btn btn-danger">รับอุปการะสัตว์</button>
        <script>
            document.getElementById("gotoPageButton3").addEventListener("click", function() {
                window.location.href = "http://127.0.0.1:8000/findhome/dog";
            });
        </script>
        <div class="custom-menu-item-dog">
            <button type="submit" id="gotoPageButton1" class="btn btn-danger">สุนัข</button>
            <script>
                document.getElementById("gotoPageButton1").addEventListener("click", function() {
                    window.location.href = "http://127.0.0.1:8000/findhome/dog";
                });
            </script>
        </div>
        <div class="custom-menu-item-cat">
            <button id="gotoPageButton4" class="btn btn-outline-dark">แมว</button>
            <script>
                document.getElementById("gotoPageButton4").addEventListener("click", function() {
                    window.location.href = "http://127.0.0.1:8000/findhome/cat";
                });
            </script>
        </div>
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
</div>
</div> 
</div>
</div>
    <div class="news">
        <h3>หาบ้านให้น้องหมา</h3>
    </div>
        
<div class="card-body">
    @forelse ($dogs as $dog)
        <div class="card-text">
        <a href="/detail/dog/{{$dog->id}}"><img class="imgsizenews" src="{{asset('storage/Image/'.$dog->pet_photo)}}"  ></a>
        <h3>{{$dog->name}}</h3>
        @if ($dog->gender=='F')
            <p>เพศเมีย</p>
        @else
            <p>เพศผู้</p>
        @endif
        {{-- <a href="/detail/dog/{{$dog->id}}" class="btn btn-primary">ดูเพิ่มเติม</a> --}}
            <div class="card-footer">
                <small class="text-body-secondary">{{thaidate('โพสต์เมื่อวันที่ j F พ.ศ.Y',$dog->created_at)}}</small>
            </div>
        </div>
    @empty
        ไม่มีข้อมูล
    @endforelse
</div>
        
@endsection


