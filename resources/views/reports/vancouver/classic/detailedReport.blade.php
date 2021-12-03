@extends('layouts.template')
@section('content')
<!-- Page Header -->
<div class="page-header style-11">
  <div class="container">
    <h2 class="page-title">View Detailed Report</h2>
    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}">Home</a></li>
      <li class="active">View Detailed Report</li>
    </ol>
  </div>
</div>
<!-- Page Header End -->

<!-- Page Header End -->
<div class="cps-main-wrap">
	<div class="cps-section cps-section-padding cps-gray-bg" id="features">
		<div class="container">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-9">
			    		<a class="" href="{{ url('/') }}">
			                <img src="https://communityfeaturesheet.com/image/cache/catalog/b22701_4a3021c8bf964e0980b68bae5eb82079-586x133.gif"   alt="{{ config('app.name', 'HoodQ') }}" />
			            </a>
			            <br>
			            <br>
			        </div>					
					<div class="clearfix"></div>
					<div class="col-md-6" id="pageHeader">
						<div class="details">
							<h1>{{ $report->address }}</h1>
						</div>
					</div>
					<script type="text/javascript">
						$.addTemplateFormatter("UpperCaseFormatter",
						    function(value, template) {
						    	floatVal=parseFloat(value)/1000;
						        return floatVal.toFixed(2);
						    });	

					</script>
					<div class="col-md-9">

						@foreach(App\dataApi::all() as $api)
						<h2>{{ $api->title }}</h2>
						{!! $api->container !!}
						<script type="text/html" id="api-{{ $api->apiId }}">
						{!! $api->template !!}
						</script>
						<script type="text/javascript">
							$.ajax({
								url:'{{ url('/report/getApiData/'.$report->reportId.'/'.$api->apiId) }}',
								dataType:'json',
								success:function(data){
									$("#apiContainer-{{ $api->apiId }}").loadTemplate($("#api-{{ $api->apiId }}"),data);

								}
							})
							
						</script>
						@endforeach
				
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<style type="text/css">
	#pageHeader{
		border: 3.5px solid #565759!important;
    border-top: 0;
    padding-top: 20px;
    padding-bottom: 5px;
	}

</style>
<script>
	$('#address').val('{{ $report->address }}');
</script>
@endsection
@section('nav')              
<li>
	<a href="{{ url('report/highlights/'.$report->reportId) }}">View Highlights</a>
</li>
<li>
	<a href="{{ url('report/detailed/'.$report->reportId) }}">View Detailed Report</a>
</li>                          
<li>
	<a href="">Save & Print</a>
</li>                
@endsection