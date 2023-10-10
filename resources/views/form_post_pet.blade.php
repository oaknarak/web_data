@extends('layouts.master_user')
@section('content')
    <div class="row pt-2 mx-5">
        <div class="col-12">
            <div class="h4 text-center pt-2">โพสต์หาบ้านให้สัตว์</div>
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
            <form action="/create/post/pet" method="post" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="name" class="form-label">ชื่อสัตว์ : </label>
                            <input type="text" name="name" required class="form-control" pattern="[a-zA-Zก-๏ะ฿]+">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="type" class="form-label">ประเภทของสัตว์ : </label>
                            <select name="type" class="form-select" required>
                                <option selected disabled value="">เลือกประเภทของสัตว์</option>
                                <option value="cat">แมว</option>
                                <option value="dog">สุนัข</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="color" class="form-label">สี : </label>
                            <input type="text" name="color" required class="form-control" pattern="[a-zA-Zก-๏ะ฿]+">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="gender" class="form-label">เพศ : </label>
                            <select name="gender" class="form-select" required>
                                <option selected disabled value="">เลือกเพศของสัตว์</option>
                                <option value="F">เพศเมีย</option>
                                <option value="M">เพศผู้</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="species" class="form-label">พันธุ์สัตว์ : </label>
                            <input type="text" name="species" required class="form-control" pattern="[a-zA-Zก-๏ะ฿]+">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="weight" class="form-label">น้ำหนัก (กิโลกรัม): </label>
                            <input type="text" name="weight" required class="form-control" pattern="[0-9]+">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="special_needs" class="form-label">ความต้องการพิเศษ : </label>
                            <textarea type="text" name="special_needs" required class="form-control" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="vacine" class="form-label">ประวัติการได้รับวัคซีน : </label>
                            <textarea type="text" name="vacine" required class="form-control" rows="10"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                       <div class="mb-3">
                        <label for="detail" class="form-label">รายละเอียดเพิ่มเติม : </label>
                        <textarea type="text" name="detail" required class="form-control" rows="10"></textarea>
                    </div> 
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="pet_photo" class="form-label">รูปภาพประกอบ : </label>
                            <input type="file" name="pet_photo" id="image-input" class="form-control" required accept="image/jpeg, image/png">
                        </div>
                        <div class="mb-3">
                            <div class="text-center">
                                <img src="#" id="image-preview" style="display: none; max-width: 300px; max-height: 300px;" class="rounded">
                            </div>
                        </div>
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
                <button type="submit" class="btn btn-primary">ส่งคำขอ</button> 
                </div>
            </form>
        </div>
    </div>
@endsection