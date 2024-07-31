<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cunz-Style</title>
    <link rel="shortcut icon" href="{{ asset('img/logow.png') }}" type="img/png">
    <link rel="stylesheet" href="{{ asset('lib/bootstrap.css') }}">
    <script src="{{ asset('lib/bootstrap.js') }}"></script>
    <script src="{{ asset('lib/font-fontawesome.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('lib/main.css') }}">


</head>

<body>
    <!-- Header -->
    @include('users.layouts.header')
    <!-- End header -->

    <!-- content -->
    <div style="min-height: calc(100vh - 409px);">
        @yield('content')
    </div>
    <!-- End content -->

    <!-- Footer -->
    @include('users.layouts.footer')
    <!-- End footer -->
</body>

</html>
