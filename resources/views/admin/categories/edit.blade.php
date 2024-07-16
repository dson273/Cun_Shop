@extends('admin.layouts.master')

@section('content')
<!-- Khu vực tiêu đề trang -->
<h3 class="text-center">CẬP NHẬT DANH MỤC</h3>

<!-- Khu vực form nhập liệu -->
<form action="">
    <div class="mt-3">
        <label class="form-label">ID:</label>
        <input class="form-control" type="text" name="" id="" ng-model="category.id">
    </div>
    <div class="mt-3">
        <label class="form-label">Tên danh mục:</label>
        <input class="form-control" type="text" name="" id="" ng-model="category.name">
    </div>
    <div class="mt-3">
        <label class="form-label">Hình ảnh:</label>
        <input class="form-control" type="text" name="" id="" ng-model="category.img">
    </div>
    <div class="text-center mt-3">
        <a href="#!list-category" class="btn btn-secondary me-2">Quay lại</a>
        <button class="btn btn-success" ng-click="onClickSubmit()">Cập nhật</button>
    </div>
</form>
@endsection
