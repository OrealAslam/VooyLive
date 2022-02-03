@extends('layouts.template')
@section('content')
<link href="/newPlugin/toastr.min.css" rel="stylesheet"/>
<style>
	div.box {
		border: 1px solid #ea2349;
		box-shadow: 0 15px 20px rgba(0, 0, 0, 0.3);
		margin-top: 172px;
	}
	div.box div.ele1 {
		padding-bottom: 30px;
		padding-top: 20px;
		background: #ffffff;
	}
	div.box div.ele2 {
		border-left: 1px solid #ea2349;
		padding-bottom: 30px;
		padding-top: 20px;
		background: #ffffff;
	}
	div.box div.ele2 .input-group {
		display: block;
	}
	div.box div.ele2 .input-group input{
		width: 90%;
		margin: 0;
		float: left;
		padding: 0 10px;
		height: 40px;
		border-radius: 0;
	}

	div.box div.ele2 .input-group .input-group-addon {
		float: left;
		margin: 0;
		width: 10%;
		height: 40px;
		padding: 0;
		line-height: 37px;
		background: #EA2448;
		color: #fff;
		border: none;
		border-radius: 0;
		cursor: pointer;
	}
	div.referral-bg1 {
	    background-image: url('/img/bg/header.jpg');
	    background-position: center center;
	    background-size: cover;
	    margin: 0;
	    /*padding: 257px 0 90px;*/
	    border: none;
	    height: 381px;
	    margin-bottom: 76px;
	}
	.referral-bg1 .cps-section-header {
		margin-bottom: 0px;
	}
	.referral-bg1 .cps-section-padding {
		padding-top: 40px;
	}
	@media screen and (max-width: 767px) {
		div.referral-bg1 {
			height: 466px;
		}
		.cps-section-header .cps-section-title {
			font-size: 2.6rem;
		}
		div.box {
			margin-top: 40px;
			margin-left: 10px;
			margin-right: 10px;
		}
		div.box div.ele1 {
			padding-bottom: 20px;
		}
		div.box div.ele2 {
			border-left: none;
			border-top: 1px solid #ea2349;
			margin-bottom: 50px;
		}
	}
</style>

<!-- Page Header -->
<div class="page-header style-11">
  <div class="container">
    <h2 class="page-title">{{__('account/referAColleague.myReferral')}}</h2>
    <ol class="breadcrumb">
      <li><a href="{{ Route('home') }}">{{__('account/referAColleague.home')}}</a></li>
      <li><a href="{{ Route('dashboard') }}">{{__('account/referAColleague.dashboard')}}</a></li>
      <li class="active">{{__('account/referAColleague.myReferral')}}</li>
    </ol>
  </div>
