<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
    <style>
        *{   
            font-family: 'Sarabun';
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    @include('sweetalert::alert')
    <div class="container">
        <div class="row pt-3 mb-3">
            <div class="col-5">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                    <a class="navbar-brand" href="/home_admin">Adoptrable</a> 
                    </div>
                </nav>
            </div>
            <div class="col-7">
                <nav class="navbar navbar-expand-lg">
                    <a href="/form/post" class="navbar-brand">โพสต์ข้อมูลข่าวสาร</a>
                    <a href="/approve" class="navbar-brand">การอนุมัติความช่วยเหลือ</a>
                    <a href="/profile" class="navbar-brand">โปรไฟล์</a>
                </nav>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        @yield('content')
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</html>