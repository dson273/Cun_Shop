@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h1 class="my-4">Chỉnh sửa Banner</h1>

        <form action="{{ route('admin.banners.update', $banner) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Tiêu đề</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $banner->title }}" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Hình ảnh (bỏ qua nếu không thay đổi)</label>
                <input type="file" class="form-control" id="image" name="image">
                <img src="{{ Storage::url($banner->image) }}" alt="{{ $banner->title }}" width="100" class="mt-2">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Mô tả</label>
                <textarea class="form-control" id="description" name="description">{{ $banner->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
@endsection
