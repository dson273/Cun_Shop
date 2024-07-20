@extends('admin.layouts.master')

@section('title')
    Cập nhật sản phẩm
@endsection

@section('content')
    <div class="card shadow mb-4">
        <h1 class="h2 mt-3 text-center text-gray-800 fw-bold">Cập nhật sản phẩm</h1>
        <div class="card-body">
            <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mt-3 mb-3">
                    <label for="" class="form-label">Tên</label>
                    <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                </div>
                <div class="mt-3 mb-3">
                    <label for="" class="form-label">Ảnh</label>
                    <input type="file" name="image" class="form-control">
                    @if (!empty($product->image))
                        <div class="mt-3" style="width: 100px; height:100px">
                            <img src="{{ Storage::url($product->image) }}" alt=""
                                style="max-height:100%; max-width:100%">
                        </div>
                    @endif
                </div>
                <div class="mt-3 mb-3">
                    <label for="" class="form-label">Giá</label>
                    <input type="number" name="price" class="form-control" value="{{ $product->price }}">
                </div>
                <div class="mt-3 mb-3">
                    <label for="" class="form-label">Giá Sale</label>
                    <input type="number" name="price_sale" class="form-control" value="{{ $product->price_sale }}">
                </div>
                <div class="mt-3 mb-3">
                    <label for="" class="form-label">Danh mục</label>
                    <select name="category_id" id="" class="form-control">
                        @foreach ($category as $id => $name)
                            <option @selected($id == $product->category_id) value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-3 mb-3">
                    <label for="" class="form-label">Mô tả</label>
                    <textarea name="description" id="" cols="40" rows="4" class="form-control"
                        value="{{ $product->description }}"></textarea>
                </div>
                <div class="mt-3 mb-3">
                    <label for="" class="form-label">Trạng thái</label>
                    <input type="checkbox" name="is_active" class="form-input" @checked($product->is_active)>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-success">Cập nhật</button>
                </div>

            </form>
        </div>
    </div>
@endsection
