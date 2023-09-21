<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก</title>
    <link rel="stylesheet" href="{{asset('./css/Register.css')}}">
</head>
<body>
<div class="container">
    <div class="form-container">
        <div class="box">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h3>สมัครสมาชิก</h3>

                <div>
                    <input id="name" type="text" name="name" placeholder="ชื่อผู้ใช้" placeholder="ชื่อผู้ใช้" autofocus autocomplete="name" />
                </div>
                <div class="mt-4">
                    <input id="email" type="email" name="email" placeholder="อีเมล" placeholder="อีเมล" autocomplete="username" />
                </div>
                <div class="mt-4">
                    <input id="password" type="password" name="password" placeholder="รหัสผ่าน" autocomplete="new-password" />
                </div>
                <div class="mt-4">
                    <input id="password_confirmation" type="password" name="password_confirmation" placeholder="ยืนยันรหัสผ่าน" required autocomplete="new-password" />
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <label for="terms">
                            <input type="checkbox" name="terms" id="terms" required />
                            I agree to the <a target="_blank" href="{{ route('terms.show') }}" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Terms of Service</a> and <a target="_blank" href="{{ route('policy.show') }}" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Privacy Policy</a>
                        </label>
                    </div>
                @endif
                    <button type="submit" class="ml-4" onclick="register()">
                    {{ __('สมัครสมาชิก') }}
                    </button>
                </div>

            </form>

        </body>
        </html>
        </div>
    </div>
</div>