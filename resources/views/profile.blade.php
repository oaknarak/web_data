@extends('layouts.master')
@section('content')
    <div class="row ">
        <div class="col-2">
            <a href="/form/post_type">เพิ่มหัวข้อข่าวสาร</a><br>
            <a href="/trashed/post">คลังโพสต์ข่าวสาร</a><br>
            <a href="">ประวัติการอนุมัติคำขอ</a><br>
            <a href="{{route('logout')}}">ออกจากระบบ</a>
        </div>
        <div class="col-10 bg-primary">
        </div>
    </div>
    
@endsection