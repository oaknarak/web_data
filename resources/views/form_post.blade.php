@extends('layouts.master')
@section('content')
    <div class="row pt-2 mx-5">
        <div class="col-12">
            <div class="h4 text-center">โพสต์ข้อมูลข่าวสาร</div>
            @if ($errors->any())
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                         @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="/create/post" method="post" enctype="multipart/form-data" class="needs-validation">
                @csrf
                <div class="mb-3">
                    <label for="type" class="form-label">ประเภทข่าวสาร: </label>
                    <select name="type" class="form-select" required>
                        <option selected disabled value="">เลือกหัวข้อข่าวสาร</option>
                        @foreach ($post_types as $post_type)
                            <option value="{{$post_type->id}}">{{$post_type->type}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="header" class="form-label">ชื่อหัวข้อ: </label>
                    <input type="text" name="header" required class="form-control">
                </div>
                <div class="mb-3">
                   <label for="detail" class="form-label">รายละเอียด: </label>
                    <textarea type="text" name="detail" required class="form-control" rows="10"></textarea>
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">รูปภาพประกอบ: </label>
                    <input type="file" name="photo" class="form-control" id="image-input" required>
                </div>
                <div class="mb-3">
                    <div class="text-center">
                        <img src="#" id="image-preview" style="display: none; max-width: 300px; max-height: 300px;" class="rounded">
                    </div>
                </div>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script>
                        $(document).ready(function() {
                        $('#image-input').change(function() {
                            var input = this;
                            var img = $('#image-preview');
                                if (input.files && input.files[0]) {
                                    var reader = new FileReader();
                                    reader.onload = function(e) {
                                        img.attr('src', e.target.result);
                                        img.show();
                                    }
                                    reader.readAsDataURL(input.files[0]);
                                }
                            });
                        });
                    </script>
                <div class="mb-3">
                   <label for="source" class="form-label">ที่มา: </label>
                    <input type="text" name="source" required class="form-control">
                </div>
                <div class="mb-3">
                   <button type="submit" class="btn btn-primary">เพิ่มข่าวสาร</button> 
                </div>
            </form>
        </div>
    </div>
@endsection