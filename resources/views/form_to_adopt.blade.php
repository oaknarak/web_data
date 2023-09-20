@extends('layouts.master_user')
@section('content')
    <div class="row pt-2 mx-5">
        <div class="col-12">
            <div class="h4 text-center">แบบคำขอรับเลี้ยง</div>
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
            <form action="/update/form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="address" class="form-label">ที่อยู่: </label>
                    <input type="text" name="address" required class="form-control">
                </div>
                <div class="mb-3">
                    <label for="occupation" class="form-label">อาชีพ: </label>
                    <input type="text" name="occupation" required class="form-control">
                </div>
                <div class="mb-3">
                    <label for="salary" class="form-label">เงินเดือน: </label>
                    <input type="text" name="salary" required class="form-control">
                </div>
                <div class="mb-3">
                    <label for="birthdate" class="form-label">วันเกิด: </label>
                    <input type="date" name="birthdate" required class="form-control">
                </div>
                
                <div class="mb-3">
                    <label for="detail" class="form-label">รายละเอียดหรือเงื่อนไขเพิ่มเติม: </label>
                    <input type="text" name="detail" required class="form-control">
                </div>
                <div class="mb-3">
                    <label for="home_photo" class="form-label">สภาพแวดล้อมของที่อยู่: </label>
                    <input type="file" name="home_photo" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="phone_number" class="form-label">เบอร์โทรศัพท์: </label>
                    <input type="text" name="phone_number" required class="form-control">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="yes" id="consentCheckbox" required>
                    <label class="form-check-label" for="form_privacy">
                        ท่านได้ยอมรับในการเก็บข้อมูลส่วนตัวของท่านกับทางเรา
                    </label>
                </div>
                <div class="mb-3">
                        <button type="submit" class="btn btn-primary" id = "submitButton" disabled >ส่งคำขอ</button> 
                </div>
            </form>
            <script>
                var consentCheckbox = document.getElementById("consentCheckbox");
                var submitButton = document.getElementById("submitButton");

                consentCheckbox.addEventListener("change", toggleSubmitButton);

                function toggleSubmitButton() {
                    submitButton.disabled = !consentCheckbox.checked;
                    

                    if (submitButton.disabled) {
                        submitButton.classList.remove("btn-success");
                        submitButton.classList.add("btn btn-primary");
                    } else {
                        submitButton.classList.remove("btn btn-primary");
                        submitButton.classList.add("btn-success");
                    }
                }
            </script>
        </div>
    </div>
@endsection