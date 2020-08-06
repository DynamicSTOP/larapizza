<!-- Footer Start -->
<footer class="ct-footer footer-dark">
    <!-- Top Footer -->
    <div class="container">
        <div class="footer-top">
            <div class="footer-logo">
                <img src="/images/logo.png" alt="logo">
            </div>
        </div>
    </div>

    <!-- Middle Footer -->
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 footer-widget">
                    <h5 class="widget-title">Information</h5>
                    <ul>
                        <li><a href="{{route('index')}}">Home</a></li>
                        <li><a href="{{route('menu')}}">Menu</a></li>
                        <li><a href="{{route('contact-us')}}">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 footer-widget">
                    <h5 class="widget-title">Account</h5>
                    <ul>
                        <li><a href="{{route('login')}}">Login</a></li>
                        <li><a href="{{route('register')}}">Register</a></li>
                        <li><a href="{{route('orders')}}">Orders</a></li>
                    </ul>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 footer-widget">
                    <h5 class="widget-title">Others</h5>
                    <ul>
                        <li><a href="{{route('checkout')}}">Checkout</a></li>
                        <li><a href="{{route('legal')}}">Legal</a></li>
                    </ul>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 footer-widget">
                    <h5 class="widget-title">Social Media</h5>
                    <ul class="social-media">
                        <li><a href="#" class="facebook"> <i class="fab fa-facebook-f"></i> </a></li>
                        <li><a href="#" class="pinterest"> <i class="fab fa-pinterest-p"></i> </a></li>
                        <li><a href="#" class="google"> <i class="fab fa-google"></i> </a></li>
                        <li><a href="#" class="twitter"> <i class="fab fa-twitter"></i> </a></li>
                    </ul>
                    @unless(Auth::check())
                    <div class="footer-offer">
                        <p>Signup and get exclusive offers and coupon codes</p>
                        <a href="{{route('register')}}" class="btn-custom btn-sm shadow-none">Sign Up</a>
                    </div>
                    @endunless
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-copyright">
                <p>
                    This is a demo site. No info is used for any sort of ads or marketing.
                    Source code is available <a href="https://github.com/DynamicSTOP/larapizza">here</a>.
                    Made by <a target="_blank" rel="nofollow"
                               href="https://www.upwork.com/freelancers/~0187760ab8fda9b142">Leonid Babikov</a> in
                    2020.
                </p>
            </div>
            <div class="footer-copyright">
                <p>You can buy html template <a target="_blank" rel="nofollow"
                                                href="https://themeforest.net/item/slices-pizza-restaurant-html-template/25760641">here</a>.
                </p>
            </div>

            <div class="footer-copyright">
                <div>
                    <p> Copyright &copy; 2020 <a href="#">AndroThemes</a> All Rights Reserved. </p>
                </div>
                <a href="#" class="back-to-top">Back to top <i class="fas fa-chevron-up"></i> </a>
            </div>
        </div>
    </div>

</footer>
<!-- Footer End -->

