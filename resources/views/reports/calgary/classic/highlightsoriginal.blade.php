@extends('layouts.template')
@section ('title') Community Feature Sheet® Lite @stop
@section('content')
<link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,600,700,800,900" rel="stylesheet">
<link rel="stylesheet" href="/css/highlights.css" media="all">
<!-- <link rel="stylesheet" href="/icons/css/fontawesome-all.min.css" media="all"> -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<style type="text/css">
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
	.colora{
		@if(isset(Auth::User()->ClientDetail->colora))
			color: {{Auth::User()->ClientDetail->colora}} !important;
		@else
			color: #565759 !important;
		@endif;
	}
	.colorb{
		@if(isset(Auth::User()->ClientDetail->colorb))
			color: {{Auth::User()->ClientDetail->colorb}} !important;
		@else
			color: #565759 !important;
		@endif;
	}
	.colorc{
		@if(isset(Auth::User()->ClientDetail->colorc))
			color: {{Auth::User()->ClientDetail->colorc}} !important;
		@else
			color: #565759 !important;
		@endif;
	}
	.backgrounda{
		@if(isset(Auth::User()->ClientDetail->colora))
			background-color: {{Auth::User()->ClientDetail->colora}} !important;
		@else
			background-color: #565759 !important;
		@endif;
	}
	.backgroundb{
		@if(isset(Auth::User()->ClientDetail->colorb))
			background-color: {{Auth::User()->ClientDetail->colorb}} !important;
		@else
			background-color: #565759 !important;
		@endif;
	}
	.backgroundc{
		@if(isset(Auth::User()->ClientDetail->colorc))
			background-color: {{Auth::User()->ClientDetail->colorc}} !important;
		@else
			background-color: #565759 !important;
		@endif;
	}
	.filla, .filla rect, .filla path{
		@if(isset(Auth::User()->ClientDetail->colora))
			fill: {{Auth::User()->ClientDetail->colora}} !important;
		@else
			fill: #565759 !important;
		@endif;
	}
	.fillb, .fillb rect, .fillb path{
		@if(isset(Auth::User()->ClientDetail->colorb))
			fill: {{Auth::User()->ClientDetail->colorb}} !important;
		@else
			fill: #565759 !important;
		@endif;
	}
	table.table.text-center.table-noborder.neighborhood-table td span {
	    display: inline-block;
	    line-height: 22px;
	    padding: 0px 8px;
	    border-radius: 25px;
	}
	.fillc, .fillc rect, .fillc path{
		@if(isset(Auth::User()->ClientDetail->colorc))
			fill: {{Auth::User()->ClientDetail->colorc}} !important;
		@else
			fill: #565759 !important;
		@endif;
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
</style>
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
    <h2 class="page-title">Highlights</h2>
    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}">Home</a></li>
      <li class="active">Highlights</li>
    </ol>
  </div>
</div>
<!-- Page Header End -->

