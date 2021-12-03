@extends('layouts.template')
@section('content')
<link href="/css/metroReport/style.css" rel="stylesheet" type="text/css">
<link href="/css/metroReport/print.css" rel="stylesheet" media="print" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet'  type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,600,700,800,900" rel="stylesheet" type='text/css'>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script async src="https://static.addtoany.com/menu/page.js"></script>

<style type="text/css">
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
		background:#d2072c;
	}
	.header-title{
		text-align: center;
		font-size:40px;
	}
	.header-title span{
		position: relative;
		left: -80px;
	}
	#features{
		margin-top:30px;
		background:#F7EBEB;
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
		margin-top:-10px;
		font-size:30px;
		font-weight:600;
	}
	.img-icon-section{
		height:35px;
		width:35px;
		top:-5px;
		left:3px; 
		position: relative;
	}
	.question-main-box:after{
		position: relative;
		content:'';
	    position: absolute;
	    top: 30%;
	    left:100%;
	    margin-left:-15px;
	    width: 0;
	    height: 0;
	    border-top: 30px solid transparent;
	    border-left: 60px solid #EA2448;
		border-bottom: 40px solid transparent;	
	}
	.right-side-box{
		margin-right:-15px;
	}
	.right-arrow{
		width: 0;
      	height: 0;
      	top:30px;
      	left:-60px;
      	position: absolute;
      	border-top: 30px solid transparent;
		border-right: 60px solid #EA2448;
		border-bottom: 40px solid transparent;
      }
      .last-qu-box-sub{
      	margin:25px 0px 40px 0px;
      }
      span img{
      	margin-top:30px;
      }

    @media print{
    	.img-icon-section{
			height:45px !important;
			width:45px !important;
		}
		.question-box p img{
			height:55px !important;
			width:55px !important;	
		}
    	.neighbourhood-name p{
    		font-size:35px !important;
    		margin-top:20px !important;
		}
    	.question-part-2{
			margin-top:10px;
			margin-bottom:5px;	
		}
		.question-part-3{
			margin-top:30px !important;
			margin-bottom:-15px !important;
		}
    	.question-sub-title p{
			margin-top:-5px !important;
			color:#e24b4b !important;
			font-size:35px !important;
			margin-bottom:20px !important;
			font-weight:bold !important;
		}
		.question-main-box:after{
			top:30px;
		    border-top:20px solid transparent !important;
		    border-left:40px solid #EA2448 !important;
			border-bottom:25px solid transparent !important;	
		}
		.right-arrow{
			left:-40px !important;
	      	top:30px;
	      	border-top: 20px solid transparent !important;
			border-right: 40px solid #EA2448 !important;
			border-bottom: 25px solid transparent !important;
	      }
    	#features{
			margin-top:30px;
			background:#F7EBEB !important;
		}
    	.question-1{
    		font-weight:bold !important;
    		padding:20px 0px 20px 10px !important;
    		color:#fff !important;
			background: #EA2448 !important;
		}
    	.head-main-title{
			background:#d2072c !important;
			padding:30px 0px 30px !important;
		}
		.head-main-title span{
			font-size:70px !important;
			color:white !important;
		}
    	.header-title span{
			position: relative;
			left: -10px;
		}
	    .box-title .colora{
	    	font-weight:600 !important;
	      	line-height:5px !important;	
	    }
      	.question-box h3{
      		font-size:45px !important;
      	}
      	.question-box h3 span{
      		font-size:35px !important;	
      	}
      	.question-box p{
      		font-size:35px !important;	
      	}
      	span img{
      		margin-top:10px !important;
      		height:25px !important;
      		width:25px !important;
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
			color:#fff !important;	
		}
		.footer-body .order-visit a strong{
			color:#fff !important;	
		}
		.footer-body .disclaimer p{
			color:#fff !important;	
		}
    }	
</style>

@section('content')
<!-- Page Header -->
<div class="page-header style-11">
    <div class="container">
        <h2 class="page-title">My Survey Show Testing</h2>
        <ol class="breadcrumb">
            <li><a href="{{ Route('home') }}">Home</a></li>
            <li><a href="{{ Route('dashboard') }}">Dashboard</a></li>
            <li><a href="{{ Route('my.surveys') }}">Surveys</a></li>
            <li class="active">My Survey Show Testing</li>
        </ol>
    </div>
