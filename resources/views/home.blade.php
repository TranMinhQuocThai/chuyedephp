@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
             
            </div>
            <div style="font-size: 50px;" >Đề xuất</div>
            <div class="row">
            @foreach($foods as $food)
    <div class="col-md-4 mb-4">
        <div class="card">
            <img src="{{ asset('storage/' . $food->image) }}" class="card-img-top" alt="{{ $food->name }}">
            <div class="card-body">
                <h5 class="card-title">{{ $food->name }}</h5>
                <p class="card-text">{{ $food->description }}</p>
                <p class="text-danger"><strong>{{ number_format($food->price, 0, ',', '.') }} VND</strong></p>
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="food_id" value="{{ $food->id }}">
                    <input type="number" name="quantity" value="1" min="1" class="form-control mb-2" style="width: 70px;">
                    <button type="submit" class="btn btn-danger">Thêm vào giỏ hàng</button>
                </form>
            </div>
        </div>
    </div>
@endforeach
             </div>
        </div>
    </div>
</div>
@endsection
