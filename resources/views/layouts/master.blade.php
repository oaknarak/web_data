<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adoptrable.org</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('./css/admin.css')}}">
    <style>
        *{   
            font-family: 'Sarabun';
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="http://127.0.0.1:8000/home_admin">
                <img src="https://scontent.xx.fbcdn.net/v/t1.15752-9/376355393_1053473069019885_1598622815889590690_n.png?stp=dst-png_p206x206&_nc_cat=102&ccb=1-7&_nc_sid=aee45a&_nc_eui2=AeFeoX-FZxvjqGYCxhc3tnHl2iylSUFKOFPaLKVJQUo4U01fEVh2e0CPmbXTAIjClhjE-Q9OoD1F9EV3k_P1A1ND&_nc_ohc=VtgiIhhNd6UAX-EYgy1&_nc_ad=z-m&_nc_cid=0&_nc_ht=scontent.xx&oh=03_AdTsla02gT69s5zUMIZwWT-RhtO9wyNYTveWDIFCpkyTuQ&oe=652A5198" alt="Logo" class="d-inline-block align-text-top">
            </a>
            <a class="nameweb" href="http://127.0.0.1:8000/home_admin">Adoptrable</a>
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
                <a href="/profile" >
                    <img src="{{asset('storage/image/PersonFill.png')}}" alt="">
                </a>
            </div>
        </div>
    </nav>
    
        @yield('content')
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</html>