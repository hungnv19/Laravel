@extends('admin.auth.main')
@section('title', 'Đăng nhập')
@section('content')
    <div class="login-box">
        <!-- /.login-logo -->
      
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Đăng nhập để bắt đầu phiên của bạn</p>

                <form action="{{ route('auth.postLogin') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email">

                        <div class="input-group-append">
                            @if ($errors->has('email'))
                                <span class="fas fa-envelope">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                @if ($errors->has('password'))
                                    <span class="fas fa-lock">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>

                    </div>
                    {{-- @if ($errors->has('password'))
                        <span>{{ $errors->first('password') }}</span>
                    @endif --}}
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Nhớ tôi
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button class="btn btn-primary btn-block">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i>Đăng nhập bằng tài khoản Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i>Đăng nhập bằng tài khoản Google+
                    </a>
                </div>
                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="{{ asset('/') }}">Home</a>
                </p>
                <p class="mb-0">
                    <a href="{{ route('auth.getRegister') }}" class="text-center">Đăng ký thành viên mới</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
@endsection
