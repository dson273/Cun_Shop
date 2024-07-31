@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h1 class="my-4">Danh sách Banners</h1>
        <a href="{{ route('admin.banners.create') }}" class="btn btn-primary mb-3">Thêm mới</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($banners as $banner)
                    <tr>
                        <td>{{ $banner->id }}</td>
                        <td>{{ $banner->title }}</td>
                        <td><img src="{{ Storage::url($banner->image) }}" alt="{{ $banner->title }}" width="100"></td>
                        <td>{{ $banner->description }}</td>
                        <td>
                            <a href="{{ route('admin.banners.edit', $banner) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.banners.destroy', $banner) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
