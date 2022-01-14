<div class="cps-footer-upper cps-gray-bg">
    <div class="container">
        <div class="cps-footer-widget-area">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="cps-widget about-widget">
                        <a href="/" class="cps-footer-logo">
                            <img alt="logo" src="{{url('img/dharro.png')}}">
                        </a>
                        <p>Provide depth and detail to your home marketing presentation by highlighting important neighbourhood information</p>
                        <div class="cps-socials">
                            <a href="{!! getSettingValue('facebook-link')  !!}"><i class="fa fa-facebook"></i></a>
                            <a href="{!! getSettingValue('twitter-link')  !!}"><i class="fa fa-twitter"></i></a>
                            <a href="{!! getSettingValue('instagram-link')  !!}"><i class="fa fa-instagram"></i></a>
                            <a href="{!! getSettingValue('linkedin-link')  !!}"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="cps-widget custom-menu-widget">
                        <h4 class="cps-widget-title">Company</h4>
                        <ul class="widget-menu">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('/about') }}">About</a></li>
                            <li><a href="{{ url('/pricing') }}">Pricing</a></li>
                            <li><a href="{{ route('page.contact-us') }}">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="cps-widget custom-menu-widget">
                        <h4 class="cps-widget-title">Products</h4>
                        <ul class="widget-menu">
                            <!-- <li><a href="{{ url('/productdetail') }}">Product Details</a></li> -->
                            <li><a href="{{ url('/productdetail') }}">Community Feature Sheet®</a></li>
                            <li><a href="{{ route('property.feature.sheets.detail') }}">Property Feature Sheet</a></li>
                            <li><a href="{{ route('home.details.infographic.detail') }}">Home Detail Infographic</a></li>
                            <li><a href="{{ route('survey-detail') }}">REALTORS® Market Sentiment Survey</a></li>
                            {{--<li><a href="{{ route('survey') }}">REALTORS® Market Sentiment Survey</a></li>--}}
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-12">
                    <div class="cps-widget custom-menu-widget">
                        <h4 class="cps-widget-title">Information</h4>
                        <ul class="widget-menu">
                            <li><a href="{{url('/testimonials')}}">Testimonials</a></li>
                            <li><a href="{{ URL::Route('page.coverage') }}">Coverage</a></li>
                            <li><a href="{{ url('/faqs') }}">FAQs</a></li>
                            <li><a href="{{ url('/videos') }}">How To Videos</a></li>
                            <!-- <li><a href="{{ URL::Route('page.how-it-works') }}">How It Works</a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                    <div class="cps-widget custom-menu-widget text-center">
                        <img src="{{ asset('img/proudly-canadian.png')}}" alt="Proudly Canadian" width="200">
                        <p>Designed in Edmonton, AB.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="cps-footer-lower cps-theme-bg">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-xs-12 xs-text-center">
                <p class="copyright">Copyright &copy; {{ date('Y') }}, VOOY GROUP CANADA INC, All Rights Reserved.</p>
            </div>
            <div class="col-sm-6 col-xs-12 text-right xs-text-center">
                <ul class="footer-menu">
                    <!-- <li><a href="#">Legal</a></li> -->
                    <li><a href="{{ url('/termsconditions') }}">Terms &amp; Conditions</a></li>
                    <li><a href="{{ route('page.contact-us') }}">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>