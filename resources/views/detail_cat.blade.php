@extends('layouts.master_user')
@section('content')

<div class="custom-div22" >
    
<div class ="containner4">
<div class="row pt-2 mb-3">
</div>
<div class="col-12 h4 text-center text">{{$cat->name}}</div> <hr>
<div class="row mb-3">
    <div class="col-12 imgpost">
        <img src="{{asset('storage/Image/'.$cat->pet_photo)}}" alt="" height="500" class="imgpost">
    </div>
</div>
<div class="row dt"><hr>
    <div class="col-12 detailspost">
        <p><b>เพศ : </b>
         @if ($cat->gender =='M')ผู้
        @else เมีย
        @endif </p>
        <p><b>สี : </b>{{$cat->color}}</p>
        <p><b>น้ำหนัก : </b>{{$cat->weight}} กิโลกรัม</p>
        <p><b>รายละเอียดเพิ่มเติม : </b>{{$cat->detail}}</p>
        <p><b>พันธุ์สัตว์ :</b> {{$cat->species}}</p>
        <p><b>ความต้องการพิเศษ : </b>{{$cat->special_needs}}</p>
        <p><b>วัคซีน : </b>{{$cat->vacine}}</p>
        <div class="btnadopt">
            @if ($cat->user_id != Auth::user()->id)
                <a href="/adopt/{{$cat->id}}" class="btn btn-primary" onclick="confirm ('คุณยืนยันที่จะติดต่อรับเลี้ยงน้อง {{$cat->name}} หรือไม่')">ติดต่อขอรับเลี้ยง</a>
            @else
            @endif
        </div>
    </div>
</div>
</div>
</div>
@endsection