<!-- Page Header End -->
<div class="cps-main-wrap">
	<div class="cps-section cps-section-padding cps-gray-bg" id="features">
		<div class="container">
			<div class="col-xs-12 report-header" id="content" @if(isset(Auth::User()->ClientDetail->colorc)) style="border-color: {{Auth::User()->ClientDetail->colorc}}" @endif>
				<div class="row">
					<div class="col-xs-12">
						<div class="col-xs-12 text-center">
							Community Feature Sheet&reg; Lite
						</div>
						<table class="table table-bordered">
							<thead>
								<tr>
									<td class="col-xs-9 report-address colora text-center">
										<strong><h3 style="margin-top:0px;">{{ $report->address }}</h3></strong>
									</td>
									<td class="col-xs-3 text-center">
										<img src="/{{ Auth::User()->ClientDetail->logo }}" class="img-responsive">
									</td>
								</tr>
							</thead>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 colorc report-inner-border" id="neighbors" @if(isset(Auth::User()->ClientDetail->colorc)) style="border-color: {{Auth::User()->ClientDetail->colorc}}" @endif>
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
					<div class="col-xs-12 colorc report-inner-border" id="demography" @if(isset(Auth::User()->ClientDetail->colorc)) style="border-color: {{Auth::User()->ClientDetail->colorc}}" @endif>
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
					<div class="col-xs-12 colorc report-inner-border" id="schools" @if(isset(Auth::User()->ClientDetail->colorc)) style="border-color: {{Auth::User()->ClientDetail->colorc}}" @endif>
						<div class="section-title">	
							<h3 class="colora text-center">Schools</h3>
							<div class="clearfix"></div>
						</div>
						<div class="row demographics-row">
							<div class="col-xs-12">
								<table class="table text-center table-bordered table-striped school-table">
									<tbody>
										<tr>
											<td class="col-xs-4">
												<div class="demographics-icon icon-before-title">
													<svg version="1.0" xmlns="http://www.w3.org/2000/svg"
													 width="56px" viewBox="0 0 32.000000 32.000000"
													 preserveAspectRatio="xMidYMid meet">
													<metadata>
													Created by potrace 1.15, written by Peter Selinger 2001-2017
													</metadata>
													<g transform="translate(0.000000,32.000000) scale(0.100000,-0.100000)"
													fill="#000000" stroke="none">
													<path d="M140 310 c0 -6 -27 -10 -60 -10 l-60 0 0 -44 c0 -24 5 -46 11 -48 6
													-2 1 -15 -11 -31 -14 -18 -19 -34 -15 -45 6 -15 8 -15 15 3 8 19 9 19 9 -1 1
													-12 -6 -27 -14 -34 -20 -16 -19 -34 0 -26 13 4 14 2 5 -14 -9 -16 -8 -20 5
													-20 8 0 15 -9 15 -20 0 -15 7 -20 25 -20 18 0 25 5 25 20 0 11 5 20 11 20 6 0
													9 7 5 15 -3 8 -1 15 4 15 15 0 12 26 -5 40 -8 7 -15 18 -14 24 0 7 2 7 5 -1 6
													-13 34 -6 34 7 0 5 -6 15 -12 22 -41 43 -42 48 -9 48 l31 0 0 -90 c0 -73 -3
													-90 -15 -90 -8 0 -15 -7 -15 -15 0 -11 12 -15 45 -15 33 0 45 4 45 15 0 8 -7
													15 -15 15 -12 0 -15 17 -15 90 l0 90 33 -1 c17 0 26 -3 20 -6 -16 -6 -17 -39
													-3 -48 7 -4 3 -19 -10 -39 -24 -39 -25 -50 -6 -43 15 6 31 -36 21 -53 -4 -6 8
													-10 25 -10 17 0 29 4 25 10 -9 15 6 60 21 60 19 0 17 10 -5 39 -14 18 -17 31
													-11 46 5 12 4 28 0 36 -7 10 -1 21 18 36 l27 23 -25 20 c-18 14 -40 20 -77 20
													-29 0 -53 5 -53 10 0 6 -7 10 -15 10 -8 0 -15 -4 -15 -10z"/>
													</g>
													</svg>
												</div>
												<div class="demographics-title colorc text-after-icon">Elementary</div>
											</td>
											<td class="col-xs-4">
												<div class="demographics-icon icon-before-title">
													<svg version="1.0" xmlns="http://www.w3.org/2000/svg"
													 width="56px" viewBox="0 0 442.000000 405.000000"
													 preserveAspectRatio="xMidYMid meet">
													<metadata>
													Created by potrace 1.15, written by Peter Selinger 2001-2017
													</metadata>
													<g transform="translate(0.000000,405.000000) scale(0.100000,-0.100000)"
													fill="#000000" stroke="none">
													<path d="M2650 4009 c-332 -51 -599 -282 -702 -609 -20 -66 -23 -94 -22 -230
													0 -126 4 -169 21 -231 83 -297 315 -524 612 -598 116 -29 305 -29 415 -1 254
													65 463 236 567 465 59 130 74 206 73 360 -1 155 -18 238 -72 358 -107 235
													-316 407 -567 468 -98 23 -238 31 -325 18z"/>
													<path d="M275 3986 c-57 -20 -79 -34 -121 -79 -72 -77 -89 -131 -88 -272 0
													-102 4 -120 43 -240 217 -656 564 -1232 1006 -1669 122 -120 290 -262 387
													-325 l87 -56 0 -657 1 -658 909 0 908 0 6 98 c4 53 12 217 19 365 l11 267 79
													0 78 0 0 -47 c0 -34 27 -620 30 -650 0 -2 165 -3 366 -3 l365 0 -6 263 c-18
													722 -29 866 -87 1067 -25 89 -84 221 -126 282 -60 88 -172 183 -280 237 -217
													109 -504 165 -1058 206 -232 17 -327 32 -471 74 -601 175 -1147 703 -1540
													1488 -63 126 -118 224 -137 242 -91 87 -245 115 -381 67z"/>
													</g>
													</svg>
												</div>
												<div class="demographics-title colorc text-after-icon">Junior High</div>
											</td>
											<td class="col-xs-4">
												<div class="demographics-icon icon-before-title">
													<svg version="1.0" xmlns="http://www.w3.org/2000/svg"
													 width="56px" viewBox="0 0 512.000000 512.000000"
													 preserveAspectRatio="xMidYMid meet">
													<metadata>
													Created by potrace 1.15, written by Peter Selinger 2001-2017
													</metadata>
													<g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
													fill="#000000" stroke="none">
													<path d="M963 5100 c-146 -53 -251 -168 -288 -315 -59 -232 72 -464 303 -540
													41 -13 77 -16 151 -13 86 3 104 7 171 39 163 79 253 223 253 404 0 182 -90
													325 -253 404 -70 33 -82 36 -180 38 -83 2 -116 -1 -157 -17z"/>
													<path d="M2180 4883 c-8 -3 -27 -17 -42 -31 l-28 -26 0 -374 0 -374 43 -48
													c24 -26 58 -75 76 -109 18 -33 36 -61 40 -61 5 0 20 9 35 21 l26 20 0 385 0
													384 1280 0 1280 0 0 -915 0 -915 -1280 0 -1280 0 0 100 c0 55 -3 100 -7 100
													-4 0 -53 -30 -110 -67 l-103 -68 0 -108 c0 -106 1 -109 28 -137 19 -19 43 -30
													73 -35 24 -3 669 -5 1434 -3 1492 3 1412 0 1446 52 22 33 26 2100 5 2151 -29
													69 68 65 -1493 64 -774 0 -1415 -3 -1423 -6z"/>
													<path d="M3231 4130 c-490 -333 -515 -348 -536 -334 -35 23 -115 29 -156 11
													-20 -8 -102 -60 -183 -116 l-146 -100 0 47 c0 204 -150 394 -368 466 -112 37
													-197 47 -371 44 l-154 -3 -101 -167 c-55 -91 -103 -165 -106 -163 -3 2 -50 78
													-105 169 l-100 165 -158 1 c-163 0 -261 -10 -357 -37 -190 -54 -328 -193 -365
													-370 -22 -103 -22 -1227 0 -1300 27 -90 107 -139 211 -131 66 6 118 43 152
													108 l22 44 0 548 0 548 55 0 55 0 0 -1663 c0 -1852 -5 -1729 68 -1809 78 -87
													212 -114 317 -64 61 29 97 65 127 131 l23 50 3 1093 3 1092 49 0 49 0 3 -1092
													3 -1093 23 -50 c30 -66 66 -102 127 -131 133 -63 302 -2 362 131 17 38 18 127
													21 1723 l2 1682 55 0 55 0 0 -165 c0 -90 5 -187 11 -215 22 -105 117 -170 224
													-153 52 8 680 424 721 478 31 41 44 123 26 174 l-11 30 497 337 c273 185 503
													342 510 349 12 10 10 19 -10 49 -12 20 -25 36 -28 36 -3 -1 -236 -158 -519
													-350z"/>
													</g>
													</svg>
												</div>
												<div class="demographics-title colorc text-after-icon">Senior High</div>
											</td>
										</tr>
										<tr id="school-data">
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
												$('#school-data').html(html);
												checkComplete();
												}
												});
											</script>
											@endif
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="col-xs-12 colorc report-inner-border" id="playground" @if(isset(Auth::User()->ClientDetail->colorc)) style="border-color: {{Auth::User()->ClientDetail->colorc}}" @endif>
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
					<div class="col-xs-12 colorc report-inner-border" id="recreation" @if(isset(Auth::User()->ClientDetail->colorc)) style="border-color: {{Auth::User()->ClientDetail->colorc}}" @endif>
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
					<div class="col-xs-12 colorc report-inner-border" id="transit" @if(isset(Auth::User()->ClientDetail->colorc)) style="border-color: {{Auth::User()->ClientDetail->colorc}}" @endif>
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
					<div class="col-xs-12 colorc report-inner-border" id="library" @if(isset(Auth::User()->ClientDetail->colorc)) style="border-color: {{Auth::User()->ClientDetail->colorc}}" @endif>
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
					<div class="col-xs-12 colorc report-inner-border" id="map" @if(isset(Auth::User()->ClientDetail->colorc)) style="border-color: {{Auth::User()->ClientDetail->colorc}}" @endif>
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

						<div id="footer" class="row backgroundc" @if(isset(Auth::User()->ClientDetail->colora)) style="border-color: {{Auth::User()->ClientDetail->colora}}" @endif>
							<div class="col-xs-4">
								<h4 class="colora text-uppercase for-more-info">For more information:</h4>
								<div class="row">
									<div class="col-xs-4">
										<div class="pull-left">
											<img src="/{{ Auth::User()->ClientDetail->photo }}" class="img-responsive">
										</div>
									</div>
									<div class="col-xs-8">
										<div class="pull-left">
											<img src="/{{ Auth::User()->ClientDetail->logo }}" class="img-responsive footer-client-logo">
											<p class="footer-text">{{ Auth::User()->ClientDetail->title }}</p>
											<p class="footer-text">{{ Auth::User()->ClientDetail->email }}</p>
											<p class="footer-text">{{ Auth::User()->ClientDetail->phone }}</p>
										</div>
									</div>
									<!--
									<div class="col-xs-4">
									<img src="{{ Auth::User()->ClientDetail->logo }}" class="img-responsive footer-client-logo">
									</div>
									-->
								</div>
							</div>
							<div class="col-xs-8">
								<div class="row">
									<div class="col-xs-9 pull-left">
										<h5 class="colora">To order a Community Feature Sheet, visit <a href="{{url('/')}}" class="colora"><strong>www.vooymarketinginc.com</strong></a></h5>
									</div>
									<div class="col-xs-3 pull-left">
										<div class="text-right">
											<img src="{{url('img/footer-logo.png')}}"   alt="{{ config('app.name', 'HoodQ') }}" class="img-responsive" height="70" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12 pull-left" id="disclaimer">
										<p>Disclaimer<br>
											© {{ date('Y') }} by VOOY MARKETING INC. All rights reserved. 
											No part of this document may be reproduced or transmitted in any form or by any means, electronic, mechanical, photocopying, recording, or otherwise, without prior written permission of VOOY MARKETING INC. This feature sheet has been prepared solely for general information purposes only. The publisher and agent(s) are not liable for errors or omissions. No warranties
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

