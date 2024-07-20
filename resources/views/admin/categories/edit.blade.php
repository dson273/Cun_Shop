@extends('admin.layouts.master')

@section('title')
    Sửa danh mục sản phẩm
@endsection

@section('content')
    <div class="card shadow mb-4">
        <h1 class="h2 mt-3 text-center text-gray-800 fw-bold">Cập nhật danh mục</h1>
        <div class="card-body">
            <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Tên:</label>
                    <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                </div>
                <div class="mt-3 mb-3">
                    <label class="form-label">Ảnh:</label>
                    <input type="file" class="form-control" name="cover">
                    <div class="mt-3" style="width: 100px; height: 100px;">
                        <img src="{{ Storage::url($category->cover) }}" style="max-width: 100%; max-height: 100%;"
                            alt="">
                    </div>
                </div>
                <div class="mt-3 mb-3">
                    <label class="form-label">Trạng thái:</label>
                    <input class="form-input" type="checkbox" name="is_active" @checked($category->is_active)>
                </div>
                <button type="submit" class="btn btn-success">Cập nhật</button>
            </form>
        </div>
    </div>
@endsection
