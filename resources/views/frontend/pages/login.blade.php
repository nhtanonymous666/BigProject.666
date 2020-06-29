<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="colorlib-regform-7/fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="colorlib-regform-7/css/style.css">
    <!-- Boostrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
    <div class="main signup-login">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="colorlib-regform-7/images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="{{ route('signup') }}" class="signup-image-link">Create an account</a>
                    </div>
                    <div class="signin-form">
                        <h2 class="form-title">Login</h2>
                        @if (Session::has('login-false'))
                            <div class="alert alert-danger">{{ Session::get('login-false') }}</div>
                        @endif
                        <form action="{{ route('postlogin') }}" method="POST" class="register-form" id="login-form">
                            @csrf
                            <div class="form-group">
                                <label for="user_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="User_UserName" id="User_UserName" placeholder="Tài khoản" />
                            </div>
                            @if ($errors->has('User_UserName'))
                                <div class="alert alert-danger">{{ $errors->first('User_UserName') }}</div>
                            @endif
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="User_Password" id="User_Password" placeholder="Mật khẩu" />
                            </div>
                            @if ($errors->has('User_Password'))
                                <div class="alert alert-danger">{{ $errors->first('User_Password') }}</div>
                            @endif
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" id="signin" class="form-submit" value="Log in" />
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
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
    <script src="colorlib-regform-7/vendor/jquery/jquery.min.js"></script>
    <script src="colorlib-regform-7/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>