@extends('layouts.app')

@section('content')
<style>
    /* Hình nền với overlay mờ */
    body {
        background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), 
                    url('https://source.unsplash.com/1600x900/?food,restaurant') no-repeat center center;
        background-size: cover;
        backdrop-filter: blur(4px);
    }

    /* Khung đăng nhập */
    .login-container {
        max-width: 450px;
        background: rgba(255, 255, 255, 0.95);
        border-radius: 15px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15);
        padding: 30px;
        animation: fadeIn 0.8s ease-in-out;
    }

    /* Header */
    .login-header {
        font-size: 26px;
        font-weight: bold;
        text-align: center;
        color: #FF6F61;
    }

    /* Input group */
    .input-group-text {
        background: #FFA726;
        border: none;
        color: white;
    }

    .form-control:focus {
        border-color: #FF6F61;
        box-shadow: 0 0 5px rgba(255, 111, 97, 0.5);
    }

    /* Button Login */
    .btn-custom {
        background: linear-gradient(135deg, #FF6F61, #FFA726);
        border: none;
        font-weight: bold;
        color: white;
        transition: all 0.3s;
    }

    .btn-custom:hover {
        background: linear-gradient(135deg, #FFA726, #FF6F61);
        transform: scale(1.05);
    }

    /* Hiệu ứng xuất hiện */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="login-container">
        <div class="login-header">{{ __('Đăng nhập vào FoodStore') }}</div>
        <hr>

        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Input -->
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">{{ __('Email Address') }}</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus 
                            placeholder="Nhập email của bạn">
                    </div>
                    @error('email')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password Input -->
                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">{{ __('Mật khẩu') }}</label>
                    <div class="input-group">
<span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                            name="password" required autocomplete="current-password" placeholder="Nhập mật khẩu">
                    </div>
                    @error('password')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" 
                            {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Nhớ mật khẩu') }}
                        </label>
                    </div>
                    @if (Route::has('password.request'))
                        <a class="text-decoration-none small text-danger" href="{{ route('password.request') }}">
                            {{ __('Quên mật khẩu?') }}
                        </a>
                    @endif
                </div>

                <!-- Submit Button -->
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-custom">
                        <i class="bi bi-box-arrow-in-right"></i> {{ __('Đăng nhập') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection