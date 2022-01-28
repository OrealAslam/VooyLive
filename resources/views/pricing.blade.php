@extends('layouts.template')

<style type="text/css">
    .cps-pack-feature-list li ul{
        list-style: none;
        margin:0px;
        padding:0px;
    }
    .team-select-section span{
        position: relative;
        top:-5px;
        color:#000 !important;
        left: -4px;
    }
    .team-select-section .btn{
        margin:25px 0px 35px;
        padding: 0 11px !important;
    }
    .team-select-section .btn:hover{
        background: #EA2349 !important;
        color: #fff !important;
    }
    .btn.btn-primary, .btn.btn-primary:focus, .btn.btn-primary:visited, .btn.btn-primary:active, .btn.btn-primary:active:focus, .btn.btn-red:hover, .btn.btn-red:hover:focus, .btn.btn-red:hover:active, .btn.btn-red:hover:visited, .cps-banner.style-4, .cps-banner.style-14{
        border:1px solid #EA2349 !important;
    }
    #radioBtn .notActive{
        color: #3276b1;
        border:1px solid #EA2349;
        background-color: #fff;
    }
    .year-price{
        font-size:13px;
    }
    .logo-section{
        overflow:unset !important;
        padding-top:70px 0px !important;
    }
</style>

@section('content')
<!-- Page Header -->
<div class="page-header style-11">
    <div class="container">
        <h2 class="page-title">{{__('pricing.pricing')}}</h2>
        <ol class="breadcrumb">
            <li><a href="{{ Route('home') }}">{{__('pricing.home')}}</a></li>
            <li class="active">{{__('pricing.pricing')}}</li>
        </ol>
    </div>
