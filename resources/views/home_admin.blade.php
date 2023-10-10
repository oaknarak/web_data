@extends('layouts.master')
@section('content')
<link rel="stylesheet" href="{{asset('css/news.css')}}">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse ($posts as $post)
        <div class="col">
            <div class="card h-100">
                <a href="/detail/post/{{$post->id}}"><img src="{{asset('storage/Image/'.$post->photo)}}" class="card-img-top" ></a>
                    <div class="card-body">
                        <h5 class="card-title">{{$post->header}}</h5>
                        <p class="detail-content ellipsis card-content-detail ">{{$post->post_type->type}}</p>
                        <p class="detail-content ellipsis card-content-detail ">ผู้โพสต์: {{$post->user->name}}</p>
                        <a href="/detail/post/{{$post->id}}" class="btn btn-primary">ดูเพิ่มเติม</a>
                        <a href="/edit/post/{{$post->id}}" class="btn btn-warning">แก้ไข</a>
                        <a href="/delete/post/{{$post->id}}" class="btn btn-danger" onclick="return confirm('คุณแน่ใจหรือไม่ว่าต้องการลบโพสต์')">ลบ</a>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">{{thaidate('โพสต์เมื่อวันที่ j F พ.ศ.Y',$post->created_at)}}</small>
                    </div>
            </div>
        </div>
        @empty
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            ไม่มีข้อมูล
        </div>
        @endforelse
    </div>
@endsection