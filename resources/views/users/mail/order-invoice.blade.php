<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hóa Đơn Đặt Hàng</title>
</head>

<body>
    <h1>Hóa Đơn Đặt Hàng</h1>
    <p><strong>ID Đơn Hàng:</strong> {{ $order->id }}</p>
    <p><strong>Tên Khách Hàng:</strong> {{ $order->name }}</p>
    <p><strong>Tổng Cộng:</strong> {{ number_format($order->total, 0, ',', '.') }}₫</p>
    <p><strong>Trạng Thái:</strong> {{ $order->status }}</p>
    <h3>Các Sản Phẩm:</h3>
    <table>
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
</body>

</html>
