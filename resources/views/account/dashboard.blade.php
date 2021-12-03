@extends('layouts.template')
@section('content')
<style>
div.cps-testimonial-item {
    padding-top: 5px !important;
}
hr.black {
    border-color: #000000;
}
div.cps-testimonial-item:hover {
    opacity: 0.5;
}
.report-box{
    background:#fff;
    padding: 20px 30px 20px;
    color: #262626;
    border-radius: 3px;
    box-shadow: 0px 0px 10px 0px rgb(0 0 0 / 10%);
    position: relative;
    width: 360px;
    margin-left:-14px !important;
    margin-top:30px !important;
    font-style: inherit !important;
}
.report-box .cps-reviewer-name{
    font-style: inherit !important;
}
.cps-testimonial-item a img{
    width:100%;
    height:400px !important;
}

@media only screen and (max-width: 600px) {
    .report-box{
        margin-left:0px !important;
        /*margin:5px !important;*/
        width:100% !important;        
    }
}

</style>

<!-- Page Header -->
<div class="page-header style-11">
  <div class="container">
    <h2 class="page-title">Dashboard</h2>
    <ol class="breadcrumb">
        <li><a href="{{ Route('home') }}">Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
  </div>
</div>
<!-- Page Header End -->
<div class="cps-main-wrap">
    
    <!-- Testimonial -->
    <div class="cps-section cps-section-padding cps-gray-bg cps-testimonial style-3">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="cps-section-header text-center">
                        <h3 class="cps-section-title">Welcome to our Platform</h3>
                        <p class="cps-section-text">Get all your marketing products you will need for your open house and more created in minutes</p>
                    </div>

                    <div class="row dasboard-part-account-profile-link-part row-centered">
                        <div class="col-md-4 text-center col-centered">
                            <a href="{{ route('profileview') }}">
                                <div class="box">
                                    <p>Profile</p>
                                </div>
                            </a>
                        </div>
                        @if(Auth::User()->user_type != 2)
                        <div class="col-md-4 text-center col-centered">
                            <a href="{{ url('/account/manage') }}">
                                <div class="box">
                                    <p>Manage Account</p>
                                </div>
                            </a>
                        </div>
                        @endif
                    </div>

                    <h3 class="cps-section-title">Choose the product you want to create</h3>
                </div>
            </div>
            <div class="row">
                <div class="cps-testimonials-wrap">
                    <div class="owl-carousel testimonial-carousel" id="testimonial-carousel-2">
                        <div class="cps-testimonial-item">
                            <a href="{{Route('orderReport','communityFeatureSheet')}}">
                                <h5 class="cps-reviewer-name">Community Feature Sheet®</h5>
                                <hr class="black">
                                <br>
                                <img src="{{ asset('upload/productImageSetting/'.getSettingValue('community-feature-sheet-image')) }}" class="img-responsive">
                            </a>
                        </div>
                        <div class="cps-testimonial-item">
                            <a href="{{Route('orderReport','propertyFeatureSheet')}}">
                                <h5 class="cps-reviewer-name">Property Feature Sheet</h5>
                                <hr class="black">
                                <br>
                                <img src="{{ asset('upload/productImageSetting/'.getSettingValue('property-featuresheets-image')) }}" class="img-responsive">
                            </a>
                        </div>
                        <div class="cps-testimonial-item">
                            <a href="{{Route('orderReport','houseDetailsInfographic')}}">
                                <h5 class="cps-reviewer-name">Home Details Infographic</h5>
                                <hr class="black">
                                <br>
                                <img src="{{ asset('upload/productImageSetting/'.getSettingValue('home-details-infographic-image')) }}" class="img-responsive">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="cps-testimonial-item report-box">
                        <a href="{{ route('survey') }}">
                            <h5 class="cps-reviewer-name">Market Sentiment Survey</h5>
                            <hr class="black">
                            <br>
                            <img src="{{ asset('upload/productImageSetting/'.getSettingValue('market-sentiment-survey-image')) }}" class="img-responsive">
                        </a>
                    </div>
                </div>
            </div>
                   
        </div>
    </div>

</div>
@endsection

@section('footer_script')
@endsection