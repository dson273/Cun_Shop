<header class="shadow-sm ">
    <!-- navbar 1-->
    <nav style="height: 40px;" class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container">
            <ul class="navbar-nav">
                <li class="nav-item d-flex">
                    <span class="navbar-text">Hotline: </span>
                    <a class="nav-link fw-light" href="#">0123456789</a>
                </li>
                <li class="nav-item d-flex mx-2 ">
                    <span class="navbar-text">Email: </span>
                    <a class="nav-link fw-light" href="#">cunzstyle@gmail.com</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link me-3 fw-light" href="#">Đăng ký</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-light" href="#">Đăng nhập</a>
                </li>
            </ul>
            {{-- <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link  me-3 fw-light" href="#">Xin chào </a>
                </li>
                <li class="nav-item">
                    <button class="nav-link fw-light">Đăng xuất</button>
                </li>
            </ul> --}}
        </div>
    </nav>
    <!-- end navbar 1 -->
    <!-- navbar 2-->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand d-flex justify-content-between align-items-center order-lg-0" href="{{route('view.index')}}">
                <img class="img-fluid" src="{{asset('img/logo.png')}}" width="150" alt="">
            </a>

            <div class="order-lg-2 nav-btns">
                <a class="btn">
                    <i class="fa fa-search fa-xl"></i>
                </a>
                <a href="#" class="btn position-relative">
                    <i class="fa-regular fa-heart fa-xl"></i>
                    <span style="top:5px;right: -10px;"
                        class="position-absolute translate-middle badge bg-danger rounded-pill">0</span>
                </a>
                <a href="{{route('cart.view')}}" class="btn position-relative">
                    <i class="fa fa-shopping-cart fa-xl"></i>
                    <span style="top:5px;right: -10px;"
                        class="position-absolute translate-middle badge bg-danger rounded-pill"> {{ session('cart') ? count(session('cart', [])) : 0 }}</span>
                </a>
            </div>
            <div class="collapse navbar-collapse order-lg-1" id="navMenu">
                <ul class="navbar-nav mx-auto text-center">
                    <li class="nav-item px-2 py-2">
                        <a class="nav-link text-uppercase text-dark" href="{{route('view.index')}}">Trang Chủ </a>
                    </li>
                    <li class="nav-item px-2 py-2">
                        <a class="nav-link text-uppercase text-dark" href="#gioithieu">Giới thiệu</a>
                    </li>
                    <li class="nav-item px-2 py-2">
                        <a class="nav-link text-uppercase text-dark" href="{{route('view-cate.cate')}}">Sản phẩm</a>
                    </li>
                    <li class="nav-item px-2 py-2">
                        <a class="nav-link text-uppercase text-dark" href="#tintuc">Tin tức</a>
                    </li>
                    <li class="nav-item px-2 py-2">
                        <a class="nav-link text-uppercase text-dark" href="#lienhe">Liên hệ</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end navbar -->
</header>
