@extends('layouts.template')
@section('content')
<style>
.profileimgsec > img {
	border-radius: 0;
	height: unset;
	width: unset;
	max-width: 250px;
}

.list-group-item {
	border: none;
}
.admin-sub-title{
	margin-top: 0px;
}
.admin-sub i{
	background: #317BB6;
	padding: 5px;
	font-size: 13px;
	border-radius: 50%;
	color:#fff;
	text-align: center;
}
.insight-icon{
	margin: 6px !important;
	height: 45px;
	width: 45px;
}
.change-password-box{
	border-top:unset;
	border-left:3px solid #E12A4C !important;
}

.faqs-link-box{
	border-top:unset;
	border-left:3px solid #E12A4C !important;
	background: #F7F7F7;
	text-align: center;
	display: block;
	color: #262626;
	padding: 15px 0px;
}
.payment-and-invoice{
	padding:5px 15px !important;
}
.user-personal-setail{
	font-size:13px;
}
.user-personal-setail{
	padding:10px 8px !important;
}
.user-plan-city{
	font-size:13px;
	padding:10px 8px !important;	
}
.selected-color-box{
	padding: 5px 10px;
	box-shadow: 0px 0px 2px gray;
	text-align: center;
	border-radius: 5px;
	margin-top: 10px;
}
.selected-color-box .color-com-title{
	font-weight: bold;
	margin-bottom: 0px;
	border-bottom: 1px solid #e2e2e2;
}
.selected-color-box .color-com-name{
	font-size: 14px;
}
</style>



<!-- Page Header -->
<div class="page-header style-11">
  <div class="container">
    <h2 class="page-title">Profile View</h2>
    <ol class="breadcrumb">
      <li><a href="{{ Route('home') }}">Home</a></li>
      <li><a href="{{ Route('dashboard') }}">Dashboard</a></li>
      <li class="active">Profile View</li>
    </ol>
  </div>
