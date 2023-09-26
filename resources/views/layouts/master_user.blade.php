<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('./css/styles.css')}}">
</head>
<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="http://127.0.0.1:8000/home">
                <img src="https://scontent.xx.fbcdn.net/v/t1.15752-9/376355393_1053473069019885_1598622815889590690_n.png?stp=dst-png_p206x206&_nc_cat=102&ccb=1-7&_nc_sid=aee45a&_nc_eui2=AeFeoX-FZxvjqGYCxhc3tnHl2iylSUFKOFPaLKVJQUo4U01fEVh2e0CPmbXTAIjClhjE-Q9OoD1F9EV3k_P1A1ND&_nc_ohc=VtgiIhhNd6UAX-EYgy1&_nc_ad=z-m&_nc_cid=0&_nc_ht=scontent.xx&oh=03_AdTsla02gT69s5zUMIZwWT-RhtO9wyNYTveWDIFCpkyTuQ&oe=652A5198" alt="Logo" class="d-inline-block align-text-top">
            </a>
            <a class="nameweb" href="http://127.0.0.1:8000/home">Adoptrable</a>
            @if (Auth::check())
                @if (Auth::user()->name == null)
                    <p><a href="/login">เข้าสู่ระบบ / สมัครสมาชิก</a></p>
                @else
                    <p>{{ Auth::user()->name }}</p>
                @endif
            @else
                <p><a href="/login">เข้าสู่ระบบ / สมัครสมาชิก</a></p>
            @endif
            <div class="img-profile">
                <a href="/profile_user" >
                    <img src="{{asset('storage/image/PersonFill.png')}}" alt="">
                </a>
            </div>
        </div>
    </nav>
    @yield('content')
    <footer>
        <div class="container3">
            <div class="logo-contact">
                <img src="https://scontent.xx.fbcdn.net/v/t1.15752-9/383889767_1492415294633670_4056249132616818193_n.png?_nc_cat=110&ccb=1-7&_nc_sid=aee45a&_nc_ohc=b596PgTgpeYAX8k2L1W&_nc_ad=z-m&_nc_cid=0&_nc_ht=scontent.xx&oh=03_AdTBta4LYoRppjismOJcvFLEqoH6L420hPxXCYp_yHDrlA&oe=6539EC4C"
                    alt="Logo" class="d-inline-block align-text-top">
            </div>
            <div class="infoprofile">
                <small>ช่องทางติดต่อ</small><br>
                <small>วิทยาลัยการคอมพิวเตอร์ มหาวิทยาลัยขอนแก่น<br>123 อาคารวิทยวิภาส ถ.มิตรภาพ ต.ในเมือง อ.เมืองขอนแก่น จ.ขอนแก่น 40002</small>
                <small>โทรศัพท์ 0885749640</small>
            </div>
            <div class="infoprofile2">
                <small>Contact us</small><br>
                <small>College of Computing Khon Kaen University. <br> 123 Vidhayavibaj Building,Mitraparp road Muang District, Khon Kaen 40002</small>
                <small>Tel. 0885749640</small>
            </div>
           
        </div>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</html>