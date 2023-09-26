@extends('layouts.master')
@section('content')
    <form action="/historypost/details" method="get">
        <div class="custom-div22" >
    
            <div class ="containner4">
            <div class="row pt-2 mb-3">
            </div>
            <div class="col-12 h4 text-center text">{{$pet->name}}</div> <hr>
            <div class="row mb-3">
                <div class="col-12 imgpost">
                    <img src="{{asset('storage/Image/'.$pet->pet_photo)}}" alt="" height="500" class="imgpost">
                </div>
            </div>
            <div class="row dt">
                <div class="col-12 detailspost">
                    <p><b>เพศ : </b>
                     @if ($pet->gender =='M')ผู้
                    @else เมีย
                    @endif </p>
                    <p><b>สี : </b>{{$pet->color}}</p>
                    <p><b>น้ำหนัก : </b>{{$pet->weight}} กิโลกรัม</p>
                    <p><b>รายละเอียดเพิ่มเติม : </b>{{$pet->detail}}</p>
                    <p><b>พันธุ์สัตว์ :</b> {{$pet->species}}</p>
                    <p><b>ความต้องการพิเศษ : </b>{{$pet->special_needs}}</p>
                    <p><b>วัคซีน : </b>{{$pet->vacine}}</p>
                </div>
            </div>
            </div>
            </div>
            @endsection