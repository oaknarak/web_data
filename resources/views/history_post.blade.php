@extends('layouts.master_user')
@section('content')

<div class="custom-menu-item-back">
    <button type="submit" id="gotoPageButton" class="btn btn-outline-dark">กลับไปก่อนหน้า</button>
    <script>
        document.getElementById("gotoPageButton").addEventListener("click", function() {
            window.location.href = "http://127.0.0.1:8000/profile_user";
        });
    </script>
</div>

    <div class="containerreq1">
        <h4>คำขอรับเลี้ยง</h4>
        <table>
            <tr>
                <th>ชื่อสัตว์เลี้ยง</th>
                <th>ชื่อคนที่ต้องการรับเลี้ยง</th>
                <th>ที่อยู่</th>
                <th>อาชีพ</th>
                <th>เงินเดือน</th>
                <th>อายุ</th>
                <th>เงื่อนไข</th>
                <th>สภาพแวดล้อมของที่อยู่</th>
                <th>เบอร์โทรศัพท์</th>
                <th>ยินยอมการรับเลี้ยง</th>
            </tr>
            @forelse ($user_requests as $user_request)
            @if ($user_request->pet->user->id == Auth::user()->id)
                <tr>
                    <td>{{$user_request->pet->name}}</td>
                    <td>{{$user_request->user->name}}</td>
                    <td>{{$user_request->user->address}}</td>
                    <td>{{$user_request->user->occupation}}</td>
                    <td>{{$user_request->user->salary}}</td>
                    <td>{{ date_diff(date_create(), date_create($user_request->user->birthdate))->format('%Y') }}</td>
                    <td>{{$user_request->user->detail}}</td>
                    <td>
                        <img class="imgsize" src="{{asset('storage/Image/'.$user_request->user->home_photo)}}" width="200px" height="80px"></td>
                    <td>{{$user_request->user->phone_number}}</td>
                    <td>
                        @if ($user_request->selected == 1)
                        <button type="submit" class="btn btn-warning" disabled onclick="return confirm('คุณยืนยันที่จะให้ {{$user_request->pet->name}} กับ {{$user_request->user->name}} ใช่หรือไม่?')">
                            <a href="{{route('accept', ['var1' => $user_request->user->id, 'var2' => $user_request->pet->id]) }}">ยินยอมการรับเลี้ยง</a>
                        </button>
                        @else
                            <button type="submit" class="btn btn-warning" onclick="return confirm('คุณยืนยันที่จะให้ {{$user_request->pet->name}} กับ {{$user_request->user->name}} ใช่หรือไม่?')">
                            <a href="{{route('accept', ['var1' => $user_request->user->id, 'var2' => $user_request->pet->id]) }}">ยินยอมการรับเลี้ยง</a>
                            </button>
                        @endif
                    </td>
                </tr>  
            @endif
            @empty
                <tr>
                    <td colspan="10">ไม่มีข้อมูล</td>
                </tr>
            @endforelse
              
        </table>
        <table class = "table1">
            <h5>คนที่รับเลี้ยงไปแล้ว</h5>
            <tr>
                <th>ชื่อสัตว์เลี้ยง</th>
                <th>ชื่อคนที่รับเลี้ยง</th>
            </tr>
                @forelse ( $user_requests as $user_request) 
                @if ($user_request->pet->user->id == Auth::user()->id)
                 @if($user_request->selected==1)
                    <tr>
                    <td>{{$user_request->pet->name}}</td>
                     <td>{{$user_request->user->name}}</td>
                    </tr>
                @endif
                
            @endif
            @empty
            <td colspan="5">ไม่มีข้อมูล</td>    
        @endforelse
        </table>
    </div>
    <div class="custom-div2" >
        <div class="colorinimg">
            
        </div>
    </div>
    
   
@endsection