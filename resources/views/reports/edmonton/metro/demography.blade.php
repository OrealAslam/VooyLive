<div class="row">
    <div class="col-lg-5 col-md-5 col-sm-5">
        <div class="left-side colora">
            DEMOGRAPHICS
        </div>
    </div>
    <div class="col-lg-7 col-md-7 col-sm-7">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 demographics-text backgroundd">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 text colorb font-raleway">
                        Rental vs Owned
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 percent1 colorb">
						@if (isset($rentalVsOwned) && isset($rentalVsOwned['percentHouseRented']) && $rentalVsOwned['percentHouseRented'] != 0)
							{{round($rentalVsOwned['percentHouseRented'])}}% vs
						@else
							N/A vs
						@endif
						@if (isset($rentalVsOwned) && isset($rentalVsOwned['percentHouseOwned']) && $rentalVsOwned['percentHouseOwned'] != 0)
							{{round($rentalVsOwned['percentHouseOwned'])}}%
						@else
							N/A
						@endif
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 text colorb">
                        MEDIAN AGE
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 percent2 colorb">
						@if (isset($medianAge))
							{{$medianAge}}
						@else
							N/A
						@endif
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 education">
                <div class="row color1">
                    <div class="col-lg-12 col-md-12 col-sm-12 avg-household-size">
                        <div class="row backgroundd">
                            <div class="col-lg-5 col-md-5 col-sm-5 icon backgrounde">
								<svg version="1.1" class="fillf" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve">
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
                            <div class="col-lg-7 col-md-7 col-sm-7 text colorb">
                                AVERAGE HOUSEHOLD INCOME
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 education-title colora">
                        EDUCATION
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 education-graph text-left" style="margin: 0 auto;">
                    	<div class="graph">
							{!! $eduChart !!}
                    	</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5 age-distb">
                <div class="row color1">
                    <div class="col-lg-12 col-md-12 col-sm-12 avg-household-size">
                        <div class="row backgrounde value colorb">
							@if (isset($averageIncome) && !is_string($averageIncome))
								$ {{ number_format($averageIncome) }}
							@else
								N/A
							@endif
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 age-distb-title colora">
                        AGE DISTRIBUTION
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 age-graph">
                   		{!! $ageChart !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>