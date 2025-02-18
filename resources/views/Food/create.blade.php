@extends('layout.app')
@section('title')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Sửa Món ăn</h1>
</div>
@endsection

@section('content')
<div class="card">
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('food.update', $food->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label class="form-label">Tên Món ăn</label>
        <input
          type="text"
          class="form-control @error('name') is-invalid @enderror"
          name="name"
          value="{{ $food->name }}"
        >

        @error('name')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Mô tả</label>
        <textarea class="form-control @error('description') is-invalid @enderror" name="description">{{ $food->description }}</textarea>

        @error('description')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Giá</label>
        <input
          type="number"
          step="0.01"
          class="form-control @error('price') is-invalid @enderror"
          name="price"
          value="{{ $food->price }}"
        >

        @error('price')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Hình ảnh</label>
        <input
          type="file"
          class="form-control @error('image') is-invalid @enderror"
          name="image"
        >

        @error('image')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Danh mục</label>
        <select class="form-control @error('categories') is-invalid @enderror" name="categories">
          <option value="food" {{ $food->categories == 'food' ? 'selected' : '' }}>Food</option>
          <option value="drink" {{ $food->categories == 'drink' ? 'selected' : '' }}>Drink</option>
        </select>

        @error('categories')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Cập nhật</button>
      <a href="{{ route('food.index') }}" class="btn btn-secondary">Quay lại</a>
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