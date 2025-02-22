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
                Đặt món
            </button>
        </div>


        <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel">Thông tin thanh toán</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @php
                    $orderCode = 'HD' . strtoupper(Str::random(8));
                @endphp

                <form action={{ route('orders.store') }} method="POST">
                    @csrf

                    <!-- Mã hóa đơn -->
                    <div class="mb-3">
                        <label for="order_code" class="form-label">Mã hóa đơn</label>
                        <input type="text" class="form-control" name="order_code" value="{{ $orderCode }}" readonly>
                    </div>

                    <!-- Tên người dùng -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên</label>
                        <input type="text" class="form-control" name="name" value="{{ Auth::user()->name ?? '' }}" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ Auth::user()->email ?? '' }}" required>
                    </div>

                    <!-- Số điện thoại -->
                    <div class="mb-3">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" name="phone" required>
                    </div>

                    <!-- Địa chỉ -->
                    <div class="mb-3">
                        <label for="address" class="form-label">Địa chỉ giao hàng</label>
                        <input type="text" class="form-control" name="address" required>
                    </div>

                    <!-- Tổng tiền -->
                    <div class="mb-3">
                        <label for="total_amount" class="form-label">Tổng tiền</label>
                        <input type="text" class="form-control" name="total_amount" value="{{ number_format($total, 0, ',', '.') }}" readonly>
                    </div>

                    <!-- Phương thức thanh toán -->
                    <div class="mb-3">
                        <label for="payment_method" class="form-label">Phương thức thanh toán</label>
                        <select class="form-control" name="payment_method" required>
                            <option value="Chuyển khoản">Chuyển khoản</option>
                            <option value="Tiền mặt">Tiền mặt</option>
                        </select>
                    </div>

                    <!-- Trạng thái đơn hàng -->
                    <input type="hidden" name="order_status" value="Chưa giao">

                    <!-- Nút Xác nhận -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Xác nhận đặt món</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



    @else
        <p>Giỏ hàng của bạn đang trống.</p>
    @endif
@endsection
