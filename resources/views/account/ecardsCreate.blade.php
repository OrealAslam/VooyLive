@extends('layouts.template')

@section('customStyle')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/ecard.css') }}">
	<style type="text/css">
		.bhoechie-tab{
			border-left:1px solid #ddd;
			padding-bottom:20px !important;
		}
		body{
			background-color: #eef5f9;
		}
		label{
			padding:0px !important;
		}
		.ml-0{
			margin-left:0px;
		}
		input[type="radio"][class^="chk"] {
	  		display: none !important;
		}

		.img-label {
			height:200px;
		  	border: 1px solid #fff;
			padding: 4px;
			display: block;
			position: relative;
			margin: 20px 0px;
			cursor: pointer;
			-webkit-touch-callout: none;
			-webkit-user-select: none;
			-khtml-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}

		.img-label::before {
		  background-color: white;
		  color: white;
		  content: " ";
		  display: block;
		  border-radius: 50%;
		  border: 1px solid green;
		  position: absolute;
		  top: -5px;
		  left: -5px;
		  width: 25px;
		  height: 25px;
		  text-align: center;
		  line-height: 25px;
		  z-index: 5;
		  transition-duration: 0.4s;
		  transform: scale(0);
		}

		.img-label img {
		  width: 400px;
	      height: 200px;
		  transition-duration: 0.2s;
		  transform-origin: 50% 50%;
		}

		:checked+.img-label {
		  border-color: #ddd;
		}

		:checked+.img-label::before {
		  content: "✓";
		  background-color: green;
		  transform: scale(1);
		}

		:checked+.img-label img {
		  transform: scale(0.9);
		  box-shadow: 0 0 5px #333;
		  z-index: -1;
		}
		.wizard > .actions {
		    margin-top: 15px;
		}
	</style>
@endsection

@section('content')
<!-- Page Header -->
<div class="page-header style-11">
  <div class="container">
    <h2 class="page-title">Ecards Create</h2>
    <ol class="breadcrumb">
      <li><a href="{{ Route('home') }}">Home</a></li>
      <li><a href="{{ Route('dashboard') }}">Dashboard</a></li>
      <li class="active">Ecards Create</li>
    </ol>
  </div>