</div>
<!-- Page Header End -->
<div class="cps-main-wrap">
  	<div class="cps-section cps-section-padding">
    	<div class="container">
    		@if(Auth::user()->user_type == 2)
				<div class="row">
					<div class="col-lg-12 admin-sub alert alert-info">
						<h3 class="admin-sub-title">Your Team Administrator</strong></h3>
						<p>
							<strong><i class="fa fa-user-circle-o" aria-hidden="true"></i> Name: </strong>{{ Auth::user()->teamLeader->firstName.' '.Auth::user()->teamLeader->lastName }}<br>
							<strong><i class="fa fa-envelope" aria-hidden="true"></i> Email: </strong>{{ Auth::user()->teamLeader->email}}
						</p>
					</div>
				</div>
			@endif
    		<div class="row">
    			<div class="col-md-12 text-right">
    				<h3>Credit Balance = ${{ number_format($user->userCredit(),2) }}</h3>
    			</div>
    		</div>
    		<div class="row">
				<div class="col-md-3 profile-left">
					<div class="row">
						<div class="col-md-12 profile-img">
							@if (isset($details->photo))
								<img src="{{ url('/'.$details->photo) }}" alt="{{ $user->firstName }} {{ $user->lastName }}">
							@else
								<img src="{{ asset('img/your-image-here2.png')}}" class="img-responsive">
							@endif
							<div class="name text-center">{{ $user->firstName }} {{ $user->lastName }}</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="profile-left-details">
								<div class="row m-0">
									<div class="col-md-12 details-sub user-plan-city">
										@if(Auth::user()->user_type != 2)
											<strong>Plan :</strong> 
											@if(!empty($plan->name))
												<a href="{{ url('/account/manage') }}" target="_blank">{{ $plan->name }}</a>
											@endif
											<br>
										@endif
										<strong>City :</strong> 
										@if(!empty($cityArray[$user->region]))
											{{ $cityArray[$user->region] }}
										@endif
									</div>
									<div class="col-md-12 details-sub mt-10 user-personal-setail">
										<strong>Title: </strong>
										<a href="#" id="title" data-type="text" data-pk="{{$user->userId}}" data-url="/account/update-user-info" data-title="Enter Title">{{ $details->title }}</a>
										<br>

										<strong>Phone: </strong>
										<a href="#" id="phone" data-type="text" data-pk="{{$user->userId}}" data-url="/account/update-user-info" data-title="Enter Phone">{{ $details->phone }}</a>

										<br>
										<strong>Email: </strong>
										<a href="#" id="email" data-type="email" data-pk="{{$user->userId}}" data-url="/account/update-user-info" data-title="Enter Email">{{ $details->email }}</a>

									</div>
									<!-- <div class="col-md-12 details-sub mt-10">
										<strong>Address :</strong> -
									</div> -->
									@if(Auth::user()->user_type != 2)
									<div class="col-md-6 details-sub mt-10 payment-and-invoice">

										<a href="{{ url('/account/updateCard') }}" target="_blank" class="profile-right-second-sub">
											<i class="fa fa-money"></i>
											<h5>Payment Info</h5>
										</a>
									</div>
									<div class="col-md-6 details-sub mt-10 payment-and-invoice">
										<a href="{{ Route('user.invoices') }}" target="_blank" class="profile-right-second-sub">
											<i class="fa fa-id-card"></i>
											<h5>Invoice <br>&nbsp;</h5>
										</a>
									</div>
									@endif


								</div>
							</div>
						</div>
						<div class="col-md-12">
							<a href="{{ url('/account/password') }}" target="_blank" class="profile-right-third-sub change-password-box">
								<i class="fa fa-key"></i>
								<h5>Change Password</h5>
							</a>
						</div>
						<div class="col-md-12 mt-10">
							<div class="faqs-link-box">
								<p>Have any question?</p>
								<br>
								<p>Check out the <a href="{{ url('/faqs') }}" target="_blank" class="">FAQ</a> page</p>
							</div>
						</div>
					</div>
				</div>
    			<div class="col-md-9">
					<div class="row profile-right">
						<div class="col-md-12 profile-right-first">
							<div class="row main-box">
								<div class="col-md-4 profile-logo text-center">
									<h4>My Logo</h4>
									<div>
									@if (isset($details->logo))
									<img src="{{url('/'.$details->logo)}}" alt="{{ $details->title }}">
									@else
									<img src="/img/your-logo.png" class="top-logo img-responsive">
									@endif
									</div>
								</div>
								<div class="col-md-8 profile-right-color-main">
									<div class="row">
										<div class="col-md-8 color-hedding text-center">
											<h1>My Colours </h1> 
										</div>
										<div class="col-md-4">
											<div class="selected-color-box">
												<p class="color-com-title">Current Selection</p>
												<p class="color-com-name">{{ auth()->user()->profileColor->name ?? 'No Selection' }}</p>
											</div>
										</div>
										<div class="col-md-12 color-hedding text-left">
											<label class="text-left">Select Colour Combination</label>
										</div>
										<div class="col-md-12 color-hedding text-center">
											@if(!empty($profileColour))
												<select class="form-control select-colour" style="border-radius:0px;">
													<option value="no-select">--- Select Colour Combination ---</option>
													@foreach($profileColour as $key=>$value)
														<option name="{{ $value->name }}" data-name="{{ $value->name }}">{{ $value->name }}</option>
													@endforeach
												</select>
											@endif
										</div>
										<div class="col-md-6 profile-right-color text-center mt-10">
											<div class="sub" data-pk="{{$user->userId}}">
											<!-- <h5 style="color:{{ isset($details->colora) ? $details->colora : $default_colors['colora']}}">Headings</h5> -->
											<h5 style="color:#000">Headings</h5>

											<div class="input-group showcolorpicker-2" data-color="{{ isset($details->colora) ? $details->colora : $default_colors['colora']}}">
											  	<input type="text" name="colora" class="form-control colora color-box Heddings" style="background-color:{{ isset($details->colora) ? $details->colora : $default_colors['colora']}}"/>
											</div>
											</div>
										</div>
										<div class="col-md-6 profile-right-color text-center mt-10">
											<div class="sub" data-pk="{{$user->userId}}">
											<!-- <h5 style="color:{{ isset($details->colorb) ? $details->colorb : $default_colors['colorb']}}">Sub-Headings</h5> -->
											<h5 style="color:#000">Sub-Headings</h5>
											<div class="input-group showcolorpicker-2" data-color="{{ isset($details->colorb) ? $details->colorb : $default_colors['colorb']}}">
											  	<input type="text" name="colorb" class="form-control colorb color-box Sub-Headings-bg" style="background-color:{{ isset($details->colorb) ? $details->colorb : $default_colors['colorb']}}"/>
											</div>
											</div>
										</div>
										<div class="col-md-6 profile-right-color text-center">
											<div class="sub" data-pk="{{$user->userId}}">
											<!-- <h5 style="color:{{ isset($details->colorc) ? $details->colorc : $default_colors['colorc']}}">Footer</h5> -->
											<h5 style="color:#000">Footer</h5>
											<div class="input-group showcolorpicker-2" data-color="{{ isset($details->colorc) ? $details->colorc : $default_colors['colorc']}}">
											  	<input type="text" name="colorc" class="form-control colorc color-box Footer-bg" style="background-color:{{ isset($details->colorc) ? $details->colorc : $default_colors['colorc']}}"/>
											</div>
											</div>
										</div>
										<div class="col-md-6 profile-right-color text-center">
											<div class="sub" data-pk="{{$user->userId}}">
											<!-- <h5 style="color:{{ isset($details->colord) ? $details->colord : $default_colors['colord']}}">Background 1</h5> -->
											<h5 style="color:#000">Background 1</h5>
											<div class="input-group showcolorpicker-2" data-color="{{ isset($details->colord) ? $details->colord : $default_colors['colord']}}">
											  	<input type="text" name="colord" class="form-control colord color-box Background_1-bg" style="background-color:{{ isset($details->colord) ? $details->colord : $default_colors['colord']}}"/>
											</div>
											</div>
										</div>
										<div class="col-md-6 profile-right-color text-center">
											<div class="sub" data-pk="{{$user->userId}}">
											<!-- <h5 style="color:{{ isset($details->colore) ? $details->colore : $default_colors['colore']}}">Background 2</h5> -->
											<h5 style="color:#000">Background 2</h5>
											<div class="input-group showcolorpicker-2" data-color="{{ isset($details->colore) ? $details->colore : $default_colors['colore']}}">
											  	<input type="text" name="colore" class="form-control colore color-box Background_2-bg" style="background-color:{{ isset($details->colore) ? $details->colore : $default_colors['colore']}}"/>
											</div>
											</div>
										</div>
										<div class="col-md-6 profile-right-color text-center">
											<div class="sub" data-pk="{{$user->userId}}">
											<!-- <h5 style="color:{{ isset($details->colorf) ? $details->colorf : $default_colors['colorf']}}">Icons Only</h5> -->
											<h5 style="color:#000">Icons Only</h5>
											<div class="input-group showcolorpicker-2" data-color="{{ isset($details->colorf) ? $details->colorf : $default_colors['colorf']}}">
											  	<input type="text" name="colorf" class="form-control colorf color-box Icons_Only-bg" style="background-color:{{ isset($details->colorf) ? $details->colorf : $default_colors['colorf']}}"/>
											</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-12 profile-right-second">
							<div class="row main-box">
								<div class="col-md-4">
									<a href="{{ url('/account/transactions') }}" target="_blank" class="profile-right-second-sub">
										<i class="fa fa-bar-chart"></i>
										<h5>CFS Report</h5>
									</a>
								</div>
								<div class="col-md-4">
									<a href="{{ Route('flyers-list') }}" target="_blank" class="profile-right-second-sub">
										<i class="fa fa-bar-chart"></i>
										<h5>PFS Report</h5>
									</a>
								</div>
								<div class="col-md-4">
									<a href="{{ Route('hdis-list') }}" target="_blank" class="profile-right-second-sub">
										<i class="fa fa-bar-chart"></i>
										<h5>HDI Report</h5>
									</a>
								</div>
							</div>
						</div>		
						
						<div class="col-md-12 profile-right-third">
							<div class="row main-box">
								<div class="col-md-6">
									<a href="" target="_blank" class="profile-right-third-sub">
										<img src="/img/ecard.png" class="insight-icon">
										<h5 style="margin-top: 25px;">Ecards <small>(Coming Soon)</small></h5>
									</a>
								</div>
								<div class="col-md-6">
									<a href="{{ route('my.surveys') }}" target="_blank" class="profile-right-third-sub">
										<img src="/img/insight.png" class="insight-icon">
										<h5 style="margin-top: 25px;">REALTORS® Market Sentiment Survey Report</h5>
									</a>
								</div>
							</div>
						</div>		
					</div>
				</div>
    		</div>	
		</div>

		<!-- <div class="container">
    		<div class="row">
    			<div class="col-md-4" style="text-align: center; padding-bottom: 20px; padding-top: 20px;">
					<div class="profileimgsec">
						<img src="{{ url('/'.$details->photo) }}" alt="{{ $user->firstName }} {{ $user->lastName }}">
						<div class="nm">{{ $user->firstName }} {{ $user->lastName }}</div>
					</div>
					<br>
					<ul class="list-group">
				        <li class="list-group-item">
				            <a type="button" class="btn btn-primary" href="{{ url('/account/updateCard') }}">Manage Account</a>
				        </li>
				        <li class="list-group-item">
				            <a type="button" class="btn btn-primary" href="{{ url('/account/transactions') }}">My Reports</a>
				        </li>
				    </ul>
				</div>
				<div class="col-md-8" style="padding-top: 20px; padding-bottom: 20px;">
					<div class="profiledetail">
						<div class="contactinfo">
							<div class="profile-detail-row row" style="border: 0px;">
								<div class="col-md-12 ttl">Client Logo</div>
							</div>
							<div class="profile-detail-row row" style="border: 0px;">
								<img src="{{url('/'.$details->logo)}}" alt="{{ $details->title }}" style="max-width: 300px;">
							</div>
							<div class="profile-detail-row row">
								<div class="col-md-12 ttl">Contact Information</div>
							</div>
							<div class="profile-detail-row row">
								<div class="col-md-4 ud_ttl">Email</div>
								<div class="col-md-8 ud_dtl">{{ $user->email }}</div>
							</div>
							<div class="profile-detail-row row">
								<div class="col-md-4 ud_ttl">Name</div>
								<div class="col-md-8 ud_dtl">{{ $user->firstName }} {{ $user->lastName }}</div>
							</div>
							<div class="pfl_edit"><a href="{{ url('/account/profile') }}" class="btn btn-primary">Update Profile</a></div>
						</div>
						<div class="additionalinfo">
							<div class="profile-detail-row row">
								<div class="col-md-12 ttl">Additional Information</div>
							</div>
							<div class="profile-detail-row row">
								<div class="col-md-4 ud_ttl">Title</div>
								<div class="col-md-8 ud_dtl">{{ $details->title }}</div>
							</div>
							<div class="profile-detail-row row">
								<div class="col-md-4 ud_ttl">Region</div>
								<div class="col-md-8 ud_dtl">{{ $user->region }}</div>
							</div>
							<div class="profile-detail-row row">
								<div class="col-md-4 ud_ttl">Contact Phone</div>
								<div class="col-md-8 ud_dtl">{{ $details->phone }}</div>
							</div>
							<div class="profile-detail-row row">
								<div class="col-md-4 ud_ttl">Work Email</div>
								<div class="col-md-8 ud_dtl">{{ $user->email }}</div>
							</div>
							<div class="profile-detail-row row">
								<div class="col-md-4 ud_ttl">Plan</div>
								@if(!empty($plan->name))
									<div class="col-md-8 ud_dtl">{{ $plan->name }}</div>
								@endif
							</div>
							<div class="profile-detail-row row">
								<div class="col-md-4 ud_ttl">Color #1</div>
								<div class="col-md-8 ud_dtl">(Headings, walk distance icon)<input type="text" name="colora" disabled="disabled" class="form-control colora" style="width: 50px; background-color:{{ isset($details->colora) ? $details->colora : 'rgb(0, 0, 0)'}}"/></div>
							</div>
							<div class="profile-detail-row row">
								<div class="col-md-4 ud_ttl">Color #2</div>
								<div class="col-md-8 ud_dtl">(Sub-Headings, section icons)<input type="text" name="colorb" disabled="disabled" class="form-control colorb" style="width: 50px;background-color:{{ isset($details->colorb) ? $details->colorb : 'rgb(0, 0, 0)'}}"/></div>
							</div>
							<div class="profile-detail-row row">
								<div class="col-md-4 ud_ttl">Color #3</div>
								<div class="col-md-8 ud_dtl">(Footer background color)<input type="text" name="colorc" disabled="disabled" class="form-control colorc" style="width: 50px;background-color:{{ isset($details->colorc) ? $details->colorc : 'rgb(0, 0, 0)'}}"/></div>
							</div>
						</div>
					</div>
				</div>
    		</div>
    	</div> -->	
	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="profilePic">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        	<div class="row">
		  		<div class="col-md-12">
		  			<center>
					<div id="upload-demo" style="width:400px"></div>
					</center>
		  		</div>
		  		<div class="col-md-12" >
					<strong>Select Image:</strong>
					<br/>
					<input type="file" id="upload">
					<br/>
					<center>
        			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button class="btn btn-success upload-result">Upload Image</button>
					</center>
		  		</div>
		  	</div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="profileLogo">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        	<div class="row">
		  		<div class="col-md-12">
		  			<center>
					<div id="upload-demo-2" style="width:800px"></div>
					</center>
		  		</div>
		  		<div class="col-md-12" >
					<strong>Select Logo:</strong>
					<br/>
					<input type="file" id="upload-2">
					<br/>
					<center>
        			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button class="btn btn-success upload-result-2">Upload Logo</button>
					</center>
		  		</div>
		  	</div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- payment success model -->
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog payment-model">
    
      <div class="modal-content">
        <div class="modal-header">
          <div class="col-md-12 text-center">
          	<h4 class="modal-title">You have successfully placed your order</h4>
          </div>
        </div>
        <div class="modal-body">
        	<div class="col-md-12 text-center">
				<i class="fa fa-check-circle" aria-hidden="true"></i>
        	</div>
        </div>
        <div class="modal-footer">
        	<div class="col-md-12 text-center">
          		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        	</div>
        </div>
      </div>
      
    </div>
  </div>
  <div class="modal fade" id="plan-purchase" role="dialog">
    <div class="modal-dialog payment-model">
    
      <div class="modal-content">
        <div class="modal-header">
          <div class="col-md-12 text-center">
          	<h4 class="modal-title">You have successfully purchased a plan</h4>
          </div>
        </div>
        <div class="modal-body">
        	<div class="col-md-12 text-center">
				<i class="fa fa-check-circle" aria-hidden="true"></i>
        	</div>
        </div>
        <div class="modal-footer">
        	<div class="col-md-12 text-center">
          		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        	</div>
        </div>
      </div>
      
    </div>
  </div>
