<div class="section-title">	
	<h3 class="colora text-center">Demographics</h3>
	<div class="clearfix"></div>
</div>
<div class="row demographics-row">
	<div class="col-xs-12">
		<table class="table text-center table-bordered table-striped demographics-table">
			<tbody>
				<tr>
					<td class="col-xs-3" rowspan="2">
						<div class="demographics-icon fillb" style="display: inline-block;">
							<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							width="64px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
							<g>
							<path d="M502.625,287.959L256,41.334L9.375,287.959c-12.5,12.5-12.5,32.75,0,45.25s32.75,12.5,45.25,0L64,323.834v114.75V471h32
							h320h32v-32.416v-114.75l9.375,9.375c6.25,6.25,14.438,9.375,22.625,9.375s16.375-3.125,22.625-9.375
							C515.125,320.709,515.125,300.459,502.625,287.959z M416,439H224V311h-64v128H96V291.834l160-160l160,160V439z"/>
							<rect x="288" y="311" width="64" height="64"/>
							</g>
							<rect x="288" y="311" width="64" height="64"/>
							<polygon points="160,92.084 160,55 96,55 96,156.084 "/>
							</svg>

						</div>
						<div class="demographics-title colorb" style="display: inline-block; margin-top: 18px; vertical-align: top;">Rental vs Owned</div>
						<h3 class="colorb" style="margin: 0;">
							@if (isset($rentalVsOwned) && isset($rentalVsOwned['percentHouseRented']) && $rentalVsOwned['percentHouseRented'] != 0)
								{{$rentalVsOwned['percentHouseRented']}}%
							@else
								N/A
							@endif
							/
							@if (isset($rentalVsOwned) && isset($rentalVsOwned['percentHouseOwned']) && $rentalVsOwned['percentHouseOwned'] != 0)
								{{$rentalVsOwned['percentHouseOwned']}}%
							@else
								N/A
							@endif
						</h3>
					</td>
					<td class="col-xs-3">
						<div class="demographics-icon fillb" style="display: inline-block;">
							<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 width="64px" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve">
							<g>
								<g id="money_4">
									<g>
										<path d="M32,22.327c0-1.705-1.387-3.093-3.092-3.093c-0.637,0-1.227,0.199-1.717,0.528h-0.002c0,0.003-0.002,0.003-0.002,0.005
											c-0.207,0.142-0.398,0.301-0.566,0.485l0.008,0.008c-0.641,0.576-1.666,1.543-2.41,2.423c-0.16-0.412-0.404-0.787-0.717-1.093
											c-3.053-2.688-6.723-3.78-10.93-3.78c-1.377,0-2.705,0.149-3.961,0.424c-0.037-0.457-0.063-0.735-0.063-0.735H0.359
											c0,0-0.359,2.998-0.359,6.694c0,3.697,0.359,6.694,0.359,6.694h8.189c0,0,0.072-0.78,0.15-1.893
											c1.219-0.205,2.465,0.116,3.908,1.012c1.828,1.195,4.08,1.902,6.518,1.902c2.472,0,4.594-0.729,6.36-1.955l0.002,0.002
											c0.019-0.015,0.041-0.031,0.068-0.052c0.5-0.353,0.973-0.741,1.413-1.168c0.347-0.354,0.814-0.807,1.519-1.495
											c2.361-2.32,2.652-2.781,2.652-2.781s-0.007,0.002-0.009,0.002C31.668,23.909,32,23.159,32,22.327z M30.121,23.54
											c-0.414,0.41-2.166,2.215-2.639,2.678c-1.229,1.207-1.801,1.771-2.072,2.084l-0.004-0.006c-0.188,0.168-0.385,0.322-0.586,0.47
											c-1.584,1.071-3.557,1.711-5.695,1.711c-2.158,0-4.146-0.647-5.736-1.735h-0.012c-1.375-0.841-2.988-1.354-4.584-1.197
											c0.063-1.103,0.115-2.312,0.115-3.349c0-1.44-0.1-3.211-0.193-4.567c1.215-0.274,2.512-0.428,3.857-0.428
											c4.12,0,7.762,1.362,9.995,3.495c0.263,0.293,0.429,0.679,0.429,1.101c0,0.916-0.744,1.658-1.658,1.658
											c-0.035,0-0.067-0.009-0.103-0.011l-0.004,0.021c-0.854-0.03-2.188-0.389-4.442-1.25l-0.513,1.34
											c2.384,0.91,3.953,1.318,5.066,1.347v-0.01c1.395-0.005,2.572-0.933,2.955-2.201v0.002c0.482-0.801,2.287-2.472,3.312-3.383
											l0.002,0.002c0.011-0.011,0.021-0.019,0.027-0.026c0.19-0.171,0.354-0.313,0.473-0.416c0.216-0.136,0.44-0.193,0.798-0.193
											c0.914,0,1.655,0.744,1.655,1.656C30.564,22.786,30.363,23.219,30.121,23.54z"/>
										<path d="M21.973,18.611c5.105,0,9.26-4.153,9.26-9.259s-4.152-9.26-9.26-9.26c-5.106,0-9.26,4.154-9.26,9.26
											S16.865,18.611,21.973,18.611z M21.973,1.706c4.215,0,7.646,3.432,7.646,7.646c0,4.214-3.432,7.646-7.646,7.646
											c-4.217,0-7.646-3.432-7.646-7.646C14.327,5.137,17.756,1.706,21.973,1.706z"/>
										<path d="M19.545,9.04c0.197,0.23,0.48,0.441,0.848,0.637c0.365,0.193,0.855,0.338,1.467,0.43
											c0.174,0.029,0.348,0.066,0.521,0.115c0.178,0.045,0.338,0.109,0.486,0.188c0.146,0.08,0.268,0.176,0.361,0.287
											c0.094,0.109,0.141,0.242,0.141,0.393c0,0.18-0.09,0.324-0.27,0.438c-0.184,0.111-0.406,0.166-0.682,0.166
											c-0.209,0-0.396-0.016-0.559-0.049c-0.158-0.031-0.309-0.082-0.439-0.15c-0.132-0.068-0.262-0.154-0.389-0.26
											c-0.125-0.104-0.254-0.227-0.385-0.371h-1.51v2.266h1.51v-0.338c0.072,0.037,0.146,0.072,0.225,0.104
											c0.072,0.033,0.15,0.066,0.229,0.102v0.885h1.51v-0.681c0.324-0.021,0.625-0.09,0.9-0.205c0.277-0.113,0.518-0.266,0.719-0.453
											c0.201-0.186,0.359-0.404,0.475-0.652s0.174-0.516,0.174-0.803c0-0.15-0.025-0.346-0.082-0.588
											c-0.053-0.24-0.178-0.486-0.371-0.734c-0.191-0.248-0.477-0.477-0.846-0.689c-0.371-0.213-0.869-0.365-1.494-0.459
											c-1.008-0.15-1.51-0.459-1.51-0.926c0-0.166,0.078-0.32,0.24-0.465c0.162-0.143,0.396-0.215,0.695-0.215
											c0.209,0,0.391,0.018,0.545,0.053c0.154,0.037,0.297,0.09,0.426,0.156c0.129,0.068,0.252,0.154,0.367,0.26
											c0.115,0.104,0.232,0.225,0.355,0.361h1.52V5.577h-1.508V5.9c-0.18-0.109-0.383-0.195-0.605-0.26V4.82H21.1v0.713
											c-0.295,0.043-0.564,0.129-0.812,0.254s-0.463,0.283-0.646,0.475c-0.185,0.189-0.326,0.408-0.427,0.652
											c-0.103,0.244-0.151,0.502-0.151,0.777c0,0.186,0.031,0.4,0.092,0.641C19.219,8.572,19.348,8.81,19.545,9.04z"/>
									</g>
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
						</div>
						<div class="demographics-title colorb"  style="display: inline-block;  margin-top: 18px; vertical-align: top;">Average household income</div>
					</td>
					<td class="col-xs-3">
						<h3 class="colorb">
							@if (isset($averageIncome))
							$ {{ number_format($averageIncome, 0,' ',',') }}
							@else
								N/A
							@endif
						</h3>
					</td>
				</tr>
				<tr>
					<td>
						<div class="demographics-title colorb">Education</div>
					</td>
					<td>
						<div class="demographics-title colorb">Age Distribution</div>
					</td>
				</tr>
				<tr>
					<td style="vertical-align: middle;">
						<div class="demographics-title colorb">Average Household Size</div>
						<!-- <div class="demographics-title colorb"  style="display: inline-block;  margin-top: 18px; vertical-align: top;">Average household income</div> -->
						<div class="demographics-icon fillb" style="display: inline-block;">
							<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
 							width="64px" viewBox="0 0 503.303 503.303" style="enable-background:new 0 0 503.303 503.303;"
 							xml:space="preserve">
								<g>
									<g>
										<path d="M317.684,135.826c18.111,0,34.726-11.714,40.791-28.789c6.133-17.265,0.432-37.017-13.901-48.398
											c-14.353-11.397-34.982-12.409-50.374-2.447c-15.346,9.933-22.909,28.971-18.541,46.731c4.31,17.514,19.624,30.839,37.565,32.675
											C314.705,135.751,316.194,135.826,317.684,135.826z"/>
										<path d="M450.886,243.572c8.98,0,17.565-4.444,22.766-11.765c5.273-7.424,6.576-17.219,3.435-25.769
											c-3.054-8.31-10.088-14.831-18.609-17.234c-8.757-2.47-18.39-0.438-25.392,5.369c-6.956,5.767-10.729,14.719-10.018,23.726
											c0.705,8.898,5.792,17.077,13.433,21.683C440.827,242.191,445.835,243.572,450.886,243.572z"/>
										<path d="M503.282,332.769c-0.021-3.182,0.063-6.366-0.112-9.545c-0.179-3.244-0.488-6.479-0.765-9.718
											c-0.546-6.404-2.084-12.688-3.602-18.916c-0.76-3.11-1.91-6.261-3.079-9.242c-1.164-2.971-2.521-5.896-4.076-8.682
											c-3.083-5.521-6.577-10.664-11.011-15.206c-2.941-3.014-6.211-5.62-9.632-8.059c-2.679-1.908-5.469-3.677-8.477-5.022
											c-3.469-1.551-7.208-2.508-11.021-2.532c-4.657-0.029-9.188,1.351-13.244,3.588c-3.443,1.899-6.359,4.429-9.377,6.917
											c-3.12,2.57-6.34,5.019-9.648,7.342c-6.038,4.241-12.834,8.857-20.249,10.136c0.132-13.097-0.249-26.291-2.229-39.253
											c-0.973-6.36-2.005-12.801-3.654-19.025c-1.626-6.139-3.543-12.141-5.854-18.061c-4.339-11.114-10.012-21.553-17.612-30.782
											c-6.819-8.279-14.945-15.516-24.202-20.967c-10.021-5.9-21.427-9.503-33.146-8.285c-11.331,1.178-21.236,7.098-30.146,13.863
											c-12.393,9.41-22.752,21.518-29.917,35.344c-7.488-18.776-20.322-35.944-37.94-46.263c-9.682-5.67-20.917-9.606-32.213-9.762
											c-11.894-0.165-23.754,3.942-33.892,9.972c-20.059,11.931-33.539,32.2-40.536,54.127c-7.348,23.023-8.255,47.768-6.295,71.697
											c0.192,2.35,0.414,4.696,0.664,7.041c-5.769-1.399-11.159-4.537-16.117-7.7c-5.278-3.367-10.556-6.972-15.211-11.166
											c-3.89-3.504-8.604-6.083-13.825-6.839c-4.061-0.589-8.188-0.068-12.092,1.132c-21.281,6.546-35.32,26.732-40.576,47.558
											c-1.581,6.266-2.846,12.543-3.445,18.985C0.145,321.97,0.047,328.449,0,334.998c-0.018,2.483,0.375,4.708,2.061,6.639
											c1.492,1.709,3.652,2.782,5.927,2.862c4.659,0.163,8.122-3.533,8.57-7.97c0.563-5.568,1.054-11.124,2.06-16.633
											c1.04-5.693,2.509-11.18,4.406-16.645c-0.538,9.938-1.076,19.876-1.614,29.814c-0.068,1.265-0.137,2.528-0.205,3.794
											c-0.142,2.62,0.056,5.262,0.568,7.833c0.279,1.398,0.653,2.779,1.12,4.128c0.234,0.675,0.491,1.342,0.771,2
											c0.222,0.521,0.882,1.399,0.91,1.947c0.091,1.76,0.183,3.52,0.273,5.279c0.547,10.563,1.094,21.125,1.641,31.688
											c0.655,12.646,1.31,25.291,1.965,37.938c0.226,4.362,0.451,8.727,0.678,13.09c0.1,1.935,0.04,3.973,0.373,5.89
											c0.777,4.475,4.792,7.974,9.343,8.071c4.606,0.098,8.779-3.315,9.673-7.822c0.459-2.312,0.337-4.836,0.45-7.176
											c0.561-11.592,1.122-23.186,1.683-34.777c0.491-10.146,0.982-20.291,1.474-30.438c0.032-0.659,0.063-1.318,0.096-1.979
											c0.38,7.338,0.76,14.676,1.14,22.014c0.652,12.6,1.305,25.197,1.957,37.797c0.2,3.858,0.4,7.718,0.6,11.575
											c0.033,0.64,0.051,1.281,0.104,1.918c0.385,4.53,4.106,8.34,8.625,8.834c4.594,0.505,9.021-2.556,10.304-6.973
											c0.302-1.041,0.358-2.083,0.41-3.151c0.146-3.029,0.293-6.059,0.439-9.089c0.568-11.751,1.138-23.503,1.706-35.254
											c0.575-11.886,1.15-23.771,1.726-35.657c0.154-3.196,0.31-6.395,0.464-9.592c0.037-0.77,0.02-1.177,0.379-1.859
											c2.618-4.97,3.845-10.612,3.541-16.221c-0.498-9.199-0.996-18.398-1.494-27.598c-0.401-7.409-0.803-14.818-1.204-22.228
											c5.635,2.257,11.787,4.303,17.862,4.881c3.08,0.293,6.302,0.349,9.347-0.284c1.414-0.294,2.853-0.698,4.185-1.262
											c0.343-0.145,0.677-0.309,1.007-0.479c0.277,0.042,0.556,0.075,0.835,0.099c0.638,0.055,1.28,0.059,1.919,0.014
											c4.426-0.313,8.48-3.046,10.511-6.978c1.072-2.075,1.462-4.32,1.364-6.639c-0.128-3.059-0.211-6.118-0.239-9.179
											c-0.114-12.078,0.601-24.202,2.746-36.102c2.156-11.958,5.701-23.863,11.647-34.512c-0.845,6.979-1.69,13.958-2.535,20.937
											c-1.538,12.696-3.075,25.392-4.613,38.088c-0.561,4.629-1.121,9.259-1.682,13.888c-0.386,3.187-0.823,6.354-0.862,9.571
											c-0.069,5.695,0.831,11.399,2.673,16.79c0.922,2.698,2.078,5.316,3.456,7.813c0.665,1.206,1.383,2.384,2.148,3.528
											c0.186,0.275,0.188,0.181,0.196,0.341c0.069,1.466,0.139,2.933,0.208,4.398c0.401,8.452,0.802,16.904,1.203,25.356
											c0.595,12.555,1.19,25.108,1.786,37.664c0.604,12.75,1.209,25.5,1.813,38.25c0.429,9.038,0.857,18.076,1.286,27.115
											c0.09,1.905,0.181,3.812,0.271,5.718c0.302,6.362,4.513,12.023,10.669,13.885c9.01,2.725,18.543-4.176,18.963-13.541
											c0.07-1.573,0.142-3.146,0.212-4.719c0.44-9.818,0.881-19.636,1.32-29.455c0.584-13.015,1.168-26.03,1.751-39.045
											c0.421-9.374,0.841-18.748,1.262-28.121c0.054-1.208,0.108-2.417,0.162-3.626c0.262,5.605,0.522,11.212,0.783,16.818
											c0.571,12.259,1.143,24.518,1.713,36.775c0.563,12.071,1.125,24.142,1.688,36.211c0.178,3.827,0.356,7.654,0.534,11.481
											c0.104,2.221,0.066,4.542,0.641,6.702c2.436,9.167,13.192,13.938,21.515,9.244c4.783-2.698,7.418-7.585,7.664-12.972
											c0.281-6.157,0.563-12.312,0.844-18.47c0.529-11.589,1.059-23.178,1.588-34.769c0.6-13.134,1.199-26.269,1.8-39.401
											c0.493-10.792,0.985-21.584,1.479-32.377c0.209-4.563,0.417-9.125,0.625-13.688c0.01-0.196,0.433-0.667,0.541-0.839
											c0.355-0.562,0.699-1.129,1.032-1.704c0.721-1.248,1.388-2.527,1.998-3.833c1.181-2.528,2.146-5.157,2.88-7.849
											c1.512-5.542,2.03-11.34,1.543-17.063c-0.207-2.434-0.557-4.86-0.851-7.285c-1.367-11.292-2.734-22.585-4.103-33.877
											c-1.321-10.913-2.644-21.826-3.965-32.738c-0.173-1.424-0.345-2.849-0.518-4.274c5.556,10.266,8.989,21.555,11.035,33.013
											c2.077,11.628,2.88,23.488,2.606,35.287c-0.074,3.212-0.005,6.426,0.026,9.639c-0.072,2.109-0.025,4.113,0.715,6.126
											c1.563,4.25,5.374,7.522,9.857,8.275c4.504,0.756,9.178-1.062,12.115-4.529c3.415-4.029,3.167-9.314,3.576-14.291
											c0.786-9.553,2.335-19.086,4.522-28.413c2.155-9.189,4.879-18.354,8.89-26.919c0,2.432,0,4.864,0,7.296
											c0,0.962,0.146,2.018-0.053,2.967c-0.416,2-0.832,3.999-1.248,5.998c-2.026,9.737-4.052,19.475-6.078,29.212
											c-2.664,12.805-5.329,25.609-7.993,38.414c-2.158,10.37-4.314,20.74-6.474,31.11c-0.531,2.554-1.063,5.106-1.594,7.659
											c-0.133,0.639-0.279,1.271-0.33,1.922c-0.381,4.877,3.604,9.013,8.442,9.013c5.256,0,15.517,0,15.517,0l2.515,0.025
											c0,0,0.071,1.627,0.107,2.367c0.441,9.153,0.886,18.309,1.327,27.461c0.628,12.962,1.256,25.925,1.883,38.886
											c0.417,8.625,0.834,17.249,1.252,25.873c0.024,0.523,0.05,1.048,0.075,1.571c0.198,4.103,2.199,7.993,5.309,10.653
											c3.489,2.986,8.237,4.271,12.744,3.303c4.383-0.941,8.202-3.913,10.261-7.888c1.501-2.901,1.629-5.902,1.791-9.046
											c0.198-3.813,0.396-7.625,0.593-11.438c0.635-12.246,1.269-24.49,1.902-36.736c0.602-11.614,1.203-23.229,1.805-34.842
											c0.157-3.022,0.312-6.047,0.47-9.069c0.03-0.573-0.185-1.119,0.442-1.119c1.353,0,1.307-0.239,1.36,0.893
											c0.39,8.017,0.776,16.031,1.164,24.047c0.625,12.923,1.251,25.848,1.876,38.771c0.47,9.686,0.938,19.371,1.406,29.057
											c0.137,2.818,0.153,5.576,1.249,8.249c3.619,8.826,14.769,12.24,22.565,6.629c3.666-2.639,6.062-6.869,6.298-11.396
											c0.026-0.439,0.046-0.878,0.067-1.317c0.162-3.131,0.324-6.261,0.486-9.392c0.606-11.707,1.213-23.413,1.818-35.119
											c0.631-12.175,1.262-24.351,1.892-36.525c0.192-3.717,0.385-7.433,0.578-11.148c0.042-0.82,0.127-2.708,0.127-2.708
											s12.411-0.037,17.521-0.037c5.225,0,9.224-4.875,8.23-10.001c-0.065-0.363-0.146-0.724-0.221-1.084
											c-1.474-7.231-2.945-14.462-4.418-21.694c-2.512-12.331-5.022-24.662-7.533-36.993c-2.421-11.888-4.842-23.774-7.263-35.663
											c-1.202-5.901-2.403-11.802-3.605-17.703c-0.169-0.832-0.029-1.792-0.029-2.635c0-1.988,0-3.976,0-5.963
											c2.464,5.846,4.362,11.851,6.01,17.973c1.695,6.311,3.107,12.682,4.051,19.152c0.938,6.438,1.683,12.875,2.22,19.358
											c0.194,2.347,0.291,4.653,1.258,6.842c0.901,2.039,2.346,3.823,4.132,5.154c2.464,1.836,5.552,2.771,8.621,2.543
											c0.877-0.065,1.528,0.594,2.304,1.005c0.893,0.475,1.825,0.872,2.781,1.201c2.001,0.688,4.049,1.072,6.159,1.172
											c8.529,0.397,17.008-2.376,24.747-5.74l-0.014,18.764l-7.659,32.564c-2.614,11.113-5.229,22.226-7.843,33.339
											c-0.616,2.621-2.005,6-0.576,8.546c1.674,2.982,4.789,2.729,7.69,2.729c2.994,0,5.986,0,8.98,0c0.104,0,1.253-0.047,1.257,0.029
											c0.013,0.247,0.023,0.494,0.035,0.741c0.066,1.369,0.133,2.738,0.199,4.107c0.252,5.211,0.504,10.421,0.756,15.632
											c0.585,12.089,1.17,24.179,1.755,36.269c0.125,2.582-0.021,5.375,0.489,7.925c0.893,4.455,4.986,7.86,9.544,7.838
											c4.604-0.023,8.695-3.534,9.473-8.063c0.437-2.535,0.338-5.238,0.471-7.798c0.288-5.563,0.576-11.129,0.863-16.693
											c0.607-11.739,1.217-23.479,1.823-35.219c0.07-1.348,0.141-2.697,0.21-4.045c0.013-0.234,0.024-0.469,0.036-0.703
											c-0.003,0.06,0.958-0.25,0.976,0.098c0.142,2.917,0.281,5.834,0.424,8.751c0.598,12.365,1.195,24.73,1.795,37.096
											c0.229,4.75,0.46,9.499,0.688,14.249c0.048,0.989,0.097,1.978,0.145,2.966c0.16,3.31,1.981,6.345,4.842,8.031
											c4.021,2.372,9.211,1.404,12.206-2.147c1.521-1.802,2.181-3.965,2.301-6.277c0.183-3.514,0.363-7.025,0.546-10.538
											c0.647-12.502,1.295-25.004,1.941-37.506c0.223-4.29,0.444-8.578,0.667-12.865c0.005-0.101,0.077-1.876,0.102-1.876
											c2.382,0,4.766,0,7.147,0c2.427,0,5.703,0.515,7.811-0.943c2.039-1.41,2.564-3.771,2.064-6.056
											c-0.697-3.188-1.395-6.376-2.091-9.564c-2.649-12.117-5.3-24.235-7.948-36.352c-1.77-8.085-5.516-24.414-5.516-24.414l0.018-6.208
											c5.259,11.762,6.726,24.753,8.002,37.428c0.213,2.112,0.717,4.016,2.177,5.636c1.506,1.671,3.667,2.708,5.92,2.78
											c4.588,0.146,8.54-3.75,8.516-8.329C503.295,335.032,503.288,333.9,503.282,332.769z"/>
										<path d="M52.407,243.572c8.981,0,17.567-4.443,22.768-11.765c5.272-7.424,6.575-17.219,3.434-25.769
											c-3.054-8.31-10.087-14.831-18.61-17.234c-8.757-2.47-18.388-0.438-25.39,5.369c-6.956,5.767-10.73,14.719-10.018,23.726
											c0.705,8.898,5.792,17.077,13.433,21.683C42.35,242.191,47.357,243.572,52.407,243.572z"/>
										<path d="M181.604,128.256c18.138,0,34.726-11.88,40.545-29.067c5.881-17.37-0.267-37.044-14.935-48.018
											c-14.693-10.993-35.415-11.25-50.374-0.619c-14.929,10.609-21.55,30.111-16.112,47.617c5.374,17.304,21.642,29.604,39.75,30.072
											C180.854,128.252,181.229,128.256,181.604,128.256z"/>
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
						</div>
						<h3 class="colorb">
							@if (isset($household))
								{{$household}}
							@else
								N/A
							@endif
						</h3>
					</td>
					<td style="background-color: white;">
						<div id="demobyeducontainer">{!! $eduChart !!}</div>
					</td>
					<td style="background-color: white;">
						<div id="demobyagecontainer">{!! $ageChart !!}</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>