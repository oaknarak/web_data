@extends('layouts.master_user')
@section('content')
<div class="row pt-2 mb-3">
    <div class="col-12">
        <div class="h4 text-center">{{$cat->name}}</div>
        @if ($cat->user_id != Auth::user()->id)
            <a href="/adopt/{{$cat->id}}" class="btn btn-primary">ติดต่อขอรับเลี้ยง</a>
        @else
        @endif
        <div class="h4 text-center">{{$cat->name}}</div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-12">
        <img src="{{asset('storage/Image/'.$cat->pet_photo)}}" alt="" height="500" class="rounded mx-auto d-block">
    </div>
</div>
<div class="row mx-5">
    <div class="col-12 text-left">
        <p>{{$cat->detail}}</p>
    </div>
</div>
<div class="row pt-3">
    <div class="col-12 text-end">
        <p>{{$cat->species}}</p>
        <p>{{$cat->special_needs}}</p>
    </div>
</div>
@endsection