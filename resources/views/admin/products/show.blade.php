@extends('admin.layouts.master')

@section('title')
    Chi tiết sản phẩm
@endsection

@section('content')
    <div class="card shadow mb-4">
        <h1 class="h2 mt-3 text-center text-gray-800 fw-bold">Chi tiết sản phẩm</h1>
        <div class="card-body">
            <ul>
                <li>Tên: {{ $product->name }}</li>
                <li>Ảnh:
                    <div style="width: 100px; height:100px">
                        <img src="{{ Storage::url($product->image) }}" alt="" style="max-height:100%; max-width:100%">
                    </div>
                </li>
                <li>Giá: {{ $product->price }}</li>
                <li>Tên: {{ $product->price_sale }}</li>
                <li>Danh mục: {{ $product->category->name }}</li>
                <li>Mô tả: {{ $product->description }}</li>
                <li>Trạng thái:
                    <input type="checkbox" disabled class="form-input" @checked($product->is_active)>
                </li>
            </ul>
        </div>
    </div>
@endsection
