<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Đăng ký | NguyenThucOfficial</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="colorlib-regform-7/fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="colorlib-regform-7/css/style.css">
    <!-- Boostrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="main signup-login">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Đăng ký tài khoản</h2>
                        @if (Session::has('register-success'))
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Well done!</h4>
                            <p>{{ Session::get('register-success') }}, bạn có thể đăng nhập ngay bây giờ.</p>
                        </div>
                        @endif

                        <form action="{{ route('register') }}" method="POST" class="register-form" id="register-form">
                            @csrf
                            <div class="form-group">
                                <label for="user_first_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="user_first_name" id="user_first_name" placeholder="Tên" />
                            </div>
                            @if ($errors->has('user_first_name'))
                            <p class="text-danger">{{ $errors->first('user_first_name') }}</p>
                            @endif
                            <div class="form-group">
                                <label for="user_last_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="user_last_name" id="user_last_name" placeholder="Họ" />
                            </div>
                            @if ($errors->has('user_last_name'))
                            <p class="text-danger">{{ $errors->first('user_last_name') }}</p>
                            @endif
                            <div class="form-group">
                                <label for="user_user_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="user_user_name" id="user_user_name" placeholder="Tài khoản" />
                            </div>
                            @if ($errors->has('user_user_name'))
                            <p class="text-danger">{{ $errors->first('user_user_name') }}</p>
                            @endif
                            <div class="form-group">
                                <label for="user_email"><i class="zmdi zmdi-email"></i></label>
                                <input type="text" name="user_email" id="user_email" placeholder="Email" />
                            </div>
                            @if ($errors->has('user_email'))
                            <p class="text-danger">{{ $errors->first('user_email') }}</p>
                            @endif
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Mật khẩu" />
                            </div>
                            @if ($errors->has('password'))
                            <p class="text-danger">{{ $errors->first('password') }}</p>
                            @endif
                            <div class="form-group">
                                <label for="re-password_confirmation"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Nhập lại mật khẩu" />
                            </div>
                            @if ($errors->has('password_confirmation'))
                            <p class="text-danger">{{ $errors->first('password_confirmation') }}</p>
                            @endif
                            <div class="form-group">
                                <label for="user_phone"><i class="zmdi zmdi-phone"></i></label>
                                <input type="text" name="user_phone" id="user_phone" placeholder="Điện thoại" />
                            </div>
                            @if ($errors->has('user_phone'))
                            <p class="text-danger">{{ $errors->first('user_phone') }}</p>
                            @endif
                            <div class="form-group">
                                <label for="user_nation"><i class="zmdi zmdi-flag"></i></label>
                                <input type="text" name="user_nation" id="user_nation" placeholder="Quốc gia" />
                            </div>
                            @if ($errors->has('user_nation'))
                            <p class="text-danger">{{ $errors->first('user_nation') }}</p>
                            @endif
                            <div class="form-group">
                                <label for="user_address"><i class="zmdi zmdi-home"></i></label>
                                <input type="text" name="user_address" id="user_address" placeholder="Địa chỉ" />
                            </div>
                            @if ($errors->has('user_address'))
                            <p class="text-danger">{{ $errors->first('user_address') }}</p>
                            @endif
                            <div class="form-group">
                                <label for="user_date_of_birth"><i class="zmdi zmdi-calendar"></i></label>
                                <input type="date" name="user_date_of_birth" id="user_date_of_birth" placeholder="Ngày sinh" />
                            </div>
                            @if ($errors->has('user_date_of_birth'))
                            <p class="text-danger">{{ $errors->first('user_date_of_birth') }}</p>
                            @endif
                            <div class="form-group">
                                <label for="role_user"><i class="zmdi zmdi-home"></i></label>
                                <input type="text" name="role_user" id="role_user" value="1" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>Tôi đồng ý điều khoản <a href="#" class="term-service">Điều khoản dịch vụ</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" id="signup" class="form-submit" value="Register" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="colorlib-regform-7/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="{{ route('login') }}" class="signup-image-link">Bấm vào đây nếu bạn đã có tài khoản</a>
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
