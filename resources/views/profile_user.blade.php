@extends('layouts.master_user')
@section('content')
    <link rel="stylesheet" href="{{asset('./css/profile.css')}}">
    <div class = "container">
        <ul class="menu">
            <button class="btn btn-warning" ><li><a href="/history/post">ประวัติการโพสต์</a></li></button>
            <button class="btn btn-warning"><li><a href="/success">ประวัติการรับเลี้ยง</a></li></button>

            <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"> <button>{{ __('ออกจากระบบ') }}</button>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            </a>
    </div>

    <div class = "infomember">
        <h3>ข้อมูลสมาชิก</h3>
    </div>

    <div class="content">
        <div class="container2">
            <form action="">

                <div class="form">
                    <label for="">ชื่อสกุล</label><br>
                    <input type="text" value="{{Auth::user()->name}}"><br>
                    <label for="">เบอร์โทร</label><br>
                    <input type="text" value="{{Auth::user()->phone_number}}"><br>
                    <label for="">อีเมล</label><br>
                    <input type="email" value="{{Auth::user()->email}}">
                </div>

                <div class = "address">
                    <label for="">ที่อยู่</label><br>
                    <input type="text" value="{{Auth::user()->address}}">
                </div>
                <div class="edit">
                    <button type="button" class="btn btn-success">บันทึกข้อมูล</button>
                </div>

            </form>
        </div>
    </div>

    <footer>
        <div class="container3">
            <p>Adoptrable by Oak and Friends</p>
        </div>
    </footer>
@endsection