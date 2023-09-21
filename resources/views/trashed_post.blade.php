@extends('layouts.master')
@section('content')
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse ($trashed_posts as $trashed_post)
        <div class="col">
            <div class="card h-100">
                <img src="{{asset('storage/Image/'.$trashed_post->photo)}}" class="card-img-top" >
                    <div class="card-body">
                        <h5 class="card-title">{{$trashed_post->header}}</h5>
                        <p class="detail-content ellipsis card-content-detail ">{{$trashed_post->detail}}</p>
                        <a href="/restore/post/{{$trashed_post->id}}" class="btn btn-warning" onclick="return confirm('คุณแน่ใจหรือไม่ว่าต้องการกู้คืนโพสต์')">กู้คืนโพสต์</a>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">{{thaidate('วันที่ j F พ.ศ.Y',$trashed_post->created_at)}}</small>
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