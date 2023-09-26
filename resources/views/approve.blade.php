@extends('layouts.master')
@section('content')
    <div class="row row-cols-1 row-cols-md-3 g-4 mb-3">
        @forelse ($pets as $pet)
        <div class="col">
            <div class="card h-100">
                <a href="/approve/pet/{{ $pet->id }}"><img src="{{asset('storage/Image/'.$pet->pet_photo)}}" class="card-img-top" ></a>
                    <div class="card-body">
                        <h5 class="card-title">{{$pet->name}}</h5>
                        @if ($pet->gender == 'M')
                            <p class="detail-content ellipsis card-content-detail ">เพศผู้</p>     
                        @else
                        <p class="detail-content ellipsis card-content-detail ">เพศเมีย</p> 
                        @endif
                        <a href="/approve/pet/{{ $pet->id }}" class="btn btn-primary">ดูเพิ่มเติม</a>
                        <a href="/post/adopt/{{$pet->id}}" class="btn btn-success" onclick="return confirm('คุณแน่ใจหรือไม่ว่าต้องการอนุมัติโพสต์')">อนุมัติ</a>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">{{thaidate('โพสต์เมื่อวันที่ j F พ.ศ.Y',$pet->created_at)}}</small>
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