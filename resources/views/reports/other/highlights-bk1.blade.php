@extends('layouts.template')
@section('content')
<link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,600,700,800,900" rel="stylesheet">
<link rel="stylesheet" href="/css/highlights.css" media="all">
<link rel="stylesheet" href="icons/css/fontawesome-all.min.css" media="all">
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
			<div class="col-xs-12" id="content" @if(isset(Auth::User()->ClientDetail->colorc)) style="border-color: {{Auth::User()->ClientDetail->colorc}}" @endif>
				<div class="row">
					<div class="col-xs-12">
						<div class="col-xs-12 text-center">
							Community Feature Sheet&reg; Lite
						</div>
						<table class="table table-bordered">
							<thead>
								<tr>
									<td class="col-xs-9 report-address colora text-center">
										<strong><h3 style="margin-top:17px;">{{ $report->address }}</h3></strong>
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
											<td width="50%">
											<div class="demographics-title colorc">Public</div>
											</td>
											<td width="50%">
											<div class="demographics-title colorc">Catholic</div>
											</td>
										</tr>
										<tr>
											<td>
												<div id="school">
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
											</td>
											<td>
												<div id="catholic">
													@if($catholic!=null)
													{!! $catholic !!}
													@else
														<script type="text/javascript">
														$.ajax({
														url:'{{ url('/report/getApi/catholic/'.$report->reportId) }}',
														dataType:'html',
														beforeSend:function(){
														scripts++;
														},
														success:function(html){
														$('#catholic').html(html);
														checkComplete();
														}
														});
														</script>
													@endif
												</div>
											</td>
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
								<h4 class="colora text-uppercase">For more information:</h4>
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
										<h4 class="colora">To order a Community Feature Sheet, visit <a href="{{url('/')}}" class="colora"><strong>www.vooymarketinginc.com</strong></a></h4>
										<p><strong>© 2018 by VOOY MARKETING INC. All rights reserved.</strong></p>
									</div>
									<div class="col-xs-3 pull-left">
										<div class="text-center">
											<img src="{{url('img/logo.gif')}}"   alt="{{ config('app.name', 'HoodQ') }}" class="img-responsive" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12 pull-left">
										<p>No part of this document may be reproduced or transmitted in any form or by any means, electronic, mechanical, photocopying, recording, or otherwise, without prior written permission of VOOY MARKETING INC. This feature sheet has been prepared solely for general information purposes only. The publisher and agent(s) are not liable for errors or omissions. No warranties</p>
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
<li>
	<a href="{{ url('report/highlights/'.$report->reportId) }}">View Highlights</a>
</li>
<li>
	<a href="{{ url('report/detailed/'.$report->reportId) }}">View Detailed Report</a>
</li>                          
<li>
	<a href="javascript:window.print()">Save & Print</a>
	<!-- <a href="javascript:window.print()" onclick="printDiv()">Save & Print</a> -->
	
</li>
<script>
	//$('#address').val('{{ $report->address }}');
</script>
@endsection

<script>
	/*
	function printDiv() {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
*/
</script>

