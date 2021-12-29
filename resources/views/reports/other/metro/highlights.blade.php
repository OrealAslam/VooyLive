@extends('layouts.template')
@section ('title') {{ config('app.title') }} - {{ $report->address }}@stop
@section('content')

<link href="/css/metroReport/style.css" rel="stylesheet" type="text/css">
<link href="/css/metroReport/print.css" rel="stylesheet" media="print" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet'  type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,600,700,800,900" rel="stylesheet" type='text/css'>

<style type="text/css">
    .neighbourhood-name{
        text-transform: uppercase;
    }
    @media print{
        .cookie-bar{
            display: none !important;
        }
        .public-library-text{
            min-height:60px !important;
        }
        .public-library-text .icon{
            padding-top:21px !important;
            padding-bottom:21px !important;
        }
        .public-library-text .backgroundd{
            padding-top:17px !important;
        }
        .neighbourhood-name{
            padding-top:3px !important;
            font-size:30px !important;
        }
        div.quote{
            font-size: 20px;
        }
        #neighbors{
            margin-bottom:-50px;
        }
        .highlights .item .address{
            font-size:13px !important; 
        }
        .backgroundd , .backgrounde{
            color:#000 !important;
        }
        .backgroundd .address , .backgrounde .address{
            font-size:15px !important;   
            color:#000 !important;
        }
        body{
            line-height: unset !important;
        }
        .left-side{
            font-size:16px !important;
        }
        .community-profile .right-side ul li{
            position: relative !important;
            margin-bottom:10px !important;
            margin-top: 10px !important;
            line-height:20px !important;
        }
        .demographics2 .item .demographics2-name{
            line-height:0px !important;
        }
        .waste .item .info > div {
            padding-bottom: 0px !important;
            padding-top: 4px !important;
        }
        .address{
            font-size:55px !important;
        }
        .font-size-addess{
            font-size:55px !important;
        }
        .addess-box{
            padding-top:5px !important;
            padding-bottom:5px !important;
        }
        .page2-head .title2{
            font-size:15px !important;
        }
        div.quote{
            font-size:15px !important;
            line-height:18px !important;
        } 
        .quote-container{
            line-height:12px !important;  
        }
        #button-scroll{
            display: none !important;
        }
        .highlights .item {
            min-height:250px !important;
        }
    }
    @media only screen and (max-width: 600px) {
        .addressText{
            font-size: 30px;
            line-height: 30px;
        }
        .header-title {
            font-size: 20px;
            padding-left: 15px;
        }
        .report-footer2 .client-photo img{
            max-height: auto;
            padding-left: 20%;
        }
        .report-footer2 .client-logo img {
            margin-top:20px;
            max-height: 100px;
            padding-left: 30%;
        }
        .report-footer2 .client-detail{
            text-align: center;
        }
        .transport .left-side {
            font-size: 31px;
        }
    }
</style>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script async src="https://static.addtoany.com/menu/page.js"></script>


@include('reports.common-programmed-css-metro')

<script type="text/javascript">
    var scripts=0;
    function complete(){
        location.reload();
    }
    function checkComplete(){
        scripts--;
        if(scripts==0)
            complete();
    }
</script>

<div class="page-header style-11">
  <div class="container">
    <h2 class="page-title">Reports</h2>
    <ol class="breadcrumb">
      <li><a href="{{ Route('home') }}">Home</a></li>
      @if (Auth::check())
      <li><a href="{{ Route('dashboard') }}">Dashboard</a></li>
      @endif
      <li class="active">Reports</li>
    </ol>
  </div>
</div>
<!-- Page Header End -->


<div class="container sharethiscontainer">
    <div class="row">
        <div class="col-xs-12">
            <!-- <div class="sharethis-inline-share-buttons"></div> -->
            <!-- AddToAny BEGIN -->
            <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                <a class="a2a_button_facebook"></a>
                <a class="a2a_button_twitter"></a>
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

@include('reports.common-report')

