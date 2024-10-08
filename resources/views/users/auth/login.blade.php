@extends('users.layouts.master')

@section('content')
    <!-- Content -->
    <section class="py-5 " style="min-height: calc(100vh - 297px);">
        <div class="d-flex justify-content-center ">
            <div style="width: 380px;" class="text-center shadow-sm bg-white pt-4 pb-4">
                <div class="">
                    <h3>ĐĂNG NHẬP</h3>
                    <span>Chưa có tài khoản, <a class="text-login" href="{{ route('register') }}">đăng ký tại đây</a>
                    </span>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <form class="w-75 " action="{{ route('login') }}" method="POST">
                        @csrf
                        <input class="form-control mt" type="email" name="email" placeholder="Email" required>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input class="form-control mt-3" type="password" name="password" placeholder="Mật khẩu" required>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- <input class="form-control mt-3 bg-dark text-white btn-hover" type="submit" value="ĐĂNG NHẬP"> --}}
                        <button class=" btn mt-3 bg-dark text-white btn-hover" type="submit">ĐĂNG NHẬP</button>
                        <div class="mt-3">
                            <a class="text-decoration-none text-dark" href="#">Quên mật khẩu</a>
                        </div>
                    </form>
                </div>


            </div>
        </div>

    </section>
    <!-- End content -->
@endsection
