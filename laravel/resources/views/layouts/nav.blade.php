<nav class="row">
    <div class="navbar-brand">
        <a  href="/">LARA PIZZA</a>
    </div>
    <div class="row">
        <div class="cartButton">
            <img src="/icons/cart.svg">
            <span class=" @if($cartQuantity === 0) d-none @endif cartQuantity">{{$cartQuantity}}</span>
            Cart</div>
    </div>
</nav>
