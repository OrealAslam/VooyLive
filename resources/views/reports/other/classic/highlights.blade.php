@extends('layouts.template')
@section ('title') {{ config('app.title') }} - {{ $report->address }}@stop
@section('content')
<link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,600,700,800,900" rel="stylesheet">
<link rel="stylesheet" href="/css/highlights.css" media="all">
<!-- <link rel="stylesheet" href="/icons/css/fontawesome-all.min.css" media="all"> -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!--
<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5a7fd99ad4d59e0012e89775&product=inline-share-buttons' async='async'></script>
-->
<script async src="https://static.addtoany.com/menu/page.js"></script>

<style type="text/css">
	@media print{
		.cookie-bar{
            display: none !important;
        }
		.logo-pro-part{
			float:left !important;
			width:30% !important;
		}
		.footer-right-part{
			float:left !important;
			width:70% !important;	
		}
	    .section-title h3{
	    	margin:5px 0px !important;
	    	font-size:22px !important;
	    	line-height:28px !important;
	    }
	    .font-size-addess{
	        font-size:45px !important;
	        line-height:55px !important;
	        font-weight:600 !important;
	    }
	    #button-scroll{
            display: none !important;
        }
    }
	#content{
		font-family: 'Titillium Web', sans-serif;
		color: #494949;
		    background: white;
	}

	#footer{
		    background-color: #848484;
		    color: white;
		    padding-bottom: 15px;
		    display: block;
    		align-items: center;
	}

	#footer .footer-text{
	    margin-bottom: 0;
		font-size: 15px;
		line-height: 20px;
	}
	.border-left{
		border-left:2px dashed #565759!important;
	}
	.complete-border{
		border-top:2px dashed #565759!important;
		border-bottom:2px dashed #565759!important;
	}

	.highlights-header {
	    padding-top: 15px;
	    border-top: 10px solid #565759;
        padding-bottom: 15px;
    	border-bottom: 3px solid #56575A;
	}
	.highlights-header .client-logo {
	    padding-right: 15px;
	    border-right: 2px solid #ddd;
	}
	.highlights-header-right {
	    padding-top: 35px;
	}
	h3.client-title {
	    margin-top: 0;
	    margin-bottom: 0;
	    font-family: 'Raleway';
	    font-size: 22px;
	}
	h4.report-address-h4 {
	    margin-top: 0;
	    margin-bottom: 0;
	    font-family: 'Raleway';
	}
	#content
	{
		font-family: 'Raleway';
	}
	.report-address{
		line-height: 40px;
		margin-left: 15px;
	}
	.site-logo {
	    margin-top: 20px;
	}
	table.table.text-center.table-noborder.neighborhood-table td span {
	    display: inline-block;
	    line-height: 22px;
	    padding: 0px 8px;
	    border-radius: 25px;
	}
	td.align-middle {
	    vertical-align: middle !important;
	}
	table.table.text-center.table-noborder.neighborhood-table td {
	    font-family: Raleway;
	    font-weight: 600;
	}
	.neighborhood-table i.far {
	    font-size: 25px;
	    display: block;
	}
	table.table.text-center.table-noborder.neighborhood-table {
	    position: absolute;
	    top: 50%;
	    left: 0;
	    margin-bottom: 0;
	    transform: translateY(-50%);
	}
	#neighbors .map-image {
	    position: relative;
	    display: inline-block;
	    margin-bottom: 20px;
	}
	.section-title-icon {
	    float: left;
	    margin-right: 15px;
	}
	.section-title h3 {
	    font-family: Raleway;
	    font-weight: 600;
	    line-height: 50px;
	    /*float: left;*/
	    margin-top: 0;
	}
	.section-title {
	    margin-top: 20px;
	}
	table.table.text-center.table-noborder.neighborhood-table table {
	    margin-bottom: 0;
	    background: none;
	}
	div.report-inner-border {
	    border-bottom: 1px solid #000;
	}
	div.report-inner-border:last-child {
		border:none;
	}
	.demographics-title {
	    font-size: 20px;
	    font-family: raleway;
	    font-weight: 600;
	    margin-top: 15px;
	}
	.demographics-row {
	    margin-top: 30px;
	}
	.demographics-table h3 {
	    font-family: Raleway;
	    margin: 10px 0;
	}
	table.school-table {
	    font-family: Raleway;
	}
	.row.library-row {
	    margin-top: 20px;
	    margin-bottom: 15px;
	    font-family: Raleway;
	}
	table.recreation-table {
	    margin-top: 20px;
	}
	.row.parks-recreation-row {
	    margin-top: 20px;
	    margin-bottom: 20px;
	}
	table.transit-table {
	    margin-top: 20px;
	}
	.footer-siteurl {
	    border: 2px solid #fff;
	    margin-top: 15px;
	    margin-bottom: 15px;
	}
	.footer-disclaimer {
	    border: 2px solid #fff;
	    padding: 10px 20px 30px 20px;
	}
	.footer-client-details {
	    margin-bottom: 15px;
	}
	.welcome-title {
	    font-size: 37px;
	    line-height: 37px;
	    text-transform: uppercase;
	    font-weight: 600;
	    padding-top: 15px;
	    padding-bottom: 15px;
	}
	.welcome-text {
	    border: 2px solid;
	    min-height: 383px;
	    padding-top: 15px;
	    padding-bottom: 15px;
	    font-size:18px;
	}
	.pdl5{
		padding-left: 5px;
	}
	.pdr5{
		padding-right: 5px;
	}
	img.img-responsive.footer-client-logo {
	    margin-bottom: 10px;
	}
	div#footer {
	    padding: 9px 0 15px !important;
        border-top: 5px solid #fff;
	}

	.showBorder {
		border:solid 2px black;
	}
	@media only screen and (max-width: 600px) {
	  	#neighbors{
	  		overflow:auto;
	  	}
	  	#demography{
	  		overflow:auto;	
	  	}
	  	#school{
	  		overflow:auto;		
	  	}
	  	#playground{
	  		overflow:auto;	
	  	}
	  	#transit{
	  		overflow:auto;	
	  	}
	  	#library{
	  		overflow:auto;	
	  	}
	  	#map{
	  		overflow:auto;
	  	}
	  	#footer{
	  		margin-top:20px !important;
	  	}
	}
