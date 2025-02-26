@extends('layouts.app')
@section('title')
    Danh sách đơn hàng
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div>
            <a href="{{ route('orders.create') }}" class="d-none d-sm-inline-block btn btn-danger shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tạo đơn hàng
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Người đặt</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Phương thức thanh toán</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Người đặt</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Phương thức thanh toán</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user->name ?? 'N/A' }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->address }}</td>
                                <td>{{ $order->payment_method }}</td>
                                <td>{{ number_format($order->total_amount, 0, ',', '.') }} VND</td>
                                <td>
                                    @if ($order->order_status === 'Đã gửi')
                                        <span class="badge bg-success">Đã gửi</span>
                                    @else
                                        <span class="badge bg-warning">Chưa gửi</span>
                                    @endif
                                </td>
                                <td>
                                    <!-- Nút Chi tiết -->
                                    <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#orderDetailModal"
                                        onclick="loadOrderDetails({{ $order->id }})">Chi tiết</button>

                           

                                    <!-- Nút Đã gửi -->
                                    @if ($order->order_status === 'Chưa gửi')
                                        <form action="{{ route('orders.markDelivered', $order->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success btn-sm">Đã gửi</button>
                                        </form>
                                    @endif

                                    <!-- Nút Xóa -->
                                    <form action="{{ route('ordersadmin.destroy', $order->id) }}" method="POST"
                                        onsubmit="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?')"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Chi tiết đơn hàng -->
    <div class="modal fade" id="orderDetailModal" tabindex="-1" aria-labelledby="orderDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderDetailModalLabel">Chi tiết đơn hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="orderDetailContent">
                    <p>Đang tải dữ liệu...</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal QR Code Thanh toán -->
    <div class="modal fade" id="qrCodeModal" tabindex="-1" aria-labelledby="qrCodeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="qrCodeModalLabel">QR Code Thanh toán</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <p>Quét mã QR bên dưới để thanh toán:</p>
                    <img id="qrCodeImage" src="" alt="QR Code" class="img-fluid" style="max-width: 300px;">
                    <p class="mt-2">Số tiền: <strong id="qrAmount"></strong> VND</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Script để xử lý -->
    <script>
        // Load chi tiết đơn hàng
        function loadOrderDetails(orderId) {
            fetch(`/orders/${orderId}/details`)
                .then(response => response.json())
                .then(data => {
                    let content = `<ul>`;
                    data.forEach(item => {
                        content += `<li>${item.food_name} - Số lượng: ${item.quantity} - Giá: ${item.price} VND</li>`;
                    });
                    content += `</ul>`;
                    document.getElementById('orderDetailContent').innerHTML = content;
                })
                .catch(error => {
                    document.getElementById('orderDetailContent').innerHTML = '<p>Không thể tải chi tiết đơn hàng.</p>';
                });
        }

        
    </script>
@endsection
