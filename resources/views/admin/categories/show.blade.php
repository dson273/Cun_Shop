@extends('admin.layouts.master')

@section('content')
<!-- Khu vực tiêu đề trang -->
<h3 class="text-center">CHI TIẾT DANH MỤC</h3>

<!-- Khu vực form nhập liệu -->
<form action="">
    <div class="mt-3">
        <lable class="form-label">ID:</lable>
        <input class="form-control" type="text" name="" id="" ng-model="category.id" disabled>
    </div>
    <div class="mt-3">
        <lable class="form-label">Tên danh mục:</lable>
        <input class="form-control" type="text" name="" id="" ng-model="category.name" disabled>
    </div>
    <div class="mt-3">
        <lable class="form-label">Hình ảnh:</lable>
        <input class="form-control" type="text" name="" id="" ng-model="category.img" disabled>
    </div>
    <div class="text-center mt-4">
        <a href="#!list-category" class="btn btn-secondary me-2">Quay lại</a>
        <a href="#!edit-category" class="btn btn-warning me-2">Chỉnh Sửa</a>
    </div>
</form>
@endsection
