@extends('layouts.adminLayout')
@section('pageLevelCSS')
    <link href="{{ asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<style>
    div.html5buttons {
        float: right;
    }
    div.dataTables_filter {
        width: auto;
    }
    div.dataTables_filter label {
        margin-right: 5px;
    }
    div.html5buttons a.btn {
        padding-top: 4px;
        padding-bottom: 4px;
    }
    .nav > li > a{
    	padding: 8px 2px 8px;
    }
</style>
<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
	    <div class="x_panel">
	        <div class="row">
	            <div class="x_title">
	                <div class="col-md-6">
	                    <h2>Admin Setting</h2>
	                </div>
	                <div class="col-md-6 text-right">
	                    <!-- <a href="{{ route('product.create') }}" class="btn btn-success">Add New Product</a> -->
	                </div>
	                <div class="clearfix"></div>
	            </div>
	        </div>
	        <div class="x_content">
	            <p class="text-muted font-13 m-b-30">
	            	<form action="{{ route('setting.update') }}" method="post" class="form" enctype="multipart/form-data">
	            		{{ csrf_field() }}
			            <div class="card-box">
			            	<div class="container">
							    <ul class="nav nav-tabs">
							      	<li class="active"><a data-toggle="tab" href="#home">Home</a></li>
							      	<li class=""><a data-toggle="tab" href="#home-page">Pages</a></li>
							      	<li class=""><a data-toggle="tab" href="#home-product-gst">Product GST</a></li>
							      	<li class=""><a data-toggle="tab" href="#testimonial">Testimonial</a></li>
							      	<li class=""><a data-toggle="tab" href="#popup-model-btn">Home Popup Model</a></li>
							      	<li class=""><a data-toggle="tab" href="#plan">Plan</a></li>
							      	<li class=""><a data-toggle="tab" href="#about">About</a></li>
							      	<li class=""><a data-toggle="tab" href="#product-detail">Product Detail</a></li>
							      	<li class=""><a data-toggle="tab" href="#terms-conditions">Terms & Conditions</a></li>
							      	<li class=""><a data-toggle="tab" href="#logo-title">Logo Title</a></li>
							      	<li class=""><a data-toggle="tab" href="#order-report">Order Report</a></li>
							      	<li class=""><a data-toggle="tab" href="#coverage">Coverage</a></li>
							      	<li class=""><a data-toggle="tab" href="#google-analytics">Google Analytics</a></li>
							      	<li class=""><a data-toggle="tab" href="#survey">Survey</a></li>
							    </ul>
							    <div class="tab-content">
							      	<div id="home" class="tab-pane fade in active">
							      		<div class="row" style="margin-top:20px;">
						            		<div class="col-md-12">
						                        <div class="form-group">
						                            <label class="form-label">
						                                <h4>Meta Data Name</h4>
						                            </label>
						                        </div>
						                    </div>
						            	</div>
						            	<div class="row">
						            		<div class="col-md-12">
						            			<input class="form-control" value="{{ $setting['meta-deta-name']['value'] }}" name="{{ $setting['meta-deta-name']['slug'] }}"/>
						            		</div>
						            	</div>
						            	<hr>
							        	<div class="row">
						            		<div class="col-md-6">
						                        <div class="form-group">
						                            <label class="form-label">
						                                <h4>Home Slider Text</h4>
						                            </label>
						                        </div>
						                    </div>
						            	</div>
						                <div class="row">
						                	<div class="col-md-6">
						                        <div class="form-group">
						                            <label class="form-label">
						                                <strong>{!! $setting['line-1']['name'] !!}</strong>
						                            </label>
						                            <div class="controls">
						                            	<input type="text" name="{{ $setting['line-1']['slug'] }}" value="{{ $setting['line-1']['value'] }}" class="form-control">
						                            </div>
						                        </div>
						                    </div>
						                    <div class="col-md-6">
						                        <div class="form-group">
						                            <label class="form-label">
						                                <strong>{!! $setting['line-2']['name'] !!}</strong>
						                            </label>
						                            <div class="controls">
						                            	<input type="text" name="{{ $setting['line-2']['slug'] }}" value="{{ $setting['line-2']['value'] }}" class="form-control">
						                            </div>
						                        </div>
						                    </div>
						                    <div class="col-md-6">
						                        <div class="form-group">
						                            <label class="form-label">
						                                <strong>{!! $setting['line-3']['name'] !!}</strong>
						                            </label>
						                            <div class="controls">
						                            	<input type="text" name="{{ $setting['line-3']['slug'] }}" value="{{ $setting['line-3']['value'] }}" class="form-control">
						                            </div>
						                        </div>
						                    </div>
						                	<div class="col-md-6">
						                        <div class="form-group">
						                            <label class="form-label">
						                                <strong>{!! $setting['btn-link']['name'] !!}</strong>
						                            </label>
						                            <div class="controls">
						                            	<input type="text" name="{{ $setting['btn-link']['slug'] }}" value="{{ $setting['btn-link']['value'] }}" class="form-control">
						                            </div>
						                        </div>
						                    </div>
						                    <div class="col-md-6">
						                        <div class="form-group">
						                            <label class="form-label">
						                                <strong>{!! $setting['btn-text']['name'] !!}</strong>
						                            </label>
						                            <div class="controls">
						                            	<input type="text" name="{{ $setting['btn-text']['slug'] }}" value="{{ $setting['btn-text']['value'] }}" class="form-control">
						                            </div>
						                        </div>
						                    </div>
						                    <div class="col-md-6">
						                        <div class="form-group">
						                            <label class="form-label">
						                                <strong>{!! $setting['btn-blow-text']['name'] !!}</strong>
						                            </label>
						                            <div class="controls">
						                            	<input type="text" name="{{ $setting['btn-blow-text']['slug'] }}" value="{{ $setting['btn-blow-text']['value'] }}" class="form-control">
						                            </div>
						                        </div>
						                    </div>
						                </div>
						                <hr>
					                    <div class="row">
						            		<div class="col-md-6">
						                        <div class="form-group">
						                            <label class="form-label">
						                                <h4>Social Media Links</h4>
						                            </label>
						                        </div>
						                    </div>
						            	</div>
						            	<div class="row">
						            		<div class="col-md-6">
						                        <div class="form-group">
						                            <label class="form-label">
						                                <strong>{!! $setting['facebook-link']['name'] !!}</strong>
						                            </label>
						                            <div class="controls">
						                            	<input type="text" name="{{ $setting['facebook-link']['slug'] }}" value="{{ $setting['facebook-link']['value'] }}" class="form-control">
						                            </div>
						                        </div>
						                    </div>
						                    <!-- <div class="col-md-6">
						                        <div class="form-group">
						                            <label class="form-label">
						                                <strong>{!! $setting['twitter-link']['name'] !!}</strong>
						                            </label>
						                            <div class="controls">
						                            	<input type="text" name="{{ $setting['twitter-link']['slug'] }}" value="{{ $setting['twitter-link']['value'] }}" class="form-control">
						                            </div>
						                        </div>
						                    </div> -->
						            	</div>
						            	<div class="row">
						            		<div class="col-md-6">
						                        <div class="form-group">
						                            <label class="form-label">
						                                <strong>{!! $setting['instagram-link']['name'] !!}</strong>
						                            </label>
						                            <div class="controls">
						                            	<input type="text" name="{{ $setting['instagram-link']['slug'] }}" value="{{ $setting['instagram-link']['value'] }}" class="form-control">
						                            </div>
						                        </div>
						                    </div>
						                    <div class="col-md-6">
						                        <div class="form-group">
						                            <label class="form-label">
						                                <strong>{!! $setting['linkedin-link']['name'] !!}</strong>
						                            </label>
						                            <div class="controls">
						                            	<input type="text" name="{{ $setting['linkedin-link']['slug'] }}" value="{{ $setting['linkedin-link']['value'] }}" class="form-control">
						                            </div>
						                        </div>
						                    </div>
						            	</div>
						            	<hr>
						            	<div class="row">
						            		<div class="col-md-6">
						                        <div class="form-group">
						                            <label class="form-label">
						                                <h4>How It Work Text</h4>
						                            </label>
						                        </div>
						                    </div>
						            	</div>
						            	<div class="row">
						            		<div class="col-md-6">
						                        <div class="form-group">
						                            <label class="form-label">
						                                <strong>{!! $setting['how-it-work-line-1']['name'] !!}</strong>
						                            </label>
						                            <div class="controls">
						                            	<input type="text" name="{{ $setting['how-it-work-line-1']['slug'] }}" value="{{ $setting['how-it-work-line-1']['value'] }}" class="form-control">
						                            </div>
						                        </div>
						                    </div>
						                    <div class="col-md-6">
						                        <div class="form-group">
						                            <label class="form-label">
						                                <strong>{!! $setting['how-it-work-line-2']['name'] !!}</strong>
						                            </label>
						                            <div class="controls">
						                            	<input type="text" name="{{ $setting['how-it-work-line-2']['slug'] }}" value="{{ $setting['how-it-work-line-2']['value'] }}" class="form-control">
						                            </div>
						                        </div>
						                    </div>
						            	</div>
						            	<div class="row">
						            		<div class="col-md-6">
						                        <div class="form-group">
						                            <label class="form-label">
						                                <strong>{!! $setting['how-it-work-line-3']['name'] !!}</strong>
						                            </label>
						                            <div class="controls">
						                            	<input type="text" name="{{ $setting['how-it-work-line-3']['slug'] }}" value="{{ $setting['how-it-work-line-3']['value'] }}" class="form-control">
						                            </div>
						                        </div>
						                    </div>
						            	</div>
						            	<hr>
						            	<div class="row">
											<div class="col-md-9">
										        <div class="form-group">
										        	<label>Home Slider Image</label>
										        	<input type="file" name="{{ $setting['home-slider-image']['slug'] }}" class="form-control">
										        </div>
										    </div>
										    <div class="col-md-3">
										    	<div class="form-group">
										        	<img src="{{ env('AWS_URL').'upload/productImageSetting/'.$setting['home-slider-image']['value'] }}" class="img-responsive" style="margin-top: 10px;" width="100%" height="200"></img>
										        </div>
										    </div>
										</div>
							      	</div>
							      	<div id="home-page" class="tab-pane fade in">
							      		<div class="row" style="margin-top:20px;">
						            		<div class="col-md-12">
						                        <div class="form-group">
						                            <label class="form-label">
						                                <h4>Property FeatureSheets Detail Text</h4>
						                            </label>
						                        </div>
						                    </div>
						            	</div>
						            	<div class="row">
						            		<div class="col-md-12">
						            			<div class="form-group">
						            				<textarea class="form-control" name="{{ $setting['property-featuresheets']['slug'] }}" rows="5" id="editor1">{{ $setting['property-featuresheets']['value'] }}</textarea>
						            			</div>
						            		</div>
						            	</div>
						            	<div class="row">
						            		<div class="col-md-9">
						                        <div class="form-group">
						                        	<label>Property Featuresheets Image</label>
						                        	<input type="file" name="{{ $setting['property-featuresheets-image']['slug'] }}" class="form-control">
						                        </div>
						                    </div>
						                    <div class="col-md-3">
						                    	<div class="form-group">
						                        	<img src="{{ env('AWS_URL').'upload/productImageSetting/'.$setting['property-featuresheets-image']['value'] }}" class="img-responsive" style="margin-top: 10px;" width="100%" height="200"></img>
						                        </div>
						                    </div>
						            	</div>
						            	<hr>
						            	<div class="row">
						            		<div class="col-md-12">
						                        <div class="form-group">
						                            <label class="form-label">
						                                <h4>Home Details Infographic Detail Text</h4>
						                            </label>
						                        </div>
						                    </div>
						            	</div>
						            	<div class="row">
						            		<div class="col-md-12">
						            			<textarea class="form-control" name="{{ $setting['home-details-infographic']['slug'] }}" rows="5" id="editor2">{{ $setting['home-details-infographic']['value'] }}</textarea>
						            		</div>
						            	</div>
						            	<div class="row" style="margin-top:10px;">
						            		<div class="col-md-9">
						                        <div class="form-group">
						                        	<label>Home Details Infographic</label>
						                        	<input type="file" name="{{ $setting['home-details-infographic-image']['slug'] }}" class="form-control">
						                        </div>
						                    </div>
						                    <div class="col-md-3">
						                    	<div class="form-group">
						                        	<img src="{{ env('AWS_URL').'upload/productImageSetting/'.$setting['home-details-infographic-image']['value'] }}" class="img-responsive" style="margin-top: 10px;" width="100%" height="200"></img>
						                        </div>
						                    </div>
						            	</div>
						            	<hr>
						            	<div class="row" style="margin-top:10px;">
						            		<div class="col-md-9">
						                        <div class="form-group">
						                        	<label>Community Feature Sheet Image</label>
						                        	<input type="file" name="{{ $setting['community-feature-sheet-image']['slug'] }}" class="form-control">
						                        </div>
						                    </div>
						                    <div class="col-md-3">
						                    	<div class="form-group">
						                        	<img src="{{ env('AWS_URL').'upload/productImageSetting/'.$setting['community-feature-sheet-image']['value'] }}" class="img-responsive" style="margin-top: 10px;" width="100%" height="200"></img>
						                        </div>
						                    </div>
						            	</div>
								      	<hr>
								      	<div class="row" style="margin-top:20px;">
						            		<div class="col-md-12">
						                        <div class="form-group">
						                            <label class="form-label">
						                                <h4>Market Sentiment Survey Detail Text</h4>
						                            </label>
						                        </div>
						                    </div>
						            	</div>
						            	<div class="row">
						            		<div class="col-md-12">
						            			<div class="form-group">
						            				<textarea class="form-control" name="{{ $setting['market-sentiment-survey']['slug'] }}" rows="5" id="editor12">{{ $setting['market-sentiment-survey']['value'] }}</textarea>
						            			</div>
						            		</div>
						            	</div>
						            	<div class="row">
						            		<div class="col-md-9">
						                        <div class="form-group">
						                        	<label>Market Sentiment Survey Image</label>
						                        	<input type="file" name="{{ $setting['market-sentiment-survey-image']['slug'] }}" class="form-control">
						                        </div>
						                    </div>
						                    <div class="col-md-3">
						                    	<div class="form-group">
						                        	<img src="{{ env('AWS_URL').'upload/productImageSetting/'.$setting['market-sentiment-survey-image']['value'] }}" class="img-responsive" style="margin-top: 10px;" width="100%" height="200"></img>
						                        </div>
						                    </div>
						            	</div>
										<hr>
										<div class="row" style="margin-top:20px;">
						            		<div class="col-md-12">
						                        <div class="form-group">
						                            <label class="form-label">
						                                <h4>Privacy Policy Detail Text</h4>
						                            </label>
						                        </div>
						                    </div>
						            	</div>
						            	<div class="row">
						            		<div class="col-md-12">
						            			<div class="form-group">
						            				<textarea class="form-control" name="{{ $setting['privacy-policy']['slug'] }}" rows="5" id="editor14">{{ $setting['privacy-policy']['value'] }}</textarea>
						            			</div>
						            		</div>
						            	</div>
							      	</div>

							      	<div id="home-product-gst" class="tab-pane fade in">
							      		<div class="row" style="margin-top:20px;">
						            		<div class="col-md-12">
						                        <div class="form-group">
						                            <label class="form-label">
						                                <h4>Home Product GST</h4>
						                            </label>
						                        </div>
						                    </div>
						            	</div>
						            	<div class="row">
						            		<div class="col-md-12">
						            			<input type="number" class="form-control" value="{{ $setting['home-product-gst']['value'] }}" name="{{ $setting['home-product-gst']['slug'] }}"/>
						            		</div>
						            	</div>
							      	</div>
							      	<div id="testimonial" class="tab-pane fade in">
							      		<div class="row" style="margin-top:20px;">
						            		<div class="col-md-12">
						                        <div class="form-group">
						                            <label class="form-label">
						                                <h4>Testimonial</h4>
						                            </label>
						                        </div>
						                    </div>
						            	</div>
						            	<div class="row">
						            		<div class="col-md-12">
						            			<input type="text" class="form-control" value="{{ $setting['testimonial']['value'] }}" name="{{ $setting['testimonial']['slug'] }}"/>
						            		</div>
						            	</div>
							      	</div>
							      	<div id="popup-model-btn" class="tab-pane fade in">
							      		<div class="row" style="margin-top:20px;">
						            		<div class="col-md-12">
						                        <div class="form-group">
						                            <label class="form-label">
						                                <h4>Popup Text</h4>
						                            </label>
						                        </div>
						                    </div>
							           	</div>
						            	<div class="row">
						            		<div class="col-md-12">
						            			<textarea class="form-control" name="{{ $setting['popup-text']['slug'] }}" rows="5" id="editor3">{{ $setting['popup-text']['value'] }}</textarea>
						            		</div>
						            	</div>
						            	<hr>
						            	<div class="row">
						            		<div class="col-md-9">
						                        <div class="form-group">
						                            <label class="form-label">
						                                <h5>Popup Image</h5>
						                            </label>
						                            <input type="file" name="{{ $setting['popup-image']['slug'] }}" class="form-control">
						                        </div>
						                    </div>
						                    <div class="col-md-3">
						                        <div class="form-group">
						                            <img src="{{ env('AWS_URL').'upload/popupImage/'.$setting['popup-image']['value'] }}" style="margin-top: 10px;" width="100%" height="200"></img>
						                        </div>
						                    </div>
							           	</div>
							           	<hr>
							      		<div class="row">
						            		<div class="col-md-12">
						                        <div class="form-group">
						                            <label class="form-label">
						                                <h4>Home Page Popup Button</h4>
						                            </label>
						                        </div>
						                    </div>
						            	</div>
						            	<div class="row">
						            		<div class="col-md-6">
						            			<label>Button Text</label>
						            			<input type="text" class="form-control" value="{{ $setting['popup-home-model-btn-text']['value'] }}" name="{{ $setting['popup-home-model-btn-text']['slug'] }}"/>
						            		</div>
						            		<div class="col-md-6">
						            			<label>Button Link</label>
						            			<input type="text" class="form-control" value="{{ $setting['popup-home-model-btn-link']['value'] }}" name="{{ $setting['popup-home-model-btn-link']['slug'] }}"/>
						            		</div>
						            	</div>
							      	</div>
							      	<div id="plan" class="tab-pane fade in">
							      		<div class="row" style="margin-top:20px;">
						            		<div class="col-md-12">
						                        <div class="form-group">
						                            <label class="form-label">
						                                <h4>Plan Title</h4>
						                            </label>
						                        </div>
						                    </div>
						            	</div>
						            	<div class="row">
						            		<div class="col-md-6">
						            			<label>Plan Title</label>
						            			<input type="text" class="form-control" value="{{ $setting['plan-title']['value'] }}" name="{{ $setting['plan-title']['slug'] }}"/>
						            		</div>
						            		<div class="col-md-6">
						            			<label>Plan Sub Title</label>
						            			<input type="text" class="form-control" value="{{ $setting['plan-sub-title']['value'] }}" name="{{ $setting['plan-sub-title']['slug'] }}"/>
						            		</div>
						            	</div>
						            	<hr>
						            	<div class="row">
						            		<div class="col-md-12">
						                        <div class="form-group">
						                            <label class="form-label">
						                                <h4>Plan Box 1</h4>
						                            </label>
						                        </div>
						                    </div>
						            	</div>
						            	<div class="row">
						            		<div class="col-md-6">
						            			<label>Plan Box 1 Price</label>
						            			<input type="text" class="form-control" value="{{ $setting['plan-box-1-price']['value'] }}" name="{{ $setting['plan-box-1-price']['slug'] }}"/>
						            		</div>
						            		<div class="col-md-6">
						            			<label>Plan Box 1 Bottom Text</label>
						            			<input type="text" class="form-control" value="{{ $setting['plan-box-1-bottom-text']['value'] }}" name="{{ $setting['plan-box-1-bottom-text']['slug'] }}"/>
						            		</div>
						            		<div class="col-md-12" style="margin-top:10px;">
						            			<label>Plan Box 1 Description</label>
						            			<textarea class="form-control" name="{{ $setting['plan-box-1-description']['slug'] }}" rows="2" id="editor4">{{ $setting['plan-box-1-description']['value'] }}</textarea>
						            		</div>
						            	</div>
						            	<hr>
						            	<div class="row">
						            		<div class="col-md-12">
						                        <div class="form-group">
						                            <label class="form-label">
						                                <h4>Plan Box 2</h4>
						                            </label>
						                        </div>
						                    </div>
						            	</div>
						            	<div class="row">
						            		<div class="col-md-6">
						            			<label>Plan Box 2 Price</label>
						            			<input type="text" class="form-control" value="{{ $setting['plan-box-2-price']['value'] }}" name="{{ $setting['plan-box-2-price']['slug'] }}"/>
						            		</div>
						            		<div class="col-md-6">
						            			<label>Plan Box 2 Bottom Text</label>
						            			<input type="text" class="form-control" value="{{ $setting['plan-box-2-bottom-text']['value'] }}" name="{{ $setting['plan-box-2-bottom-text']['slug'] }}"/>
						            		</div>
						            		<div class="col-md-12" style="margin-top:10px;">
						            			<label>Plan Box 2 Description</label>
						            			<textarea class="form-control" name="{{ $setting['plan-box-2-description']['slug'] }}" rows="2" id="editor5">{{ $setting['plan-box-2-description']['value'] }}</textarea>
						            		</div>
						            	</div>
						            	<hr>
						            	<div class="row">
						            		<div class="col-md-12">
						                        <div class="form-group">
						                            <label class="form-label">
						                                <h4>Plan Box 3</h4>
						                            </label>
						                        </div>
						                    </div>
						            	</div>
						            	<div class="row">
						            		<div class="col-md-6">
						            			<label>Plan Box 3 Price</label>
						            			<input type="text" class="form-control" value="{{ $setting['plan-box-3-price']['value'] }}" name="{{ $setting['plan-box-3-price']['slug'] }}"/>
						            		</div>
						            		<div class="col-md-6">
						            			<label>Plan Box 3 Bottom Text</label>
						            			<input type="text" class="form-control" value="{{ $setting['plan-box-3-bottom-text']['value'] }}" name="{{ $setting['plan-box-3-bottom-text']['slug'] }}"/>
						            		</div>
						            		<div class="col-md-12" style="margin-top:10px;">
						            			<label>Plan Box 3 Description</label>
						            			<textarea class="form-control" name="{{ $setting['plan-box-3-description']['slug'] }}" rows="2" id="editor6">{{ $setting['plan-box-3-description']['value'] }}</textarea>
						            		</div>
						            	</div>
						            	<hr>
						            	<div class="row">
						            		<div class="col-md-12">
						                        <div class="form-group">
						                            <label class="form-label">
						                                <h4>Plan Box 4</h4>
						                            </label>
						                        </div>
						                    </div>
						            	</div>
						            	<div class="row">
						            		<div class="col-md-6">
						            			<label>Plan Box 4 Bottom Text</label>
						            			<input type="text" class="form-control" value="{{ $setting['plan-box-4-bottom-text']['value'] }}" name="{{ $setting['plan-box-4-bottom-text']['slug'] }}"/>
						            		</div>
						            		<div class="col-md-12" style="margin-top:10px;">
						            			<label>Plan Box 4 Description</label>
						            			<textarea class="form-control" name="{{ $setting['plan-box-4-description']['slug'] }}" rows="2" id="editor11">{{ $setting['plan-box-4-description']['value'] }}</textarea>
						            		</div>
						            	</div>
							      	</div>
							      	<div id="about" class="tab-pane fade in">
							      		<div class="row" style="margin-top:20px;">
						            		<div class="col-md-12">
						                        <div class="form-group">
						                            <label class="form-label">
						                                <h4>About Text</h4>
						                            </label>
						                        </div>
						                    </div>
						            	</div>
						            	<div class="row">
						            		<div class="col-md-12">
						            			<div class="form-group">
						            				<textarea class="form-control" name="{{ $setting['about-us']['slug'] }}" rows="2" id="editor7">{{ $setting['about-us']['value'] }}</textarea>
						            			</div>
						            		</div>
						            	</div>
							      	</div>
							      	<div id="product-detail" class="tab-pane fade in">
							      		<div class="row" style="margin-top:20px;">
						            		<div class="col-md-12">
						                        <div class="form-group">
						                            <label class="form-label">
						                                <h4>Product Detail Title Text</h4>
						                            </label>
						                        </div>
						                    </div>
						            	</div>
						            	<div class="row">
						            		<div class="col-md-12">
						            			<div class="form-group">
						            				<input type="text" class="form-control" value="{{ $setting['product-detail']['value'] }}" name="{{ $setting['product-detail']['slug'] }}"/>
						            			</div>
						            		</div>
						            	</div>
						            	<div class="row">
						            		<div class="col-md-9">
						                        <div class="form-group">
						                        	<label>Product Detail Image</label>
						                        	<input type="file" name="{{ $setting['product-detail-image']['slug'] }}" class="form-control">
						                        </div>
						                    </div>
						                    <div class="col-md-3">
						                    	<div class="form-group">
						                        	<img src="{{ env('AWS_URL').'upload/productImageSetting/'.$setting['product-detail-image']['value'] }}" class="img-responsive" style="margin-top: 10px;border:1px solid #d2d2d2;" width="100%" height="200"></img>
						                        </div>
						                    </div>
						            	</div>
							      	</div>
							      	<div id="terms-conditions" class="tab-pane fade in">
							      		<div class="row">
						            		<div class="col-md-12" style="margin-top:10px;">
						                        <div class="form-group">
						                            <label class="form-label">
						                                <h4>Terms & Conditions</h4>
						                            </label>
						                        </div>
						                    </div>
						            	</div>
						            	<div class="row">
						            		<div class="col-md-12">
						            			<textarea class="form-control" name="{{ $setting['terms-conditions']['slug'] }}" id="editor8">{{ $setting['terms-conditions']['value'] }}</textarea>
						            		</div>
						            	</div>
							      	</div>
							      	<div id="logo-title" class="tab-pane fade in">
							      		<div class="row">
						            		<div class="col-md-12" style="margin-top:10px;">
						                        <div class="form-group">
						                            <label class="form-label">
						                                <h4>Logo Section Title And Sub Title</h4>
						                            </label>
						                        </div>
						                    </div>
						            	</div>
						            	<div class="row">
						            		<div class="col-md-12">
						            			<div class="form-group">
							            			<label>Logo Title</label>
							            			<input type="test" name="{{ $setting['logo-title-text']['slug'] }}" value="{{ $setting['logo-title-text']['value'] }}" class="form-control">
						            			</div>
						            		</div>
						            		<div class="col-md-12">
						            			<div class="form-group">
							            			<label>Logo Sub Title</label>
							            			<input type="test" name="{{ $setting['logo-sub-title-text']['slug'] }}" value="{{ $setting['logo-sub-title-text']['value'] }}" class="form-control">
						            			</div>
						            		</div>
						            	</div>
							      	</div>
							      	<div id="order-report" class="tab-pane fade in">
							      		<div class="row">
						            		<div class="col-md-12" style="margin-top:10px;">
						                        <div class="form-group">
						                            <label class="form-label">
						                                <h4>Order Report Text</h4>
						                            </label>
						                        </div>
						                    </div>
						            	</div>
						            	<div class="row">
						            		<div class="col-md-12">
						            			<div class="form-group">
							            			<label>Order Report Box 1</label>
							            			<input type="test" name="{{ $setting['order-report-box-1-text']['slug'] }}" value="{{ $setting['order-report-box-1-text']['value'] }}" class="form-control">
						            			</div>
						            		</div>
						            		<div class="col-md-12">
						            			<div class="form-group">
							            			<label>Order Report Box 2</label>
							            			<input type="test" name="{{ $setting['order-report-box-2-text']['slug'] }}" value="{{ $setting['order-report-box-2-text']['value'] }}" class="form-control">
						            			</div>
						            		</div>
						            	</div>
							      	</div>
							      	<div id="coverage" class="tab-pane fade in">
							      		<div class="row">
						            		<div class="col-md-12" style="margin-top:10px;">
						                        <div class="form-group">
						                            <label class="form-label">
						                                <h4>Coverage Text</h4>
						                            </label>
						                        </div>
						                    </div>
						            	</div>
						            	<div class="row">
						            		<div class="col-md-12">
						            			<div class="form-group">
							            			<label>Coverage</label>
							            			<textarea type="test" name="{{ $setting['coverage']['slug'] }}" id="editor9" class="form-control">{{ $setting['coverage']['value'] }}</textarea>
						            			</div>
						            		</div>
						            	</div>
							      	</div>
							      	<div id="google-analytics" class="tab-pane fade in">
							      		<div class="row">
						            		<div class="col-md-12" style="margin-top:10px;">
						                        <div class="form-group">
						                            <label class="form-label">
						                                <h4>Google Analytics</h4>
						                            </label>
						                        </div>
						                    </div>
						            	</div>
						            	<div class="row">
						            		<div class="col-md-12">
						            			<div class="form-group">
							            			<label>Google Analytics Space</label>
							            			<textarea type="test" name="{{ $setting['google-analytics-space']['slug'] }}" class="form-control" rows="8">{{ $setting['google-analytics-space']['value'] }}</textarea>
						            			</div>
						            		</div>
						            	</div>
							      	</div>
							      	<div id="survey" class="tab-pane fade in">
							      		<div class="row">
						            		<div class="col-md-12" style="margin-top:10px;">
						                        <div class="form-group">
						                            <label class="form-label">
						                                <h4>Survey Invite Mail Subject</h4>
						                            </label>
						                        </div>
						                    </div>
						                    <div class="col-md-12">
						            			<div class="form-group">
							            			<label>Subject</label>
							            			<input type="test" name="{{ $setting['survey-invite-another-realtor-mail-subject']['slug'] }}" value="{{ $setting['survey-invite-another-realtor-mail-subject']['value'] }}" class="form-control">
						            			</div>
						            		</div>
						            	</div>
						            	<hr>
						            	<div class="row">
						            		<div class="col-md-12">
						                        <div class="form-group">
						                            <label class="form-label">
						                                <h4>Survey Invite Mail Text</h4>
						                            </label>
						                        </div>
						                    </div>
						                    <div class="col-md-12">
						            			<div class="form-group">
							            			<label>Survey Invite Mail Text</label>
							            			<textarea type="test" id="editor13" name="{{ $setting['survey-invite-another-realtor-body-text']['slug'] }}" class="form-control" rows="8">{{ $setting['survey-invite-another-realtor-body-text']['value'] }}</textarea>
						            			</div>
						            		</div>
						            	</div>
						            	<hr>
							      		<div class="row">
						            		<div class="col-md-12">
						                        <div class="form-group">
						                            <label class="form-label">
						                                <h4>Survey Share Image</h4>
						                            </label>
						                        </div>
						                    </div>
						            	</div>
						            	<div class="row">
						            		<div class="col-md-12">
						                        <div class="form-group">
						                        	<label>Share Image</label>
						                        	<input type="file" name="{{ $setting['survey-share-image']['slug'] }}" class="form-control">
						                        </div>
						                    </div>
						                    <div class="col-md-12">
						                    	<div class="form-group">
						                        	<img src="{{ env('AWS_URL').'upload/productImageSetting/'.$setting['survey-share-image']['value'] }}" class="img-responsive" style="margin-top: 10px;"></img>
						                        </div>
						                    </div>
						            	</div>
							      	</div>
							    </div>
							</div>
			            </div>
			            <hr>
			            <div class="row">
					        <div class="col-md-12 text-center">
			                    <button type="submit" value="general" class="btn btn-flat btn-success waves-effect waves-light" name="general"><i class="fa fa-save"></i> Save</button>
			                </div>
			            </div>
		            </form>
	            </p>
	      	</div>
	    </div>
  	</div>
</div>
@stop
    
@section('pageLevelJS')
<!-- page Level JS -->
<script src="https://cdn.gaic.com/cdn/ui-bootstrap/0.58.0/js/lib/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
     CKEDITOR.replace('editor1');
     CKEDITOR.replace('editor2');
     CKEDITOR.replace('editor3');
     CKEDITOR.replace('editor4');
     CKEDITOR.replace('editor5');
     CKEDITOR.replace('editor6');
     CKEDITOR.replace('editor7');
     CKEDITOR.replace('editor8');
     CKEDITOR.replace('editor9');
     CKEDITOR.replace('editor11');
     CKEDITOR.replace('editor12');
     CKEDITOR.replace('editor13');
	 CKEDITOR.replace('editor14');
</script>
@endsection