<div class="container" id="features">
    <div class="top-header section" id="top-header">
        <div class="row">
            <table width="100%">
                <tr>
                    <td width="25%">
                        @if(isset($user->ClientDetail->logo))
                            <img src="/{{ $user->ClientDetail->logo }}" class="top-logo img-responsive">
                        @else
                           <a href="{{ url('/account/profileview').'?img=logo' }}" title="Click Here to Upload Logo"> <img src="/img/your-logo.png" class="top-logo img-responsive" style="width: 290px;"></a>
                        @endif
                    </td>
                    <td width="75%" class="header-title font-oswald">
                        <span>COMMUNITY FEATURE SHEET <sup>&reg</sup></span>
                    </td>
                </tr>
            </table>
        </div>
        <div class="row">
            <hr class="style1">
        </div>
    </div>
    <div class="header section font-raleway" id="header">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 address text-editable" data-field-id="custom_report_address">
                <span class="colora content addressText" style="line-height: 1em !important;"><?=str_replace(', Canada', ' ', !empty($orderData->custom_report_address) ? $orderData->custom_report_address : $report->address)?></span>
            </div>
        </div>
        <div class="row">
            <hr class="style1">
        </div>
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-5">
                <div class="row backgroundd quote-container">
                    <div class="col-lg-3 col-md-3 col-sm-3 text-center">
                        <svg style="enable-background:new 0 0 32 24;" version="1.1" viewBox="0 0 32 24" class="fillb" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Layer_1"/><g id="left_x5F_quote"><g><path d="M32,24V12h-8c0-4.41,3.586-8,8-8V0c-6.617,0-12,5.383-12,12v12H32z"/><path d="M12,24V12H4c0-4.41,3.586-8,8-8V0C5.383,0,0,5.383,0,12v12H12z"/></g></g></svg>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 quote">
                        <span class="colorb">
                            YOU DON’T BUY THE HOUSE; YOU BUY THE NEIGHBOURHOOD!
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-7">
                <div class="neighbourhood-title">
                    NAME OF NEIGHBOURHOOD
                </div>
                <div class="neighbourhood-name colora" id="neighbourhood-name">
                    @if (isset($neighborsData) && isset($neighborsData['response'][0]) && isset($neighborsData['response'][0]->name))
                        {{$neighborsData['response'][0]->name}}
                    @else
                        N/A
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <hr class="style3">
        </div>
    </div>
    <div class="location section font-raleway" id="neighbors">
		@if($neighbors!=null)
		{!! $neighbors !!}
		@else
		<script type="text/javascript">
			$.ajax({
				url:'{{ url('/report/getApi/neighbors/'.$report->reportId) }}',
				dataType:'html',
				beforeSend:function(){
					scripts++;
				},
				success:function(html){
					$('#neighbors').html(html);
					checkComplete();
				}
			});
		</script>
		@endif
    </div>
    <div class="community-profile section font-raleway" id="community-profile">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-5">
                <div class="left-side colora">
                    COMMUNITY<br>
                    PROFILE<br>
                    <a class="no-print btn btn-primary modify_points" href="{{route('reportNotes', ['reportId' => $report->reportId])}}">Customize Profile</a>
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-7 right-side">
                <div class="row">
                    <ul>
                        <li>{{$reportNotes[1]}}</li>
                        <li>{{$reportNotes[2]}}</li>
                        <li>{{$reportNotes[3]}}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <hr class="style4">
        </div>
    </div>
    <div class="demographics section pageBreakAfter font-raleway" id="demographics">
		@if($demography!=null)
		{!! $demography !!}
		@else
			<script type="text/javascript">
			$.ajax({
				url:'{{ url('/report/getApi/demography/'.$report->reportId) }}',
				dataType:'html',
				beforeSend:function(){
					scripts++;
				},
				success:function(html){
					$('#demography').html(html);
					checkComplete();
				}
			});
			</script>
		@endif
    </div>
    <!-- End of Page 1 -->
    <!-- Start of Page 2 -->
    <div class="page2-head section" id="page2-head">
        <div class="row">
            <hr class="style4">
        </div>
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-5">
            </div>
            <!--
            <div class="col-lg-2 col-md-2 col-sm-2 title1 bg-color-golden color-white font-raleway">
                V5P 1P9
            </div>
            -->
            <div class="col-lg-7 col-md-7 col-sm-7 title2 backgroundd colorb font-raleway text-right">
                <?=str_replace(', Canada', ' ', !empty($orderData->custom_report_address) ? $orderData->custom_report_address : $report->address)?>
            </div>
        </div>
        <div class="row">
            <hr class="style4">
        </div>
    </div>
    <div class="public-schools section font-raleway" id="school">
		@if($school!=null)
		{!! $school !!}
		@else
			<script type="text/javascript">
			$.ajax({
				url:'{{ url('/report/getApi/school/'.$report->reportId) }}',
				dataType:'html',
				beforeSend:function(){
					scripts++;
				},
				success:function(html){
					$('#school').html(html);
					checkComplete();
				}
			});
			</script>
		@endif
    </div>
    <div class="transport section font-raleway" id="transport">
		@if($transit!=null)
		{!! $transit !!}
		@else

		<script type="text/javascript">
		$.ajax({
		url:'{{ url('/report/getApi/transit/'.$report->reportId) }}',
		dataType:'html',
		beforeSend:function(){
		scripts++;

		},
		success:function(html){
		$('#transit').html(html);
		checkComplete();

		}
		});
		</script>
		@endif
    </div>
    <div class="library section font-raleway" id="library">
		@if($library!=null)
		{!! $library !!}
		@else

		<script type="text/javascript">
		$.ajax({
		url:'{{ url('/report/getApi/library/'.$report->reportId) }}',
		dataType:'html',
		beforeSend:function(){
		scripts++;

		},
		success:function(html){
		$('#library').html(html);
		checkComplete();

		}
		});
		</script>
		@endif
    </div>
    <div class="highlights section font-raleway" id="map">
		@if($map!=null)
		{!! $map !!}
		@else

		<script type="text/javascript">
		$.ajax({
		url:'{{ url('/report/getApi/map/'.$report->reportId) }}',
		dataType:'html',
		beforeSend:function(){
		scripts++;

		},
		success:function(html){
		$('#map').html(html);
		checkComplete();

		}
		});
		</script>
		@endif
    </div>
    <div class="parks-recreation section font-raleway" id="parks-recreation">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-5">
                <div class="left-side colora">
                    PARKS AND RECREATION
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-7">
                <div class="row items-container">
                    <div id="recreation">
                        @if($recreation!=null)
                        {!! $recreation !!}
                        @else

                            <script type="text/javascript">
                            $.ajax({
                            url:'{{ url('/report/getApi/recreation/'.$report->reportId) }}',
                            dataType:'html',
                            beforeSend:function(){
                            scripts++;

                            },
                            success:function(html){
                            $('#recreation').html(html);
                            checkComplete();

                            }
                            });
                            </script>
                        @endif
                    </div>
                    <div id="playground">
                        @if($playground!=null)
                        {!! $playground !!}
                        @else
                            <script type="text/javascript">
                                $.ajax({
                                url:'{{ url('/report/getApi/playground/'.$report->reportId) }}',
                                dataType:'html',
                                beforeSend:function(){
                                scripts++;

                                },
                                success:function(html){
                                $('#playground').html(html);
                                checkComplete();
                                }
                                });
                            </script>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="report-footer2 font-raleway">
        <div class="row backgroundc color-white footer-body">
            <div class="backgrounda top-section">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="colora more-info">FOR MORE INFORMATION</div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="client-photo">
                                    @if(isset($user->ClientDetail->photo))
                                        <img src="/{{ $user->ClientDetail->photo }}" class="img-responsive">
                                    @else
                                        <a href="{{ url('/account/profileview').'?img=profile' }}" title="Click Here to Upload Image"> <img src="/img/your-image-here.png" class="img-responsive" style="width: 100px; height: 150px"></a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="row">
                                    <div class="client-logo">
                                        @if(isset($user->ClientDetail->logo))
                                            <img src="/{{ $user->ClientDetail->logo }}" class="img-responsive">
                                        @else
                                           <a href="{{ url('/account/profileview').'?img=logo' }}" title="Click Here to Upload Logo"> <img src="/img/your-logo.png" class="top-logo img-responsive" style="width: 145px;"></a>
                                        @endif
                                    </div>
                                    <div class="color-white client-detail" style="word-break:break-all !important;">
                                        @if(isset($user->firstName))
                                            {{$user->firstName}} {{$user->lastName}}
                                        @endif
                                        @if(isset($user->ClientDetail->title))
                                            , {{ $user->ClientDetail->title }}<br>
                                        @endif
                                        @if(isset($user->ClientDetail->email))
                                            {{ $user->ClientDetail->email }}<br>
                                        @endif
                                        @if(isset($user->ClientDetail->phone))
                                            {{ $user->ClientDetail->phone }}<br>
                                        @endif
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
                            <div class="col-lg-9 col-md-9 col-sm-10">
                                <div class="colora order-visit text-center">
                                    To order a {{ config('app.title') }}, visit <br>
                                    <a href="{{url('/')}}" class="colora"><strong>www.dharoo.com</strong></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-2">
                                <img src="{{url('img/footer-logo.png')}}"   alt="{{ config('app.name', 'HoodQ') }}" class="img-responsive pull-right" height="70" />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="disclaimer">
                            <p>Disclaimer<br>
                            &copy; {{ date('Y') }} by VOOY GROUP CANADA INC. All rights reserved. By accessing this information you have agreed to our terms of service, which are hereby incorporated by reference. The information may contain errors and omissions. This Community Feature Sheet® has been generated based on the address supplied and solely for general information purposes only. The publisher and agent(s) are not liable for errors or omissions. No warranties or representations are made of any kind.
                            </p>
                        </div>
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
                <a class="a2a_button_twitter"></a>
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

@section('nav')              
<!--
<li>
    <a href="{{-- url('report/highlights/'.$report->reportId) --}}">View Highlights</a>
</li>
<li>
    <a href="{{-- url('report/detailed/'.$report->reportId) --}}">View Detailed Report</a>
</li>                          
-->
<li>
    <a href="javascript:window.print()">Save & Print</a>
    <!-- <a href="javascript:void(0)" onclick="printDiv()">Save & Print</a> -->
    
</li>
<script>
    //$('#address').val('{{ $report->address }}');
</script>
@endsection

@section('footer_script')
    <script type="text/javascript">
        $(document).ready(function(){
            var myStr = $('.addressText').text().length;
            if(myStr > 60){
                $('.addressText').addClass('font-size-addess');
                $('.text-editable').addClass('addess-box');
            }
            var str = $(".addressText").text();
            var strReplace = str.replace(", Canada", "");
            $('.addressText').text(''); 
            $('.addressText').append(strReplace);
        });
    </script>
@endsection

<script>

    function printDiv() {
        /*
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        */
        var curURL = window.location.href;
        history.replaceState(history.state, '', '/');
        window.print();
        history.replaceState(history.state, '', curURL);
    }

</script>