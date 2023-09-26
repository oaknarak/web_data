@extends('layouts.master')
@section('content')
    <div class="row pt-2">
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
            <form action="/update/post_type/{{$post_type->id}}" method="post">
                @csrf
                <label for="type" class="form-label">หัวข้อข่าวสาร: </label>
                <input type="text" name='type' class="form-control" value="{{$post_type->type}}" required><br>
                <button type="submit" class="btn btn-primary" >บันทึกหัวข้อข่าวสาร</button>
            </form>
        </div>
    </div>
@endsection