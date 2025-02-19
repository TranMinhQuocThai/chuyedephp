@extends('layouts.app')
@section('title')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Tạo Món Ăn</h1>
</div>
@endsection

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('food.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label class="form-label">Tên Món Ăn</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      
      <div class="mb-3">
        <label class="form-label">Mô Tả</label>
        <textarea class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description') }}</textarea>
        @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      
      <div class="mb-3">
        <label class="form-label">Giá</label>
        <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}">
        @error('price')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      
      <div class="mb-3">
        <label class="form-label">Hình Ảnh</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
        @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      
      <div class="mb-3">
        <label class="form-label">Danh Mục</label>
        <select class="form-control" name="categories">
          <option value="">-- Chọn danh mục --</option>
          <option value="Food">Food</option>
          <option value="Drink">Drink</option>
        </select>
      </div>
      
      <button type="submit" class="btn btn-danger">Thêm mới</button>
    </form>
  </div>
</div>
@endsection

@section('script')
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Thành công!',
        text: "{{ session('success') }}",
        confirmButtonText: 'OK'
    });
</script>
@endif

@if($errors->any())
<script>
    Swal.fire({
        icon: 'error',
        title: 'Lỗi!',
        html: `
            <ul style="text-align: left;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        `,
        confirmButtonText: 'OK'
    });
</script>
@endif
@endsection