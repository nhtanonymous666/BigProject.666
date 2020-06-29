@extends('frontend.master')
@section('title', 'Giỏ hàng')
@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('source/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate mb-5 text-center">
                <p class="breadcrumbs mb-0"><span class="mr-2"><a href="index">Home <i class="fa fa-chevron-right"></i></a></span></p>
                <h2 class="mb-0 bread">Giỏ hàng của tôi</h2>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="table-wrap">
                <table class="table">
                    <thead class="thead-primary">
                        <tr>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng giá (đã giảm)</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listCart as $item)
                            <tr class="alert" role="alert">
                                <td>
                                    <label class="checkbox-wrap checkbox-primary">
                                        <input type="checkbox" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td>
                                    <div class="img" style="background-image: url(upload-products/{{ $item->prod_image }}.jpg);"></div>
                                </td>
                                <td>
                                    <div class="email">
                                        <span>{{ $item->prod_name }}</span>
                                        <span>Đánh giá</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="email">
                                        <span>{{ $item->prod_sale_price }} vnđ</span>
                                        <span style="text-decoration: line-through;">{{ $item->prod_price }} vnđ</span>
                                    </div>
                                </td>
                                <td class="quantity">
                                    <div class="input-group">
                                        <input type="text" name="quantity" class="quantity form-control input-number" value="{{ $item->cp_quantity }}" min="1" max="100">
                                    </div>
                                </td>
                                <td>{{ $item->cp_price }} vnđ</td>
                                <td>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Cart Totals</h3>
                    <p class="d-flex">
                        <span>Tổng số lượng</span>
                        <span>{{ $numListCart }}</span>
                    </p>
                    <p class="d-flex">
                        <span>Tổng phụ</span>
                        <span>{{ $subTotalPrice }} vnđ</span>
                    </p>
                    <p class="d-flex">
                        <span>Giảm giá</span>
                        <span>{{ $discountPrice }} vnđ</span>
                    </p>
                    <hr>
                    <p class="d-flex total-price">
                        <span>Thành tiền</span>
                        <span>{{ $totalPrice }} vnđ</span>
                    </p>
                </div>
                <p class="text-center"><a href="checkout.html" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
            </div>
        </div>
    </div>
</section>
@endsection