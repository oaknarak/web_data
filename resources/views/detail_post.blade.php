@extends('layouts.master')
@section('content')
<link rel="stylesheet" href="{{asset('css/news.css')}}">
    <div class="row pt-2 mb-3">
        <div class="col-12">
            <div class="h4 text-center">{{$post->header}}</div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <img src="{{asset('storage/Image/'.$post->photo)}}" alt="{{$post->header}}" height="370" class="rounded mx-auto d-block">
        </div>
    </div>
    <div class="row mx-5">
        <div class="col-12 text-center">
            <p>ประเภทข่าวสาร : {{$post->post_type->type}}</p>
        </div>
        <div class="col-12 text-center">
            <p id="detail">{{$post->detail}}</p>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-12 text-center">
            <p>ที่มา : {{$post->source}}</p>
        </div>
    </div>
@endsection