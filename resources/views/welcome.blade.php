@extends('layouts.template')
@section('content')
<!-- Banner -->
<div class="cps-banner style-15" id="banner">
    <div class="cps-banner-item cps-banner-item-15">
        <div class="cps-banner-content">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h3 class="cps-banner-subtitle">{{__('welcome.unlimitedSearches')}}</h3>
                        <h1 class="cps-banner-title"><span>{{__('welcome.getYour')}} COMMUNITY FEATURE SHEET&reg;<br>{{__('welcome.onDemand')}}</span></h1>
                        <p class="cps-banner-text">{{__('welcome.provideDepth')}} <br>{{__('welcome.importantNeighbourhoodInformation')}}</p>
                        <div class="cps-button-group">
                            <a class="btn btn-primary btn-square" href="{{ url('/pricing') }}">{{__('welcome.tryNow')}}</a>
                            <!-- <a class="btn btn-primary btn-square" href="#myVideoModal" data-toggle="modal"><i class="fa fa-play"></i>Watch Video</a> -->
                            <a class="btn btn-primary btn-square play-video" href="https://www.youtube.com/watch?v=SKxvdMEGKfE"><i class="fa fa-play"></i>{{__('welcome.watchVideo')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cps-banner-image hidden-sm hidden-xs">
            <div class="container text-right">
                <!-- <img class="img-responsive" src="img/banner/pic-1.png" alt="Banner Mock"> -->
                <img class="img-responsive" src="img/easy_to_read.png" alt="Banner Mock">
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
                        <p class="cps-headquote-text">
                            {{__('welcome.suchFantasticAddition')}}<br/>
                            <span>Tracy Moore</span> - RE/MAX Jazz Inc
                        </p>
                        <!--
                        <p class="cps-headquote-by"><span class="cps-headquote-name">Odiri Mike-Ifeta</span> - <span class="cps-headquote-profession">Product Leader @VOOY Marketing</span></p>
                    -->
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
                        <h3 class="cps-section-title"><span class="cps-theme-color">{{__('welcome.trusted')}}</span> {{__('welcome.usedByCompanies')}}</h3>
                        <p class="cps-section-text">{{__('welcome.overIndividual')}} Community Feature Sheet's'&reg;  &amp; {{__('welcome.createdFor')}} REALTORS® {{__('welcome.in')}} Canada {{__('welcome.and')}} USA</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="integrated-with-wrap style-2">
                        <a href="#" class="integrated-with">
                            <img src="img/client-logo/sutton_logo_black_with_white_background.jpg" alt="Sutton">
                        </a>
                        <a href="#" class="integrated-with">
                            <img src="img/client-logo/sotheby_logo.png" alt="Sotheby">
                        </a>
                        <a href="#" class="integrated-with">
                            <img src="img/client-logo/remax_.jpg" alt="REMAX">
                        </a>
                        <a href="#" class="integrated-with">
                            <img src="img/client-logo/keller_williams_color.jpg" alt="Keller Williams">
                        </a>
                        <a href="#" class="integrated-with">
                            <img src="img/client-logo/header-royal-lepage.png" alt="header royal lepage">
                        </a>
                        <a href="#" class="integrated-with">
                            <img src="img/client-logo/home_life_brokage.png" alt="Home life brokage">
                        </a>
                        <a href="#" class="integrated-with">
                            <img src="img/client-logo/c21in_town_realty.jpg" alt="C21In Town Realty">
                        </a>
                        <a href="#" class="integrated-with">
                            <img src="img/client-logo/coldwell_banker.png" alt="Coldwell Banker">
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
                        <h3 class="cps-section-title">{{__('welcome.completeNeighborhoodProfile')}}</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="connection-mock text-center">
                        <div class="connection-logoes">
                            <div class="connection-logo-item">
                                <img src="img/report-logos/school.png">
                                <span class="connection-name">{{__('welcome.schools')}}</span>
                            </div>
                            <div class="connection-logo-item">
                                <img src="img/report-logos/transit.png">
                                <span class="connection-name">{{__('welcome.transit')}}</span>
                            </div>
                            <div class="connection-logo-item">
                                <img src="img/report-logos/shops.png">
                                <span class="connection-name">{{__('welcome.shops')}}</span>
                            </div>
                            <div class="connection-logo-item">
                                <img src="img/report-logos/health.png">
                                <span class="connection-name">{{__('welcome.health')}}</span>
                            </div>
                        </div>
                        <div class="center-block logo-mock">
                            <div class="sm-logo center-block sm-logo-center-block"><img src="img/sm-logo.jpg" alt="site logo"></div>
                        </div>
                        <div class="connection-logoes">
                            <div class="connection-logo-item">
                                <img src="img/report-logos/parks.png">
                                <span class="connection-name">{{__('welcome.parks')}}</span>
                            </div>
                            <div class="connection-logo-item">
                                <img src="img/report-logos/cafe.png">
                                <span class="connection-name">{{__('welcome.cafes')}}</span>
                            </div>
                            <div class="connection-logo-item">
                                <img src="img/report-logos/liberary.png">
                                <span class="connection-name">{{__('welcome.libraries')}}</span>
                            </div>
                            <div class="connection-logo-item">
                                <img src="img/report-logos/demographics.png">
                                <span class="connection-name">{{__('welcome.demographics')}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Manage your customer end -->
    
    @include('sub_views.productdetail')

    @include('sub_views.getstarted')
    
    


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

@endsection