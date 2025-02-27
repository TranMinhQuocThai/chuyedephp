@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center my-4">Danh Sách Sản Phẩm</h2>

    <!-- Form tìm kiếm -->
    <form action="{{ route('sanpham') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Tìm kiếm sản phẩm..." value="{{ $search ?? '' }}">
            <button class="btn btn-danger" type="submit">Tìm kiếm</button>
        </div>
    </form>

    <!-- Tabs -->
    <ul class="nav nav-tabs" id="productTabs">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#foods">Đồ Ăn</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#drinks">Đồ Uống</a>
        </li>
    </ul>

    <div class="tab-content mt-3">
        <!-- Tab Đồ Ăn -->
        <div id="foods" class="tab-pane fade show active">
            <div class="row">
                @if($foods->isEmpty())
                    <p class="text-center">Không tìm thấy đồ ăn nào phù hợp.</p>
                @else
                    @foreach($foods as $food)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ asset('storage/' . $food->image) }}" style="width: 413px; height: 230px;" class="card-img-top" alt="{{ $food->name }}">
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
                @endif
            </div>
        </div>

        <!-- Tab Đồ Uống -->
        <div id="drinks" class="tab-pane fade">
            <div class="row">
                @if($drinks->isEmpty())
                    <p class="text-center">Không tìm thấy đồ uống nào phù hợp.</p>
                @else
                    @foreach($drinks as $drink)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ asset('storage/' . $drink->image) }}" style="width: 413px; height: 230px;" class="card-img-top" alt="{{ $drink->name }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $drink->name }}</h5>
                                    <p class="card-text">{{ $drink->description }}</p>
                                    <p class="text-danger"><strong>{{ number_format($drink->price, 0, ',', '.') }} VND</strong></p>
                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="food_id" value="{{ $drink->id }}">
                                        <input type="number" name="quantity" value="1" min="1" class="form-control mb-2" style="width: 70px;">
                                        <button type="submit" class="btn btn-danger">Thêm vào giỏ hàng</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@include('layouts.footer');
@endsection
