@extends('users.layouts.master')

@section('content')
<!-- Content -->
<section class="py-4 " style="min-height: calc(100vh - 297px);">
    <div class="container">
        <div class="row">
            <!-- menu left -->
            <div class="col-3">
                <div class="bg-light pt-3 pb-2 rounded-2 mb-4">
                    <div>
                        <h6 class="fw-bold mx-3">Danh mục sản phẩm</h6>
                    </div>
                    <div class="">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="{{ route('view-cate.cate') }}" class="nav-link text-secondary">Tất cả sản phẩm</a>
                            </li>
                            @foreach ($categories as $category)
                                <li class="nav-item">
                                    <a href="{{ route('view-cate.cate', ['category' => $category->id]) }}" class="nav-link text-secondary">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="bg-light pt-3 pb-2 rounded-2 mb-4">
                    <div>
                        <h6 class="fw-bold mx-3">Chọn mức giá </h6>
                    </div>
                    <div class="mx-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="check1" name="option1"
                                value="something">
                            <label class="form-check-label" for="check1">Giá dưới 200.000đ</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="check2" name="option2"
                                value="something">
                            <label class="form-check-label" for="check2">200.000đ - 300.000đ</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="check2" name="option2"
                                value="something">
                            <label class="form-check-label" for="check2">300.000đ - 500.000đ</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="check4" name="option4"
                                value="something">
                            <label class="form-check-label" for="check4">Giá trên 500.000đ</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content right -->
            <div class="col-9">
                <!-- category top -->
                <div class="bg-light py-2 px-3 rounded-2 d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="fw-normal mt-2">
                            {{ $currentCategory ? $currentCategory->name : 'Tất cả sản phẩm' }}
                        </h4>
                    </div>

                    <div class="d-flex align-items-center justify-content-center">
                        <h6 class="fw-normal me-4 mt-2">Sắp xếp theo</h6>
                        <form class="d-flex align-items-center " action="">
                            <select class="form-select" id="sel" name="sellist">
                                <option>Mặc định</option>
                                <option>A → Z</option>
                                <option>Z → A</option>
                                <option>Giá tăng dần</option>
                                <option>Giá giảm dần</option>
                            </select>
                        </form>
                    </div>
                </div>
                <!-- list product -->
                <div class="row mb-4">
                    @foreach ($products as $product)
                        <div class="col-md-4 mt-3">
                            <div class="collection-img position-relative">
                                <a href="{{ route('view-detail.detail', $product) }}">
                                    <img style="max-height: 308px;" src="{{ Storage::url($product->image) }}"
                                        class="w-100 h-100 object-fit-cover ">
                                </a>
                            </div>
                            <div class="mt-3">
                                <div style="height: 47px;">
                                    <a href="{{ route('view-detail.detail', $product) }}" class="text-capitalize text-decoration-none text-product text-dark">{{ $product->name }}</a>
                                </div>
                                <div>
                                    <span class="fw-bold text-primary">{{ number_format($product->price_sale, 0, ',', '.') ?: number_format($product->price, 0, ',', '.') }}₫</span>
                                    <span
                                        class="mx-2 compare-price text-decoration-line-through text-secondary fw-light">{{ number_format($product->price_sale, 0, ',', '.') ? number_format($product->price, 0, ',', '.').'₫' : '' }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- end list product -->

                <!-- Pagination (if needed) -->
                <!-- <div class="d-flex justify-content-center ">
                    <ul class="pagination">
                        <li class="page-item m-1"><a class="page-link text-dark px-3" href="#">«</a></li>
                        <li class="page-item m-1"><a class="page-link text-dark px-3 active-pagination" href="#">1</a></li>
                        <li class="page-item m-1"><a class="page-link text-dark px-3" href="#">2</a></li>
                        <li class="page-item m-1"><a class="page-link text-dark px-3" href="#">3</a></li>
                        <li class="page-item m-1"><a class="page-link text-dark px-3" href="#">»</a></li>
                    </ul>
                </div> -->
            </div>
        </div>
    </div>
</section>
<!-- End content -->
@endsection
