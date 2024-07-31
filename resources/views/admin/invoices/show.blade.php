@extends('admin.layouts.master')

@section('content')
    <div class="card shadow mb-4">
        <h1 class="h2 mt-3 text-center text-gray-800 fw-bold">Chi tiết đơn hàng</h1>
        <div class="card-body">
            <p><strong>ID Đơn Hàng:</strong> {{ $order->id }}</p>
            <p><strong>Tên Khách Hàng:</strong> {{ $order->name }}</p>
            <p><strong>Tổng Cộng:</strong> {{ number_format($order->total, 0, ',', '.') }}₫</p>
            <p><strong>Trạng Thái:</strong> {{ $order->status }}</p>
            <h3>Các Sản Phẩm:</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tên Sản Phẩm</th>
                        <th>Giá</th>
                        <th>Số Lượng</th>
                        <th>Tổng Cộng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->Order_items as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ number_format($item->price, 0, ',', '.') }}₫</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format($item->total, 0, ',', '.') }}₫</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('admin.invoices.index') }}" class="btn btn-secondary">Quay lại danh sách đơn hàng</a>
        </div>
    </div>
@endsection
