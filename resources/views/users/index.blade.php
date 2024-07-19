@extends('users.layouts.master')

@section('content')
    <!-- content -->
    <!-- slider -->
    <div class="slide">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/slider_1.webp') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/slider_2.webp') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/slider_3.webp') }}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- end slider -->

    <!-- box-product -->
    <section id="collection" class="py-5">
        <div class="container">
            <div class="title text-center">
                <h2 class="position-relative d-inline-block">SẢN PHẨM KHUYẾN MÃI</h2>
            </div>
            <div class="mt-4 mb-5 row gx-0 gy-3">
                @foreach ($data as $item)
                    <!-- product new-->
                    <div class="col-md-6 col-lg-4 col-xl-3 p-2">
                        <div class="collection-img position-relative ">
                            <a href="{{ route('view-detail.detail', $item) }}">
                                <img style="max-height: 308px;" src="{{Storage::url($item->image)}}"
                                    class="w-100 h-100 object-fit-cover ">
                            </a>
                            <span
                                class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">sale</span>
                        </div>
                        <div class="mt-3">
                            <div style="height: 47px;">
                                <a href="{{ route('view-detail.detail', $item) }}"
                                    class="text-capitalize text-decoration-none text-product text-dark ">{{$item->name}}</a>
                            </div>
                            <div>
                                <span class="fw-bold">{{number_format($item->price_sale, 0, ',', '.')}}₫</span>
                                <span
                                    class="mx-2 compare-price text-decoration-line-through text-secondary fw-light">{{number_format($item->price, 0, ',', '.')}}₫</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="title text-center">
                <h2 class="position-relative d-inline-block">SẢN PHẨM YÊU THÍCH</h2>
            </div>
            <div class="mt-4 mb-5 row gx-0 gy-3">
                @foreach ($data as $item)

                <!-- product favourite-->
                <div class="col-md-6 col-lg-4 col-xl-3 p-2">
                    <div class="collection-img position-relative">
                        <a href="{{ route('view-detail.detail', $item) }}">
                            <img style="max-height: 308px;" src="{{Storage::url($item->image)}}"
                                class="w-100 h-100 object-fit-cover ">
                        </a>
                        <span class="position-absolute d-flex align-items-center justify-content-center text-primary fs-4">
                            <i class="fas fa-heart"></i>
                        </span>
                    </div>
                    <div class="mt-3">
                        <div style="height: 47px;">
                            <a href="{{ route('view-detail.detail', $item) }}" class="text-capitalize text-decoration-none text-product text-dark ">{{$item->name}}</a>
                        </div>
                        <div>
                            <span class="fw-bold">{{number_format($item->price_sale, 0, ',', '.')}}₫</span>
                            <span
                                class="mx-2 compare-price text-decoration-line-through text-secondary fw-light">{{number_format($item->price, 0, ',', '.')}}₫</span>
                        </div>

                    </div>
                </div>
                @endforeach
                <!-- End product favourite -->
            </div>
    </section>
    <!-- End box-product -->
    <!-- End content -->
@endsection
