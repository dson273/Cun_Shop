<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Trị</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/fontawesome.min.css"></script>
    <link rel="stylesheet" href="/css/main.css">

</head>

<body ng-app="myApp">
    <!-- Khu vực header -->
    <nav class="navbar navbar-expand-sm bg-light shadow">

        <div class="container-fluid">
            <!-- Links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="" href="#">
                        <img style="height: 50px;" src="/img/logo.png" alt="">
                    </a>
                </li>
            </ul>
            <!-- Links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Xin chào "admin"</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Đăng xuất</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Khu vực nội dung -->
    <div class="d-flex">
        <!-- Bên trái: menu -->
        <div class="bg-light" style="width: 300px; height: calc(100vh - 66px)">
            <ul class="nav flex-column mt-3">
                <li class="nav-item">
                  <a class="nav-link text-dark text-hover" href="#!list-product">Quản lý sản phẩm</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-dark text-hover" href="#!list-category">Quản lý danh mục</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-dark text-hover" href="#!list-oder">Quản lý đơn hàng</a>
                </li>
              </ul>
        </div>
        <!-- Bên phải: nội dung -->
        <div class="" style="width: calc(100% - 330px);">
            <div class="container mt-3 ms-3">
                <div>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>

</html>
