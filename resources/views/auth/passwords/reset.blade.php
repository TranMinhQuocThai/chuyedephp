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

    /* Khung đặt lại mật khẩu */
    .reset-password-container {
        max-width: 450px;
        background: rgba(255, 255, 255, 0.95);
        border-radius: 15px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15);
        padding: 30px;
        animation: fadeIn 0.8s ease-in-out;
        margin: auto; /* Căn giữa khung */
    }

    /* Header */
    .reset-password-header {
        font-size: 26px;
        font-weight: bold;
        text-align: center;
        color: #FF6F61;
    }

    /* Nút màu cam */
    .btn-orange {
        background-color: #FF6F00 !important; /* Màu cam */
        border-color: #FF6F00 !important; /* Màu cam */
        color: white !important; /* Màu chữ trắng */
    }

    .btn-orange:hover {
        background-color: #FF8F00 !important; /* Màu cam nhạt hơn khi hover */
        border-color: #FF8F00 !important; /* Màu cam nhạt hơn khi hover */
    }

    /* Hiệu ứng xuất hiện */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="reset-password-container">
        <div class="reset-password-header">{{ __('Đặt lại mật khẩu') }}</div>
        <hr>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Địa chỉ Email') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-custom">
                            {{ __('Gửi liên kết đặt lại mật khẩu') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
