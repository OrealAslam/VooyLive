@extends('layouts.template')
@section('content')
<title>
    {{ $monthName }} {{ $weekStartDate }} - {{ $weekEndDate }}, {{ date('Y') }}
</title>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<link href="/css/metroReport/style.css" rel="stylesheet" type="text/css">
<link href="/css/metroReport/print.css" rel="stylesheet" media="print" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet'  type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,600,700,800,900" rel="stylesheet" type='text/css'>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script async src="https://static.addtoany.com/menu/page.js"></script>

<style type="text/css">
    .report-footer2 .order-visit{
        padding-top:0px !important;
    }
    .footer-user-name::before,.footer-user-title::before,.footer-user-email::before,.footer-user-phone::before{
        font-family: "Font Awesome 5 Free";
        content: "\f007";
        display: inline-block;
        padding-right: 3px;
        vertical-align: middle;
        font-weight: 900;
        color:{{ $user->ClientDetail->colorb }} !important;
    }
    .footer-user-title::before{
        content: "\f559" !important;
    }
    .footer-user-email::before{
        content: "\f0e0" !important;
    }
    .footer-user-phone::before{
        content: "\f095" !important;
    }
    .q1-box1-img1 img{
        height: 85px !important;
        width: 90px !important;
    }
    .head-logo{
        max-width:45%;
        top: 35px;
        left: 70px;
        position: relative;
    }
    .question-part-2{
        margin-top:140px !important;
    }
    .head-left-tringle{
        position: absolute !important;
        top: -10px;
        left: 0px;
        width: 122% !important;
        height: 487px !important;
        clip-path: polygon(48% 0, 145% 13%, 0 55%, 0 0) !important;
        background: {{ $user->ClientDetail->colore }} !important;
    }
    .head-title-left img{
        border:unset !important;
        position: relative !important;
    }
    .city-text-head{
        font-size:50px;
        font-weight: bold;
    }
    .head-right-tringle{
        position: absolute !important;
        top: -10px;
        left: -170px;
        width: 122% !important;
        height: 320px !important;
        clip-path: polygon(0 0, 100% 0, 100% 85%, 67% 98%) !important;
        background: {{ $user->ClientDetail->colora }} !important;
    }
    .report-footer2 .client-detail {
        font-size:17px;
        padding-top:0px;
        word-break: break-all;
    }
    .header-title p{
        color:#fff;
        margin:0px;
        line-height:80px;
        position: relative;
        padding-right:30px !important;
    }
    .more-info{
        position: relative;
        top: -10px;
        font-size:20px !important;
    }
    .footer-left-triangle{
        position: absolute;
        width: 0;
        left: -15px;
        top: -135px;
        height: 0;
        border-top: 77px solid transparent;
        border-bottom: 60px solid transparent;
        border-left: 154px solid {{ $user->ClientDetail->colore }} !important;
    }
    .footer-right-triangle{
        position: absolute;
        width: 0;
        top: -81px;
        left: -13px;
        height: 0;
        border-left: 212px solid transparent;
        border-right: 73px solid transparent;
        border-bottom: 82px solid {{ $user->ClientDetail->colorc }} !important;
    }
    .report-footer2{
        position: relative;
        margin-top: 45px;
    }
    .footer-top-text p{
        font-size:18px;
        color:#000 !important;
        padding-left:150px;
        position: relative;
        top: 30px;
    }
    .client-photo img{
        margin-bottom:7px;
    }
    .client-photo img ,.client-logo img{
        max-width: 80% !important;
        border:1px solid #fff;
    }
    .q-2-box{
        padding:50px 0px 0px 0px;
    }
    .q-2-box h3{
        padding-top:25px;
    }
    .right-dooted-line{
        border-left:2px dashed #000;
        height:100%;
        position: absolute;
    }
    .triangle-bottomleft{
        top: 0px;
        right: -45px;
        width: 0;
        height: 0;
        position: absolute;
        border-right: 45px solid transparent;
        border-bottom: 72px solid  {{ $user->ClientDetail->colore }};
    }
    .question-title-img{
        left:7px;
        position: relative;
        height:60px;
        width:60px;
        margin-left:10px;
    }
    .question-box-hedding{
        position: relative;
        display: inline-block;
    }
    .notification-text p{
        font-size:25px;
        position: relative;
        font-weight:bold;
        top: 30px;
        left: -5px;
    }
    .notification-text-2 p{
        font-size: 13px !important;
        line-height: 15px;
        font-weight: bold;
        position: relative;
        top: 30px;
        left: -5px;
    }
    .question1-icon-right img{
        right: -50px !important;
        left: inherit !important;
    }
    .question1-icon img{
        border:2px solid #000;
        position: absolute;
        width: 110px;
        height: 110px;
        top: 8px;
        left: -102px;
        background: #FFF;
        border-radius: 32%;
        padding: 18px
    }
	.question-sub-title{
		margin-top:15px;
		color:#e24b4b;
		font-size:35px;
		font-weight:bold;
		margin-bottom:-40px;
	}
	.question-part-2{
		margin-top:20px;
		margin-bottom:-35px;	
	}
	.question-part-3{
		margin-top:5px;
		margin-bottom:-50px;
	}
	.neighbourhood-name p{
		padding:5px;
		position: relative;
		top: 10px;
		display: inline;
		border-bottom:3px solid #000;
	}
	.head-main-title{
		color:#fff;
		background:{{ $user->ClientDetail->colora }} !important;
	}
	.header-title{
        position: relative;
		text-align: center;
		font-size:40px;
	}
	.header-title span{
		position: relative;
		left: -30px;
        color:#8CDA3F;
        font-weight: bold;
	}
	#features{
		margin-top:30px;
		background:#F8F8F8;
	}
	.footer-body{
		background:#EA2448;
		padding-bottom:20px;
		color:#fff !important;
	}
	.question-1{
		font-size:30px !important;
		padding:5px 20px;
		color:#fff;
		margin-left: -15px;
		background: #EA2448;
		line-height:60px !important;
	}
	.question-box{
		margin:30px 0px 0px 0px;
	}
	.question-box h3 span{
		font-size:30px;
		font-family: Raleway !important;
	}
	.question-box h3{
		font-size:50px;
		font-family: Raleway !important;
		margin:0px;
		font-weight:bold;
	}
	.question-box p{
		margin-top:5px;
		font-size:30px;
        line-height:35px;
		font-weight:bold;
        font-style: italic;
	}
	.img-icon-section{
		height:80px;
        width: 90px;
		top:-4px;
		left:3px; 
		position: relative;
	}
	.right-side-box{
		margin-right:-15px;
	}
    .last-qu-box-sub{
      	margin:10px 0px 70px 0px;
    }
    span img{
      	margin-top:30px;
    }
    @media print{
        .report-footer2 .client-detail{
            margin-top:-12px;
        }
        .footer-user-name::before,.footer-user-title::before,.footer-user-email::before,.footer-user-phone::before{
            font-family: "Font Awesome 5 Free";
            content: "\f007";
            display: inline-block;
            padding-right: 3px;
            vertical-align: middle;
            font-weight: 900;
            color:{{ $user->ClientDetail->colorb }} !important;
        }
        .footer-user-title::before{
            content: "\f559" !important;
        }
        .footer-user-email::before{
            content: "\f0e0" !important;
        }
        .footer-user-phone::before{
            content: "\f095" !important;
        }
        .footer-top-text p{
            padding-left:250px;
        }
        .head-logo{
            max-width:50%;
            top:15px !important;
            left:30px !important;
        }
        .head-left-tringle{
            top: -10px;
            left: 0px;
            height: 487px !important;
            clip-path: polygon(48% 0, 90% 13%, 0 40%, 0 0) !important;
        }
        .right-dooted-line{
            position: absolute !important;
            left:-5px;
        }
        .question-part-3{
            margin-top:-25px !important;
        }
        .q-2-box{
            padding:20px 0px 0px 0px !important;
        }
        .q-2-box h3{
            padding-top:5px !important;
        }
        .question-box{
            margin:0px;
        }
        .triangle-bottomleft{
            top:-1px;
            right: -43px;
            width: 0;
            height: 0;
            position: absolute;
            border-right:44px solid transparent;
            border-bottom:41px solid  {{ $user->ClientDetail->colore }};
        }
        .question-1{
            font-size:23px !important;
        }
        .question-title-img{
            position: relative !important;
            left:-5px !important;
            width:30px !important;
            height: 30px !important;
        }
        .month-date-text-head{
            margin-top:-20px !important;
            font-size:25px !important;
        }
        .city-text-head{
            margin-top:-40px !important;
            font-size:40px;
        }
        .head-right-tringle{
            top: -45px;
            left: -110px;
            height:250px !important;
        }
        .question1-icon img{
            top:-3px !important;
            left: -110px;
        }
        .question1-icon-right img{
            right: -95px !important;
            left: unset !important;
        }
    	.img-icon-section{
            margin-top:-10px !important;
			height:45px !important;
			width:53px !important;
		}
		.question-box p img{
			height:55px !important;
			width:55px !important;	
		}
    	.neighbourhood-name p{
    		font-size:50px !important;
    		margin-top:30px !important;
            position: relative !important;
            top: 25px !important;
		}
    	.question-part-2{
			margin-top:60px !important;
			margin-bottom:25px !important;	
		}
		.question-part-3{
			margin-bottom:-15px !important;
		}
    	.question-sub-title p{
			margin-top:-5px !important;
			color:#e24b4b !important;
			font-size:35px !important;
			margin-bottom:20px !important;
			font-weight:bold !important;
		}
    	#features{
			margin-top:30px;
			background:#F7EBEB !important;
		}
    	.question-1{
    		font-weight:bold !important;
    		padding:5px 0px 5px 10px !important;
    		color:#fff !important;
			background: #EA2448 !important;
		}
		.head-main-title span{
			font-size:70px !important;
			color:white !important;
		}
    	.header-title span{
			position: relative;
            right:20px;
            top: -30px !important;
            font-size:28px !important;
		}
	    .box-title .colora{
	    	font-weight:600 !important;
	      	line-height:5px !important;	
	    }
      	.question-box h3{
            margin-top:-20px !important;
      		font-size:50px !important;
      	}
      	.question-box h3 span{
      		font-size:30px !important;	
      	}
      	.question-box p{
            letter-spacing:3px;
            line-height:20px;
      		font-size:14px !important;	
      	}
      	span img{
      		margin-top:10px !important;
      		height:45px !important;
      		width:45px !important;
      	}
		.question-box p img{
			height:25px !important;
      		width:25px !important;	
		}
		.footer-body{
			background:#EA2448 !important;
			color:#fff !important;
		}
		.footer-body .colora{
			color:#fff !important;	
		}
		.footer-body .client-detail{
            word-break: break-all !important;
			color:#fff !important;	
            font-size:15px !important;
            line-height:20px !important;
            padding-top:15px;
		}
        .footer-body .client-detail i{
            display:none;
        }
        .footer-body .order-visit{
            font-size:15px !important;  
        }
		.footer-body .order-visit a strong{
			color:#fff !important;
            font-size:15px !important; 	
		}
		.footer-body .disclaimer p{
			color:#fff !important;	
            font-size:12px !important;
            line-height:17px !important;
		}
        .more-info{
            font-size:15px !important;
            margin-bottom:10px !important;
        }
        .notification-text p{
            position: relative !important;
            top:-25px !important;
            letter-spacing:2px !important;
            font-size:17px !important;
        }
        .notification-text-2 p{
            position: relative !important;
            top:-60px !important;
            font-weight: bold;
            letter-spacing:1px !important;
            font-size:13px !important;
        }
        .q1-box1-img1 img{
            height: 50px !important;
            width: 55px !important;
        }
        .cookie-bar{
            display: none !important;
        }
        .report-footer2 .order-visit{
            font-size: 15px !important;
        }
        .report-footer2{
            margin-top:70px !important;
        }
        .community-profile .left-side {
            margin-top:40px !important;
        }
        .footer-top-text p{
            position: relative !important;
            top:60px !important;
        }
        .footer-bottom-text{
            font-size:9px !important;
        }
    }	
    @media (max-width:480px){
        .notification-text p{
            font-size:17px;
            top: 45px;
            left: 0px;
        }
        .question1-icon img{
            width: 110px;
            height: 110px;
            top: 10px;
            left: -102px;
            border-radius: 32%;
            padding: 18px
            background-color: #FFF !important;
        }
        .question1-icon img{
            width: 50px !important;
            height: 50px !important;
            top: -12px !important;
            left: 25px !important;
            border-radius: 30% !important;
            padding: 8px !important;
        }
        .question1-icon-right img{
            top: -40px !important;
        }
        .header-title span{
            top: -130px !important;
            left: 0px;
            font-size:18px !important;
        }
        .addressText{
            font-size: 35px !important;
        }
        .neighbourhood-name p{
            font-size:17px !important;
        }
        .question-1 {
            width: 100% !important;
            font-size:18px !important;
            padding: 10px 15px; 
            line-height:30px !important;
            margin-left:0px !important;
        }
        .right-arrow{
            display: none !important;
        }
        .question-main-box:after{
            display: none !important;   
        }
        .question-box{
            margin:0px !important;
        }
        .question-box:first-child{
            margin:30px 0px 0px 0px !important;
        }
        .report-footer2 .more-info {
            font-size: 20px !important;
            text-align: center !important;
        }
        .report-footer2 .client-detail{
            text-align:center !important;
        }
        .report-footer2 .client-photo img{
            width:100% !important;
            margin:10px 0px !important;
            max-height:unset !important;
        }
        .report-footer2 .disclaimer{
            margin-top:10px;
            margin-bottom:10px;
            line-height: 16px;
        }
        .client-photo{
            text-align: -webkit-center !important;
            text-align: -moz-center !important;
        }
        .client-logo{
            text-align: -webkit-center !important;
            text-align: -moz-center !important;
        }
        .right-dooted-line{
            display: none;
        }
        .img-icon-section{
            margin:60px 0px 5px 0px;
        }
        .triangle-bottomleft{
            display: none;
        }
        .question-title-img{
            height: 22px;
            width: 22px;
        }
        .city-text-head {
            font-size: 40px;
        }
        .month-date-text-head{
            font-size:33px;   
        }
        .report-footer2{
            margin-top: 150px;
        }
        .footer-top-text p{
            padding:0px;
        }
        .report-footer2 .order-visit{
            font-size: 16px;
            margin-top:00px;
        }
        .more-info{
            top: -10px !important;
        }
        .q-2-box{
            padding: 10px 0px 0px 0px !important;
        }
        .head-right-tringle {
            position: absolute !important;
            top: -10px;
            left: -78px;
            width: 121% !important;
            height: 200px !important;
            clip-path: polygon(0 0, 100% 0, 100% 72%, 67% 98%) !important;
        }
        .head-left-tringle {
            position: absolute !important;
            top: -7px;
            left: 0px;
            width: 90% !important;
            height: 455px !important;
            clip-path: polygon(55% 0, 219% 3%, 0 60%, 0 0) !important;
        }
        .header-title p {
            top: -12px !important;
            padding-right: 20px !important;
        }
        .city-text-head{
            position: relative !important;
            top: 5px;
            font-size: 28px !important;
        }
        .month-date-text-head{
            font-size:20px;
            margin-top:-25px !important;
            top:-40px !important;
        }
        .head-logo {
            top: 80px;
            left: -70px;
        }
        .head-title-left img{
            height:80px;
            width:80px;
            left:70px !important;
            top:50px !important;
            position: absolute !important;
        }
        .header-title span {
            top: 0px !important;
            left: -20px;
            font-size: 18px !important;
        }
        .footer-right-triangle {
            top: -81px;
        }
        .community-profile .left-side {
            margin-top: 70px !important;
        }
        .q1-box1-img1 img{
            height: 70px !important;
            width: 83px !important;
        }
        .footer-bottom-text{
            text-align: center !important;
        }
    }
