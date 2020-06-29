<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Đăng nhập | NguyenThucOfficial</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="colorlib-regform-7/fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="colorlib-regform-7/css/style.css">
    <!-- Boostrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="main signup-login">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="colorlib-regform-7/images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="{{ route('register') }}" class="signup-image-link">Tạo tài khoản mới</a>
                    </div>
                    <div class="signin-form">
                        <h2 class="form-title">Đăng nhập</h2>
                        @if (Session::has('login-false'))
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Lỗi!</strong> {{ Session::get('login-false') }}
                            </div>
                        @endif

                        <form action="{{ route('login') }}" method="POST" class="register-form" id="login-form">
                            @csrf
                            <div class="form-group">
                                <label for="user_user_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="user_user_name" id="user_user_name" placeholder="Tài khoản" />
                            </div>
                            @error('user_user_name')
                                <p class="text-danger">{{ $errors->first('user_user_name') }}</p>
                            @enderror

                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Mật khẩu" />
                            </div>
                            @error('password')
                                <p class="text-danger">{{ $errors->first('password') }}</p>
                            @enderror
                            <div class="form-group">
                                <input type="checkbox" name="remember" id="remember" class="agree-term" />
                                <label for="remember" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" id="signin" class="form-submit" value="Log in" />
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Hoặc đăng nhập với</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="colorlib-regform-7/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>