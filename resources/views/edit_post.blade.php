@extends('layouts.master')
@section('content')
    <div class="row mx-5">
        <div class="col-12">
            <div class="h4 text-center">แก้ไขโพสต์</div>
            <form action="/update/post/{{$post->id}}" method="post" enctype="multipart/form-data" class="needs-validation">
                @csrf
                <div class="mb-3">
                    <label for="type" class="form-label">ประเภทข่าวสาร: </label>
                    <select name="type" class="form-select" required>
                        <option disabled value="">เลือกหัวข้อข่าวสาร</option>
                        @foreach ($post_types as $post_type)
                            <option value="{{$post_type->id}}" @if($post_type->id == $post->post_type_id) selected @endif>{{$post_type->type}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">กรุณาเลือกหัวข้อข่าวสาร</div>
                </div>
                <div class="mb-3">
                    <label for="header" class="form-label">ชื่อหัวข้อ: </label>
                    <input type="text" name="header" required class="form-control" value="{{$post->header}}">
                    <div class="invalid-feedback">กรุณากรอกหัวข้อ</div>
                </div>
                <div class="mb-3">
                    <label for="detail" class="form-label">รายละเอียด: </label>
                    <textarea type="text" name="detail" required class="form-control" rows="10">{{$post->detail}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">รูปภาพประกอบ: </label>
                    <input type="file" name="photo" class="form-control" id="image-input" required >
                </div>
                <div class="mb-3">
                    <div class="text-center">
                        <img src="{{asset('storage/Image/'.$post->photo)}}" id="image-preview" style=" max-width: 300px; max-height: 300px;" class="rounded">
                    </div>
                </div>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $('#image-input').change(function() {
                            var input = this;
                            var imagePreview = $('#image-preview');
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();
                
                                reader.onload = function(event) {
                                    imagePreview.attr('src', event.target.result);
                                    imagePreview.css('display', 'block');
                                };
                                reader.readAsDataURL(input.files[0]);
                            } else {
                                imagePreview.css('display', 'none');
                            }
                        });
                    });
                </script>
                <div class="mb-3">
                   <label for="source" class="form-label">ที่มา: </label>
                    <input type="text" name="source" required class="form-control" value="{{$post->source}}">
                    <div class="invalid-feedback">กรุณากรอกที่มา</div>
                </div>
                <div class="mb-3">
                   <button type="submit" class="btn btn-primary">บันทึกข่าวสาร</button> 
                </div>
            </form>
        </div>
    </div>
@endsection