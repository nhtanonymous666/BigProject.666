@extends('frontend.master')
@section('title', $category->cate_name)
@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('source/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate mb-5 text-center">
                <p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span></p>
                <h2 class="mb-0 bread">{{ $category->cate_name }}</h2>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row mb-4">
                    <div class="col-md-12 d-flex justify-content-between align-items-center">
                        <h4 class="product-select">Select Types of Products</h4>
                        <select class="selectpicker" multiple>
                            <option>Brandy</option>
                            <option>Gin</option>
                            <option>Rum</option>
                            <option>Tequila</option>
                            <option>Vodka</option>
                            <option>Whiskey</option>
                        </select>
                    </div>
                </div>
                <div class="load-ajax-pagination">
					@include('frontend.partials.category-pagination')
                </div>
            </div>
            @include('frontend.partials.navbar')
        </div>
    </div>
</section>
@endsection