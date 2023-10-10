@extends('layouts.master_user')
@section('content')
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <div class="custom-menu-item-back">
        <button type="submit" id="gotoPageButton" class="btn btn-outline-dark">กลับไปก่อนหน้า</button>
        <script>
            document.getElementById("gotoPageButton").addEventListener("click", function() {
                window.location.href = "http://127.0.0.1:8000/profile_user";
            });
        </script>
    </div>
    

    <div class="containerreq1">
        <h4>ประวัติการโพสต์</h4>
    <table class ="table1">
        <tr>
            <th>ชื่อสัตว์</th>
            <th>ประเภทสัตว์</th>
            <th>รายละเอียด</th>
            <th>การอนุมัติ</th>
            <th>การทำงาน</th>
        </tr>
        @forelse ($pets_history as $pet)
            <tr>
                <td>{{ $pet->name }}</td>
                <td>
                    @if ($pet->type == 'dog')
                        สุนัข
                    @else
                        แมว
                    @endif
                </td>
                <td> <a href="/historypost/details/{{ $pet->id }}">เพิ่มเติม</a></td>
                <td>
                    @if ($pet->approve == 0)
                        รอการอนุมัติ
                    @elseif ($pet->approve == 1)
                        อนุมัติแล้ว
                    @endif
                </td>
                <td>

                    <form action="/historypost/delete/{{ $pet->id }}" method="get">
                        @csrf
                        <button class="btn btn-danger"  type="submit" onclick="return confirm('คุณจะลบโพสต์ของน้อง {{$pet->name}} ใช่หรือไม่?')">ลบโพสต์</button>
                    </form>
                </td>
            </tr>
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