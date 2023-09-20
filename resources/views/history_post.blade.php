@extends('layouts.master_user')
@section('content')
    <table>
        <tr>
            <th>ชื่อสัตว์เลี้ยง</th>
            <th>ประเภท</th>
            <th>สถานะ</th>
        </tr>
        @forelse ($pets as $pet)
        <tr>
            <td>{{$pet->name}}</td>
            <td>{{$pet->type}}</td>
            @if ($pet->approve == null)
                <td>ยังไม่อนุมัติ</td>
            @else
                <td>อนุมัติแล้ว</td>
            @endif
        </tr>
    @empty
        ไม่มีข้อมูล
    @endforelse
    </table>
    <table>
        <tr>
            <th>ชื่อสัตว์เลี้ยง</th>
            <th>ชื่อคนที่ต้องการรับเลี้ยง</th>
            <th>อายุ</th>
            <th>เงื่อนไข</th>
        </tr>
        @forelse ($user_requests as $user_request)
        @if ($user_request->pet->user->id == Auth::user()->id)
            <tr>
                <td>{{$user_request->pet->name}}</td>
                <td>{{$user_request->user->name}}</td>
                <td>{{$user_request->user->birthdate}}</td>
                <td>{{$user_request->user->detail}}</td>
                <td><a href="{{route('tha', ['var1' => $user_request->user->id, 'var2' => $user_request->pet->id]) }}">ยินยอมการรับเลี้ยง</a></td>

            </tr>  
        @endif

        @empty
            ไม่มีข้อมูล
        @endforelse
          
    </table>
    <table>
        
        <tr>
            <th>ชื่อสัตว์เลี้ยง</th>
            <th>ชื่อคนที่ต้องการรับเลี้ยง</th>
        </tr>
            @foreach ( $user_requests as $user_request) 
            @if ($user_request->pet->user->id == Auth::user()->id)
             @if($user_request->selected==1)
                <tr>
                <td>{{$user_request->pet->name}}</td>
                 <td>{{$user_request->user->name}}</td>
                </tr>
            @endif
            
        @endif
        @endforeach
    </table>
   
@endsection