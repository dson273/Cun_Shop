@extends('admin.layouts.master')

@section('title')
    Tạo mới sản phẩm
@endsection

@section('content')
    <div class="card shadow mb-4">
        <h1 class="h2 mt-3 text-center text-gray-800 fw-bold">Tạo mới sản phẩm</h1>
        <div class="card-body">
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mt-3 mb-3">
                    <label for="" class="form-label">Tên</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="mt-3 mb-3">
                    <label for="" class="form-label">Ảnh</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="mt-3 mb-3">
                    <label for="" class="form-label">Giá</label>
                    <input type="number" name="price" class="form-control">
                </div>
                <div class="mt-3 mb-3">
                    <label for="" class="form-label">Giá Sale</label>
                    <input type="number" name="price_sale" class="form-control">
                </div>
                <div class="mt-3 mb-3">
                    <label for="" class="form-label">Danh mục</label>
                    <select name="category_id" id="" class="form-control">
                        @foreach ($category as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-3 mb-3">
                    <label for="" class="form-label">Mô tả</label>
                    <textarea name="description" id="" cols="40" rows="4" class="form-control"></textarea>
                </div>
                <div class="mt-3 mb-3">
                    <label for="" class="form-label">Trạng thái</label>
                    <input type="checkbox" name="is_active" class="form-input">
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-success">Tạo mới</button>
                </div>

            </form>
        </div>
    </div>
@endsection