<!-- payment success model -->

@endsection

@section('footer_script')
<script src="/newPlugin/croppie.min.js"></script>
<link rel="stylesheet" href="/newPlugin/croppie.css">
<link href="/newPlugin/bootstrap-editable.css" rel="stylesheet"/>
<link href="/newPlugin/toastr.min.css" rel="stylesheet"/>
<link href="/newPlugin/bootstrap-colorpicker-plus.css" rel="stylesheet"/>
<style type="text/css">
	.plyr{
		display: inline;
	}
</style>
<script src="/newPlugin/bootstrap-editable.min.js"></script>
<script src="/newPlugin/bootstrap-colorpicker-plus.js"></script>
<script src="/newPlugin/toastr.min.js"></script>
<script type="text/javascript">

	toastr.options = {
	"closeButton": false,
	"debug": false,
	"newestOnTop": false,
	"progressBar": false,
	"positionClass": "toast-bottom-right",
	"preventDuplicates": false,
	"onclick": null,
	"showDuration": "300",
	"hideDuration": "1000",
	"timeOut": "5000",
	"extendedTimeOut": "1000",
	"showEasing": "swing",
	"hideEasing": "linear",
	"showMethod": "fadeIn",
	"hideMethod": "fadeOut"
	};

	$(document).ready(function() {
		$.fn.editable.defaults.ajaxOptions = {type: "GET"};
	    $('#title').editable({
	        validate: function(value) {
	           if($.trim(value) == '') return 'This field is required';
	        },
	        success: function(response, newValue) {
			  toastr.success('You profile updated successfully', 'Profile updated!');
			}
	    });

	    $('#phone').editable({
	        validate: function(value) {
	           if($.trim(value) == '') return 'This field is required';
	        },
	        success: function(response, newValue) {
			  toastr.success('You profile updated successfully', 'Profile updated!');
			}
	    });

	    $('#email').editable({
	        validate: function(value) {
	           if($.trim(value) == '') return 'This field is required';
	        },
	        success: function(response, newValue) {
			  toastr.success('You profile updated successfully', 'Profile updated!');
			}
	    });
	    
	});

	var tt = 0;
	$('.showcolorpicker-2').colorpickerplus()
    .on('changeColor', function (e, color) {
          $(this).parents(".sub").find(".color-box").css('background-color', color);
          ++tt;
          // if (tt>4) {
          	var name = $(this).parents(".sub").find(".color-box").attr("name");
          	var pk = $(this).parents(".sub").attr("data-pk");
			$.ajax({
			  url: "/account/update-user-info",
			  method: "GET",
			  data: {name:name, pk:pk, value:color,field:'color'}
			}).done(function(){
				$('.color-com-name').html('No Selection');
			  	toastr.success('You profile updated successfully', 'Profile updated!');
			});

          // }
    });

    
    $('.select-colour').on('change', function() {
	  	var name = $(this).find(":selected").val();
	  	$.ajax({
			url: "/account/select/colour-name",
			type: "GET",
			data: {_token:token,name:name},
			success: function(data) {
				$('.color-com-name').html(data.success);
				$('.Heddings').css('background',data.success.headings);
				$('.Sub-Headings-bg').css('background',data.success.sub_headings);
				$('.Footer-bg').css('background',data.success.footer);
				$('.Background_1-bg').css('background',data.success.background_1);
				$('.Background_2-bg').css('background',data.success.background_2);
				$('.Icons_Only-bg').css('background',data.success.icons_only);
				toastr.success('You profile updated successfully', 'Profile updated!');
			}
		});
	});

    $(".profile-img img").click(function(){
    	$('#profilePic').modal('show');
    });

    $uploadCrop = $('#upload-demo').croppie({
		enableOrientation: true,
	    enableExif: true,
	    viewport: {
	        width: 265,
	        height: 300
	    },
	    boundary: {
	        width: 400,
	        height: 400
	    }
	});

	$('#upload').on('change', function () { 
		var reader = new FileReader();
	    reader.onload = function (e) {
	    	$uploadCrop.croppie('bind', {
	    		url: e.target.result
	    	}).then(function(){
	    		console.log('jQuery bind complete');
	    	});
	    	
	    }
	    reader.readAsDataURL(this.files[0]);
	});


	$('.upload-result').on('click', function (ev) {
		$uploadCrop.croppie('result', {
			type: 'canvas',
			size: 'viewport'
		}).then(function (resp) {

			var _token = $("meta[name='_token']").attr("content");
			var id = $(".sub").attr("data-pk");

			$.ajax({
				url: "/account/update-user-photos",
				type: "POST",
				data: {"image":resp, _token:_token, id:id, column: "photo"},
				success: function (data) {
					$(".profile-img img").attr("src", resp);
					$('#profilePic').modal('hide');
					toastr.success('You profile updated successfully', 'Profile updated!');
				}
			});

		});
	});

	$(".profile-logo img").click(function(){
    	$('#profileLogo').modal('show');
    });

    $uploadCrop2 = $('#upload-demo-2').croppie({
	    // viewport: {
	    //     width: 215,
	    //     height: 215
	    // },
	    // boundary: {
	    //     width: 800,
	    //     height: 400
	    // },
		enableExif: true,
	    showZoomer: true,
	    enableResize: true,
	    enableOrientation: true,
	    mouseWheelZoom: 'ctrl'
	});

	$('#upload-2').on('change', function () { 
		var reader = new FileReader();
	    reader.onload = function (e) {
	    	$uploadCrop2.croppie('bind', {
	    		url: e.target.result
	    	}).then(function(){
	    		console.log('jQuery bind complete');
	    	});
	    	
	    }
	    reader.readAsDataURL(this.files[0]);
	});


	$('.upload-result-2').on('click', function (ev) {
		$uploadCrop2.croppie('result', {
			type: 'canvas',
			size: 'viewport'
		}).then(function (resp) {
			var _token = $("meta[name='_token']").attr("content");
			var id = $(".sub").attr("data-pk");
			$.ajax({
				url: "/account/update-user-photos",
				type: "POST",
				data: {"image":resp, _token:_token, id:id, column: "logo"},
				success: function (data) {
					$(".profile-logo img").attr("src", resp);
					$('#profileLogo').modal('hide');
					toastr.success('You profile updated successfully', 'Profile updated!');
				}
			});
		});
	});

	@if(isset($img) && $img == 'logo')
		$(".profile-logo img").click();
	@endif

	@if(isset($img) && $img == 'profile')
		$(".profile-img img").click();
	@endif

	@if(session('payment'))
		$('#myModal').modal('show');
		<?php session()->forget('payment'); ?>
	@endif
	
	@if(session('planpurchase'))
		$('#plan-purchase').modal('show');
		<?php session()->forget('planpurchase'); ?>
	@endif

</script>
@endsection