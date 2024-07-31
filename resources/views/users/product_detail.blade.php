@extends('users.layouts.master')

@section('content')
    <!-- Content -->
    <section class="py-4" style="min-height: calc(100vh - 297px);">
        <div class="container">
            <div class="row mt-2">
                <div class="col-5" style="max-height:600px ;">
                    <img class="w-100 h-100 object-fit-cover" src="{{ Storage::url($product->image) }}" alt="">
                </div>
                <div class="col-7">
                    <h5 style="border-bottom: 1px dotted #b7b7b7;" class="fw-semibold pb-2">{{ $product->name }}</h5>
                    <p style="border-bottom: 1px dotted #b7b7b7;" class="pb-2 pt-1">Thương hiệu: <span
                            class="text-primary">Đang cập nhật</span>
                        <span class="px-3">|</span> Tình trạng: <span class="text-primary">Còn hàng</span>
                    </p>
                    <div class="d-flex align-items-center ">
                        <p class="fw-bold text-primary fs-5">
                            {{ number_format($product->price_sale, 0, ',', '.') ?: number_format($product->price, 0, ',', '.') }}₫
                        </p>
                        <p class="mx-3 compare-price text-decoration-line-through text-secondary ">
                            {{ number_format($product->price_sale, 0, ',', '.') ? number_format($product->price, 0, ',', '.') . '₫' : '' }}
                        </p>
                    </div>

                    <div style="border: 2px dashed #e5345b;" class="position-relative mt-2">
                        <h3 style="background: #fff;top:-10px; left: 14px;"
                            class="h6 position-absolute text-primary fw-semibold ">
                            <i class="fa-solid fa-gift me-1"></i>
                            Khuyến mại - ưu đãi
                        </h3>
                        <ul class="mt-4 mb-3 ms-3">
                            <li class="mb-2">Đồng giá Ship toàn quốc 25.000đ</li>
                            <li class="mb-2">Hỗ trợ 10.000 phí Ship cho đơn hàng từ 200.000đ</li>
                            <li class="mb-2">Miễn phí Ship cho đơn hàng từ 300.000đ</li>
                            <li>Đổi trả trong 30 ngày nếu sản phẩm lỗi bất kì</li>
                        </ul>
                    </div>

                    <div class="mt-3">
                        <div class="">Size:</div>
                        <div class="mt-2">
                            <button style="min-width: 40px; min-height: 40px;"
                                class="rounded-3 bg-primary text-white border-0 me-1">S</button>
                            <button style="border: 1px solid rgb(205, 205, 205);min-width: 40px; min-height: 40px;"
                                class="rounded-3 bg-white me-1">M</button>
                            <button style="border: 1px solid rgb(205, 205, 205);min-width: 40px; min-height: 40px;"
                                class="rounded-3 bg-white me-1">L</button>
                            <button style="border: 1px solid rgb(205, 205, 205);min-width: 40px; min-height: 40px;"
                                class="rounded-3 bg-white">XL</button>
                        </div>
                    </div>
                    <div class="">
                        <div style="border-top: 1px dotted #b7b7b7;" class="mt-4 mb-3">
                            <div class="mt-3">Số lượng:</div>
                            <div style="height: 50px;" class="mt-2 mb-2 border rounded w-25 d-flex justify-content-around ">
                                <!-- Nút để giảm số lượng sản phẩm -->
                                <button id="decrease" class="border-0 bg-white"><i class="fa-solid fa-minus"></i></button>
                                <!-- Hiển thị số lượng sản phẩm -->
                                <button id="quantity" class="border-0 bg-white">1</button>
                                <!-- Nút để tăng số lượng sản phẩm -->
                                <button id="increase" class="border-0 bg-white"><i class="fa-solid fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between ">
                            <a href="#">
                                <button style="height: 50px;min-width: 330px; border: 1px solid #e5345b;"
                                    class="rounded bg-white buy-now text-decoration-none text-primary">
                                    Mua ngay
                                </button>
                            </a>
                            <button id="add-to-cart" style="height: 50px;min-width: 400px;"
                                class="border-0 rounded bg-primary text-decoration-none text-white add-cart">
                                Thêm vào giỏ hàng
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End content -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            let quantity = 1;

            $('#decrease').click(function() {
                if (quantity > 1) {
                    quantity--;
                    $('#quantity').text(quantity);
                    $('#hidden-quantity').val(quantity);
                }
            });

            $('#increase').click(function() {
                quantity++;
                $('#quantity').text(quantity);
                $('#hidden-quantity').val(quantity);
            });

            $('#add-to-cart').click(function(e) {
                e.preventDefault();
                $.ajax({
                    url: '{{ route('cart.add', $product->id) }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        quantity: quantity
                    },
                    success: function(response) {
                        alert('Sản phẩm đã được thêm vào giỏ hàng');
                    },
                    error: function(xhr) {
                        alert('Có lỗi xảy ra, vui lòng thử lại!');
                    }
                });
            });
        });
    </script>
@endsection
