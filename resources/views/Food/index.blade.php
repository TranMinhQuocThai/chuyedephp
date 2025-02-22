@extends('layouts.app')
@section('title')
    Danh sách món ăn
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div>
            <a href="{{ route('food.create') }}" class="d-none d-sm-inline-block btn btn-danger shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Thêm món ăn
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Mô tả</th>
                            <th>Giá</th>
                            <th>Hình ảnh</th>
                            <th>Danh mục</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Mô tả</th>
                            <th>Giá</th>
                            <th>Hình ảnh</th>
                            <th>Danh mục</th>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($foods as $food)
                            <tr>
                                <td>{{ $food->id }}</td>
                                <td>{{ $food->name }}</td>
                                <td>{{ $food->description }}</td>
                                <td>{{ $food->price }}</td>
                                <td>
                                    @if($food->image)
                                        <img src="{{ asset('storage/' . $food->image) }}" alt="{{ $food->name }}" width="100">
                                    @else
                                        Không có ảnh
                                    @endif
                                </td>
                                <td>{{ $food->categories }}</td>
                                <td>
                                    <a href="{{ route('food.edit', $food->id) }}" class="btn btn-sm btn-primary">Sửa</a>
                                    <form action="{{ route('food.destroy', $food->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?')">
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
