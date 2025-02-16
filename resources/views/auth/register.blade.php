@extends('layouts.app')

@section('content')
<style>
    /* ========== NAVBAR STYLES ========== */
    .navbar {
        width: 100%;
        background: white;
        padding: 15px 50px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1000;
    }

    .navbar .logo {
        font-size: 22px;
        font-weight: bold;
        color: black;
        text-decoration: none;
    }

    .navbar .nav-links {
        display: flex;
        gap: 20px;
    }

    .navbar .nav-links a {
        text-decoration: none;
        color: #444;
        font-size: 16px;
        font-weight: 500;
        transition: color 0.3s;
    }

    .navbar .nav-links a:hover {
        color: #FF5722;
    }

    /* ========== BODY BACKGROUND ========== */
    body {
        background: #f5f5f5;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding-top: 80px; /* Để tránh bị che bởi navbar */
    }

    /* ========== FORM CONTAINER ========== */
    .custom-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
        padding: 50px;
        max-width: 900px;
        width: 140%;
        text-align: center;
        transition: all 0.3s ease-in-out;
    }

    .custom-card:hover {
        box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.3);
    }

    /* ========== FORM STYLES ========== */
    .card-header {
        font-size: 26px;
        font-weight: bold;
        color: #FF5722;
        margin-bottom: 30px;
    }

    .custom-input {
        border-radius: 10px;
        border: 2px solid #ddd;
        padding: 14px;
        font-size: 16px;
        width: 100%;
        transition: all 0.3s ease-in-out;
        outline: none;
    }

    .custom-input:focus {
        border-color: #FF9800;
        box-shadow: 0px 0px 10px rgba(255, 152, 0, 0.6);
    }

    .is-invalid {
        border-color: red !important;
    }

    .form-label {
        text-align: left;
        font-weight: bold;
        display: block;
        margin-bottom: 8px;
        font-size: 17px;
        color: #444;
    }

    /* ========== BUTTON STYLES ========== */
    .custom-btn {
        background: linear-gradient(135deg, #FF5722, #FF9800);
        color: white;
        padding: 16px;
        font-size: 18px;
        border: none;
        border-radius: 10px;
        width: 100%;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
        font-weight: bold;
    }

    .custom-btn:hover {
        background: linear-gradient(135deg, #FF9800, #FF5722);
        transform: scale(1.06);
    }

    .custom-link {
        color: #FF5722;
        text-decoration: none;
        font-size: 15px;
    }

    .custom-link:hover {
        text-decoration: underline;
    }

    .custom-checkbox {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 12px;
    }

    @media (max-width: 768px) {
        .custom-card {
            max-width: 90%;
            padding: 30px;
        }
    }
</style>

<!-- Navbar -->


<!-- Form đăng ký -->
<div class="container">
    <div class="custom-card">
        <div class="card-header">Đăng ký tài khoản</div>

        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-4">
                    <label for="name" class="form-label">Họ và Tên</label>
                    <input id="name" type="text" class="form-control custom-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" type="email" class="form-control custom-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input id="password" type="password" class="form-control custom-input @error('password') is-invalid @enderror" name="password" required>
                    @error('password')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password-confirm" class="form-label">Xác nhận mật khẩu</label>
                    <input id="password-confirm" type="password" class="form-control custom-input" name="password_confirmation" required>
                </div>

                <div class="custom-checkbox">
                    <div>
                        <input type="checkbox" id="remember">
                        <label for="remember">Nhớ mật khẩu</label>
                    </div>
                    <a href="#" class="custom-link">Quên mật khẩu?</a>
                </div>

                <div class="mt-4">
                    <button type="submit" class="custom-btn">Đăng ký</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
