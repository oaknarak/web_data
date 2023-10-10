<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">

</head>
<link rel="stylesheet" href="{{asset('./css/Login.css')}}">
<body>
    
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif
    <div class="container">
        <div class="form-container">
            <div class="box">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h2>เข้าสู่ระบบ</h2>
                    <div>
                        <input id="email" type="email" name="email" placeholder="อีเมล" autofocus autocomplete="username" />
                    </div>
                    <div class="mt-4">
                        <input id="password" type="password" name="password" placeholder="รหัสผ่าน" autocomplete="current-password" />
                    </div>
                    <button type="submit" onclick="login()">เข้าสู่ระบบ</button>
                        <h4>หรือ</h4>
                </form>
                <a href="register"><button>สมัครสมาชิก</button></a>
            </div>
        </div>
    </div>
</body>
</html>