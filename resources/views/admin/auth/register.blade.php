@extends('admin.auth.main')
@section('title', 'Đăng ky')
@section('content')
    <div class="register-box">
        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Đăng ký thành viên mới</p>

                <form action="{{ route('auth.postRegister') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                @if ($errors->has('name'))
                                    <span class="fas fa-user">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                @if ($errors->has('email'))
                                    <span>{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                @if ($errors->has('password'))
                                    <span>{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                    Tôi đồng ý với các
                                    <a href="#"> điều khoản</a>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i>
                        Sign up using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i>
                        Sign up using Google+
                    </a>
                </div>

                <a href="{{ route('auth.getLogin') }}" class="text-center">Tôi đã có tư cách thành viên</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
@endsection
