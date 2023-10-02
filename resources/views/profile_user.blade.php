@extends('layouts.master_user')
@section('content')
    <link rel="stylesheet" href="{{asset('./css/styles.css')}}">
    <div class = "container">
        @if(session('ErrorAddress'))
            <script>
                alert("ท่านยังกรอกข้อมูลไม่ครบถ้วน");
            </script>
        @endif
        @if(session('success_address'))
                <script>
                    alert("กรอกข้อมูลเรียบร้อย");
                </script>
        @endif
        <ul class="menu">
            <button class="btn btn-warning" ><li><a href="/historypost">ประวัติการโพสต์</a></li></button>
            <button class="btn btn-success" id="request" ><li><a href="/adopt_request">คำขอรับเลี้ยง</a></li></button>
            <button class="btn btn-warning"><li><a href="/success">ประวัติการรับเลี้ยง</a></li></button>
            <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"> <button class="btn btn-danger">{{ __('ออกจากระบบ') }}</button>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none; ">
                @csrf
            </form>

            </a></ul>
    </div>
    <div class = "infomember">
        <h3>ข้อมูลเพิ่มเติมในกรณีรับเลี้ยงสัตว์</h3>
    </div>
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
    <div class="content">
        <div class="container2">
            <form action="/update/form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form">
                    <label for="">ชื่อสกุล</label><br>
                    <input type="text" value="{{Auth::user()->name}}" name="name" readonly><br>
                    <label for="">เบอร์โทร</label><br>
                    <input type="text" value="{{Auth::user()->phone_number}}" name="phone_number" pattern="[0-9]{10}"><br>
                    <label for="">อีเมล</label><br>
                    <input type="email" value="{{Auth::user()->email}}" name="email">
                </div>
                <div class = "address">
                    <label for="">ที่อยู่</label><br>
                    <input type="text" value="{{Auth::user()->address}}" name="address">
                </div>
                <div class = "occupation">
                    <label for="">อาชีพ</label><br>
                    <input type="text" value="{{Auth::user()->occupation}}" name="occupation" pattern="[a-zA-Zก-๏ะ฿]+">
                </div>
                <div class="Salary">
                    <label for="">เงินเดือน</label><br>
                    <input type="text" value="{{Auth::user()->salary}}" name="salary" pattern="[0-9]{10}">
                </div>
                <div class = "Brithday">
                    <label for="">วันเกิด</label><br>
                    <input type="date" value="{{Auth::user()->birthdate}}" name="birthdate" max="<?php echo date('Y-m-d');?>">
                </div>
                <div class = "detail">
                    <label for="">รายละเอียดเพิ่มเติมหรือเงื่อนไขเพิ่มเติม</label><br>
                    <textarea name="detail" cols="41" rows="6">{{Auth::user()->detail}}</textarea>
                    
                </div>

                <div class = "envi">
                    <p >สภาพแวดล้อมของที่อยู่</p>
                    <img src="{{asset('storage/Image/'.Auth::user()->home_photo)}}" alt="" id="image-preview">
                    <input type="file" name="home_photo">
                </div>
                <div class="edit">
                    <button type="submit" class="btn btn-success" id = "submitButton" disabled >บันทึกข้อมูล</button>
                </div>
                
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="yes" id="consentCheckbox" required>
                    <label class="form-check-label" for="form_privacy">ท่านได้
                        <a href="https://drive.google.com/file/d/1HT374siniqVodGquFOdHzl7YVW7Tb_Kt/view?fbclid=IwAR1EYlBJ6gVMBLyyTyHD4uq0bOGGn
                                kneDVq8plra5DHDX-7iB9IORYsooPY" target="_blank">
                            ยอมรับเงื่อนไขและข้อตกลง
                        </a>
                        ในการเก็บข้อมูลส่วนตัวของท่านกับทางเรา
                    </label>
                </div>
                
            </form>
            <script>
                var consentCheckbox = document.getElementById("consentCheckbox");
                var submitButton = document.getElementById("submitButton");

                consentCheckbox.addEventListener("change", toggleSubmitButton);

                function toggleSubmitButton() {
                    submitButton.disabled = !consentCheckbox.checked;
                    

                    if (submitButton.disabled) {
                        submitButton.classList.add("btn btn-primary");
                        
                        
                    } else {
                        submitButton.classList.remove("btn btn-primary");
                        submitButton.classList.add("btn-success");
                    }
                }
            </script>

            </form>
        </div>
    </div>

    
@endsection