</div>

    <div class="container">
        <div class="top-header section" id="top-header">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <br>
                        <div class="col-md-12">
                            <p>Select your city (Canadian Cities Only)</p>
                        </div>
                        <div class="col-md-12">
                             <select class="js-select2 form-control select-city" name="canadian_city">
                                <option value="0">-- Select Any Canadian City --</option>
                                @foreach(canadianCityList() as $key=>$value)
                                	@if(!is_null(Request('city_name')))
                                    	<option {{ arrayCityKeyDisable($value) ? 'disabled' : '' }} value="{{ $value }}" {{ Request('city_name') == $value ? 'selected' : '' }}>{{ $value }}</option>
                                    @else
                                    	<option {{ arrayCityKeyDisable($value) ? 'disabled' : '' }} value="{{ $value }}">{{ $value }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-6">
                    <br>
                    <div class="col-md-12">
                        <p>Based On week</p>
                    </div>
                    <div class="col-md-12">
                        <select class="js-select2 form-control select-week" name="canadian_city">
                            <option value="0">-- Select Week --</option>
                            <option value="1" {{ Request('week') == 1 ? 'selected' : '' }}>Week 1</option>
                            <option value="2" {{ Request('week') == 2 ? 'selected' : '' }}>Week 2</option>
                            <option value="3" {{ Request('week') == 3 ? 'selected' : '' }}>Week 3</option>
                        </select>
                    </div>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Closed</th>
                                <th>Escrow</th>
                                <th>Listed</th>
                                <th>Sales</th>
                                <th>Prices</th>
                                <th>Listing</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Total Record : {{ getTestSurveydata(Request::get('city_name') ?? '',Request::get('week') ?? '','transaction_close_this_week')['totalRecord'] ?? '' }}</td>

                                <td>Total Record : {{ getTestSurveydata(Request::get('city_name') ?? '',Request::get('week') ?? '','escrow_this_week')['totalRecord'] ?? '' }}</td>

                                <td>Total Record : {{ getTestSurveydata(Request::get('city_name') ?? '',Request::get('week') ?? '','next_week_listing_will_go')['totalRecord'] ?? '' }}</td>

                                <td>Total Record : {{ getTestSurveydata(Request::get('city_name') ?? '',Request::get('week') ?? '','next_week_sales_will_go')['totalRecord'] ?? '' }}</td>

                                <td>Total Record : {{ getTestSurveydata(Request::get('city_name') ?? '',Request::get('week') ?? '','next_week_prices_will_go')['totalRecord'] ?? '' }}</td>

                                <td>Total Record : {{ getTestSurveydata(Request::get('city_name') ?? '',Request::get('week') ?? '','next_week_listing_will_go')['totalRecord'] ?? '' }}</td>
                            </tr>
                            <tr>
                                <td>Total Yes Record : {{ getTestSurveydata(Request::get('city_name') ?? '',Request::get('week') ?? '','transaction_close_this_week')['totalRecordYes'] ?? '' }}</td>
                                <td>Total Yes Record : {{ getTestSurveydata(Request::get('city_name') ?? '',Request::get('week') ?? '','escrow_this_week')['totalRecordYes'] ?? '' }}</td>
                                <td>Total Yes Record : {{ getTestSurveydata(Request::get('city_name') ?? '',Request::get('week') ?? '','next_week_listing_will_go')['totalRecordYes'] ?? '' }}</td>
                                <td>Total Yes Record : {{ getTestSurveydata(Request::get('city_name') ?? '',Request::get('week') ?? '','next_week_sales_will_go')['totalRecordYes'] ?? '' }}</td>
                                <td>Total Yes Record : {{ getTestSurveydata(Request::get('city_name') ?? '',Request::get('week') ?? '','next_week_prices_will_go')['totalRecordYes'] ?? '' }}</td>
                                <td>Total Yes Record : {{ getTestSurveydata(Request::get('city_name') ?? '',Request::get('week') ?? '','next_week_listing_will_go')['totalRecordYes'] ?? '' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer_script')
<script type="text/javascript">
    $('select').on('change', function() {
    	var city = $('.select-city').val();
    	var week = $('.select-week').val();
    	console.log(city);
    	if (city != 0 && week != 0) {
	        var url = "{{ route('my.surveys.test') }}";
	        var url = url+'?city_name='+city+'&week='+week;
	        window.location.href = url;
    	}
    });
    // $('select').on('change', function() {
    //     var url = "{{ route('my.surveys.test') }}";
    //     var url = url+'?week_name='+this.value;
    //     window.location.href = url;
    // });
</script>
@endsection