</div>
<!-- Page Header End -->
<div class="cps-main-wrap">
	<div class="referral-bg1">
		<!-- Get started today -->
		<div class="cps-section cps-section-padding">
		    <div class="container">
				<div class="cps-section-header text-center">
					<h3 class="cps-section-title">{{__('account/referAColleague.para1')}}</h3>
					<h3 class="cps-section-title">{{__('account/referAColleague.para2')}}</h3>
				</div>
		        <div class="row box">
		            <div class="col-md-6 col-xs-12 box-reffral text-center ele1">
		                <div class="text-center">
		                    <h4>{{__('account/referAColleague.shareUniquCeode')}}</h4>
		                    <h4 class="cps-section-text" style="color: #ea2349">{{$user->referral_code}}</h4>
		                </div>
		            </div>
		            <div class="col-md-6 col-xs-12 box-reffral text-center ele2">
		                <div class="text-center">
		                    <h4>{{__('account/referAColleague.shareUniqueLink')}}</h4>
						    <div class="input-group">
						      <input type="text" class="form-control" id="referral_code" value="{{url('/register').'?referral_code='.$user->referral_code}}">
						      <div class="input-group-addon" id="copy_link"><i class="fa fa-link" aria-hidden="true"></i></div>
						    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<!-- Get started today end -->
	</div>
    <div class="cps-section cps-section-padding cps-gradient-bg" id="faq">
        <div class="container">
          <div class="row">
			<div class="cps-section-header text-center">
				<h3 class="cps-section-title">{{__('account/referAColleague.otherWaysShare')}}</h3>
			</div>
              <div class="cps-service-boxs">
                  <div class="col-sm-4">
                      <div class="cps-service-box style-7">
                          <!--<h4 class="cps-service-title">Share</h4> 
                          <p class="cps-service-text">{{__('account/referAColleague.para3')}}</p>
                          -->
                          <a class="btn btn-square btn-primary" href="{{'https://www.facebook.com/sharer.php?u='.url('/register'). '?referral_code='. $user->referral_code}}" target="_blank">
                          	<i class="fa fa-facebook"></i>
                          	&nbsp &nbsp &nbsp &nbsp {{__('account/referAColleague.facebook')}}
                      	  </a>
                      </div>
                  </div>
                  <div class="col-sm-4">
                      <div class="cps-service-box style-7">
                      	<!--
                          <p class="cps-service-text">{{__('account/referAColleague.para4')}}</p>
                          <h4 class="cps-service-title">{{('updateProfile')}}</h4>
                          <p class="cps-service-text">{{__('account/referAColleague.para5')}}</p>
                          <a class="service-more" href="#">{{__('account/referAColleague.learnMore')}} <i class="fa fa-angle-right"></i></a>
                          -->
                          <a class="btn btn-square btn-primary" href="mailto:?Subject=Refer A Colleague on Community Feature Sheet&amp;Body={{'https://www.facebook.com/sharer.php?u='.url('/register'). '?referral_code='. $user->referral_code}}" target="_blank">
                          	<i class="fa fa-envelope"></i>
                          	&nbsp &nbsp &nbsp &nbsp {{__('account/referAColleague.email')}}
                      	  </a>
                      </div>
                  </div>
                  <!-- <div class="col-sm-4">
                      <div class="cps-service-box style-7">
                      	
                          <p class="cps-service-text">{{__('account/referAColleague.para6')}}</p>
                          <h4 class="cps-service-title">{{__('account/referAColleague.printReport')}}</h4>
                          <p class="cps-service-text">{{__('account/referAColleague.para7')}} </p>
                          <a class="service-more" href="#">{{__('account/referAColleague.learnMore')}} <i class="fa fa-angle-right"></i></a>
                         
                          <a class="btn btn-square btn-primary" href="{{'https://twitter.com/share?url='.url('/register'). '?referral_code='. $user->referral_code}}" target="_blank">
                          	<i class="fa fa-twitter"></i>
                          	&nbsp &nbsp &nbsp &nbsp {{__('account/referAColleague.twitter')}}
                      	  </a>
                      </div>
                  </div> -->
              </div>
          </div>
        </div>
    </div>

    <div class="cps-section cps-section-padding cps-gradient-bg" id="faq">
        <div class="container">
          <div class="row">
			<div class="cps-section-header text-center">
				<h3 class="cps-section-title">{{__('account/referAColleague.howItWork')}}</h3>
			</div>
              <div class="cps-service-boxs">
                  <div class="col-sm-4">
                      <div class="cps-service-box style-7">
                          <div class="cps-service-icon">
                              <span>
									<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										 width="64px" viewBox="0 0 475.082 475.081" style="enable-background:new 0 0 475.082 475.081;"
										 xml:space="preserve">
									<g>
										<g>
											<path d="M469.658,133.333L360.029,23.697c-3.621-3.617-7.909-5.424-12.854-5.424c-2.275,0-4.661,0.476-7.132,1.425
												c-7.426,3.237-11.139,8.852-11.139,16.846v54.821h-45.683c-20.174,0-38.879,1.047-56.101,3.14
												c-17.224,2.092-32.404,4.993-45.537,8.708c-13.134,3.708-24.983,8.326-35.547,13.846c-10.562,5.518-19.555,11.372-26.98,17.559
												c-7.426,6.186-13.943,13.23-19.558,21.129c-5.618,7.898-10.088,15.653-13.422,23.267c-3.328,7.616-5.992,15.99-7.992,25.125
												c-2.002,9.137-3.333,17.701-3.999,25.693c-0.666,7.994-0.999,16.657-0.999,25.979c0,10.663,1.668,22.271,4.998,34.838
												c3.331,12.559,6.995,23.407,10.992,32.545c3.996,9.13,8.709,18.603,14.134,28.403c5.424,9.802,9.182,16.317,11.276,19.555
												c2.093,3.23,4.095,6.187,5.997,8.85c1.903,2.474,4.377,3.71,7.421,3.71c0.765,0,1.902-0.186,3.427-0.568
												c4.377-2.095,6.279-5.325,5.708-9.705c-8.564-63.954-1.52-108.973,21.128-135.047c21.892-24.934,63.575-37.403,125.051-37.403
												h45.686v54.816c0,8.001,3.71,13.613,11.136,16.851c2.471,0.951,4.853,1.424,7.132,1.424c5.14,0,9.425-1.807,12.854-5.421
												l109.633-109.637c3.613-3.619,5.424-7.898,5.424-12.847C475.082,141.23,473.271,136.944,469.658,133.333z"/>
											<path d="M395.996,292.356c-3.625-1.529-6.951-0.763-9.993,2.283c-4.948,4.568-10.092,8.093-15.42,10.564
												c-3.433,1.902-5.141,4.66-5.141,8.277v61.104c0,12.562-4.466,23.308-13.415,32.26c-8.945,8.946-19.704,13.419-32.264,13.419
												H82.222c-12.564,0-23.318-4.473-32.264-13.419c-8.947-8.952-13.418-19.697-13.418-32.26V137.039
												c0-12.563,4.471-23.313,13.418-32.259c8.945-8.947,19.699-13.418,32.264-13.418h31.977c1.141,0,2.666-0.383,4.568-1.143
												c10.66-6.473,23.313-12.185,37.972-17.133c4.949-0.95,7.423-3.994,7.423-9.136c0-2.474-0.903-4.611-2.712-6.423
												c-1.809-1.804-3.946-2.708-6.423-2.708H82.226c-22.65,0-42.018,8.042-58.102,24.125C8.042,95.026,0,114.394,0,137.044v237.537
												c0,22.651,8.042,42.018,24.125,58.102c16.084,16.084,35.452,24.126,58.102,24.126h237.541c22.647,0,42.017-8.042,58.101-24.126
												c16.085-16.084,24.127-35.45,24.127-58.102v-73.946C401.995,296.829,399.996,294.071,395.996,292.356z"/>
										</g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									</svg>
                              </span>
                          </div>
                          <!--<h4 class="cps-service-title">Share</h4> -->
                          <p class="cps-service-text">{{__('account/referAColleague.para3')}}</p>
                          <!--
                          <a class="service-more" href="#">{{__('account/referAColleague.learnMore')}} <i class="fa fa-angle-right"></i></a>
                          -->
                      </div>
                  </div>
                  <div class="col-sm-4">
                      <div class="cps-service-box style-7">
                          <div class="cps-service-icon">
                              <span>
									<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										 viewBox="0 0 495.622 495.622" style="enable-background:new 0 0 495.622 495.622;" xml:space="preserve" width="64px">
									<g>
										<path style="fill:#030104;" d="M495.622,113.089v150.03c0,0-32.11,6.326-38.725,7.158c-6.594,0.83-27.316,7.521-42.334-6.914
											c-23.16-22.197-105.447-104.03-105.447-104.03s-14.188-13.922-36.969-1.89c-20.912,11.022-51.911,27.175-64.859,33.465
											c-24.477,13.028-44.764-7.642-44.764-23.387c0-12.213,7.621-20.502,18.515-26.598c29.524-17.898,91.752-52.827,117.67-66.598
											c15.754-8.379,27.105-9.097,48.734,9.124c26.638,22.403,50.344,42.824,50.344,42.824s7.732,6.453,20.063,3.854
											C448.13,123.725,495.622,113.089,495.622,113.089z M168.098,367.3c3.985-10.238,2.653-21.689-4.987-29.545
											c-6.865-7.027-16.888-8.879-26.445-6.689c2.673-9.479,1.197-19.568-5.705-26.688c-6.886-7.009-16.89-8.898-26.446-6.688
											c2.653-9.465,1.181-19.553-5.725-26.652c-10.814-11.092-29.519-10.616-41.807,1.097c-12.223,11.729-20.053,32.979-9.144,45.487
											c10.891,12.445,23.405,4.873,32.945,2.699c-2.654,9.465-10.606,18.269-0.813,30.658c9.784,12.395,23.404,4.875,32.954,2.721
											c-2.663,9.429-10.268,19.117-0.851,30.604c9.502,11.522,25.065,5.383,35.344,2.19c-3.967,10.199-12.458,21.193-1.549,33.513
											c10.892,12.409,36.063,6.668,48.358-5.063c12.262-11.729,13.439-30.318,2.654-41.445
											C189.435,365.865,178.335,364.089,168.098,367.3z M392.442,289.246c-88.88-88.881-47.075-47.058-94.906-94.992
											c0,0-14.375-14.311-33.321-5.998c-13.3,5.828-30.423,13.771-43.307,19.835c-14.158,7.424-24.347,9.722-29.131,9.69
											c-27.37-0.179-49.576-22.178-49.576-49.521c0-17.738,9.417-33.181,23.462-41.947c19.75-13.667,65.21-37.847,65.21-37.847
											s-13.849-17.549-44.187-17.549c-30.329,0-93.695,41.512-93.695,41.512s-17.976,11.514-43.601,1.143L0,96.373V268.05
											c0,0,14.103,4.082,26.775,9.258c2.862-8.162,7.48-15.699,13.886-21.924c21.023-20.024,55.869-20.232,74.996-0.537
											c5.762,5.987,9.783,13.129,11.835,21.024c7.707,2.379,14.688,6.593,20.298,12.373c5.779,5.947,9.785,13.129,11.854,20.984
											c7.698,2.381,14.669,6.611,20.298,12.395c6.339,6.537,10.562,14.433,12.534,22.988c8.047,2.344,15.319,6.705,21.176,12.693
											c11.495,11.807,15.575,27.826,13.103,43.278c0.02,0,0.058,0,0.076,0.035c0.188,0.246,7.122,7.976,11.446,12.336
											c8.474,8.482,22.311,8.482,30.811,0c8.444-8.479,8.481-22.289,0-30.811c-0.304-0.303-30.572-31.963-28.136-34.418
											c2.418-2.438,40.981,37.688,41.699,38.422c8.463,8.465,22.291,8.465,30.792,0c8.481-8.479,8.463-22.289,0-30.791
											c-0.416-0.396-2.152-2.059-2.796-2.721c0,0-38.234-34.06-35.324-36.97c2.946-2.928,50.438,41.392,50.515,41.392
											c8.537,7.688,21.687,7.631,29.9-0.586c7.991-7.99,8.162-20.629,1.078-29.146c-0.15-0.453-36.194-38.121-33.381-40.955
											c2.854-2.871,38.519,33.853,38.594,33.929c8.444,8.463,22.291,8.463,30.792,0c8.463-8.464,8.463-22.291,0-30.83
											C392.706,289.396,392.555,289.32,392.442,289.246z"/>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									</svg>
                              </span>
                          </div>
                          <p class="cps-service-text">{{__('account/referAColleague.para4')}}</p>
                          <!--
                          <h4 class="cps-service-title">Update Profile</h4>
                          <p class="cps-service-text">{{__('account/referAColleague.para5')}}</p>
                          <a class="service-more" href="#">{{__('account/referAColleague.learnMore')}} <i class="fa fa-angle-right"></i></a>
                          -->
                      </div>
                  </div>
                  <div class="col-sm-4">
                      <div class="cps-service-box style-7">
                          <div class="cps-service-icon">
                              <span>
									<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										 width="64px" viewBox="0 0 401.601 401.6" style="enable-background:new 0 0 401.601 401.6;"
										 xml:space="preserve">
									<g>
										<g>
											<path d="M116.682,229.329c11.286,0,22.195-0.729,32.518-2.086V114.094c-10.322-1.356-21.232-2.085-32.518-2.085
												c-64.441,0-116.681,23.693-116.681,52.921v11.477C0.001,205.634,52.241,229.329,116.682,229.329z"/>
											<path d="M116.682,288.411c11.286,0,22.195-0.729,32.518-2.084v-33.166c-10.325,1.356-21.229,2.095-32.518,2.095
												c-56.25,0-103.199-18.054-114.227-42.082c-1.606,3.5-2.454,7.124-2.454,10.839v11.477
												C0.001,264.718,52.241,288.411,116.682,288.411z"/>
											<path d="M149.199,314.823v-2.578c-10.325,1.356-21.229,2.095-32.518,2.095c-56.25,0-103.199-18.054-114.227-42.082
												C0.848,275.757,0,279.381,0,283.096v11.477c0,29.229,52.24,52.922,116.681,52.922c12.887,0,25.282-0.95,36.873-2.7
												c-2.873-5.877-4.355-12.075-4.355-18.496V314.823z"/>
											<path d="M284.92,22.379c-64.441,0-116.681,23.693-116.681,52.921v11.477c0,29.228,52.24,52.921,116.681,52.921
												c64.44,0,116.681-23.693,116.681-52.921V75.3C401.601,46.072,349.36,22.379,284.92,22.379z"/>
											<path d="M284.92,165.626c-56.25,0-103.199-18.053-114.227-42.082c-1.606,3.499-2.454,7.123-2.454,10.839v11.477
												c0,29.228,52.24,52.921,116.681,52.921c64.44,0,116.681-23.693,116.681-52.921v-11.477c0-3.716-0.848-7.34-2.454-10.839
												C388.119,147.573,341.17,165.626,284.92,165.626z"/>
											<path d="M284.92,224.71c-56.25,0-103.199-18.054-114.227-42.082c-1.606,3.499-2.454,7.123-2.454,10.839v11.477
												c0,29.229,52.24,52.922,116.681,52.922c64.44,0,116.681-23.693,116.681-52.922v-11.477c0-3.716-0.848-7.34-2.454-10.839
												C388.119,206.657,341.17,224.71,284.92,224.71z"/>
											<path d="M284.92,286.983c-56.25,0-103.199-18.054-114.227-42.082c-1.606,3.5-2.454,7.123-2.454,10.838v11.478
												c0,29.228,52.24,52.921,116.681,52.921c64.44,0,116.681-23.693,116.681-52.921v-11.478c0-3.715-0.848-7.34-2.454-10.838
												C388.119,268.928,341.17,286.983,284.92,286.983z"/>
											<path d="M284.92,346.066c-56.25,0-103.199-18.053-114.227-42.081c-1.606,3.5-2.454,7.125-2.454,10.838V326.3
												c0,29.228,52.24,52.921,116.681,52.921c64.44,0,116.681-23.693,116.681-52.921v-11.478c0-3.715-0.848-7.34-2.454-10.838
												C388.119,328.012,341.17,346.066,284.92,346.066z"/>
										</g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									<g>
									</g>
									</svg>
                              </span>
                          </div>
                          <p class="cps-service-text">{{__('account/referAColleague.para6')}}</p>
						<!--
                          <h4 class="cps-service-title">{{__('account/referAColleague.printReport')}}</h4>
                          <p class="cps-service-text">{{__('account/referAColleague.para7')}} </p>
                          <a class="service-more" href="#">{{__('account/referAColleague.learnMore')}} <i class="fa fa-angle-right"></i></a>
                          -->
                      </div>
                  </div>
              </div>
          </div>
        </div>
    </div>

</div>
@endsection


@section('footer_script')

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
  "timeOut": "3000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
};
</script>
<script type="text/javascript">
    $(document).ready(function(){
    	$('#copy_link').click(function(){
		  /* Get the text field */
		  var copyText = document.getElementById("referral_code");

		  /* Select the text field */
		  copyText.select();

		  /* Copy the text inside the text field */
		  document.execCommand("copy");

		  /* Alert the copied text */
		  toastr.success("Link Copied");
		});


        console.log('adnan masood');
    });
</script>
@endsection

