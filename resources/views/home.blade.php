@extends('layouts.app')

@section('content')
<div class="container-fluid px-0">  <!-- Full màn hình -->
    <div class="row justify-content-center">
        <div class="col-12">
            
            <!-- Carousel Fullscreen -->
            <div id="foodCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($carouselImages as $index => $image)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <img src="{{ asset('build/assets/' . $image) }}" class="d-block w-100 vh-100" style="object-fit: cover;" alt="Slide {{ $index + 1 }}">
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#foodCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#foodCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>

            <!-- Tiêu đề -->
            <h2 class="text-center mt-5 mb-4 fw-bold text-danger">Đề xuất hôm nay</h2>

            <!-- Danh sách sản phẩm -->
            <div class="row mx-5">
                @foreach($foods as $food)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card shadow-sm border-0 rounded">
                            <img src="{{ asset('storage/' . $food->image) }}" class="card-img-top" style="height: 220px; object-fit: cover;" alt="{{ $food->name }}">
                            <div class="card-body text-center">
                                <h5 class="card-title text-primary">{{ $food->name }}</h5>
                                <p class="card-text text-muted">{{ $food->description }}</p>
                                <p class="text-danger fw-bold">{{ number_format($food->price, 0, ',', '.') }} VND</p>
                                <form action="{{ route('cart.add') }}" method="POST">
                                    @csrf
                                    <div class="d-flex justify-content-center">
                                        <input type="hidden" name="food_id" value="{{ $food->id }}">
                                        <input type="number" name="quantity" value="1" min="1" class="form-control text-center me-2" style="width: 60px;">
                                        <button type="submit" class="btn btn-danger">Thêm vào giỏ hàng</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
<!-- Footer -->
@include('layouts.footer')

<!-- FontAwesome -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection
