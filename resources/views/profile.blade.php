@extends('layouts.master')
@section('content')
    <div class = "containeradmin">
            <ul class="menu">
                <button class="btn btn-info" id="post" ><li><a href="/home_admin">ข่าวสาร</a></li></button>
                <button class="btn btn-primary" id="primarypost" ><li><a href="/form/post">โพสต์ข้อมูลข่าวสาร</a></li></button>
                <button class="btn btn-success" id="requestpost" ><li><a href="/approve">อนุมัติโพสต์หาบ้าน</a></li></button>
                <button class="btn btn-info" id="infoposttype"  ><li><a href="/form/post_type">เพิ่มหัวข้อข่าวสาร</a></li></button>
                <button class="btn btn-warning"><li><a href="/trashed/post">ถังขยะโพสต์</a></li></button>
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"> <button class="btn btn-danger">{{ __('ออกจากระบบ') }}</button>
    
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none; ">
                    @csrf
                </form>
    
                </a>
            </ul>
            {{-- <button type="submit"><a href="/form/post"></a></button>
            <a href="/form/post" type="button" class="btn btn-primary">โพสต์ข้อมูลข่าวสาร</a>
            <button class="btn btn-success"><li><a href="/approve">อนุมัติโพสต์หาบ้าน</a></li></button>
            <button class="btn btn-info"><li><a href="/form/post_type">เพิ่มหัวข้อข่าวสาร</a></li></button>
            <button class="btn btn-warning"><li><a href="/trashed/post">ถังขยะโพสต์</a></li></button>
            <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"> <button class="btn btn-danger">{{ __('ออกจากระบบ') }}</button>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            </a> --}}
    </div>
@endsection