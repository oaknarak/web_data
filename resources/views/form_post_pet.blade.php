@extends('layouts.master_user')
@section('content')
    <div class="row pt-2 mx-5">
        <div class="col-12">
            <div class="h4 text-center">โพสต์หาบ้านให้สัตว์</div>
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
            <form action="/create/post/pet" method="post" enctype="multipart/form-data" class="needs-validation">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">ชื่อสัตว์: </label>
                    <input type="text" name="name" required class="form-control">
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">ประเภทของสัตว์: </label>
                    <select name="type" class="form-select" required>
                        <option selected disabled value="">เลือกประเภทของสัตว์</option>
                        <option value="cat">แมว</option>
                        <option value="dog">หมา</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">เพศ: </label>
                    <select name="gender" class="form-select" required>
                        <option selected disabled value="">เลือกเพศของสัตว์</option>
                        <option value="F">เพศหญิง</option>
                        <option value="M">เพศชาย</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="color" class="form-label">สี: </label>
                    <input type="text" name="color" required class="form-control">
                </div>
                <div class="mb-3">
                    <label for="species" class="form-label">พันธุ์สัตว์: </label>
                    <input type="text" name="species" required class="form-control">
                </div>
                <div class="mb-3">
                    <label for="weight" class="form-label">น้ำหนัก: </label>
                    <input type="text" name="weight" required class="form-control">
                </div>
                <div class="mb-3">
                    <label for="special_needs" class="form-label">ความต้องการพิเศษ: </label>
                    <input type="text" name="special_needs" required class="form-control">
                </div>
                <div class="mb-3">
                    <label for="vacine" class="form-label">ประวัติการได้รับวัคซีน: </label>
                    <input type="text" name="vacine" required class="form-control">
                </div>
                <div class="mb-3">
                    <label for="detail" class="form-label">รายละเอียดเพิ่มเติม: </label>
                    <input type="text" name="detail" required class="form-control">
                </div>
                <div class="mb-3">
                    <label for="pet_photo" class="form-label">รูปภาพประกอบ: </label>
                    <input type="file" name="pet_photo" class="form-control" required>
                </div>
                <div class="mb-3">
                <button type="submit" class="btn btn-primary">ส่งคำขอ</button> 
                </div>
            </form>
        </div>
    </div>
@endsection