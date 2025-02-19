@extends('layouts.app')

@section('content')
    <h1>Giỏ hàng của bạn</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($cartItems->isNotEmpty())
        <table class="table">
            <thead>
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên món ăn</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                    <tr>
                        <td><img src="{{ asset('storage/' . $item->food->image) }}" alt="{{ $item->food->name }}" width="50"></td>
                        <td>{{ $item->food->name }}</td>
                        <td>{{ number_format($item->food->price, 0, ',', '.') }} VND</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->food->price * $item->quantity, 0, ',', '.') }} VND</td>
                        <td>
                            <form action="{{ route('cart.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" name="food_id" value="{{ $item->food_id }}">
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Hiển thị tổng tiền -->
        <div class="text-right">
            <h4>Tổng tiền: <strong>{{ number_format($total, 0, ',', '.') }} VND</strong></h4>
        </div>

        <!-- Nút Thanh toán -->
        <div class="text-right mt-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#paymentModal">
                Thanh toán
            </button>
        </div>

        <!-- Modal chứa mã QR -->
        <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="paymentModalLabel">Quét mã QR để thanh toán</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <!-- Giả sử bạn đã tạo sẵn hình ảnh mã QR và lưu trong thư mục public/images -->
                        <img src="{{ asset('images/qr_code.png') }}" alt="QR Code" class="img-fluid">
                        <p class="mt-3">Vui lòng quét mã QR bằng ứng dụng ngân hàng để thanh toán.</p>
                    </div>
                </div>
            </div>
        </div>
    @else
        <p>Giỏ hàng của bạn đang trống.</p>
    @endif
@endsection
