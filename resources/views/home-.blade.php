@extends('layouts.template')
@section('content')
<!-- Banner -->
<div class="cps-banner style-15" id="banner">
    <div class="cps-banner-item cps-banner-item-15">
        <div class="cps-banner-content">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h3 class="cps-banner-subtitle">Unlimited Searches. Instant Results</h3>
                        <h1 class="cps-banner-title"><span>GET YOUR {{ config('app.title') }} ON DEMAND.</span></h1>
                        <p class="cps-banner-text">Provide depth and detail to your home marketing presentation by highlight important neighbourhood information.</p>
                        <div class="cps-button-group">
                            <a class="btn btn-primary btn-square" href="#">Try Now</a>
                            <a class="btn btn-primary btn-square" href="https://youtu.be/SKxvdMEGKfE"><i class="fa fa-play"></i>Watch Video</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cps-banner-image hidden-sm hidden-xs">
            <div class="container text-right">
                <img class="img-responsive" src="img/banner/pic-1.png" alt="Banner Mock">                    
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->
<div class="cps-main-wrap">
    
    <!-- Header Quote -->
    <div class="cps-section cps-gray-bg cps-head-quote-section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-right">
                    <div class="cps-head-quote">
                        <p class="cps-headquote-text">“Differentiate yourself from the competition with unique and stunning home marketing products that will leave a lasting impact on potential buyers and new clients.”</p>
                        <p class="cps-headquote-by"><span class="cps-headquote-name">Odiri Mike-Ifeta</span> - <span class="cps-headquote-profession">Product Leader @VOOY Marketing</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Quote End -->
    
    <!-- Integrated With -->
    <div class="cps-section cps-section-padding cps-bottom-0">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-xs-12">
                    <div class="cps-section-header text-center">
                        <h3 class="cps-section-title"><span class="cps-theme-color">Trusted</span> by teams, used by companies</h3>
                        <p class="cps-section-text">Over 3000+ Individual  {{ config('app.title') }}  &amp; created for REALTORS® in Canada and USA</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="integrated-with-wrap style-2">
                        <a href="#" class="integrated-with">
                            <img src="img/client-logo/logo-1.png" alt="Integrated with ...">
                        </a>
                        <a href="#" class="integrated-with">
                            <img src="img/client-logo/logo-2.png" alt="Integrated with ...">
                        </a>
                        <a href="#" class="integrated-with">
                            <img src="img/client-logo/logo-3.png" alt="Integrated with ...">
                        </a>
                        <a href="#" class="integrated-with">
                            <img src="img/client-logo/logo-4.png" alt="Integrated with ...">
                        </a>
                        <a href="#" class="integrated-with">
                            <img src="img/client-logo/logo-5.png" alt="Integrated with ...">
                        </a>
                        <a href="#" class="integrated-with">
                            <img src="img/client-logo/logo-6.png" alt="Integrated with ...">
                        </a>
                        <a href="#" class="integrated-with">
                            <img src="img/client-logo/logo-7.png" alt="Integrated with ...">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Integrated With End -->
    
    <!-- Manage your customer -->
    <div class="cps-section cps-section-padding cps-bottom-0">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-xs-12">
                    <div class="cps-section-header text-center">
                        <h3 class="cps-section-title">Manage your customer on every channel</h3>
                        <p class="cps-section-text">SaaSera features every channel to help customer: Email, Phone Call, Facebook Message, SMS, Live Chat, etc. Your support team doesn't not to go everywhere, all in one platform.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="connection-mock text-center">
                        <div class="connection-logoes">
                            <div class="connection-logo-item">
                                <i class="fa fa-envelope-o"></i>
                                <span class="connection-name">Email</span>
                            </div>
                            <div class="connection-logo-item">
                                <i class="fa fa-phone"></i>
                                <span class="connection-name">Phone</span>
                            </div>
                            <div class="connection-logo-item">
                                <i class="fa fa-comments-o"></i>
                                <span class="connection-name">Chat</span>
                            </div>
                            <div class="connection-logo-item">
                                <i class="fa fa-mobile-phone"></i>
                                <span class="connection-name">SMS</span>
                            </div>
                        </div>
                        <div class="center-block logo-mock">
                            <div class="sm-logo center-block"><img src="img/sm-logo.png" alt="site logo"></div>
                        </div>
                        <div class="connection-logoes">
                            <div class="connection-logo-item">
                                <i class="fa fa-facebook"></i>
                                <span class="connection-name">Facebook</span>
                            </div>
                            <!-- <div class="connection-logo-item">
                                <i class="fa fa-twitter"></i>
                                <span class="connection-name">Twitter</span>
                            </div> -->
                            <div class="connection-logo-item">
                                <i class="fa fa-google-plus"></i>
                                <span class="connection-name">Google Plus</span>
                            </div>
                            <div class="connection-logo-item">
                                <i class="fa fa-linkedin"></i>
                                <span class="connection-name">Linkedin</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Manage your customer end -->
    
    <!-- Custom Features -->
    <div class="cps-section cps-section-padding" id="features">
        <div class="container">
            <div class="cps-sub-section">
                <div class="row">
                    <div class="col-sm-6 col-xs-12 xs-bottom-30">
                        <h4 class="cps-subsection-title">Work together, work as a team</h4>
                        <p class="cps-subsection-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit</p>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <img class="img-responsive" src="img/features/shape-1.2.svg" alt="...">
                    </div>
                </div>
            </div>
            <div class="cps-sub-section">
                <div class="row">
                    <div class="col-sm-6 col-sm-push-6 col-xs-12 xs-bottom-30">
                        <h4 class="cps-subsection-title">Track projects from start to finish</h4>
                        <p class="cps-subsection-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit</p>
                    </div>
                    <div class="col-sm-6 col-sm-pull-6 col-xs-12">
                        <img class="img-responsive" src="img/features/shape-2.2.svg" alt="...">
                    </div>
                </div>
            </div>
            <div class="cps-sub-section">
                <div class="row">
                    <div class="col-sm-6 col-xs-12 xs-bottom-30">
                        <h4 class="cps-subsection-title">SaaSera integrated all popular tools</h4>
                        <p class="cps-subsection-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit</p>
                    </div>
                    <div class="col-sm-6 col-xs-12 text-center">
                        <img class="img-responsive features-side-img" src="img/features/shape-3.2.png" alt="...">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Custom Features End -->
    
    <!-- Testimonial -->
    <div class="cps-section cps-section-padding cps-gray-bg cps-testimonial style-3">
        <div class="container">
            <div class="cps-testimonials-wrap">
                <div class="owl-carousel testimonial-carousel" id="testimonial-carousel-2">
                    <div class="cps-testimonial-item">
                        <div class="cps-commenter-pic">
                            <img src="img/client/2.1.jpg" alt="...">
                        </div>
                        <blockquote>It was an amazing experience while I download it first time &amp; they provide quick support... Best of Luck Saasera</blockquote>
                        <h5 class="cps-reviewer-name">Tom Z.Graze</h5>
                        <p class="cps-reviewer-position">Founder &amp; CEO</p>
                        <p class="cps-reviewer-company">CodePassenger LLC</p>
                    </div>
                    <div class="cps-testimonial-item">
                        <div class="cps-commenter-pic">
                            <img src="img/client/2.2.jpg" alt="...">
                        </div>
                        <blockquote>It was an amazing experience while I download it first time &amp; they provide quick support... Best of Luck Saasera</blockquote>
                        <h5 class="cps-reviewer-name">Tom Z.Graze</h5>
                        <p class="cps-reviewer-position">Founder &amp; CEO</p>
                        <p class="cps-reviewer-company">CodePassenger LLC</p>
                    </div>
                    <div class="cps-testimonial-item">
                        <div class="cps-commenter-pic">
                            <img src="img/client/2.3.jpg" alt="...">
                        </div>
                        <blockquote>It was an amazing experience while I download it first time &amp; they provide quick support... Best of Luck Saasera</blockquote>
                        <h5 class="cps-reviewer-name">Tom Z.Graze</h5>
                        <p class="cps-reviewer-position">Founder &amp; CEO</p>
                        <p class="cps-reviewer-company">CodePassenger LLC</p>
                    </div>
                    <div class="cps-testimonial-item">
                        <div class="cps-commenter-pic">
                            <img src="img/client/2.1.jpg" alt="...">
                        </div>
                        <blockquote>It was an amazing experience while I download it first time &amp; they provide quick support... Best of Luck Saasera</blockquote>
                        <h5 class="cps-reviewer-name">Tom Z.Graze</h5>
                        <p class="cps-reviewer-position">Founder &amp; CEO</p>
                        <p class="cps-reviewer-company">CodePassenger LLC</p>
                    </div>
                    <div class="cps-testimonial-item">
                        <div class="cps-commenter-pic">
                            <img src="img/client/2.2.jpg" alt="...">
                        </div>
                        <blockquote>It was an amazing experience while I download it first time &amp; they provide quick support... Best of Luck Saasera</blockquote>
                        <h5 class="cps-reviewer-name">Tom Z.Graze</h5>
                        <p class="cps-reviewer-position">Founder &amp; CEO</p>
                        <p class="cps-reviewer-company">CodePassenger LLC</p>
                    </div>
                    <div class="cps-testimonial-item">
                        <div class="cps-commenter-pic">
                            <img src="img/client/2.3.jpg" alt="...">
                        </div>
                        <blockquote>It was an amazing experience while I download it first time &amp; they provide quick support... Best of Luck Saasera</blockquote>
                        <h5 class="cps-reviewer-name">Tom Z.Graze</h5>
                        <p class="cps-reviewer-position">Founder &amp; CEO</p>
                        <p class="cps-reviewer-company">CodePassenger LLC</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
    
    @include('sub_views.getstarted')

</div>
@endsection
