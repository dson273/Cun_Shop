@extends('admin.layouts.master')

@section('title')
    Chi tiết danh mục
@endsection

@section('content')
<div class="card shadow mb-4">
    <h1 class="h2 mt-3 text-center text-gray-800 fw-bold">Chi tiết sản phẩm</h1>
    <div class="card-body">
    <ul>
        <li>ID: {{$category->id}}</li>
        <li>Tên: {{$category->name}}</li>
        <li>Ảnh:
            <div style="width: 100px; height: 100px;">
                <img src="{{Storage::url($category->cover)}}" style="max-width: 100%; max-height: 100%;" alt="">
            </div>
        </li>
        <li>Trạng thái:
            <input type="checkbox" disabled class="form-input" @checked($category->is_active)>
        </li>
    </ul>
    </div>
</div>
@endsection
