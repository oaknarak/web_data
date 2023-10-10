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
    <h4>ประวัติการรับเลี้ยง</h4>
    <table class ="table1">
        <tr>
            <th>ชื่อสัตว์เลี้ยง</th>
            <th>ชื่อเจ้าของสัตว์เลี้ยง(คนเก่า)</th>
            <th>เบอร์โทรศัพท์เจ้าของคนเก่า</th>
            <th>รูปสัตว์</th>
            <th>พันธุ์สัตว์</th>
            <th>สถานะ</th>
        </tr>

            @forelse ($show as $successadopt)

            <tr>
                 <td>{{$successadopt->pet->name}}</td>
                <td>{{$successadopt->pet->user->name}}</td>
                <td>{{$successadopt->pet->user->phone_number}}</td>
                <td> <img class="imgsize" src="{{asset('storage/Image/'.$successadopt->pet->pet_photo)}}" width="200px" height="80px"></td>
                <td>{{$successadopt->pet->species}}</td>
                @if ($successadopt->selected == 1)
                <td>รับเลี้ยงสำเร็จ</td>
                @else
                <td>รอการติดต่อกลับ</td>
                @endif
            </tr>
            @empty
            <td colspan="6">ไม่มีข้อมูล</td>
        @endforelse
    </table>

</div>

<div class="custom-div2" >
    <div class="colorinimg">

    </div>
</div>

@endsection

