<div class="cps-footer-upper cps-gray-bg">
    <div class="container">
        <div class="cps-footer-widget-area">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="cps-widget about-widget">
                        <a href="/" class="cps-footer-logo">
                            <img alt="logo" src="{{url('img/dharro.png')}}">
                        </a>
                        <p>{{__('layouts_footer.para1')}}</p>
                        <div class="cps-socials">
                            <a href="{!! getSettingValue('facebook-link')  !!}"><i class="fa fa-facebook"></i></a>
                            <!-- <a href="{!! getSettingValue('twitter-link')  !!}"><i class="fa fa-twitter"></i></a> -->
                            <a href="{!! getSettingValue('instagram-link')  !!}"><i class="fa fa-instagram"></i></a>
                            <a href="{!! getSettingValue('linkedin-link')  !!}"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="cps-widget custom-menu-widget">
                        <h4 class="cps-widget-title">{{__('layouts_footer.company')}}</h4>
                        <ul class="widget-menu">
                            <li><a href="{{ url('/') }}">{{__('layouts_footer.home')}}</a></li>
                            <li><a href="{{ url('/about') }}">{{__('layouts_footer.about')}}</a></li>
                            <li><a href="{{ url('/pricing') }}">{{__('layouts_footer.pricing')}}</a></li>
                            <li><a href="{{ route('page.contact-us') }}">{{__('layouts_footer.contactus')}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="cps-widget custom-menu-widget">
                        <h4 class="cps-widget-title">{{__('layouts_footer.products')}}</h4>
                        <ul class="widget-menu">
                            <!-- <li><a href="{{ url('/productdetail') }}">{{__('layouts_footer.productDetails')}}</a></li> -->
                            <li><a href="{{ url('/productdetail') }}">{{__('layouts_footer.communityfeaturesheet')}}</a></li>
                            <li><a href="{{ route('property.feature.sheets.detail') }}">{{__('layouts_footer.propertyfeaturesheet')}}</a></li>
                            <li><a href="{{ route('home.details.infographic.detail') }}">{{__('layouts_footer.homedetailinfographic')}}</a></li>
                            <li><a href="{{ route('survey-detail') }}">{{__('layouts_footer.REALTORSmarketsentimentsurvey')}}</a></li>
                            {{--<li><a href="{{ route('survey') }}">{{__('layouts_footer.REALTORSmarketsentimentsurvey')}}</a></li>--}}
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-12">
                    <div class="cps-widget custom-menu-widget">
                        <h4 class="cps-widget-title">{{__('layouts_footer.information')}}</h4>
                        <ul class="widget-menu">
                            <li><a href="{{url('/testimonials')}}">{{__('layouts_footer.testimonials')}}</a></li>
                            <li><a href="{{ URL::Route('page.coverage') }}">{{__('layouts_footer.coverage')}}</a></li>
                            <li><a href="{{ url('/faqs') }}">{{__('layouts_footer.FAQs')}}</a></li>
                            <li><a href="{{ url('/videos') }}">{{__('layouts_footer.howtovideos')}}</a></li>
                            <!-- <li><a href="{{ URL::Route('page.how-it-works') }}">{{__('layouts_footer.howItWorks')}}</a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                    <div class="cps-widget custom-menu-widget text-center">
                        <img src="{{ asset('img/proudly-canadian.png')}}" alt="Proudly Canadian" width="200">
                        <p style="margin-left: 20px;">{{__('layouts_footer.para2')}}</p>
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
                <p class="copyright">{{__('layouts_footer.copyright')}} &copy; {{ date('Y') }}, {{__('layouts_footer.para3')}}</p>
            </div>
            <div class="col-sm-6 col-xs-12 text-right xs-text-center">
                <ul class="footer-menu">
                    <!-- <li><a href="#">{{__('layout_footer.legal')}}</a></li> -->
                    <li><a href="{{ url('/termsconditions') }}">{{__('layouts_footer.termsconditions')}}</a></li>
                    <li><a href="{{ route('page.contact-us') }}">{{__('layouts_footer.contact')}}</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>