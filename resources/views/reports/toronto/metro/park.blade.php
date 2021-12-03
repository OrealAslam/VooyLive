@if(!empty($park))
@foreach($park as $res)
	@if(isset($res))
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="row items item1">
				<div class="col-lg-1 col-md-1 col-sm-1">
					<div class="row">
						<div class="icon">
							<svg version="1.1" class="fillf" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 viewBox="0 0 493.927 493.927" style="enable-background:new 0 0 493.927 493.927;" xml:space="preserve">
                                <g id="XMLID_313_">
									<path id="XMLID_319_" d="M38.758,234.499c16.794-4.117,27.073-21.056,22.956-37.851c-4.108-16.801-21.048-27.074-37.842-22.965
                                        C7.072,177.801-3.209,194.74,0.907,211.534C5.025,228.337,21.964,238.607,38.758,234.499z"/>
									<path id="XMLID_318_" d="M400.077,146.024c16.803-4.109,27.073-21.057,22.957-37.842c-4.11-16.802-21.049-27.074-37.835-22.965
                                        c-16.809,4.117-27.073,21.048-22.964,37.85C366.351,139.861,383.291,150.141,400.077,146.024z"/>
									<path id="XMLID_314_" d="M493.565,256.893c-1.646-6.725-8.503-10.825-15.138-9.188l-19.46,4.77c0.327-1.818,0.205-3.71-0.098-5.618
                                        c-0.978-4.075-18.383-76.988-19.817-80.91c-2.593-11.021-16.6-18.929-29.381-15.823c-12.457,3.057-20.307,14.942-18.773,27.366
                                        l-38.96,37.369c-6.651,6.384-6.872,16.949-0.489,23.609c1.06,1.1,2.365,1.736,3.62,2.478c-5.25,2.005-8.421,7.484-7.044,13.084
                                        l5.91,24.155l-84.064,20.576c-5.333-5.698-12.865-9.31-21.285-9.31c-13.41,0-24.58,9.074-28.018,21.384l-79.826,19.549
                                        l-5.919-24.163c-1.36-5.528-6.563-8.951-12.064-8.365c0.725-1.199,1.435-2.421,1.851-3.831c2.584-8.853-2.495-18.122-11.34-20.714
                                        l-51.831-15.146c-4.387-11.732-16.786-18.677-29.3-15.596c-12.627,3.09-21.528,16.532-18.749,27.571
                                        c0.538,3.994,19.809,80.942,19.809,80.942c0.611,1.826,1.37,3.563,2.504,5.014l-19.445,4.762
                                        c-6.716,1.646-10.833,8.421-9.185,15.138c1.654,6.767,8.486,10.825,15.138,9.187l64.491-15.79l-3.146,19.916
                                        c-1.435,9.114,4.776,17.657,13.884,19.1c9.179,1.434,17.673-4.827,19.1-13.882l5.331-33.742l102.953-25.207
                                        c2.202,3.082,4.974,5.698,8.169,7.728l-24.961,39.448c-3.408,5.396-3.62,12.211-0.54,17.804c3.074,5.585,8.952,9.058,15.327,9.058
                                        h51.538c6.376,0,12.253-3.473,15.327-9.058c3.081-5.593,2.869-12.408-0.539-17.804l-24.961-39.448
                                        c7.076-4.493,12.008-11.927,13.215-20.601l107.331-26.273l20.307,27.456c5.486,7.409,15.938,8.967,23.355,3.498
                                        c7.411-5.486,8.975-15.946,3.497-23.357l-11.992-16.206l64.483-15.791C491.096,270.384,495.211,263.609,493.565,256.893z
                                         M399.824,215.202l6.375,26.013l-28.377,6.954c-2.666,0.653-5.07,1.948-7.061,3.71l-0.789-3.227
                                        c-0.563-2.308-1.932-4.118-3.58-5.593c3.139-0.563,6.196-1.729,8.667-4.101L399.824,215.202z M108.589,306.043
                                        c1.647,0,3.245-0.311,4.784-0.775c-0.701,1.988-1.043,4.124-0.496,6.334l0.79,3.219c-2.576-0.636-5.307-0.676-7.972-0.023
                                        l-28.386,6.946l-6.368-26.014C74.839,296.87,104.856,306.043,108.589,306.043z"/>
								</g>
						    </svg>
						</div>
					</div>
				</div>
				<div class="col-lg-11 col-md-11 col-sm-11">
					<div class="row">
						<div class="text color-black">
							{{ !empty($res->name) ? $res->name : 'N/A' }}
							{{-- !empty($res->street_name) ? $res->street_name : 'N/A' --}}
		                    <span>
			                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 470.642 470.642" style="enable-background:new 0 0 470.642 470.642;" xml:space="preserve" class="filla walk-man">
			                        <g> <g> <path style="fill:#010002;" d="M223.821,76.022c10.333-0.333,19-4.333,26-12s10.333-16.667,10-27    c-0.333-10.335-4.167-19.168-11.5-26.5c-7.333-7.333-16.167-10.833-26.5-10.5s-19,4.333-26,12s-10.5,16.667-10.5,27    s3.833,19.167,11.5,26.5S213.488,76.355,223.821,76.022z"></path> <path style="fill:#010002;" d="M350.321,202.522l-55-30l-45-72c-8.667-10.667-19.333-16-32-16c-8.667,0-17,3.667-25,11l-68,69    c-2,2.667-3.333,5.667-4,9l-9,77v2c0,4.666,1.667,8.666,5,12c3.333,3.332,7.333,5,12,5s8.5-1.668,11.5-5c3-3.334,4.833-7,5.5-11    l7-66l24-24l-22,184l-39,87.001c-1.333,4-2,7.658-2,11.002c0,7.322,2.5,13.5,7.5,18.5s11.167,7.164,18.5,6.5    c10,0,17.333-4.678,22-14l42-94.002c0-0.67,0.333-1.835,1-3.5c0.668-1.67,1.335-3.17,2-4.5c0.667-1.335,1-2.67,1-4l5-45.001    l43,148.003c4.667,12,13,17.666,25,17c6.667,0,12.5-2.5,17.5-7.5s7.5-11.178,7.5-18.5c0-0.678-0.167-1.5-0.5-2.5    s-0.5-1.836-0.5-2.502l-60-205.001l7-67l17,27c1.333,2,3,3.667,5,5l59,33c4,1.333,6.667,2,8,2c4.667,0,8.667-1.833,12-5.5    c3.333-3.668,5-7.834,5-12.5C358.321,210.522,355.654,205.855,350.321,202.522z"></path> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g>
			                    </svg>
			                    <span class="walk-man-text2">
		                    		{{ !empty($res->distance) ? round($res->distance, 2).'KM'  : 'N/A' }}
		                    	</span>
		                	</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endif
@endforeach
@endif
