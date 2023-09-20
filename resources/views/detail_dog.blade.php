@extends('layouts.master_user')
@section('content')
<div class="row pt-2 mb-3">
    <div class="col-12">
        <div class="h4 text-center">{{$dog->name}}</div>
        @if ($dog->user_id != Auth::user()->id)
            <a href="/adopt/{{$dog->id}}" class="btn btn-primary">ติดต่อขอรับเลี้ยง</a>
        @else
        @endif
    </div>
</div>
<div class="row mb-3">
    <div class="col-12">
        <img src="{{asset('storage/Image/'.$dog->pet_photo)}}" alt="" height="500" class="rounded mx-auto d-block">
    </div>
</div>
<div class="row mx-5">
    <div class="col-12 text-left">
        <p>{{$dog->detail}}</p>
    </div>
</div>
<div class="row pt-3">
    <div class="col-12 text-end">
        <p>{{$dog->species}}</p>
        <p>{{$dog->special_needs}}</p>
    </div>
</div>
@endsection