@extends('admin.layouts.master')

@section('content')
    <div class="card shadow mb-4">
        <h1 class="h2 mt-3 text-center text-gray-800 fw-bold">Sửa khuyến mãi</h1>
        <div class="card-body">

            <form action="{{ route('admin.promotions.update', $promotion->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Tiêu đề</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $promotion->title }}"
                        required>
                </div>

                <div class="form-group">
                    <label for="discount">Giảm giá (%)</label>
                    <input type="number" class="form-control" id="discount" name="discount" min="0" max="100"
                        value="{{ $promotion->discount }}" required>
                </div>

                <div class="form-group">
                    <label for="start_date">Ngày bắt đầu</label>
                    <input type="date" class="form-control" id="start_date" name="start_date"
                        value="{{ $promotion->start_date }}" required>
                </div>

                <div class="form-group">
                    <label for="end_date">Ngày kết thúc</label>
                    <input type="date" class="form-control" id="end_date" name="end_date"
                        value="{{ $promotion->end_date }}" required>
                </div>

                <div class="form-group">
                    <label for="products">Chọn sản phẩm</label>
                    <select class="form-control" id="products" name="products[]" multiple required>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}"
                                {{ $promotion->products->contains($product) ? 'selected' : '' }}>
                                {{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Cập nhật khuyến mãi</button>
            </form>
        </div>
    </div>
@endsection
