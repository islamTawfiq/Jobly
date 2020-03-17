    <!-- footer -->
    <footer class="text-center text-md-left">
        <div class="container">
            <div class="row">
                <div class="col-md-3 logo">
                    <img src="{{$settings->main_logo}}" alt="">
                </div>
                <div class="col-4 col-md-2 linksInFooter">
                    <p class="h5">Menu</p>
                    <ul class="list-unstyled">
                        <li>
                            <a href="{{url('/')}}">Home</a>
                        </li>
                        <li>
                            <a href="{{url('/filter')}}">Nannies</a>
                        </li>
                        <li>
                            <a href="#">How it Works</a>
                        </li>
                        <li>
                            <a href="{{url('/about-us')}}">About</a>
                        </li>
                    </ul>
                </div>
                <div class="col-4 col-md-2 linksInFooter">
                    <p class="h5">Quick Link</p>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#">Help</a>
                        </li>
                        <li>
                            <a href="{{url('/contact-us')}}">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div class="col-4 col-md-2 linksInFooter">
                    <p class="h5">More</p>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="{{url('/terms&conditions')}}">Terms & Condition</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 linksInFooter text-md-right">
                    <i class="fab fa-facebook-f" style="color: #3b5999;"></i>
                    <i class="fab fa-twitter" style="color: #55acee;"></i>
                    <i class="fab fa-instagram" style="color: #e4405f;"></i>
                    <i class="fab fa-linkedin-in" style="color: #0077B5;"></i>
                </div>
            </div>
        </div>
    </footer>

    <!-- Copyright -->
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-left">
                    <span> © 2020 Copyright: All Rights Reserved</span>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <span>Designed By : www.khabircom.com</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright -->

    @include('site.layout.scripts')

