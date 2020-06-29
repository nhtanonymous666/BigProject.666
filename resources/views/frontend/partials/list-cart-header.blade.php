<a href="#" class="btn-cart dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="flaticon-shopping-bag"></span>
    <div class="d-flex justify-content-center align-items-center"><small>{{ $numListCartHeader }}</small></div>
</a>
<div class="dropdown-menu dropdown-menu-right">
    <!-- Authentication Links -->
    @guest
    <div class="dropdown-item d-flex align-items-start" href="#">
        {{ $ListCartHeader }}
    </div>
    @else
    @if (count($ListCartHeader) > 0)
    @foreach ($ListCartHeader as $item)
    <div class="dropdown-item d-flex align-items-start" href="#">
        <div class="img" style="background-image: url(upload-products/{{ $item->prod_image }}.jpg);"></div>
            <div class="text pl-3">
                <h4>{{ $item->prod_name }}</h4>
                <p class="mb-0">
                    <a href="#" class="price">
                        @if ($item->prod_sale_price > 0)
                        {{ $item->prod_sale_price }} vnđ
                        @else
                        {{ $item->prod_price }} vnđ
                        @endif
                    </a>
                    <span class="quantity ml-3">Số lượng: {{ $item->cp_quantity }}</span>
                </p>
            </div>
        </div>
    @endforeach
        <a class="dropdown-item text-center btn-link d-block w-100" href="cart">
            Xem tất cả
            <span class="ion-ios-arrow-round-forward"></span>
        </a>
    @else
    <div class="dropdown-item d-flex align-items-start" href="#">
        Chưa có sản phẩm nào
    </div>
    @endif
    @endguest
</div>