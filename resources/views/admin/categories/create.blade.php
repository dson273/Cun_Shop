@extends('admin.layouts.master')

@section('content')
<!-- Khu vực tiêu đề trang -->
<h3 class="text-center">THÊM DANH MỤC</h3>

<!-- Khu vực form nhập liệu -->
<form action="">
    <div class="mt-3">
        <lable class="form-label">ID:</lable>
        <input class="form-control" type="text" name="id" id="" placeholder="Nhập id danh mục ">
    </div>
    <div class="mt-3">
        <lable class="form-label">Tên danh mục:</lable>
        <input class="form-control" type="text" name="name" id="" placeholder="Nhập tên danh mục ">
    </div>
    <div class="mt-3">
        <lable class="form-label">Hình ảnh:</lable>
        <input class="form-control" type="text" name="cover" id=""  placeholder="Nhập ảnh danh mục ">
    </div>
    <div class="text-center mt-4">
        <a href="{{route('categories.index')}}" class="btn btn-secondary me-2">Quay lại</a>
        <button class="btn btn-success">Tạo mới</button>
    </div>

        {{-- <!-- Khu vực thông báo lỗi -->
        <div class="alert alert-danger mt-3">
            <strong>Form không hợp lệ</strong>
            <br>
            
          </div> --}}
</form>
@endsection
