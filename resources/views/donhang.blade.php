@extends('layouts.app')

@section('title', 'Đơn hàng của tôi')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Đơn hàng của tôi</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($orders->count() > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Phương thức thanh toán</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->payment_method }}</td>
                        <td>{{ number_format($order->total_amount, 0, ',', '.') }} VND</td>
                        <td>
                            @if ($order->order_status === 'Chưa gửi')
                                <span class="badge bg-warning">Chưa gửi</span>
                            @else
                                <span class="badge bg-success">Đã gửi</span>
                            @endif
                        </td>
                        <td>
                            <!-- Nút Chi tiết đơn hàng -->
                            <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#orderDetailModal" onclick="loadOrderDetails({{ $order->id }})">Chi tiết</button>
                                     <!-- Nút Thanh toán (Chuyển khoản + Chưa gửi) -->
                                     @if ($order->payment_method === 'Chuyển khoản' && $order->order_status === 'Chưa gửi')
                                        <button class="btn btn-warning btn-sm" onclick="showQRCode({{ $order->id }}, {{ $order->total_amount }})">
                                            Thanh toán
                                        </button>
                                    @endif
                            <!-- Nút Xóa -->
                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?');" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <a href="/sanpham" class="btn btn-primary">Thêm đơn hàng</a>
        <p>Bạn chưa có đơn hàng nào.</p>
    @endif
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

<!-- Script để load dữ liệu -->
<script>
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

    // Hiển thị QR Code
    function showQRCode(orderId, amount) {
        // Thông tin tài khoản ngân hàng
        const bankInfo = {
            bankId: "970416",         // Mã ngân hàng ACB
            accountNo: "38752307",   // Số tài khoản của bạn
            accountName: "TRAN MINH QUOC THAI", // Tên tài khoản của bạn
            amount: amount,
            content: `Thanh toan don hang ${orderId}` // Nội dung chuyển khoản
        };

        // Tạo chuỗi dữ liệu theo định dạng QR Pay VietQR
        const qrData = `https://api.vietqr.io/image/${bankInfo.bankId}-${bankInfo.accountNo}-compact.jpg?amount=${bankInfo.amount}&addInfo=${bankInfo.content}&accountName=${bankInfo.accountName}`;
        
        document.getElementById('qrCodeImage').src = qrData;
        document.getElementById('qrAmount').innerText = amount.toLocaleString();
        new bootstrap.Modal(document.getElementById('qrCodeModal')).show();
    }
</script>
@endsection