</div>
<!-- Page Header End -->
 <div class="cps-main-wrap">
    @if(app('request')->input('q'))
    <div class="cps-section cps-section-padding cps-gray-bg">
        <div class="container">
            <div class="col-12 col-offset-2 text-center">
                <p style="font-size:2.0rem;"><i class="fa fa-check-circle" style="color:green;" aria-hidden="true"></i> {{__('pricing.para1')}} <strong>{{ app('request')->input('q') }}</strong></p>
                <a href="{{ url('/register') }}" class="btn btn-primary btn-square" style="background:#EA2349;color:#fff;font-size:2rem;">{{__('pricing.signUpToView')}}</a>
            </div>
        </div>
    </div>
    @endif

        <!-- Integrated With -->
    <!-- <div class="cps-section cps-section-padding cps-bottom-0 logo-section">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-xs-12">
                    <div class="cps-section-header text-center">
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
    </div> -->
    <!-- Integrated With End -->
    <!-- Pricing Table -->
    <div class="cps-section cps-section-padding cps-gray-bg" id="pricing">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-xs-12">
                    <div class="cps-section-header text-center">
                        <h3 class="cps-section-title">{!! getSettingValue('plan-title') !!}</h3>
                        <p class="cps-section-text">{!! getSettingValue('plan-sub-title') !!}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="cps-packages">
                    <div class="col-sm-3 col-xs-12">
                        <div class="cps-package style-2">
                            <div class="cps-package-header">
                                <h4 class="cps-pack-name">{{__('pricing.PayAsYouGo')}}</h4>
                            </div>
                            <div class="cps-package-body">
                                <ul class="cps-pack-feature-list">
                                    <li>{!! getSettingValue('plan-box-1-description') !!}</li>
                                </ul>
                                <p class="cps-pack-price">{!! getSettingValue('plan-box-1-price') !!}</p>
                                <p class="text-center">{{__('pricing.oneTimePayment')}}</p>
                            </div>
                            <div class="cps-pack-footer">
                                @if(Auth::check())
                                    <a class="btn btn-square" href="{{ route('create.plan') }}?plan=payasyougo">{{__('pricing.continue')}}</a>
                                @else
                                    <a class="btn btn-square" href="{{ url('register') }}">{{__('pricing.startNow')}}</a>
                                @endif
                                <p class="text-center" style="position:relative;top:20px;">{!! getSettingValue('plan-box-1-bottom-text') !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <div class="cps-package style-2">
                            <div class="cps-package-header">
                                <h4 class="cps-pack-name">{{__('pricing.monthlyPlan')}}</h4>
                            </div>
                            <div class="cps-package-body">
                                <ul class="cps-pack-feature-list">
                                    <li>{!! getSettingValue('plan-box-2-description') !!}</li>
                                </ul>
                                <p class="cps-pack-price">{!! getSettingValue('plan-box-2-price') !!}</p>
                                <p class="text-center">{{__('pricing.billedMonthly')}}</p>
                            </div>
                            <div class="cps-pack-footer">
                                @if(Auth::check())
                                    <a class="btn btn-square" href="{{ route('create.plan') }}?plan=monthly">{{__('pricing.continue')}}</a>
                                @else
                                    <a class="btn btn-square" href="{{ url('register') }}">{{__('pricing.startNow')}}</a>
                                @endif
                                <p class="text-center" style="position:relative;top:20px;">{!! getSettingValue('plan-box-2-bottom-text') !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <div class="cps-package style-2">
                            <div class="cps-package-header">
                                <h4 class="cps-pack-name">{{__('pricing.yearlyPlan')}}</h4>
                            </div>
                            <div class="cps-package-body">
                                <ul class="cps-pack-feature-list">
                                    <li>{!! getSettingValue('plan-box-3-description') !!}</li>
                                </ul>
                                <p class="cps-pack-price">{!! getSettingValue('plan-box-3-price') !!}</p>
                                <p class="text-center">{{__('pricing.billedAnnually')}}</p>
                            </div>
                            <div class="cps-pack-footer">
                                @if(Auth::check())
                                    <a class="btn btn-square" href="{{ route('create.plan') }}?plan=yearly">{{__('pricing.continue')}}</a>
                                @else
                                    <a class="btn btn-square" href="{{ url('register') }}">{{__('pricing.startNow')}}</a>
                                @endif
                                <p class="text-center" style="position:relative;top:20px;">{!! getSettingValue('plan-box-3-bottom-text') !!}</p>
                            </div>
                        </div>
                    </div>
                     <div class="col-sm-3 col-xs-12">
                        <div class="cps-package style-2">
                            <div class="cps-package-header">
                                <h4 class="cps-pack-name">{{__('pricing.teamPlan')}}</h4>
                            </div>
                            <div class="cps-package-body">
                                <ul class="cps-pack-feature-list">
                                    <li>{!! getSettingValue('plan-box-4-description') !!}</li>
                                </ul>
                                <p class="cps-pack-price">
                                    $<span class="team-price">15</span>.00/MTH
                                </p>
                                @foreach(getPlanList() as $key=>$value)
                                    @if($loop->first)
                                        @php
                                            $planId = $value->planId;
                                        @endphp
                                        <p class="text-center year-price">{{__('pricing.perUserBilledAnnually')}} ($<span class="year-price-total">{{ $value->amount  }}</span>.00)</p>
                                    @endif
                                @endforeach
                                <p class="text-center">{{__('pricing.chooseYourTeamSize')}}</p>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 team-select-section">
                                    <div class="input-group">
                                        <span>Up to : </span>
                                        <div id="radioBtn" class="btn-group">
                                            @foreach(getPlanList() as $key=>$value)
                                                <a class="btn btn-primary btn-sm {{ $key == 0 ? 'active' :'notActive' }}" data-plan-name="{{ $value->planId }}" value="{{ $value->amount }}" data-plan="{{ $value->planId }}" data-toggle="fun" data-title="Y">{{ $value->team_member }}</a>
                                            @endforeach
                                        </div>
                                        <input type="hidden" name="fun" id="fun">
                                    </div>
                                </div>
                            </div>
                            <div class="cps-pack-footer">
                                @if(Auth::check())
                                    @if(Auth::user()->plan == '')
                                        <a class="btn btn-square" href="{{ route('create.plan') }}?plan={{ $planId }}">{{__('pricing.continue')}}</a>
                                    @else
                                        <a class="btn btn-square" href="{{ route('create.plan') }}?plan={{ nextPlanTeamId($planId) }}">{{__('pricing.continue')}}</a>
                                    @endif
                                @else
                                    <a class="btn btn-square plan-team-section" href="{{ url('register') }}">{{__('pricing.startNow')}}</a>
                                @endif
                                <p class="text-center" style="position:relative;top:20px;">{!! getSettingValue('plan-box-4-bottom-text') !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pricing Table End -->
    
    @include('sub_views.getstarted')

</div>

@section('footer_script')
<script type="text/javascript">
    $('#radioBtn a').on('click', function(){
        var value = $(this).attr('value');
        var planName = $(this).attr('data-plan-name');
        var sel = $(this).data('title');
        var tog = $(this).data('toggle');
        var plan = $(this).data('plan');
        $('#'+tog).prop('value', sel);
        $('.team-price').text(''); 
        $('.team-price').append(value / 12);
        $('.year-price-total').text('');
        $('.year-price-total').append(value);
        $('.plan-team-section').attr('href','create-plan?plan='+planName);
        $('#radioBtn a').removeClass('active').addClass('notActive');
        $(this).removeClass('notActive').addClass('active');
    })
</script>
@endsection

@endsection