</style>

@section('content')
<!-- Page Header -->
<div class="page-header style-11">
  <div class="container">
    <h2 class="page-title">My Survey Show</h2>
    <ol class="breadcrumb">
      <li><a href="{{ Route('home') }}">Home</a></li>
      <li><a href="{{ Route('dashboard') }}">Dashboard</a></li>
      <li><a href="{{ Route('my.surveys') }}">Surveys</a></li>
      <li class="active">My Survey Show</li>
    </ol>
  </div>
</div>

<div class="container sharethiscontainer">
    <div class="row">
        <div class="col-xs-12">
            <!-- <div class="sharethis-inline-share-buttons"></div> -->
            <!-- AddToAny BEGIN -->
            <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                <a class="a2a_button_facebook"></a>
                <!-- <a class="a2a_button_twitter"></a> -->
                <a class="a2a_button_google_plus"></a>
                <a class="a2a_button_linkedin"></a>
                <a class="a2a_button_whatsapp"></a>
                <a class="a2a_button_print"></a>
            </div>
            <script>
                var a2a_config = a2a_config || {};
                a2a_config.onclick = 1;
                a2a_config.color_main = "D7E5ED";
                a2a_config.color_border = "AECADB";
                a2a_config.color_link_text = "333333";
                a2a_config.color_link_text_hover = "333333";
            </script>
            <!-- AddToAny END -->
        </div>
    </div>
