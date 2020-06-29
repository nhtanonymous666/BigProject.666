<div class="col-md-3">
    <div class="sidebar-box ftco-animate">
        <div class="categories">
            <h3>Danh mục</h3>
            <ul class="p-0">
                @if (count($barCategory) > 0)
                    @foreach ($barCategory as $cate)
                        <li><a href="{{ $cate->cate_url }}.cat.{{ $cate->cate_id }}">{{$cate->cate_name}} <span class="fa fa-chevron-right"></span></a></li>
                        @if (count($cate->SubCategory) > 0)
                            @foreach ($cate->SubCategory as $subcate)
                                <li><a href="{{ $subcate->subcate_url }}.subcat.{{ $cate->cate_id }}.{{ $subcate->subcate_id }}"><i class="fa fa-arrow-right"></i> {{$subcate->subcate_name}}</a></li>
                            @endforeach
                        @endif
                    @endforeach
                @else
                    <li>Trống</li>
                @endif
            </ul>
        </div>
    </div>
    <div class="sidebar-box ftco-animate">
        <h3>Recent Blog</h3>
        <div class="block-21 mb-4 d-flex">
            <a class="blog-img mr-4" style="background-image: url(source/images/image_1.jpg);"></a>
            <div class="text">
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                <div class="meta">
                    <div><a href="#"><span class="fa fa-calendar"></span> Apr. 18, 2020</a></div>
                    <div><a href="#"><span class="fa fa-comment"></span> 19</a></div>
                </div>
            </div>
        </div>
        <div class="block-21 mb-4 d-flex">
            <a class="blog-img mr-4" style="background-image: url(source/images/image_2.jpg);"></a>
            <div class="text">
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                <div class="meta">
                    <div><a href="#"><span class="fa fa-calendar"></span> Apr. 18, 2020</a></div>
                    <div><a href="#"><span class="fa fa-comment"></span> 19</a></div>
                </div>
            </div>
        </div>
        <div class="block-21 mb-4 d-flex">
            <a class="blog-img mr-4" style="background-image: url(source/images/image_3.jpg);"></a>
            <div class="text">
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                <div class="meta">
                    <div><a href="#"><span class="fa fa-calendar"></span> Apr. 18, 2020</a></div>
                    <div><a href="#"><span class="fa fa-comment"></span> 19</a></div>
                </div>
            </div>
        </div>
    </div>
</div>