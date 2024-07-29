@extends('users.layouts.master')

@section('content')
    <!-- Content -->
    <section class="py-5 " style="min-height: calc(100vh - 297px);">
        <div class="d-flex justify-content-center ">
            <div style="width: 380px;" class="text-center shadow-sm bg-white pt-4 pb-5">
                <div class="">
                    <h3>ĐĂNG KÝ</h3>
                    <span>Đã có tài khoản, đăng nhập <a class="text-login" href="{{ route('login') }}">tại đây</a>
                    </span>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <form class="w-75 " action="{{ route('register') }}" method="POST">
                        @csrf
                        <input class="form-control" type="text" name="name" placeholder="Họ và tên" required>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- <input class="form-control mt-3" type="text" placeholder="Tài khoản" required> --}}
                        <input class="form-control mt-3" type="email" name="email" placeholder="Email" required>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- <input class="form-control mt-3" type="number" placeholder="Số điện thoại" required> --}}
                        <input class="form-control mt-3" type="password" name="password" placeholder="Mật khẩu" required>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input class="form-control mt-3" type="password" name="password_confirmation"
                            placeholder="Nhập lại mật khẩu" required>
                        <button class=" btn mt-3 bg-dark text-white btn-hover" type="submit">ĐĂNG KÝ</button>
                        {{-- <input class="form-control mt-3 bg-dark text-white btn-hover" type="submit" value="ĐĂNG KÝ"> --}}
                    </form>
                </div>


            </div>
        </div>
    </section>
    <!-- End content -->
@endsection
