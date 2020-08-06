<!-- Menu Categories Start -->
<div class="ct-menu-categories menu-filter">
    <div class="container">
        <div class="menu-category-slider">
            <a href="#" data-filter="*" class="ct-menu-category-item active">
                <div class="menu-category-thumb">
                    <img src="/images/categories/all.jpg" alt="category">
                </div>
                <div class="menu-category-desc">
                    <h6>All</h6>
                </div>
            </a>
            <a href="#" data-filter=".pizzas" class="ct-menu-category-item">
                <div class="menu-category-thumb">
                    <img src="/images/categories/pizzas.jpg" alt="category">
                </div>
                <div class="menu-category-desc">
                    <h6>Pizzas</h6>
                </div>
            </a>
            <a href="#" data-filter=".beverages" class="ct-menu-category-item">
                <div class="menu-category-thumb">
                    <img src="/images/categories/beverages.jpg" alt="category">
                </div>
                <div class="menu-category-desc">
                    <h6>Beverages</h6>
                </div>
            </a>
            <a href="#" data-filter=".salads" class="ct-menu-category-item">
                <div class="menu-category-thumb">
                    <img src="/images/categories/salads.jpg" alt="category">
                </div>
                <div class="menu-category-desc">
                    <h6>Salads</h6>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- Menu Categories End -->
<!-- Menu Wrapper Start -->
<div class="section section-padding">
    <div class="container">
        <div class="menu-container row menu-v2">
            @foreach($goodsCategories as $name => $goodsCategory)
                @foreach($goodsCategory as $goods)
                    @include('partial.goodsInMenu',['class' => $name, 'goods' => $goods])
                @endforeach
            @endforeach
        </div>
    </div>
</div>
<!-- Menu Wrapper End -->