</div>

<div class="container" id="features" style="background:#F7EBEB !important;">

    <div class="community-profile section font-raleway" id="community-profile">
        <div class="top-header section" id="top-header">
            <div class="row">
                <div class="col-md-4 col-sm-4 head-title-left">
                    <div class="head-left-tringle"></div>
                    <div class="client-logo head-logo">
                        @if(isset($user->ClientDetail->logo))
                            <img src="/{{ $user->ClientDetail->logo }}" class="img-responsive">
                        @else
                            <a href="{{ url('/account/profileview').'?img=logo' }}" title="Click Here to Upload Logo"> <img src="/img/your-logo.png" class="top-logo img-responsive" style="width: 145px;"></a>
                        @endif
                    </div>
                    <!-- <img src="{{url('img/VOOY.png')}}"   alt="{{ config('app.name', 'HoodQ') }}" class="img-responsive head-logo pull-right" height="70" /> -->
                </div>
                <div class="col-md-8 col-sm-8 header-title font-oswald text-right">
                    <div class="head-right-tringle" @if(isset($user->ClientDetail->colord)) style="background: {{$user->ClientDetail->colord}} !important" @endif></div>
                    <span @if(isset($user->ClientDetail->colore)) style="color: {{$user->ClientDetail->colore}} !important" @endif>REALTORS® Market Sentiment Report</span>
                    <p class="city-text-head" @if(isset($user->ClientDetail->colorb)) style="color: {{$user->ClientDetail->colorb}} !important" @endif>{{ $survey->canadian_city ?? '' }} Data</p>
                    <p class="month-date-text-head" @if(isset($user->ClientDetail->colorb)) style="color: {{$user->ClientDetail->colorb}} !important" @endif>{{ $monthName }} {{ $weekStartDate }} - {{ $weekEndDate }}, {{ date('Y') }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="community-profile section font-raleway" id="community-profile">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 box-title question-part-2">
                <div class="left-side colora question-1 question-box-hedding" @if(isset($user->ClientDetail->colore)) style="background: {{$user->ClientDetail->colore}} !important;color:{{$user->ClientDetail->colorb}} !important" @endif>
                    What REALTORS® are saying <img src="{{ asset('img/survey-qu-icon/_Group_.png') }}" class="question-title-img">
                    <div class="triangle-bottomleft"></div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 text-left notification-text">
                <p><i>Last week, there were...</i></p>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
            	<div class="row">
		            <div class="col-md-4 col-sm-4 question-box">
		            	<span class="q1-box1-img1"><img src="{{ asset('img/survey-qu-icon/buy-house.svg') }}" class="img-icon-section"></span>
		            	<h3> {{ getQuestionCal($survey,'transaction_close_this_week')['totalSurvay']  }} <span style="color:{{ getQuestionCal($survey,'transaction_close_this_week')['color']  }} !important;">{{ getQuestionCal($survey,'transaction_close_this_week')['avg'] }}%</span></h3>
		            	<p>Closed a sale <br> last week</p>
		            </div>
		            <div class="col-md-4 col-sm-4 question-box">
                        <div class="right-dooted-line"></div>
		            	<span><img src="{{ asset('img/survey-qu-icon/add-house.svg') }}" class="img-icon-section" ></span>
		            	<h3>{{ getQuestionCal($survey,'escrow_this_week')['totalSurvay']  }} <span style="color:{{ getQuestionCal($survey,'escrow_this_week')['color']  }} !important;">{{ getQuestionCal($survey,'escrow_this_week')['avg']  }}%</span></h3>
		            	<p>Entered escrow <br> last week</p>
		            </div>
		            <div class="col-md-4 col-sm-4 question-box">
                        <div class="right-dooted-line"></div>
		            	<span><img src="{{ asset('img/survey-qu-icon/home-approved.svg') }}" class="img-icon-section"></span>
		            	<h3>{{ getQuestionCal($survey,'next_week_listing_will_go')['totalSurvay']  }} <span style="color:{{ getQuestionCal($survey,'next_week_listing_will_go')['color']  }} !important;">{{ getQuestionCal($survey,'next_week_listing_will_go')['avg']  }}%</span></h3>
		            	<p>Listed a property <br> last week</p>
		            </div>
            	</div>
            </div>
        </div>
    </div>
    <div class="community-profile section font-raleway last-qu-box" id="community-profile">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 question-main-box box-title question-part-3">
                <div class="left-side colora question-1 question-2 question-box-hedding" @if(isset($user->ClientDetail->colore)) style="background: {{$user->ClientDetail->colore}} !important;color:{{$user->ClientDetail->colorb}} !important;" @endif>
                    What REALTORS® think will happen next <img src="{{ asset('img/survey-qu-icon/que2-title.png') }}" class="question-title-img">
                    <div class="triangle-bottomleft"></div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 text-center last-qu-box-sub">
            	<div class="row">
		            <div class="col-md-4 col-sm-4 question-box q-2-box">
		            	<h3>{{ getQuestionCal($survey,'next_week_sales_will_go')['totalSurvay']  }} <span style="color:{{ getQuestionCal($survey,'next_week_sales_will_go')['color'] }} !important;">{{ getQuestionCal($survey,'next_week_sales_will_go')['avg']  }}%</span></h3>
		            	<p>Think sales will <br> be up next week <!-- <img src="{{ asset('img/survey-qu-icon/dollar.png') }}" class="img-icon-section" --></p>
		            </div>
		            <div class="col-md-4 col-sm-4 question-box q-2-box">
                        <div class="right-dooted-line"></div>
		            	<h3>{{ getQuestionCal($survey,'next_week_prices_will_go')['totalSurvay']  }} <span style="color:{{ getQuestionCal($survey,'next_week_prices_will_go')['color'] }} !important;">{{ getQuestionCal($survey,'next_week_prices_will_go')['avg']  }}%</span></h3>
		            	<p>Think prices will <br> be up next week <!-- <img src="{{ asset('img/survey-qu-icon/sand-clock.png') }}" class="img-icon-section" --></p>
		            </div>
		            <div class="col-md-4 col-sm-4 question-box q-2-box">
                        <div class="right-dooted-line"></div>
		            	<h3>{{ getQuestionCal($survey,'property_this_week')['totalSurvay']  }} <span style="color:{{ getQuestionCal($survey,'property_this_week')['color'] }} !important;">{{ getQuestionCal($survey,'property_this_week')['avg']  }}%</span></h3>
		            	<p>Think listings will <br> be up next week <!-- <img src="{{ asset('img/survey-qu-icon/checklist.png') }}" class="img-icon-section" --></p>
		            </div>
            	</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xs-12 text-center footer-top-text">
            <p>% indicates changes from previous week.</p>
        </div>
    </div>

    <!-- footer -->
    <div class="report-footer2 font-raleway">
        <div class="footer-left-triangle"></div>
        <div class="footer-right-triangle"></div>
        <div class="row backgroundc color-white footer-body" @if(isset($user->ClientDetail->colorc)) style="background: {{$user->ClientDetail->colorc}} !important" @endif>
            <div class="backgrounda top-section">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="colora more-info" style="color:{{$user->ClientDetail->colorb}} !important;">FOR MORE INFORMATION</div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="client-photo">
                                            @if(isset($user->ClientDetail->photo))
                                                <img src="/{{ $user->ClientDetail->photo }}" class="img-responsive">
                                            @else
                                                <a href="{{ url('/account/profileview').'?img=profile' }}" title="Click Here to Upload Image"> <img src="/img/your-image-here.png" class="img-responsive" style="width: 100px; height: 150px"></a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="client-logo">
                                            @if(isset($user->ClientDetail->logo))
                                                <img src="/{{ $user->ClientDetail->logo }}" class="img-responsive">
                                            @else
                                               <a href="{{ url('/account/profileview').'?img=logo' }}" title="Click Here to Upload Logo"> <img src="/img/your-logo.png" class="top-logo img-responsive" style="width: 145px;"></a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="row">
                                    <div class="color-white client-detail" style="color:{{$user->ClientDetail->colorb}} !important;">
                                        <span class="footer-user-name" style="color:{{$user->ClientDetail->colorb}} !important;">
                                            @if(isset($user->firstName))
                                                {{$user->firstName}} {{$user->lastName}}
                                            @endif
                                        </span>
                                        <br>
                                        <span class="footer-user-title" style="color:{{$user->ClientDetail->colorb}} !important;">
                                            @if(isset($user->ClientDetail->title))
                                                {{ $user->ClientDetail->title }}<br>
                                            @endif
                                        </span>
                                        <span class="footer-user-email" style="color:{{$user->ClientDetail->colorb}} !important;">
                                            @if(isset($user->ClientDetail->email))
                                                {{ $user->ClientDetail->email }}<br>
                                            @endif
                                        </span>
                                        <span class="footer-user-phone" style="color:{{$user->ClientDetail->colorb}} !important;">
                                            @if(isset($user->ClientDetail->phone))
                                                {{ $user->ClientDetail->phone }}<br>
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-10">
                                <div class="colora order-visit text-center" style="color:{{$user->ClientDetail->colorb}} !important;">
                                    To take a REALTORS® Market Sentiment Survey, visit <br>
                                    <a href="{{url('/')}}" class="colora"><strong style="color:{{$user->ClientDetail->colorb}} !important;">www.dharro.com</strong></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="disclaimer" style="color:{{$user->ClientDetail->colorb}} !important;">
                            <p style="color:{{$user->ClientDetail->colorb}} !important;">Disclaimer<br>
                            &copy; {{ date('Y') }} by VOOY GROUP CANADA INC. All rights reserved. By accessing this information you have agreed to our terms of service, which are hereby incorporated by reference. The information may contain errors and omissions. This REALTORS® Market Sentiment Survey has been generated based on the information supplied by other REALTORS® and solely for general information purposes only. The publisher and agent(s) are not liable for errors or omissions. No warranties or representations are made of any kind.
                            </p>
                        </div>
                        <p class="footer-bottom-text" style="font-size:11px; text-align: right;color:#fff !important;">
                            &copy; {{ date('Y') }} by VOOY GROUP CANADA INC. All rights reserved.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="padding-20 no-print"></div>
<div class="container sharethiscontainer">
    <div class="row">
        <div class="col-xs-12">
            <!-- <div class="sharethis-inline-share-buttons"></div> -->
            <!-- AddToAny BEGIN -->
            <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                <a class="a2a_button_facebook"></a>
                <!-- <a class="a2a_button_twitter"></a> -->
                <a class="a2a_button_google_plus"></a>
                <a class="a2a_button_linkedin"></a>
                <a class="a2a_button_whatsapp"></a>
                <a class="a2a_button_print"></a>
            </div>
            <script>
                var a2a_config = a2a_config || {};
                a2a_config.onclick = 1;
                a2a_config.color_main = "D7E5ED";
                a2a_config.color_border = "AECADB";
                a2a_config.color_link_text = "333333";
                a2a_config.color_link_text_hover = "333333";
            </script>
            <!-- AddToAny END -->
        </div>
    </div>
</div>

@endsection

@section('footer_script')
<script type="text/javascript">

</script>
@endsection