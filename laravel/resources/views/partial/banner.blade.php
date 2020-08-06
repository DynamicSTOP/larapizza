<!-- Banner Start -->
<div class="banner banner-3">
    {{-- TODO make banner model, link goods and add image --}}
    <div class="banner-slider-3">
        @for ($i = 0; $i < 4; $i++)
            @php
                $goods = $goodsCategories['pizzas'][$i];
            @endphp
            <div class="banner-item">
                <div class="banner-inner" style="background-image: url('/images/banner/{{$i}}.jpg')">
                    <h1 class="title">{{$goods->name}} </h1>
                    <div class="ct-rating-wrapper">
                        <div class="ct-rating">
                            @for ($k = 0; $k < rand(4,5); $k++)
                                <i class="fas fa-star active"></i>
                            @endfor
                        </div>
                    </div>
                    <div class="banner-text">
                        <p class="subtitle">{{$goods->description}}</p>
                        <div class="banner-icons-wrapper">
                            <div class="banner-icon">
                                <i class="flaticon-calories"></i>
                                <div class="banner-icon-body">
                                    {{-- TODO goods->cheeze or better custom param model --}}
                                    <h5>@php echo rand(400,800); @endphp</h5>
                                    <span>Calories</span>
                                </div>
                            </div>
                            <div class="banner-icon">
                                <i class="flaticon-cheese"></i>
                                <div class="banner-icon-body">
                                    <h5>@php echo rand(2,4)*100; echo 'g'; @endphp</h5>
                                    <span>Mozarella</span>
                                </div>
                            </div>
                        </div>
                        <div class="banner-controls">
                            <a href="#" class="btn-custom primary" data-order_banner data-id="{{$goods->id}}"><span>Order</span> <i class="flaticon-shopping-bag"></i> </a>
                            <h4 data-price_usd="@moneyNC($goods->price_usd)"
                                data-price_euro="@moneyNC($goods->price_euro)"
                            >@money($goods->getPrice())</h4>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>

    <div class="ct-arrows-wrapper">
        <div class="slide-number">
            <span class="current-slide">0<span>1</span></span> <span>/4</span>
        </div>
        <div class="ct-arrows">
            <div class="slider-prev">
                Previous
            </div>
            <div class="slider-next">
                Next
            </div>
        </div>
    </div>

</div>
<!-- Banner End -->
