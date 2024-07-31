@extends('users.layouts.master')

@section('content')
    <!-- Content -->
    <section class="py-4" style="min-height: calc(100vh - 409px);">
        <div class="container w-75">
            <div class="row">
                <div class="col-7">
                    <div class="w-75">
                        <h5 class="fw-semibold">Đơn hàng ({{ count(session('cart', [])) }} sản phẩm)</h5>
                        <!-- List product buy -->
                        @foreach (session('cart', []) as $id => $details)
                            <div class="d-flex flex-column mt-3 border-bottom pb-4">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div style="max-width: 100px; height: 100px;" class="border rounded-3 overflow-hidden">
                                        <img class="" style="width: 100%; max-height: 100px;" src="{{ Storage::url($details['image']) }}" alt="">
                                    </div>
                                    <div class="ms-3">
                                        <div>
                                            <h1 class="h6 text-dark text-decoration-none">{{ $details['name'] }}</h1>
                                        </div>
                                        <div class="d-flex justify-content-between" style="width:150px; float:right">
                                            <span class="text-secondary fw-light">SL: {{ $details['quantity'] }}</span>
                                            <span class="text-secondary">
                                                @if (isset($details['price_sale']) && $details['price_sale'] < $details['price'])
                                                    {{ number_format($details['price_sale'] * $details['quantity'], 0, ',', '.') }}₫
                                                @else
                                                    {{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}₫
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- End list product buy -->
                        <div class="mt-3 d-flex justify-content-between border-bottom pb-4">
                            <input style="width: 65%;" class="form-control py-3 ps-4" type="text" placeholder="Nhập mã giảm giá">
                            <input style="width: 30%;" class="form-control bg-primary text-white add-cart" type="submit" value="Áp dụng">
                        </div>
                        <div class="mt-3 border-bottom pb-4">
                            <div class="d-flex justify-content-between">
                                <span class="text-secondary">Tạm tính:</span>
                                <span class="text-secondary">
                                    {{ number_format(array_sum(array_map(function ($item) {
                                        return (isset($item['price_sale']) && $item['price_sale'] < $item['price'] ? $item['price_sale'] : $item['price']) * $item['quantity'];
                                    }, session('cart', []))), 0, ',', '.') }}₫
                                </span>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <span class="text-secondary">Phí vận chuyển:</span>
                                <span class="text-secondary">-</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-2 mt-3">
                            <span class="fs-5">Tổng cộng:</span>
                            <span class="text-primary fw-bold fs-5">
                                {{ number_format(array_sum(array_map(function ($item) {
                                    return (isset($item['price_sale']) && $item['price_sale'] < $item['price'] ? $item['price_sale'] : $item['price']) * $item['quantity'];
                                }, session('cart', []))), 0, ',', '.') }}₫
                            </span>
                        </div>
                        <div class="mt-3">
                            <a class="text-decoration-none" href="{{ route('cart.view') }}"><i class="fa-solid fa-chevron-left fa-sm"></i> Quay về giỏ hàng</a>
                        </div>
                    </div>
                </div>

                <div class="col-5">
                    <div class="">
                        <h5 class="text-center fw-semibold">Thông tin nhận hàng</h5>
                        <div class="d-flex justify-content-center">
                            <form class="mt-4" action="{{ route('checkout.placeOrder') }}" method="POST">
                                @csrf
                                <input class="form-control " type="text" name="name" placeholder="Họ tên" required>
                                <input class="form-control mt-3" type="number" name="phone" placeholder="Số điện thoại" required>
                                <input class="form-control mt-3" type="email" name="email" placeholder="Email" required>
                                <input class="form-control mt-3" type="text" name="address" placeholder="Địa chỉ nhận hàng" required>
                                <div>
                                    <textarea class="form-control mt-3" name="note" rows="3" placeholder="Ghi chú (tuỳ chọn)"></textarea>
                                </div>
                                <div class="mt-3">
                                    <label class="fw-bold" for="">Hình thức thanh toán</label>
                                    <div class="d-flex justify-content-between mt-2">
                                        <div style="padding: 7px 7px 7px 27px;" class="form-check border rounded-2 me-2">
                                            <input type="radio" class="form-check-input" id="radio1" name="payment_method" value="cash" checked>
                                            <label class="form-check-label" for="radio1">Thanh toán tiền mặt</label>
                                        </div>
                                        <div style="padding: 7px 7px 7px 27px;" class="form-check border rounded-2">
                                            <input type="radio" class="form-check-input" id="radio2" name="payment_method" value="online">
                                            <label class="form-check-label" for="radio2">Thanh toán online</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mt-5 mb-4">
                                    <button type="submit" class="btn btn-primary btn-buy-hover py-2 px-4">Xác nhận và đặt hàng</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End content -->
@endsection
