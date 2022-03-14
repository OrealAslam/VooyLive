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
          background-image: url('{{ env('AWS_URL').'/upload/productImageSetting/' . getSettingValue('home-slider-image') }}');
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
                            <div class="create_report_main account-form" style="margin-top:25px;">
                                <div class="col-12 form-group">
                                    <input type="text" class="form-control" placeholder="Enter your address and press go" id="myAddress" name="myAddress" style="margin-bottom:10px;height:46px;">
                                    <!-- <div class="col-sm-12 col-xs-12"> -->
                                        <button class="btn btn-primary btn-lg btn-block btn-square" style="background:#EA2349;color:#fff;font-size:2rem;" id="goTo">{{__('home.go')}}</button>
                                    <!-- </div> -->
                                    <!-- <span class="input-group-addon" style="cursor:pointer;background-color:#EA2349;color:#fff;font-size:24px;" id="goTo">{{__('home.go')}}</span> -->
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="text-center">
                                <div style="color:#000;font-size:24px;font-weight:500;line-height:24px;margin:15px 0;">or</div>
                                <a href="{{ url('/sample-report') }}" target="_blank" class="btn btn-primary btn-lg btn-block btn-square" style="background:#EA2349;color:#fff;font-size:2rem;">{{__('home.viewSample')}}</a>
                            </div>
                            
                            <!-- <div class="cps-button-group">
                                <a class="btn btn-primary btn-square" href="{!! getSettingValue('btn-link') !!}">{!! getSettingValue('btn-text') !!}</a> -->
                                <!-- <a class="btn btn-primary btn-square play-video" href="https://www.youtube.com/watch?v=SKxvdMEGKfE"><i class="fa fa-play"></i>{{__('home.watchVideo')}}</a> -->
                                <!-- <p class="cps-banner-btn-blow-text mv-center">{!! getSettingValue('btn-blow-text') !!}</p>
                            </div> -->
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
                            <h3 class="cps-banner-subtitle">{{__('home.para4_1')}}<br>{{__('home.para4_2')}}<br>{{__('home.para4_3')}}</h3>
                            <h1 class="cps-banner-title"><span>{{__('home.para4_4')}}<br>{{__('home.para4_5')}}</span></h1>
                            <p class="cps-banner-text">{{__('home.para4_6')}}<br>{{__('home.para4_7')}}<br>{{__('home.para4_8')}}</p>
                            <p class="cps-banner-text">{{__('home.para4_9')}}</p>
                            <div class="cps-button-group">
                                <a class="btn btn-primary btn-square" href="{{ url('/pricing') }}">{{__('home.tryNow')}}</a>
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
                            <h3 class="cps-banner-subtitle">{{__('home.para5_1')}}<br>{{__('home.para5_2')}}<br>{{__('home.para5_3')}}</h3>
                            <h1 class="cps-banner-title"><span>{{__('home.para5_4')}}<br>{{__('home.para5_5')}}</span></h1>
                            <p class="cps-banner-text">{{__('home.para5_6')}}</p>
                            <p class="cps-banner-text">{{__('home.para5_7')}}</p>
                            <div class="cps-button-group">
                                <a class="btn btn-primary btn-square" href="{{ url('/pricing') }}">{{__('home.tryNow')}}</a>
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
                        <!-- <h3 class="cps-section-title"><span class="cps-theme-color">{{__('home.trusted')}}</span>{{__('home.byTeamsUsedByCompanies')}}</h3> -->
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
                                    <img src="{{ env('AWS_URL').'upload/logo/'.$value->name }}" class="img-responsive">
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
    <!-- <div class="cps-section cps-gray-bg cps-testimonial style-3 home-cps-testimonial-item-section">
        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-md-12">
                    <h3 class="title">{{__('home.products')}}</h3>
                </div>
            </div>
            <div class="row row-centered">
                <div class="col-xs-12 testimonial-box col-centered">
                    <div class="home-cps-testimonial-item">
                        <p>{{__('home.communityfeaturesheet')}}</p>
                        <a href="" data-toggle="modal" data-target="#community-feature-sheet">
                            <img src="{{ asset('upload/productImageSetting/'.getSettingValue('community-feature-sheet-image')) }}">
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 testimonial-box col-centered">
                    <div class="home-cps-testimonial-item">
                        <p>{{__('home.propertyfeaturesheet')}}</p>
                        <a href="" data-toggle="modal" data-target="#property-feature-sheet">
                            <img src="{{ asset('upload/productImageSetting/'.getSettingValue('property-featuresheets-image')) }}">
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 testimonial-box col-centered">
                    <div class="home-cps-testimonial-item">
                        <p>{{__('home.homedetailinfographic')}}</p>
                        <a href="" data-toggle="modal" data-target="#home-details-infographic">
                            <img src="{{ asset('upload/productImageSetting/'.getSettingValue('home-details-infographic-image')) }}">
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 testimonial-box col-centered">
                    <div class="home-cps-testimonial-item">
                        <p>{{__('home.REALTORSmarketsentimentsurvey')}}</p>
                        <a href="" data-toggle="modal" data-target="#market-sentiment-survey">
                            <img src="{{ asset('upload/productImageSetting/'.getSettingValue('market-sentiment-survey-image')) }}">
                        </a>
                    </div>
                </div> -->
                <!-- <div class="col-xs-12 testimonial-box col-centered">
                    <div class="home-cps-testimonial-item coming-soon">
                        <p>{{__('home.comingSoon')}}</p>
                    </div>
                </div>
                <div class="col-xs-12 testimonial-box col-centered">
                    <div class="home-cps-testimonial-item coming-soon">
                        <p>{{__('home.comingSoon')}}</p>
                    </div>
                </div> -->
            <!-- </div>
        </div>
    </div> -->

    <div class="cps-section cps-testimonial style-3 home-cps-testimonial-item-section how-it-works-section">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <h3 class="title how-it-work">{{__('home.howitworks')}}</h3>
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
                                <span><img src="env('AWS_URL').img/how-it-works/sign-up.png" height="64px"></span>
                            </div>
                          <h4 class="cps-service-title">{{__('home.signup')}}</h4>
                        </div>
                        <div class="arrow"><i class="fa fa-arrow-right"></i></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="how-it-works-3 how-it-works-pare-box">
                        <div class="cps-service-box style-7">
                            <div class="cps-service-icon">
                                <span><img src="env('AWS_URL').img/how-it-works/update-profile.png" height="64px"></span>
                            </div>
                            <h4 class="cps-service-title">{{__('home.updateprofile')}}</h4>
                        </div>
                        <div class="arrow update-profile-arrow"><i class="fa fa-arrow-right"></i></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="how-it-works-4 how-it-works-pare-box">
                        <div class="cps-service-box style-7">
                            <div class="cps-service-icon">
                                <span><img src="env('AWS_URL').img/how-it-works/print-report.png" height="64px"></span>
                            </div>
                          <h4 class="cps-service-title">{{__('home.printreport')}}</h4>
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
                    <!-- <h3 class="title how-it-work">{{__('home.testimonialsSlider')}} </h3> -->
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
                                <a href="{{ URL('testimonials') }}" class="btn btn-primary" style="background:#fff;color:#EA2349;margin-top:20px;">{{__('home.showMore')}}</a>
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
                            {{__('home.para6')}}
                        </p>
                        <p class="cps-headquote-by"><span class="cps-headquote-name">{{__('home.tracyMoore')}}</span> - <span class="cps-headquote-profession">{{__('home.RE/MAX')}}</span></p>
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
                        <h3 class="cps-section-title">{{__('home.STAYINFORMED')}}</h3>
                        <p class="cps-section-text">{{__('home.para1')}}</p>
                    </div>
                </div>
            </div>
            <div class="row row-centered">
                <div class="col-md-5 col-centered">
                    <div class="row">
                        <div class="col-md-8">
                            <input type="text" name="email" placeholder="{{__('home.enterEmail')}}" id="email" required>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary subscribe-btn" id="butsave">{{__('home.subscribe')}}</button>
                        </div>
                    </div>
                    <div class="row text-left">
                        <div class="col-md-12 error" style="display:none;">
                            {{__('home.emailisrequired')}}
                        </div>
                        <div class="col-md-12 success" style="display:none;"> 
                            {{__('home.para2')}}
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
                    <h4 class="modal-title">{{__('home.communityfeaturesheet')}}</h4>
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
                    <h5 class="modal-title" id="exampleModalLabel1">{{__('home.communityfeaturesheet')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <img src="{{ env('AWS_URL').'upload/productImageSetting/'.getSettingValue('community-feature-sheet-image') }}" class="img-responsive">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-12 text-center">
                    <a href="{{ url('/productdetail') }}" class="btn btn-primary">{{__('home.productdetail')}}</a>
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
                    <h5 class="modal-title" id="exampleModalLabel2">{{__('home.propertyfeaturesheet')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <img src="{{ env('AWS_URL').'upload/productImageSetting/'.getSettingValue('property-featuresheets-image') }}" class="img-responsive">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-12 text-center">
                    <a href="{{ route('property.feature.sheets.detail') }}" class="btn btn-primary">{{__('home.productdetail')}}</a>
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
                    <h5 class="modal-title" id="exampleModalLabel3">{{__('home.homedetailinfographic')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <img src="{{ env('AWS_URL').'upload/productImageSetting/'.getSettingValue('home-details-infographic-image') }}" class="img-responsive">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-12 text-center">
                    <a href="{{ route('home.details.infographic.detail') }}" class="btn btn-primary">{{__('home.productdetail')}}</a>
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
                    <h5 class="modal-title" id="exampleModalLabel3">{{__('home.REALTORSmarketsentimentsurvey')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <img src="{{ env('AWS_URL').'upload/productImageSetting/'.getSettingValue('market-sentiment-survey-image') }}">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-12 text-center">
                    <a href="{{ route('survey-detail') }}" class="btn btn-primary">{{__('home.productdetail')}}</a>
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
                                <p class="font-13" style="padding-top: 5px;margin: 0px;"><input type="checkbox" name="modal-check" class="modal-check"><span style="position: relative;left:5px;top:-2px;">{{__('home.para3')}}</span></p>
                                <a href="{!! getSettingValue('popup-home-model-btn-link') !!}" class="btn btn-primary">{!! getSettingValue('popup-home-model-btn-text') !!}</a>
                                <p class="font-13" style="margin-top:5px;">{{__('home.areyounew')}} <a href="{{ route('register') }}">{{__('home.register')}}</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <img src="{{ env('AWS_URL').'upload/popupImage/'.getSettingValue('popup-image') }}" style="width:100%;height:100%;">
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
    <script type="text/javascript">
        var searchInput = 'myAddress';
        
        $(document).ready(function () {
            var autocomplete;
            autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
                componentRestrictions: { country: "CA" },
                types: ['geocode']
            
            });
        
            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                var near_place = autocomplete.getPlace();
            });
        });
    </script>
    <script type="text/javascript">
        $('#goTo').on('click',function(){
            var address = $('#myAddress').val();
            $.ajax({
                'url' : "{{ url('/pricing') }}",
                'type' : 'GET',
                data: {'address': address},
                success: function(){
                    window.location = "{{ url('/pricing') }}?q="+address;
                }
            });
        });
    </script>
@endsection