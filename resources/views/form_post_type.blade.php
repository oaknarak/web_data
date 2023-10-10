
@extends('layouts.master')
@section('content')
<div class="custom-menu-item-back">
    <button type="submit" id="gotoPageButton" class="btn btn-outline-dark">กลับไปก่อนหน้า</button>
    <script>
        document.getElementById("gotoPageButton").addEventListener("click", function() {
            window.location.href = "http://127.0.0.1:8000/profile";
        });
    </script>
</div>
<div class="container">
<div class="row pt-2">
    <div class="h4 text-center">เพิ่มหัวข้อข่าวสาร</div>

    <div class="col-12">

        @error('type')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{$message}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @enderror
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form action="/create/post_type" method="post" autocomplete="off">
                @csrf
                <label for="type" class="form-label">หัวข้อข่าวสาร: </label>
                <input type="text" name='type' required class="form-control"><br>
                <button type="submit" class="btn btn-warning">เพิ่มหัวข้อ</button>
        </form>
        <div class="pt-3kuy">
            <table class="table table-hover">
                <thead>
                    <tr>
                      <th scope="col">ชื่อหัวข้อ</th>
                      <th scope="col">การทำงาน</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($post_types as $post_type)
                        <tr>
                            <td>{{$post_type->type}}</td>
                            <td><a href="/edit/post_type/{{$post_type->id}}" class="btn btn-warning">แก้ไข</a></td>
                        </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

@endsection
