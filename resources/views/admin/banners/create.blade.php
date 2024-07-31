@extends('admin.layouts.master')

@section('content')
    <div class="card shadow mb-4">
        <h1 class="h2 mt-3 text-center text-gray-800 fw-bold">Tạo mới banner</h1>
        <div class="card-body">
            <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Tiêu đề</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Hình ảnh</label>
                    <input type="file" class="form-control" id="image" name="image" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Mô tả</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>

                <button type="submit" class="btn btn-success">Tạo mới</button>
            </form>
        </div>
    </div>
@endsection
