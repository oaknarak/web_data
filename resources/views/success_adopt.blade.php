@extends('layouts.master_user')
@section('content')

<div class="hiss">
    <h4>ประวัติการรับเลี้ยง</h4>

</div>
<div class="containerhis">
    <table>
        <tr>
            <th>ชื่อสัตว์เลี้ยง</th>
            <th>ชื่อเจ้าของสัตว์เลี้ยง</th>
        </tr>
       
            @foreach ($show as $successadopt) 
            
            <tr>
                 <td>{{$successadopt->pet->name}}</td>
                <td>{{$successadopt->pet->user->name}}</td>
            </tr>

            @endforeach
    </table>
    
</div>
    
@endsection

