@extends('layouts.master_user')
@section('content')
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">

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
        @foreach ($pets_history as $pet)
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
        @endforeach
    </table>
    </div>
    </div>

   
    @endsection