</style>
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
    <h2 class="page-title">{{__('reports/other/classic/highlights.reports')}}</h2>
    <ol class="breadcrumb">
      <li><a href="{{ Route('home') }}">{{__('reports/other/classic/highlights.home')}}</a></li>
      @if (Auth::check())
      <li><a href="{{ Route('dashboard') }}">{{__('reports/other/classic/highlights.dashboard')}}</a></li>
      @endif
      <li class="active">{{__('reports/other/classic/highlights.reports')}}</li>
    </ol>
  </div>
</div>
<!-- Page Header End -->

<!-- Page Header End -->
<div class="cps-main-wrap">
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
	</div><br>

	@include('reports.common-report')
	<br>
	
	<div class="cps-section cps-section-padding cps-gray-bg" id="features">
		<div class="container">
			<div class="col-xs-12 report-header" id="content" @if(isset($user->ClientDetail->colorc)) style="border-color: {{$user->ClientDetail->colorc}}" @endif>
				<div class="row">
					<div class="col-xs-12">
						<div class="col-xs-12 text-center">
							{{ config('app.title') }} {{__('reports/other/classic/highlights.lite')}}
						</div>
						<table class="table table-bordered">
							<thead>
								<tr>
									<td class="col-xs-9 report-address colora text-center text-editable" style="vertical-align: middle;" data-field-id="custom_report_address">
                      					<h3 class="content addressText " style="margin-top:0px;">{{ !empty($orderData->custom_report_address) ? $orderData->custom_report_address : $report->address }}</h3>
									</td>
									<td class="col-xs-3">
				                        @if(isset($user->ClientDetail->logo))
				                            <img src="{{ env('AWS_URL') }}{{ $user->ClientDetail->logo }}" class="top-logo img-responsive">
				                        @else
				                           <a href="{{ url('/account/profileview').'?img=logo' }}" title="{{__('reports/other/classic/highlights.clickHereToUploadLogo')}}"> <img src="{{ env('AWS_URL') }}img/your-logo.png" class="top-logo img-responsive" style="width: 150px;margin: auto;"></a>
				                        @endif
									</td>
								</tr>
							</thead>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 colorc report-inner-border" id="neighbors" @if(isset($user->ClientDetail->colorc)) style="border-color: {{$user->ClientDetail->colorc}}" @endif>
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
					<div class="col-xs-12 colorc report-inner-border" id="demography" @if(isset($user->ClientDetail->colorc)) style="border-color: {{$user->ClientDetail->colorc}}" @endif>
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
					<div class="col-xs-12 colorc report-inner-border" id="school" @if(isset($user->ClientDetail->colorc)) style="border-color: {{$user->ClientDetail->colorc}}" @endif>
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
					<div class="col-xs-12 colorc report-inner-border noBreak" id="playground" @if(isset($user->ClientDetail->colorc)) style="border-color: {{$user->ClientDetail->colorc}}" @endif>
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
					<div class="col-xs-12 colorc report-inner-border noBreak" id="recreation" @if(isset($user->ClientDetail->colorc)) style="border-color: {{$user->ClientDetail->colorc}}" @endif>
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
					<div class="col-xs-12 colorc report-inner-border noBreak" id="transit" @if(isset($user->ClientDetail->colorc)) style="border-color: {{$user->ClientDetail->colorc}}" @endif>
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
					<div class="col-xs-12 colorc report-inner-border" id="library" @if(isset($user->ClientDetail->colorc)) style="border-color: {{$user->ClientDetail->colorc}}" @endif>
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
					<div class="col-xs-12 colorc report-inner-border" id="map" @if(isset($user->ClientDetail->colorc)) style="border-color: {{$user->ClientDetail->colorc}}" @endif>
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
				</div>
				<div class="row" id="highlightreport">
					<div class="col-xs-12" id="apisContainer">
						<!--
						<div class="row apirow">
						<div class="col-xs-4">	
						<h2>LOCATION</h2>
						</div>
						<div class="col-xs-8">
						<img class="img-responsive" src="https://maps.googleapis.com/maps/api/staticmap?center={{ $report->address }}&zoom=14&size=600x300&maptype=roadmap
						&markers=color:red%7Clabel:S%7C{{ $report->lat }},{{ $report->long }}&key=AIzaSyBOCZvTWqNWlmIwg-lW98Cn0U0UdVpL0AM" />
						</div>
						</div>	
						-->
						{{ csrf_field() }}

						<div id="footer" class="row backgroundc" @if(isset($user->ClientDetail->colora)) style="border-color: {{$user->ClientDetail->colora}}" @endif>
							<div class="col-md-4 col-xs-12 col-pdf-4">
								<h4 class="colora text-uppercase for-more-info">{{__('reports/other/classic/highlights.forMoreInformation')}}</h4>
								<div class="row">
									<div class="col-md-4 col-xs-6 col-custom-6" >
										<div class="">
		                                    @if(isset($user->ClientDetail->photo))
		                                        <img src="{{ env('AWS_URL') }}{{ $user->ClientDetail->photo }}" class="img-responsive img-information">
		                                    @else
		                                        <a href="{{ url('/account/profileview').'?img=profile' }}" title="{{__('reports/other/classic/highlights.clickHereToUploadImage')}}"> <img src="{{ env('AWS_URL') }}img/your-image-here.png" class="img-responsive img-information" style="width: 100px; height: 144px"></a>
		                                    @endif
										</div>
									</div>
									<div class="col-md-8 col-xs-6 col-custom-6" style="word-break:break-all !important;">
										<div class="pull-left">
	                                        @if(isset($user->ClientDetail->logo))
	                                            <img src="{{ env('AWS_URL') }}{{ $user->ClientDetail->logo }}" class="footer-client-logo img-responsive">
	                                        @else
	                                           <a href="{{ url('/account/profileview').'?img=logo' }}" title="{{__('reports/other/classic/highlights.clickHereToUploadLogo')}}"> <img src="{{ env('AWS_URL') }}img/your-logo.png" class="footer-client-logo img-responsive" style="width: 120px; margin: auto;"></a>
	                                        @endif
											@if(isset($user->ClientDetail->title))
											<p class="footer-text">{{$user->firstName}} {{$user->lastName}}, {{ $user->ClientDetail->title }}</p>
											@endif
											@if(isset($user->ClientDetail->email))
											<p class="footer-text">{{ $user->ClientDetail->email }}</p>
											@endif
											@if(isset($user->ClientDetail->phone))
											<p class="footer-text">{{ $user->ClientDetail->phone }}</p>
											@endif
											
										</div>
									</div>
								
								</div>
							</div>
							<div class="col-md-8 col-xs-12 col-pdf-8">
								<div class="row">
									<div class="col-xs-10 pull-left">
										<h5 class="colora text-center">{{__('reports/other/classic/highlights.toOrderA')}} {{ config('app.title') }}, {{__('reports/other/classic/highlights.visit')}} <a href="{{url('/')}}" class="colora"><strong>www.dharro.com</strong></a></h5>
									</div>
									<div class="col-xs-2 pull-left">
										<div class="">
											<img src="{{ env('AWS_URL') }}img/footer-logo.png"   alt="{{ config('app.name', 'HoodQ') }}" class="img-responsive pull-right" height="70" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12 pull-left" id="disclaimer">
										<p>{{__('reports/other/classic/highlights.disclaimer')}}<br>
											&copy; {{ date('Y') }} {{__('reports/other/classic/highlights.disclaimerText')}}
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
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
</div>
<div class="common-report cps-gray-bg" style="background-color: #fff;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                <input name="template_type" class="template_type" type="checkbox" data-toggle="toggle" data-on="{{__('reports/other/classic/highlights.metro')}}" data-off="{{__('reports/other/classic/highlights.lite')}}">
            </div>
        </div>
    </div>
</div>
<br>
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
	<a href="javascript:window.print()">{{__('reports/other/classic/highlights.saveAndPrint')}}</a>
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
            if(myStr > 70){
            	alert();
                $('.addressText').addClass('font-size-addess');
            }
            var str = $(".addressText").text();
            var strReplace = str.replace(", Canada", "");
            $('.addressText').text(''); 
            $('.addressText').append(strReplace);
        });
		
        //overrides

        $.get('{{url('report/json/'.$report->reportId)}}',function(data){
            for(y in data) { if($('#'+y).length  && data[y]!=null && data[y].trim().length ){ $('#'+y).html(data[y]) }};
        });

    </script>

@endsection

<script>
/*
	function printDiv() {
		//var printContents = document.getElementById(divName).innerHTML;
		//var originalContents = document.body.innerHTML;
		//document.body.innerHTML = printContents;
		//window.print();
		//document.body.innerHTML = originalContents;
		var curURL = window.location.href;
		history.replaceState(history.state, '', '/');
		window.print();
		history.replaceState(history.state, '', curURL);
	}
*/
</script>