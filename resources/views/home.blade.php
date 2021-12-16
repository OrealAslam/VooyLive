@extends('layouts.template')

@section('customStyle')
    <style type="text/css">
        .cps-testimonial-item blockquote:before{
            content: "\e643" !important;
            font-family: 'themify' !important;
            font-size: 4.8rem !important;
            line-height: 1 !important;
            display: block !important;
            font-style: normal !important;
            margin-bottom: 10px !important;
            color:white !important;
            -webkit-text-fill-color:unset !important;
        }
        .cps-banner-item-1 {
          background-image: url('{{ asset('/upload/productImageSetting/' . getSettingValue('home-slider-image')) }}');
          margin-top:80px;
          /*height:100% !important;*/
          width:100% !important;
        }
    </style>
@endsection

@section('content')
<!-- Banner -->

<div class="cps-banner style-15" id="banner">
    <div class="cps-banner-slider owl-carousel" id="cps-banner-slider">
        <div class="cps-banner-item cps-banner-item-1">
            <div class="cps-banner-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="cps-banner-subtitle">{!! getSettingValue('line-1') !!}</h3>
                            <h1 class="cps-banner-title"><span>{!! getSettingValue('line-2') !!}</span></h1>
                            <p class="cps-banner-text">{!! getSettingValue('line-3') !!}</p>
                            <div class="cps-button-group">
                                <a class="btn btn-primary btn-square" href="{!! getSettingValue('btn-link') !!}">{!! getSettingValue('btn-text') !!}</a>
                                <!-- <a class="btn btn-primary btn-square play-video" href="https://www.youtube.com/watch?v=SKxvdMEGKfE"><i class="fa fa-play"></i>Watch Video</a> -->
                                <p class="cps-banner-btn-blow-text mv-center">{!! getSettingValue('btn-blow-text') !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="cps-banner-item cps-banner-item-2">
            <div class="cps-banner-content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <h3 class="cps-banner-subtitle">Quality Real Estate Feature Sheets<br>For Your Home Viewings and<br>Opening Houses.</h3>
                            <h1 class="cps-banner-title"><span>INTRODUCING THE PROPERTY FEATURE<br>SHEET!</span></h1>
                            <p class="cps-banner-text">Any REALTOR&reg; Anywhere Can Customize In Minutes!<br>No Technical Skills Required<br>Easy To Share, Print or Email To Home Buyers</p>
                            <p class="cps-banner-text">Save Time and Money! Try our Property Feature Sheet Today</p>
                            <div class="cps-button-group">
                                <a class="btn btn-primary btn-square" href="{{ url('/pricing') }}">Try Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cps-banner-item cps-banner-item-3">
            <div class="cps-banner-content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <h3 class="cps-banner-subtitle">Use High Impact Infographics<br>customized your next listing<br>in minutes!</h3>
                            <h1 class="cps-banner-title"><span>INTRODUCING THE HOUSE DETAILS<br>INFOGRAPHIC</span></h1>
                            <p class="cps-banner-text">This is a quick and easy way to start posting your listings online.</p>
                            <p class="cps-banner-text">Get more eyes on your property and on you!</p>
                            <div class="cps-button-group">
                                <a class="btn btn-primary btn-square" href="{{ url('/pricing') }}">Try Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</div>

<div class="cps-main-wrap">
    <!-- Product -->
        <!-- @if(!empty($product))
            <div class="cps-section cps-section-padding cps-bottom-0 product-section">
                <div class="container">
                    <div class="row row-centered">
                        @foreach($product as $key=>$value)
                            <div class="col-md-3 col-centered">
                                <div class="product-home-part">
                                    <a href="{{ route('order.detail',$value->id) }}">
                                        <div class="row">
                                            <div class="col-md-12 product-home-part-img">
                                                <img src="{{ asset('upload/product/'.$value->image) }}">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>    
        @endif -->
    <!-- Product -->

    <!-- Integrated With -->
    <div class="cps-section cps-section-padding home-logo-section cps-bottom-0">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-xs-12">
                    <div class="cps-section-header text-center">
                        <!-- <h3 class="cps-section-title"><span class="cps-theme-color">Trusted</span> by teams, used by companies</h3> -->
                        <h3 class="cps-section-title">{{ getSettingValue('logo-title-text') }}</h3>
                        <p class="cps-section-text">{{ getSettingValue('logo-sub-title-text') }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="integrated-with-wrap style-2">
                        @if(!empty(getLogoList()))
                            @foreach(getLogoList() as $key => $value)
                                <a href="#" class="integrated-with sutton">
                                    <img src="{{ asset('upload/logo/'.$value->name) }}" class="img-responsive">
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Integrated With End -->

    <!-- Testimonial -->
    <div class="cps-section cps-gray-bg cps-testimonial style-3 home-cps-testimonial-item-section">
        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-md-12">
                    <h3 class="title">Products</h3>
                </div>
            </div>
            <div class="row row-centered">
                <div class="col-xs-12 testimonial-box col-centered">
                    <div class="home-cps-testimonial-item">
                        <p>Community Feature Sheet®</p>
                        <a href="" data-toggle="modal" data-target="#community-feature-sheet">
                            <img src="{{ asset('upload/productImageSetting/'.getSettingValue('community-feature-sheet-image')) }}">
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 testimonial-box col-centered">
                    <div class="home-cps-testimonial-item">
                        <p>Property Feature Sheet</p>
                        <a href="" data-toggle="modal" data-target="#property-feature-sheet">
                            <img src="{{ asset('upload/productImageSetting/'.getSettingValue('property-featuresheets-image')) }}">
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 testimonial-box col-centered">
                    <div class="home-cps-testimonial-item">
                        <p>Home Detail Infographic</p>
                        <a href="" data-toggle="modal" data-target="#home-details-infographic">
                            <img src="{{ asset('upload/productImageSetting/'.getSettingValue('home-details-infographic-image')) }}">
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 testimonial-box col-centered">
                    <div class="home-cps-testimonial-item">
                        <p>REALTORS® Market Sentiment Survey</p>
                        <a href="" data-toggle="modal" data-target="#market-sentiment-survey">
                            <img src="{{ asset('upload/productImageSetting/'.getSettingValue('market-sentiment-survey-image')) }}">
                        </a>
                    </div>
                </div>
                <!-- <div class="col-xs-12 testimonial-box col-centered">
                    <div class="home-cps-testimonial-item coming-soon">
                        <p>Coming Soon...</p>
                    </div>
                </div>
                <div class="col-xs-12 testimonial-box col-centered">
                    <div class="home-cps-testimonial-item coming-soon">
                        <p>Coming Soon...</p>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

    <div class="cps-section cps-testimonial style-3 home-cps-testimonial-item-section how-it-works-section">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <h3 class="title how-it-work">How It Works</h3>
                </div>
            </div>
            <div class="row mt-10 how-it-works-section-box">
                <div class="col-md-3 mt-10">
                    <ol class="timeline">
                        <li> <p>{!! getSettingValue('how-it-work-line-1') !!}</p> </li>
                        <li> <p>{!! getSettingValue('how-it-work-line-2') !!}</p> </li>
                        <li> <p>{!! getSettingValue('how-it-work-line-3') !!}</p> </li>
                    </ol>
                </div>
                <div class="col-md-3">
                    <div class="how-it-works-2 how-it-works-pare-box">
                        <div class="cps-service-box style-7 timeline-1-user">
                            <div class="cps-service-icon">
                                <span><img src="/img/how-it-works/sign-up.png" height="64px"></span>
                            </div>
                          <h4 class="cps-service-title">Sign Up</h4>
                        </div>
                        <div class="arrow"><i class="fa fa-arrow-right"></i></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="how-it-works-3 how-it-works-pare-box">
                        <div class="cps-service-box style-7">
                            <div class="cps-service-icon">
                                <span><img src="/img/how-it-works/update-profile.png" height="64px"></span>
                            </div>
                            <h4 class="cps-service-title">Update Profile</h4>
                        </div>
                        <div class="arrow update-profile-arrow"><i class="fa fa-arrow-right"></i></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="how-it-works-4 how-it-works-pare-box">
                        <div class="cps-service-box style-7">
                            <div class="cps-service-icon">
                                <span><img src="/img/how-it-works/print-report.png" height="64px"></span>
                            </div>
                          <h4 class="cps-service-title">Print Report</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonial start -->
    <div class="cps-section cps-testimonial style-3 home-cps-testimonial-item-section testimonial-part">
        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-md-12">
                    <!-- <h3 class="title how-it-work">Testimonials Slider </h3> -->
                </div>
            </div>
            <!-- Testimonial -->
            <div class="cps-section testimonial-part cps-image-bg-2 parallax" id="cps-testimonial" data-stellar-background-ratio="0.5">
                <div class="container">
                    <div class="cps-testimonials-wrap">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="owl-carousel testimonial-carousel" id="testimonial-carousel">
                                    @if(!empty(getTestimonialList()))
                                        @foreach(getTestimonialList() as $key=>$value)
                                            <div class="cps-testimonial-item">
                                                <blockquote>{{ $value->description }}</blockquote>
                                                <h5 class="cps-reviewer-name">{{ $value->name }}</h5>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <a href="{{ URL('testimonials') }}" class="btn btn-primary" style="background:#fff;color:#EA2349;margin-top:20px;">Show More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Testimonial End -->
        </div>
    </div>
    <!-- Testimonial end -->

    <!-- Header Quote -->
    <!-- <div class="cps-section cps-gray-bg cps-head-quote-section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-right">
                    <div class="cps-head-quote">
                        <p class="cps-headquote-text">
                            "This is such a fantastic addition to the marketing side of my business - Love the feature sheet!"
                        </p>
                        <p class="cps-headquote-by"><span class="cps-headquote-name">Tracy Moore</span> - <span class="cps-headquote-profession">RE/MAX Jazz Inc</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    
    @include('sub_views.getstarted')

    <!-- Subscription -->
    <div class="cps-section cps-section-padding cps-theme-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="cps-section-header text-center">
                        <h3 class="cps-section-title">STAY INFORMED</h3>
                        <p class="cps-section-text">Subscribe to receive exclusive content, offers, and notifications.</p>
                    </div>
                </div>
            </div>
            <div class="row row-centered">
                <div class="col-md-5 col-centered">
                    <div class="row">
                        <div class="col-md-8">
                            <input type="text" name="email" placeholder="Enter your email here" id="email" required>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary subscribe-btn" id="butsave">Subscribe</button>
                        </div>
                    </div>
                    <div class="row text-left">
                        <div class="col-md-12 error" style="display:none;">
                            Email Is Required.
                        </div>
                        <div class="col-md-12 success" style="display:none;"> 
                            Your Email Send Successfully.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Subscription End -->

</div>
<!--
<div class="bs-video">
    <div id="myVideoModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Community Feature Sheet&reg;</h4>
                </div>
                <div class="modal-body">
                    <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/SKxvdMEGKfE?rel=0&amp;controls=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>     
-->

<!-- testimonial Model-->
<!-- Modal -->
<div class="modal fade" id="community-feature-sheet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog testimonial-model" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-12 text-center">
                    <h5 class="modal-title" id="exampleModalLabel1">Community Feature Sheet®</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <img src="{{ asset('upload/productImageSetting/'.getSettingValue('community-feature-sheet-image')) }}" class="img-responsive">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-12 text-center">
                    <a href="{{ url('/productdetail') }}" class="btn btn-primary">Product Detail</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="property-feature-sheet" tabindex="-3" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog testimonial-model" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-12 text-center">
                    <h5 class="modal-title" id="exampleModalLabel2">Property Feature Sheet</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <img src="{{ asset('upload/productImageSetting/'.getSettingValue('property-featuresheets-image')) }}" class="img-responsive">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-12 text-center">
                    <a href="{{ route('property.feature.sheets.detail') }}" class="btn btn-primary">Product Detail</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="home-details-infographic" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
    <div class="modal-dialog testimonial-model" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-12 text-center">
                    <h5 class="modal-title" id="exampleModalLabel3">Home Details Infographic</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <img src="{{ asset('upload/productImageSetting/'.getSettingValue('home-details-infographic-image')) }}" class="img-responsive">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-12 text-center">
                    <a href="{{ route('home.details.infographic.detail') }}" class="btn btn-primary">Product Detail</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="market-sentiment-survey" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
    <div class="modal-dialog testimonial-model" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-12 text-center">
                    <h5 class="modal-title" id="exampleModalLabel3">REALTORS® Market Sentiment Survey</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <img src="{{ asset('upload/productImageSetting/'.getSettingValue('market-sentiment-survey-image')) }}">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-12 text-center">
                    <a href="{{ route('survey-detail') }}" class="btn btn-primary">Product Detail</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="show-model-website-title" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
    <div class="modal-dialog testimonial-model show-model-website-title" role="document">
        <div class="modal-content" style="margin-top:-25px !important;">
            <div class="modal-body" style="padding:0px">
                <div class="row">
                        <button type="button" class="close home-popup-btn" data-dismiss="modal" style="font-size: 14px;background:#fff;padding: 2px 4px !important;opacity: unset;position: absolute;right:30px;top:10px;">
                            <span><i class="fa fa-close" style="color:#000"></i></span>
                        </button>
                    <div class="col-md-6 text-center popup-text-home-main" style="word-wrap: break-word;padding:10px 20px;">
                        <div class="popup-text-home">
                            <div class="col-md-12 text-center">
                                {!! getSettingValue('popup-text') !!}
                            </div>
                            <div class="col-md-12 text-center">
                                <p class="font-13" style="padding-top: 5px;margin: 0px;"><input type="checkbox" name="modal-check" class="modal-check"><span style="position: relative;left:5px;top:-2px;">Don't Show Me Again</span></p>
                                <a href="{!! getSettingValue('popup-home-model-btn-link') !!}" class="btn btn-primary">{!! getSettingValue('popup-home-model-btn-text') !!}</a>
                                <p class="font-13" style="margin-top:5px;">Are You New? <a href="{{ route('register') }}">Register</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <img src="{{ asset('upload/popupImage/'.getSettingValue('popup-image')) }}" style="width:100%;height:100%;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- testimonial Model-->

@endsection

@section('footer_script')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script type="text/javascript">
        // $(document).ready(function(){
        //     $('#show-model-website-title').modal('show');
        // });
    </script>

    <script type="text/javascript">
        $('#butsave').on('click', function(){
            var email = $('#email').val();
            $.ajax({
                url: "/subscribe-us",
                type: "POST",
                data: {_token:token,email:email},
                cache: false,
                success: function(data){
                    if(data.error){
                        $('.error').show();
                        $('.success').hide();
                    }else{
                        $('#email').val('');
                        $('.error').hide();
                        $('.success').show();
                    }
                }
            });
        });

        // cockie
        $(document).ready(function(){
            var my_cookie = $.cookie($('.modal-check').attr('name'));
            if (my_cookie && my_cookie == "true") {
                $(this).prop('checked', my_cookie);
            }
            else{
                $('#show-model-website-title').modal('show');
            }

            $(".modal-check").change(function() {
                $.cookie($(this).attr("name"), $(this).prop('checked'), {
                    path: '/',
                    expires: 1
                });
            });
        });
   

    </script>
@endsection