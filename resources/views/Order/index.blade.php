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
                                <td>{{number_format($order->total_amount, 3, ',', '.')}} VND</td>
                                <td>
                                    @if ($order->order_status === 'Đã giao')
                                        <span class="badge bg-success">Đã giao</span>
                                    @else
                                        <span class="badge bg-warning">Chưa giao</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-sm btn-primary">Sửa</a>

                                    @if ($order->order_status === 'Chưa giao')
                                        <form action="{{ route('orders.markDelivered', $order->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success btn-sm">Đã giao</button>
                                        </form>
                                    @endif

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
@endsection