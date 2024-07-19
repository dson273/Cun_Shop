@extends('users.layouts.master')

@section('content')
    <!-- Content -->
    <section class="py-4 " style="min-height: calc(100vh - 409px);">
        <div class="container">
            <h2 class="text-center fw-normal ">Giỏ hàng của bạn</h2>
            <div class="row mt-4">
                <div class="col-8">
                    <table class="table">
                        <thead>
                            <tr class="">
                                <th style="width: 52%;">Thông tin sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (session('cart'))
                                @foreach (session('cart') as $id => $details)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center ">
                                                <div>
                                                    <img style="max-width: 100px;max-height: 100px;"
                                                        src="{{ Storage::url($details['image']) }}" alt="">
                                                </div>
                                                <div class="ms-3">
                                                    <a href="product_details.html"
                                                        class="text-dark text-product text-decoration-none">{{ $details['name'] }}</a><br>
                                                    <!-- <span class="">Đen / S</span> -->
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mt-4">
                                                <h1 class="h6 mb-1 fw-bold text-primary fs-6">
                                                    {{ number_format($details['price_sale'], 0, ',', '.') }}</h1>
                                                <a href="{{ route('cart.remove', $id) }}"
                                                    class="text-decoration-none text-secondary fw-light btn btn-primary btn-sm">Xoá</a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mt-4">
                                                <form action="{{ route('cart.update', $id) }}" method="POST"
                                                    style="display: inline;">
                                                    @csrf
                                                    <div style="height: 30px;width: 90px;"
                                                        class="border rounded d-flex justify-content-around ">
                                                        <button type="submit" name="quantity"
                                                            value="{{ max($details['quantity'] - 1, 1) }}"
                                                            class="border-0 bg-white "><i
                                                                class="fa-solid fa-minus"></i></button>
                                                        <input type="text" value="{{ $details['quantity'] }}" readonly
                                                            class="border-0 bg-white text-center"
                                                            style="width: 30px; border-left: 1px solid rgb(213, 215, 217);border-right: 1px solid rgb(213, 215, 217);border-top: none;border-bottom: none;">
                                                        <button type="submit" name="quantity"
                                                            value="{{ $details['quantity'] + 1 }}"
                                                            class="border-0 bg-white"><i
                                                                class="fa-solid fa-plus fw-light "></i></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="fw-bold text-primary fs-6 mt-4">
                                                {{ number_format($details['price_sale'] * $details['quantity'], 0, ',', '.') }}₫
                                            </p>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="col-4">
                    <div class="border p-4">
                        <h4>Thông tin đơn hàng</h4>
                        <div style="border-top: 1px dashed rgb(198, 196, 196);border-bottom: 1px dashed rgb(198, 196, 196);"
                            class="d-flex justify-content-between mt-3 pt-3">
                            <p>Tổng tiền:</p>
                            <p class="fw-bold text-primary fs-6">
                                {{ number_format(array_sum(array_map(function ($item) {return $item['price_sale'] * $item['quantity'];}, session('cart', []))),0,',','.') }}
                            </p>
                        </div>
                        <div>
                            <a href="{{ route('checkout.show') }}">
                                <button style="border: 1px solid #e5345b;"
                                    class="w-100 mt-4 bg-primary text-white rounded-1 py-2 btn-hover">Thanh toán</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End content -->
@endsection
