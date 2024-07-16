@extends('admin.layouts.master')
@section('content')
    <!-- Khu vực tiêu đề trang -->
    <h3 class="text-center">DANH MỤC SẢN PHẨM</h3>
    <!-- Khu vực button điều hướng -->
    <div>
        <a href="{{route('categories.create')}}" class="btn btn-success ">Thêm danh mục</a>
    </div>

    <!-- Khu vực bảng dữ liệu -->
    <table class="table table-bordered mt-3 text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th style="width: 400px;">Tên danh mục</th>
                <th>Hình ảnh</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)


            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td class="d-flex justify-content-center ">
                    <div style="width: 60px; height: 60px;"
                        class="border rounded bg-light overflow-hidden d-flex justify-content-center align-items-center">
                        <img class="mh-100 mw-100" src="{{$item->cover}}" alt="">
                    </div>
                </td>
                <td style="width: 300px;" class="text-nowrap">
                    <a href="{{route('categories.create', $item->id)}}" class="btn btn-info btn-sm">Xem</a>
                    <a href="{{route('categories.create', $item->id)}}" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="{{route('categories.destroy', $item->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Xoá</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
