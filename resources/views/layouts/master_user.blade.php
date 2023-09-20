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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="http://127.0.0.1:8000/home">
                <img src="https://scontent.xx.fbcdn.net/v/t1.15752-9/376355393_1053473069019885_1598622815889590690_n.png?stp=dst-png_p206x206&_nc_cat=102&ccb=1-7&_nc_sid=aee45a&_nc_eui2=AeFeoX-FZxvjqGYCxhc3tnHl2iylSUFKOFPaLKVJQUo4U01fEVh2e0CPmbXTAIjClhjE-Q9OoD1F9EV3k_P1A1ND&_nc_ohc=VtgiIhhNd6UAX-EYgy1&_nc_ad=z-m&_nc_cid=0&_nc_ht=scontent.xx&oh=03_AdTsla02gT69s5zUMIZwWT-RhtO9wyNYTveWDIFCpkyTuQ&oe=652A5198" alt="Logo" width="40" height="40" class="d-inline-block align-text-top">
                Adoptrable
            </a>
            <p>{{Auth::user()->name}}</p>
            <div class="img-profile">
                <a href="/profile_user" >
                    <img src="{{asset('storage/image/PersonFill.png')}}" alt="">
                </a>
            </div>
        </div>
    </nav>
    {{-- <hr> --}}
    {{-- <div class="container">
                    <div class="custom-menu">
                        <div class="custom-menu-item">
                            <button id="gotoPageButton" class="btn btn-danger">ข้อมูลข่าวสาร</button>
                            <script>
                                document.getElementById("gotoPageButton").addEventListener("click", function() {
                                window.location.href = "http://127.0.0.1:8000/home";
                                });
                            </script>
                        </div>
                        <div class="custom-menu-item">
                            <button id="gotoPageButton3" class="btn btn-outline-dark">หาบ้านให้สัตว์</button>
                            <script>
                                document.getElementById("gotoPageButton3").addEventListener("click", function() {
                                window.location.href = "http://127.0.0.1:8000/findhome/dog"; // เปลี่ยน URL เป็น URL ของหน้าที่คุณต้องการไป
                                });
                            </script>
                        </div>
                    </div>
        </div>
            <div class="col-7">
                <div class="d-flex flex-row mb-3">
                </div>
            </div>
            <div class="help">
                <button class="btn btn-outline-dark"><a href="#">โพสต์หาบ้านให้สัตว์</a></button>
            </div> 
        </div>
    </div> --}}
    @yield('content')
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</html>