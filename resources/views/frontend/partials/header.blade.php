<div class="wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex align-items-center">
                <p class="mb-0 phone pl-md-2">
                    <a href="#" class="mr-2"><span class="fa fa-phone mr-1"></span> +84 336077131</a>
                    <a href="#"><span class="fa fa-paper-plane mr-1"></span> admin@nguyenthucofficial.com</a>
                </p>
            </div>
            <div class="col-md-6 d-flex justify-content-md-end">
                <div class="social-media mr-4">
                    <p class="mb-0 d-flex">
                        <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
                        <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
                        <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
                        <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
                    </p>
                </div>
                <div class="reg">
                    <p class="mb-0">
                        <!-- Authentication Links -->
                        @guest
                                <a href="{{ route('login') }}" class="mr-2">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        @else
                            <a href="javascript:void(0)" class="mr-2" style="text-transform: none;">{{ Auth::user()->user_last_name }} {{ Auth::user()->user_first_name }}</a>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @endguest
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">NguyenThuc <span>Official</span></a>
        <div class="order-lg-last btn-group load-list-cart-header">
            @include('frontend.partials.list-cart-header')
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Danh mục</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        @foreach ($categoryandsub as $cate)
                            <a class="dropdown-item" href="{{ $cate->cate_url }}.cat.{{ $cate->cate_id }}">{{ $cate->cate_name }}</a>
                            @foreach ($cate->subcategory as $subcate)
                                <div style="margin-left: 60px;">
                                    <a class="dropdown-item" href="{{ $subcate->subcate_url }}.subcat.{{ $cate->cate_id }}.{{ $subcate->subcate_id }}">{{ $subcate->subcate_name }}</a>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </li>
                <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
                <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->