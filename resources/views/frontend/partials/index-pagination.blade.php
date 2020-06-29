<div class="row">
    @if (count($product) > 0)
        @foreach ($product as $prod)
        <div class="col-md-3 d-flex">
            <div class="product ftco-animate">
                <div class="img d-flex align-items-center justify-content-center" style="background-image: url(upload-products/laptop-1.jpg);">
                    <div class="desc">
                        <p class="meta-prod d-flex">
                            <a href="javascript:void(0)" class="d-flex align-items-center justify-content-center add-cart" prod-id="{{ $prod->prod_id }}"><span class="flaticon-shopping-bag"></span></a>
                            <a href="javascript:void(0)" class="d-flex align-items-center justify-content-center"><span class="flaticon-heart"></span></a>
                            <a href="{{ $prod->prod_url }}.prod.{{ $prod->prod_id }}" class="d-flex align-items-center justify-content-center"><span class="flaticon-visibility"></span></a>
                        </p>
                    </div>
                </div>
                <div class="text text-center">
                    @if ($prod->prod_sale_price > 0)
                        <span class="sale">
                            {{ '-'.number_format((float)(100 - (($prod->prod_sale_price * 100) / $prod->prod_price)), 2, '.', '').'%' }}
                        </span>
                    @endif
                    <span class="category">{{$prod->SubCategory->Category->cate_name}} &gt; {{$prod->SubCategory->subcate_name}}</span>
                    <h2>{{$prod->prod_name}}</h2>
                    <p class="mb-0">
                    @if ($prod->prod_sale_price > 0)
                        <span class="price price-sale">
                            {{ number_format($prod->prod_price,0,",",".") }} vnđ
                        </span>
                        <span class="price">
                            {{ number_format($prod->prod_sale_price,0,",",".") }} vnđ
                        </span>
                    @else
                        <span class="price">
                            {{ number_format($prod->prod_price,0,",",".") }} vnđ
                        </span>
                    @endif
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    @else
        <div class="col-md-3 d-flex">
            <div>
                Không tồn tại mục nào!
            </div>
        </div>
    @endif
</div>
<div class="row justify-content-center">
    <div class="col-md-4">
        {{$product->links()}}
    </div>
</div>