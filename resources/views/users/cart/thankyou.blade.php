@extends('users.layouts.master')

@section('content')
<section class="py-4" style="min-height: calc(100vh - 409px);">
    <div class="container text-center">
        <h2 class="fw-bold">Cảm ơn bạn đã đặt hàng!</h2>
        <p class="mt-3">Đơn hàng của bạn đã được ghi nhận và đang chờ xử lý. Chúng tôi sẽ liên hệ với bạn sớm.</p>
        <a href="{{ route('view.index') }}" class="btn btn-primary mt-4">Trở về trang chủ</a>
    </div>
</section>
@endsection