</div>
<!-- Page Header End -->
<div class="cps-main-wrap">
  <!-- Custom Features -->
  	<div class="cps-section cps-section-padding" id="features">
      	<div class="container">
  			<div class="row">
  				<div class="col-md-12">
  					<div id="wizard">
  						<h2>Card Design</h2>
  							<section>
	  							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center tab-head-title">
									<h4>Choose a design to get started</h4>
									<br>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container">
									<div class="row p-0">
										<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu"></div>
										<div class="col-md-9 head-input-section">
											<div class="row">
												<div class="col-md-3">
													<label>eCard Campaign Name:</label>
												</div>
												<div class="col-md-7">
													<input type="text" name="" class="form-controler" placeholder="">
												</div>
												<div class="col-md-2 text-left">
													<div class="actions">
														<a href="#next" role="menuitem" class="btn btn-primary">Next</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
						        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container">
						        	<div class="row">
							            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
							            	<div class="left-top-head">
								                Select an Occasion
							              	</div>
							              	<div class="list-group">
								                <a href="#" class="list-group-item active">
								                  	Test1
								                </a>
								                <a href="#" class="list-group-item">
								                  	Test2
								                </a>
								                <a href="#" class="list-group-item">
								                  	Test3
								                </a>
								                <a href="#" class="list-group-item">
								                  	Test4
								                </a>
							              	</div>
							            </div>
							            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-8 bhoechie-tab">
							                <div class="bhoechie-tab-content active">
							            		<div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 box-img-step-1">
									            	<input type="radio" name="image" class="chk img-chk" id="img1">
													<label for="img1" class="img-label"><img src="{{ asset('img/products/classic.jpg') }}" style="margin-bottom: 30px;" class="img-thumbnail"></label>
													<div class="hover-img-prev">
														<button class="btn btn-success lightbox" src="{{ asset('img/products/classic.jpg') }}" />Preview</button>
														<button class="btn btn-success select-check">Select</button>
													</div>
									            </div>
									            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 box-img-step-1">
									            	<input type="radio" name="image" id="img2" class="chk img-chk" />
													<label for="img2" class="img-label"><img src="{{ asset('img/products/classic1.jpg') }}" style="margin-bottom: 30px;" class="img-thumbnail"></label>
													<div class="hover-img-prev">
														<button class="btn btn-success lightbox" src="{{ asset('img/products/classic1.jpg') }}">Preview</button>
														<button class="btn btn-success select-check">Select</button>
													</div>
									            </div>
									            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 box-img-step-1">
									            	<input type="radio" name="image" class="chk img-chk" id="img1">
													<label for="img1" class="img-label"><img src="{{ asset('img/products/classic.jpg') }}" style="margin-bottom: 30px;" class="img-thumbnail"></label>
													<div class="hover-img-prev">
														<button class="btn btn-success lightbox" src="{{ asset('img/products/classic.jpg') }}" />Preview</button>
														<button class="btn btn-success select-check">Select</button>
													</div>
									            </div>
									            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 box-img-step-1">
									            	<input type="radio" name="image" id="img2" class="chk img-chk" />
													<label for="img2" class="img-label"><img src="{{ asset('img/products/classic1.jpg') }}" style="margin-bottom: 30px;" class="img-thumbnail"></label>
													<div class="hover-img-prev">
														<button class="btn btn-success lightbox" src="{{ asset('img/products/classic1.jpg') }}">Preview</button>
														<button class="btn btn-success select-check">Select</button>
													</div>
									            </div>
									            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 box-img-step-1">
									            	<input type="radio" name="image" class="chk img-chk" id="img1">
													<label for="img1" class="img-label"><img src="{{ asset('img/products/classic.jpg') }}" style="margin-bottom: 30px;" class="img-thumbnail"></label>
													<div class="hover-img-prev">
														<button class="btn btn-success lightbox" src="{{ asset('img/products/classic.jpg') }}" />Preview</button>
														<button class="btn btn-success select-check">Select</button>
													</div>
									            </div>
									            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 box-img-step-1">
									            	<input type="radio" name="image" id="img2" class="chk img-chk" />
													<label for="img2" class="img-label"><img src="{{ asset('img/products/classic1.jpg') }}" style="margin-bottom: 30px;" class="img-thumbnail"></label>
													<div class="hover-img-prev">
														<button class="btn btn-success lightbox" src="{{ asset('img/products/classic1.jpg') }}">Preview</button>
														<button class="btn btn-success select-check">Select</button>
													</div>
									            </div>
									            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 box-img-step-1">
									            	<input type="radio" name="image" class="chk img-chk" id="img1">
													<label for="img1" class="img-label"><img src="{{ asset('img/products/classic.jpg') }}" style="margin-bottom: 30px;" class="img-thumbnail"></label>
													<div class="hover-img-prev">
														<button class="btn btn-success lightbox" src="{{ asset('img/products/classic.jpg') }}" />Preview</button>
														<button class="btn btn-success select-check">Select</button>
													</div>
									            </div>
									            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 box-img-step-1">
									            	<input type="radio" name="image" id="img2" class="chk img-chk" />
													<label for="img2" class="img-label"><img src="{{ asset('img/products/classic1.jpg') }}" style="margin-bottom: 30px;" class="img-thumbnail"></label>
													<div class="hover-img-prev">
														<button class="btn btn-success lightbox" src="{{ asset('img/products/classic1.jpg') }}">Preview</button>
														<button class="btn btn-success select-check">Select</button>
													</div>
									            </div>
							                </div>
							                <div class="bhoechie-tab-content">
							                    <center>
							                      <h3 style="margin-top: 0;color:#55518a">Cooming Soon 2</h3>
							                    </center>
							                </div>
							                <div class="bhoechie-tab-content">
							                    <center>
							                      <h3 style="margin-top: 0;color:#55518a">Cooming Soon 3</h3>
							                    </center>
							                </div>
							            </div>
						        	</div>
						        </div>
  							</section>
							<h2>Send Date</h2>
							<section>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center tab-head-title">
									<h4>When would you like to send your eCards?</h4>
									<br>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-4 box-radio">
												<input type="radio" id="box1" name="box" value="box-1" class="box-radio" checked="" />
												<label for="box1">
													<div class="step-2-box text-center">
														<i class="fa fa-forward" aria-hidden="true"></i>
														<p>Immediately</p>
														<span>Send one or more eCards <br>immediately</span>
													</div>
												</label>
											</div>
											<div class="col-md-4 box-radio">
												<input type="radio" id="box2" name="box" value="box-2" />
												<label for="box2">
													<div class="step-2-box text-center">
														<i class="fa fa-clock-o" aria-hidden="true"></i>
														<p>A specific date/time</p>
														<span>Send one or more eCards <br>on a specific date/time</span>
													</div>
												</label>
											</div>
											<div class="col-md-4 box-radio">
												<input type="radio" id="box3" name="box" value="box-3" />
												<label for="box3">
													<div class="step-2-box text-center">
														<i class="fa fa-calendar" aria-hidden="true"></i>
														<p>An anniversary of a date</p>
														<span>Send one or more eCards based on <br>the anniversary of a date field</span>
													</div>
												</label>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="step2-bottom-box step2-bottom-box1">
													<p>Confirmation email</p>
													<span>Send confirmation to the following email address when the campaign has been sent</span>
													<input type="text" name="">
												</div>
											</div>
											<div class="col-md-12">
												<div class="step2-bottom-box step2-bottom-box2" style="display: none;">
													<p>Select a specific date and time</p>
													<span>Select a time in the future when you would like your campaign sent.</span>
													<br><br>
													<div class="row">
														<div class="col-md-3">
															<label>Date</label>
														</div>
														<div class="col-md-3">
															<select class="form-control">
																<option value="01">Jan</option>
																<option value="02">Feb</option>
																<option value="03" selected="selected">Mar</option>
																<option value="04">Apr</option>
																<option value="05">May</option>
																<option value="06">Jun</option>
																<option value="07">Jul</option>
																<option value="08">Aug</option>
																<option value="09">Sep</option>
																<option value="10">Oct</option>
																<option value="11">Nov</option>
																<option value="12">Dec</option>
															</select>
														</div>
														<div class="col-md-3">
															<select class="form-control">
																<option value="1">01</option>
																<option value="2">02</option>
																<option value="3">03</option>
																<option value="4">04</option>
																<option value="5">05</option>
																<option value="6">06</option>
																<option value="7">07</option>
																<option value="8">08</option>
																<option value="9">09</option>
																<option value="10">10</option>
																<option value="11">11</option>
																<option value="12">12</option>
																<option value="13">13</option>
																<option value="14">14</option>
																<option value="15">15</option>
																<option value="16" selected="selected">16</option>
																<option value="17">17</option>
																<option value="18">18</option>
																<option value="19">19</option>
																<option value="20">20</option>
																<option value="21">21</option>
																<option value="22">22</option>
																<option value="23">23</option>
																<option value="24">24</option>
																<option value="25">25</option>
																<option value="26">26</option>
																<option value="27">27</option>
																<option value="28">28</option>
																<option value="29">29</option>
																<option value="30">30</option>
																<option value="31">31</option>
															</select>
														</div>
														<div class="col-md-3">
															<select class="form-control">
																<option value="2021" selected="selected">2021</option>
																<option value="2022">2022</option>
																<option value="2023">2023</option>
																<option value="2024">2024</option>
																<option value="2025">2025</option>
																<option value="2026">2026</option>
																<option value="2027">2027</option>
																<option value="2028">2028</option>
																<option value="2029">2029</option>
																<option value="2030">2030</option>
															</select>
														</div>
													</div>
													<br>
													<div class="row">
														<div class="col-md-3">
															<label>Time</label>
														</div>
														<div class="col-md-3">
															<select class="form-control">
																<option value="0">00</option>
																<option value="1">01</option>
																<option value="2">02</option>
																<option value="3">03</option>
																<option value="4">04</option>
																<option value="5">05</option>
																<option value="6">06</option>
																<option value="7">07</option>
																<option value="8">08</option>
																<option value="9">09</option>
																<option value="10">10</option>
																<option value="11">11</option>
															</select>
														</div>
														<div class="col-md-3">
															<select class="form-control">
																<option value="0" selected="selected">00</option>
																<option value="1">01</option>
																<option value="2">02</option>
																<option value="3">03</option>
																<option value="4">04</option>
																<option value="5">05</option>
																<option value="6">06</option>
																<option value="7">07</option>
																<option value="8">08</option>
																<option value="9">09</option>
																<option value="10">10</option>
																<option value="11">11</option>
																<option value="12">12</option>
																<option value="13">13</option>
																<option value="14">14</option>
																<option value="15">15</option>
																<option value="16">16</option>
																<option value="17">17</option>
																<option value="18">18</option>
																<option value="19">19</option>
																<option value="20">20</option>
																<option value="21">21</option>
																<option value="22">22</option>
																<option value="23">23</option>
																<option value="24">24</option>
																<option value="25">25</option>
																<option value="26">26</option>
																<option value="27">27</option>
																<option value="28">28</option>
																<option value="29">29</option>
																<option value="30">30</option>
																<option value="31">31</option>
																<option value="32">32</option>
																<option value="33">33</option>
																<option value="34">34</option>
																<option value="35">35</option>
																<option value="36">36</option>
																<option value="37">37</option>
																<option value="38">38</option>
																<option value="39">39</option>
																<option value="40">40</option>
																<option value="41">41</option>
																<option value="42">42</option>
																<option value="43">43</option>
																<option value="44">44</option>
																<option value="45">45</option>
																<option value="46">46</option>
																<option value="47">47</option>
																<option value="48">48</option>
																<option value="49">49</option>
																<option value="50">50</option>
																<option value="51">51</option>
																<option value="52">52</option>
																<option value="53">53</option>
																<option value="54">54</option>
																<option value="55">55</option>
																<option value="56">56</option>
																<option value="57">57</option>
																<option value="58">58</option>
																<option value="59">59</option>
															</select>
														</div>
														<div class="col-md-3">
															<select class="form-control">
																<option value="am">AM</option>
																<option value="pm">PM</option>
															</select>
														</div>
													</div>
													<br>
													<div class="row">
														<div class="col-md-3">
															<label>Time Zone</label>
														</div>
														<div class="col-md-5">
															<select class="form-control">
																<option value="America/Adak">(GMT-10:00) Hawaii-Aleutian Standard Time (America/Adak)</option>
																<option value="America/Anchorage">(GMT-9:00) Alaska Standard Time (America/Anchorage)</option>
																<option value="America/Los_Angeles">(GMT-8:00) Pacific Standard Time (America/Los_Angeles)</option>
																<option value="America/Denver">(GMT-7:00) Mountain Standard Time (America/Denver)</option>
																<option value="America/Lima">(GMT-5:00) Peru Time (America/Lima)</option>
																<option value="America/Guayaquil">(GMT-5:00) Ecuador Time (America/Guayaquil)</option>
																<option value="America/Chicago">(GMT-6:00) Central Standard Time (America/Chicago)</option>
																<option value="America/Detroit">(GMT-5:00) Eastern Standard Time (America/Detroit)</option>
																<option value="America/Caracas">(GMT-4:30) Venezuela Time (America/Caracas)</option>
																<option value="America/Antigua">(GMT-4:00) Atlantic Standard Time (America/Antigua)</option>
																<option value="America/Guyana">(GMT-4:00) Guyana Time (America/Guyana)</option>
																<option value="America/Havana">(GMT-5:00) Cuba Standard Time (America/Havana)</option>
																<option value="America/La_Paz">(GMT-4:00) Bolivia Time (America/La_Paz)</option>
																<option value="America/Boa_Vista">(GMT-4:00) Amazon Time (America/Boa_Vista)</option>
																<option value="America/Asuncion">(GMT-4:00) Paraguay Time (America/Asuncion)</option>
																<option value="America/Montevideo">(GMT-3:00) Uruguay Time (America/Montevideo)</option>
																<option value="America/Paramaribo">(GMT-3:00) Suriname Time (America/Paramaribo)</option>
																<option value="America/Godthab">(GMT-3:00) Western Greenland Time (America/Godthab)</option>
																<option value="America/Cayenne">(GMT-3:00) French Guiana Time (America/Cayenne)</option>
																<option value="Antarctica/Rothera">(GMT-3:00) Rothera Time (Antarctica/Rothera)</option>
																<option value="America/Santiago">(GMT-4:00) Chile Time (America/Santiago)</option>
																<option value="Atlantic/Stanley">(GMT-4:00) Falkland Is. Time (Atlantic/Stanley)</option>
																<option value="America/Bahia">(GMT-3:00) Brasilia Time (America/Bahia)</option>
																<option value="America/Miquelon">(GMT-3:00) Pierre &amp; Miquelon Standard Time (America/Miquelon)</option>
																<option value="Atlantic/South_Georgia">(GMT-2:00) South Georgia Standard Time (Atlantic/South_Georgia)</option>
																<option value="America/Noronha">(GMT-2:00) Fernando de Noronha Time (America/Noronha)</option>
																<option value="America/Scoresbysund">(GMT-1:00) Eastern Greenland Time (America/Scoresbysund)</option>
																<option value="Atlantic/Cape_Verde">(GMT-1:00) Cape Verde Time (Atlantic/Cape_Verde)</option>
																<option value="Atlantic/Azores">(GMT-1:00) Azores Time (Atlantic/Azores)</option>
																<option value="Africa/Casablanca">(GMT+0:00) Western European Time (Africa/Casablanca)</option>
																<option value="Africa/Accra">(GMT+0:00) Ghana Mean Time (Africa/Accra)</option>
																<option value="Europe/London">(GMT+0:00) Greenwich Mean Time (Europe/London)</option>
																<option value="Africa/Lagos">(GMT+1:00) Western African Time (Africa/Lagos)</option>
																<option value="Europe/Paris">(GMT+1:00) Central European Time (Europe/Paris)</option>
																<option value="Africa/Bujumbura">(GMT+2:00) Central African Time (Africa/Bujumbura)</option>
																<option value="Africa/Johannesburg">(GMT+2:00) South Africa Standard Time (Africa/Johannesburg)</option>
																<option value="Europe/Helsinki">(GMT+2:00) Eastern European Time (Europe/Helsinki)</option>
																<option value="Africa/Nairobi">(GMT+3:00) Eastern African Time (Africa/Nairobi)</option>
																<option value="Europe/Volgograd">(GMT+3:00) Volgograd Time (Europe/Volgograd)</option>
																<option value="Antarctica/Syowa">(GMT+3:00) Syowa Time (Antarctica/Syowa)</option>
																<option value="Europe/Moscow">(GMT+3:00) Moscow Standard Time (Europe/Moscow)</option>
																<option value="Asia/Baghdad">(GMT+3:00) Arabia Standard Time (Asia/Baghdad)</option>
																<option value="Asia/Tehran">(GMT+3:30) Iran Standard Time (Asia/Tehran)</option>
																<option value="Indian/Mahe">(GMT+4:00) Seychelles Time (Indian/Mahe)</option>
																<option value="Indian/Reunion">(GMT+4:00) Reunion Time (Indian/Reunion)</option>
																<option value="Indian/Mauritius">(GMT+4:00) Mauritius Time (Indian/Mauritius)</option>
																<option value="Asia/Dubai">(GMT+4:00) Gulf Standard Time (Asia/Dubai)</option>
																<option value="Europe/Samara">(GMT+4:00) Samara Time (Europe/Samara)</option>
																<option value="Asia/Baku">(GMT+4:00) Azerbaijan Time (Asia/Baku)</option>
																<option value="Asia/Tbilisi">(GMT+4:00) Georgia Time (Asia/Tbilisi)</option>
																<option value="Asia/Yerevan">(GMT+4:00) Armenia Time (Asia/Yerevan)</option>
																<option value="Asia/Kabul">(GMT+4:30) Afghanistan Time (Asia/Kabul)</option>
																<option value="Asia/Oral">(GMT+5:00) Oral Time (Asia/Oral)</option>
																<option value="Asia/Yekaterinburg">(GMT+5:00) Yekaterinburg Time (Asia/Yekaterinburg)</option>
																<option value="Asia/Tashkent">(GMT+5:00) Uzbekistan Time (Asia/Tashkent)</option>
																<option value="Indian/Maldives">(GMT+5:00) Maldives Time (Indian/Maldives)</option>
																<option value="Antarctica/Mawson">(GMT+6:00) Mawson Time (Antarctica/Mawson)</option>
																<option value="Indian/Kerguelen">(GMT+5:00) French Southern &amp; Antarctic Lands Time (Indian/Kerguelen)</option>
																<option value="Asia/Karachi">(GMT+5:00) Pakistan Time (Asia/Karachi)</option>
																<option value="Asia/Aqtau">(GMT+5:00) Aqtau Time (Asia/Aqtau)</option>
																<option value="Asia/Ashgabat">(GMT+5:00) Turkmenistan Time (Asia/Ashgabat)</option>
																<option value="Asia/Dushanbe">(GMT+5:00) Tajikistan Time (Asia/Dushanbe)</option>
																<option value="Asia/Omsk">(GMT+6:00) Omsk Time (Asia/Omsk)</option>
																<option value="Indian/Chagos">(GMT+6:00) Indian Ocean Territory Time (Indian/Chagos)</option>
																<option value="Asia/Novosibirsk">(GMT+6:00) Novosibirsk Time (Asia/Novosibirsk)</option>
																<option value="Antarctica/Vostok">(GMT+6:00) Vostok Time (Antarctica/Vostok)</option>
																<option value="Asia/Bishkek">(GMT+6:00) Kirgizstan Time (Asia/Bishkek)</option>
																<option value="Asia/Qyzylorda">(GMT+6:00) Qyzylorda Time (Asia/Qyzylorda)</option>
																<option value="Asia/Almaty">(GMT+6:00) Alma-Ata Time (Asia/Almaty)</option>
																<option value="Asia/Dhaka">(GMT+6:00) Bangladesh Time (Asia/Dhaka)</option>
																<option value="Asia/Rangoon">(GMT+6:30) Myanmar Time (Asia/Rangoon)</option>
																<option value="Indian/Cocos">(GMT+6:30) Cocos Islands Time (Indian/Cocos)</option>
																<option value="Antarctica/Davis">(GMT+7:00) Davis Time (Antarctica/Davis)</option>
																<option value="Asia/Bangkok">(GMT+7:00) Indochina Time (Asia/Bangkok)</option>
																<option value="Indian/Christmas">(GMT+7:00) Christmas Island Time (Indian/Christmas)</option>
																<option value="Asia/Jakarta">(GMT+7:00) West Indonesia Time (Asia/Jakarta)</option>
																<option value="Asia/Pontianak">(GMT+7:00) West Indonesia Time (Asia/Pontianak)</option>
																<option value="Asia/Krasnoyarsk">(GMT+7:00) Krasnoyarsk Time (Asia/Krasnoyarsk)</option>
																<option value="Asia/Hovd">(GMT+7:00) Hovd Time (Asia/Hovd)</option>
																<option value="Asia/Irkutsk">(GMT+8:00) Irkutsk Time (Asia/Irkutsk)</option>
																<option value="Asia/Ulaanbaatar">(GMT+8:00) Ulaanbaatar Time (Asia/Ulaanbaatar)</option>
																<option value="Asia/Brunei">(GMT+8:00) Brunei Time (Asia/Brunei)</option>
																<option value="Asia/Makassar">(GMT+8:00) Central Indonesia Time (Asia/Makassar)</option>
																<option value="Australia/Perth">(GMT+8:00) Western Standard Time (Australia) (Australia/Perth)</option>
																<option value="Asia/Kuala_Lumpur">(GMT+8:00) Malaysia Time (Asia/Kuala_Lumpur)</option>
																<option value="Asia/Manila">(GMT+8:00) Philippines Time (Asia/Manila)</option>
																<option value="Asia/Singapore">(GMT+8:00) Singapore Time (Asia/Singapore)</option>
																<option value="Asia/Kuching">(GMT+8:00) Malaysia Time (Asia/Kuching)</option>
																<option value="Asia/Hong_Kong">(GMT+8:00) Hong Kong Time (Asia/Hong_Kong)</option>
																<option value="Asia/Shanghai">(GMT+8:00) China Standard Time (Asia/Shanghai)</option>
																<option value="Asia/Choibalsan">(GMT+8:00) Choibalsan Time (Asia/Choibalsan)</option>
																<option value="Australia/Eucla">(GMT+8:45) Central Western Standard Time (Australia) (Australia/Eucla)</option>
																<option value="Asia/Dili">(GMT+9:00) Timor-Leste Time (Asia/Dili)</option>
																<option value="Asia/Yakutsk">(GMT+9:00) Yakutsk Time (Asia/Yakutsk)</option>
																<option value="Asia/Tokyo">(GMT+9:00) Japan Standard Time (Asia/Tokyo)</option>
																<option value="Asia/Jayapura">(GMT+9:00) East Indonesia Time (Asia/Jayapura)</option>
																<option value="Asia/Seoul">(GMT+9:00) Korea Standard Time (Asia/Seoul)</option>
																<option value="Australia/Darwin">(GMT+9:30) Central Standard Time (Northern Territory) (Australia/Darwin)</option>
																<option value="Asia/Vladivostok">(GMT+10:00) Vladivostok Time (Asia/Vladivostok)</option>
																<option value="Antarctica/DumontDUrville">(GMT+10:00) Dumont-d'Urville Time (Antarctica/DumontDUrville)</option>
																<option value="Australia/Brisbane">(GMT+10:00) Eastern Standard Time (Queensland) (Australia/Brisbane)</option>
																<option value="Australia/Adelaide">(GMT+9:30) Central Standard Time (South Australia) (Australia/Adelaide)</option>
																<option value="Asia/Sakhalin">(GMT+10:00) Sakhalin Time (Asia/Sakhalin)</option>
																<option value="Australia/Hobart">(GMT+10:00) Eastern Standard Time (Tasmania) (Australia/Hobart)</option>
																<option value="Australia/Lord_Howe">(GMT+10:30) Lord Howe Standard Time (Australia/Lord_Howe)</option>
																<option value="Australia/Melbourne">(GMT+10:00) Eastern Standard Time (Victoria) (Australia/Melbourne)</option>
																<option value="Australia/Sydney">(GMT+10:00) Eastern Standard Time (New South Wales) (Australia/Sydney)</option>
																<option value="Asia/Magadan">(GMT+11:00) Magadan Time (Asia/Magadan)</option>
																<option value="Asia/Kamchatka">(GMT+12:00) Petropavlovsk-Kamchatski Time (Asia/Kamchatka)</option>
																<option value="Asia/Anadyr">(GMT+12:00) Anadyr Time (Asia/Anadyr)</option>
																<option value="Antarctica/McMurdo">(GMT+12:00) New Zealand Standard Time (Antarctica/McMurdo)</option>
															</select>
														</div>
													</div>
													<br>
													<p>Confirmation email</p>
													<span>Send confirmation to the following email address when the campaign has been sent</span>
													<input type="text" name="">
												</div>
											</div>
											<div class="col-md-12">
												<div class="step2-bottom-box step2-bottom-box3" style="display: none;">
													<p>Select a list</p>
													<span>Select a list for this anniversary eCard</span>
													<select name="" class="form-control">
														<option value="">Select one</option>
														<option value="16185">Check</option>
														<option value="16726">New</option>
														<option value="17026">Renee</option>
														<option value="17038">Acorio</option>
														<option value="17045">IST</option>
														<option value="17049">Watford</option>
														<option value="17109">Family</option>
														<option value="17598">Back in the day</option>
													</select>
													<br>
													<p>Date field</p>
													<span>The following date field will be used as the annivarsary date</span>
													<select name="" class="form-control">
														<option value="">Select One</option>
													</select>
													<br>
													<p>When should the eCards be sent?</p>
													<span>The eCards will be sent annually at the time selected</span>
													<br>
													<br>
													<p>Select time zone</p>
													<span>Select the time zone in which to send your eCards</span>
													<select class="form-control">
														<option>test</option>
														<option>test</option>
													</select>
													<br>
													<p>Reminder email</p>
													<span>Send a reminder to the following email addresses each time an eCard is sent. This can be a handy reminder to wish your staff or clients 'Happy Birthday' (etc.) Separate each email address with a comma below.</span>
													<input type="text" name="">
												</div>
											</div>
										</div>
									</div>
								</div>
							</section>
							<h2>Recipients</h2>
							<section>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center tab-head-title">
									<h4>Who will receive this eCard campaign?</h4>
									<br>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-8">
												<div class="step3-left-box">
													<div class="row">
														<div class="col-md-12">
															<label>Select List: </label>
														</div>
														<div class="col-md-12">
															<select class="form-control">
																<option>test 1</option>
															</select>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="step3-right-box text-center">
													<div class="row">
														<div class="col-md-12">
															<label>Total Recipients Added: 0</label>
														</div>
													</div>
													<div class="row">
														<div class="col-md-6">
															<a href="" class="btn btn-primary">Edit recipients</a>
														</div>
														<div class="col-md-6">
															<a href="" class="btn btn-primary">Add recipients</a>
														</div>
													</div>
												</div>
											</div>
										</div>	
									</div>
								</div>
							</section>
							<h2>Message</h2>
							<section>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center tab-head-title">
									<h4>Compose eCard</h4>
									<br>
								</div>
								<p><div class="row">
										<div class="col-md-12">
											
										</div>
									</div>
								</p>
							</section>
							<h2>Review & Send</h2>
							<section>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center tab-head-title">
									<h4>Campaign Overview</h4>
									<br>
								</div>
								<p><div class="row">
										<div class="col-md-12">
											
										</div>
									</div>
								</p>
							</section>
					</div>
  				</div>
  			</div>
		</div>
	</div>
</div>
@endsection
@section('footer_script')
	<script src="{{ asset('js/eCard.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
	<script src="{{ asset('js/jquery.steps.js') }}"></script>
	<script type="text/javascript">
		$(function ()
	    {
	        $("#wizard").steps({
	            headerTag: "h2",
	            bodyTag: "section",
	            transitionEffect: "slideLeft"
	        });
	    });
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
		    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
		        e.preventDefault();
		        $(this).siblings('a.active').removeClass("active");
		        $(this).addClass("active");
		        var index = $(this).index();
		        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
		        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
		    });
		});
	</script>
@endsection