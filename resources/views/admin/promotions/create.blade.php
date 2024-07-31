@extends('admin.layouts.master')

@section('content')
    <div class="card shadow mb-4">
        <h1 class="h2 mt-3 text-center text-gray-800 fw-bold">Thêm khuyến mãi mới</h1>
        <div class="card-body">

            <form action="{{ route('admin.promotions.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Tiêu đề</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <div class="form-group">
                    <label for="discount">Giảm giá (%)</label>
                    <input type="number" class="form-control" id="discount" name="discount" min="0" max="100"
                        required>
                </div>

                <div class="form-group">
                    <label for="start_date">Ngày bắt đầu</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" required>
                </div>

                <div class="form-group">
                    <label for="end_date">Ngày kết thúc</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" required>
                </div>

                <div class="form-group">
                    <label for="products">Chọn sản phẩm</label>
                    <select class="form-control" id="products" name="products[]" multiple required>
                        @foreach ($products as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Tạo khuyến mãi</button>
            </form>
        </div>
    </div>
@endsection
