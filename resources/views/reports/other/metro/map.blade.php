<div class="row">
    <div class="col-lg-5 col-md-5 col-sm-5">
        <div class="left-side colora">
			{{__('reports/other/metro/map.shopsAndServices')}}
        </div>
    </div>
    <div class="col-lg-7 col-md-7 col-sm-7">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="row row-eq-height">
                            <div class="backgroundd item vcenter">
                                <div class="icon color-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 511.999 511.999" style="enable-background:new 0 0 511.999 511.999;" xml:space="preserve" class="fillf"> <g> <g> <path d="M496.946,272.105H481.19C474.326,168.747,397.543,83.974,297.7,65.629c2.683-5.759,4.289-13.877,4.289-20.639    c0-24.808-20.182-44.99-44.99-44.99s-44.99,20.182-44.99,44.99c0,6.762,1.606,14.88,4.289,20.639    C116.455,83.974,37.672,168.746,30.81,272.105H15.053c-8.289,0-14.997,6.308-14.997,14.597s6.707,14.997,14.997,14.997h481.893    c8.289,0,14.997-6.708,14.997-14.997S505.235,272.105,496.946,272.105z M256.999,61.752c-8.274,0-14.997-8.487-14.997-16.762    s6.723-14.997,14.997-14.997c8.274,0,14.997,6.722,14.997,14.997S265.274,61.752,256.999,61.752z"></path> </g> </g> <g> <g> <path d="M45.047,361.685c-8.399,0-14.997,6.598-14.997,14.997v120.207c0,8.397,6.598,14.997,14.997,14.997h44.99V361.685H45.047z"></path> </g> </g> <g> <g> <path d="M465.194,348.846c-11.716-11.716-30.695-11.716-42.411-0.001l-85.879,85.479c-10.759,10.759-24.916,16.741-40.027,17.34    h-41.076c-8.225,0-14.997-6.12-14.997-14.997c0-8.879,6.771-14.997,14.997-14.997c18.946,0,15.436,0,46.189,0    c16.496,0,29.993-13.497,29.993-29.993s-13.497-29.593-29.993-29.593h-29.993c-5.263,0-9.232,0.188-13.497-3.599    c-5.318-4.655-11.096-10.461-16.496-13.897c-29.977-21.16-73.326-26.297-109.477-7.408c-7.681,4.013-12.496,11.972-12.496,20.639    v154.067c190.757,0.256,173.303-0.002,174.446,0c32.044,0,62.183-12.477,84.839-35.148l85.879-85.879    C476.911,379.143,476.911,360.563,465.194,348.846z"></path> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>
                                    <span class="title colorb">
										{{__('reports/other/metro/map.restaurants')}}
                                    </span>
                                </div>
								@if(isset($response['resturants'][0]))								
								<div class="name color-white" id="res_one_name">{{ App\Report::checkEmptyValue($response['resturants'][0]['name'])}}</div>
								<div class="address color-white" id="res_one_address">{{ App\Report::checkEmptyValue($response['resturants'][0]['vicinity'])}}</div>
								<div class="distance color-white">
									<div class="distance-container">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 470.642 470.642" style="enable-background:new 0 0 470.642 470.642;" xml:space="preserve" class="filla walk-man">
											<g> <g> <path style="fill:#010002;" d="M223.821,76.022c10.333-0.333,19-4.333,26-12s10.333-16.667,10-27    c-0.333-10.335-4.167-19.168-11.5-26.5c-7.333-7.333-16.167-10.833-26.5-10.5s-19,4.333-26,12s-10.5,16.667-10.5,27    s3.833,19.167,11.5,26.5S213.488,76.355,223.821,76.022z"></path> <path style="fill:#010002;" d="M350.321,202.522l-55-30l-45-72c-8.667-10.667-19.333-16-32-16c-8.667,0-17,3.667-25,11l-68,69    c-2,2.667-3.333,5.667-4,9l-9,77v2c0,4.666,1.667,8.666,5,12c3.333,3.332,7.333,5,12,5s8.5-1.668,11.5-5c3-3.334,4.833-7,5.5-11    l7-66l24-24l-22,184l-39,87.001c-1.333,4-2,7.658-2,11.002c0,7.322,2.5,13.5,7.5,18.5s11.167,7.164,18.5,6.5    c10,0,17.333-4.678,22-14l42-94.002c0-0.67,0.333-1.835,1-3.5c0.668-1.67,1.335-3.17,2-4.5c0.667-1.335,1-2.67,1-4l5-45.001    l43,148.003c4.667,12,13,17.666,25,17c6.667,0,12.5-2.5,17.5-7.5s7.5-11.178,7.5-18.5c0-0.678-0.167-1.5-0.5-2.5    s-0.5-1.836-0.5-2.502l-60-205.001l7-67l17,27c1.333,2,3,3.667,5,5l59,33c4,1.333,6.667,2,8,2c4.667,0,8.667-1.833,12-5.5    c3.333-3.668,5-7.834,5-12.5C358.321,210.522,355.654,205.855,350.321,202.522z"></path> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g>
										</svg>
										<span class="walk-man-text1" style="display:inline;"><strong class="color-white">{{__('reports/other/metro/map.distance')}}</strong>:</span>
										<span class="walk-man-text1" style="display:inline;" id="res_one_distance"> 
											{{App\Report::checkEmptyValue(round($response['resturants'][0]['distance'], 2))}}{{__('reports/other/metro/map.KM')}}
										</span>
									</div>
								</div>
								@endif
								<div class="margin-10"></div>
								@if(isset($response['resturants'][1]))
								<div class="name color-white" id="res_two_name">{{ App\Report::checkEmptyValue($response['resturants'][1]['name'])}}</div>
								<div class="address color-white" id="res_two_address">{{ App\Report::checkEmptyValue($response['resturants'][1]['vicinity'])}}</div>
								<div class="distance color-white">
									<div class="distance-container">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 470.642 470.642" style="enable-background:new 0 0 470.642 470.642;" xml:space="preserve" class="filla walk-man">
											<g> <g> <path style="fill:#010002;" d="M223.821,76.022c10.333-0.333,19-4.333,26-12s10.333-16.667,10-27    c-0.333-10.335-4.167-19.168-11.5-26.5c-7.333-7.333-16.167-10.833-26.5-10.5s-19,4.333-26,12s-10.5,16.667-10.5,27    s3.833,19.167,11.5,26.5S213.488,76.355,223.821,76.022z"></path> <path style="fill:#010002;" d="M350.321,202.522l-55-30l-45-72c-8.667-10.667-19.333-16-32-16c-8.667,0-17,3.667-25,11l-68,69    c-2,2.667-3.333,5.667-4,9l-9,77v2c0,4.666,1.667,8.666,5,12c3.333,3.332,7.333,5,12,5s8.5-1.668,11.5-5c3-3.334,4.833-7,5.5-11    l7-66l24-24l-22,184l-39,87.001c-1.333,4-2,7.658-2,11.002c0,7.322,2.5,13.5,7.5,18.5s11.167,7.164,18.5,6.5    c10,0,17.333-4.678,22-14l42-94.002c0-0.67,0.333-1.835,1-3.5c0.668-1.67,1.335-3.17,2-4.5c0.667-1.335,1-2.67,1-4l5-45.001    l43,148.003c4.667,12,13,17.666,25,17c6.667,0,12.5-2.5,17.5-7.5s7.5-11.178,7.5-18.5c0-0.678-0.167-1.5-0.5-2.5    s-0.5-1.836-0.5-2.502l-60-205.001l7-67l17,27c1.333,2,3,3.667,5,5l59,33c4,1.333,6.667,2,8,2c4.667,0,8.667-1.833,12-5.5    c3.333-3.668,5-7.834,5-12.5C358.321,210.522,355.654,205.855,350.321,202.522z"></path> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g>
										</svg>
										<span class="walk-man-text1" style="display:inline;"><strong class="color-white">{{__('reports/other/metro/map.distance')}}</strong>:</span>
										<span class="walk-man-text1" style="display:inline;" id="res_two_distance"> 
											{{App\Report::checkEmptyValue(round($response['resturants'][1]['distance'], 2))}}{{__('reports/other/metro/map.KM')}}
										</span>
									</div>
								</div>
								@endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="row row-eq-height">
                            <div class="backgrounde item vcenter">
                                <div class="icon color-black">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 47.001 47.001" style="enable-background:new 0 0 47.001 47.001;" xml:space="preserve" class="fillf"> <g> <g id="Layer_1_78_"> <g> <path d="M44.845,42.718H2.136C0.956,42.718,0,43.674,0,44.855c0,1.179,0.956,2.135,2.136,2.135h42.708     c1.18,0,2.136-0.956,2.136-2.135C46.979,43.674,46.023,42.718,44.845,42.718z"></path> <path d="M4.805,37.165c-1.18,0-2.136,0.956-2.136,2.136s0.956,2.137,2.136,2.137h37.37c1.18,0,2.136-0.957,2.136-2.137     s-0.956-2.136-2.136-2.136h-0.533V17.945h0.533c0.591,0,1.067-0.478,1.067-1.067s-0.478-1.067-1.067-1.067H4.805     c-0.59,0-1.067,0.478-1.067,1.067s0.478,1.067,1.067,1.067h0.534v19.219H4.805z M37.37,17.945v19.219h-6.406V17.945H37.37z      M26.692,17.945v19.219h-6.406V17.945H26.692z M9.609,17.945h6.406v19.219H9.609V17.945z"></path> <path d="M2.136,13.891h42.708c0.007,0,0.015,0,0.021,0c1.181,0,2.136-0.956,2.136-2.136c0-0.938-0.604-1.733-1.443-2.021     l-21.19-9.535c-0.557-0.25-1.194-0.25-1.752,0L1.26,9.808c-0.919,0.414-1.424,1.412-1.212,2.396     C0.259,13.188,1.129,13.891,2.136,13.891z"></path> </g> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>
                                    <span class="title colorb">
										{{__('reports/other/metro/map.banks')}}
                                    </span>
                                </div>
								@if(isset($response['banks']))
								<div class="name color-black" id="bank_one_name">{{ App\Report::checkEmptyValue($response['banks'][0]['name'])}}</div>
								<div class="address color-black" id="bank_one_address">{{App\Report::checkEmptyValue($response['banks'][0]['vicinity'])}}</div>
								<div class="distance color-black">
									<div class="distance-container">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 470.642 470.642" style="enable-background:new 0 0 470.642 470.642;" xml:space="preserve" class="filla walk-man">
											<g> <g> <path style="fill:#010002;" d="M223.821,76.022c10.333-0.333,19-4.333,26-12s10.333-16.667,10-27    c-0.333-10.335-4.167-19.168-11.5-26.5c-7.333-7.333-16.167-10.833-26.5-10.5s-19,4.333-26,12s-10.5,16.667-10.5,27    s3.833,19.167,11.5,26.5S213.488,76.355,223.821,76.022z"></path> <path style="fill:#010002;" d="M350.321,202.522l-55-30l-45-72c-8.667-10.667-19.333-16-32-16c-8.667,0-17,3.667-25,11l-68,69    c-2,2.667-3.333,5.667-4,9l-9,77v2c0,4.666,1.667,8.666,5,12c3.333,3.332,7.333,5,12,5s8.5-1.668,11.5-5c3-3.334,4.833-7,5.5-11    l7-66l24-24l-22,184l-39,87.001c-1.333,4-2,7.658-2,11.002c0,7.322,2.5,13.5,7.5,18.5s11.167,7.164,18.5,6.5    c10,0,17.333-4.678,22-14l42-94.002c0-0.67,0.333-1.835,1-3.5c0.668-1.67,1.335-3.17,2-4.5c0.667-1.335,1-2.67,1-4l5-45.001    l43,148.003c4.667,12,13,17.666,25,17c6.667,0,12.5-2.5,17.5-7.5s7.5-11.178,7.5-18.5c0-0.678-0.167-1.5-0.5-2.5    s-0.5-1.836-0.5-2.502l-60-205.001l7-67l17,27c1.333,2,3,3.667,5,5l59,33c4,1.333,6.667,2,8,2c4.667,0,8.667-1.833,12-5.5    c3.333-3.668,5-7.834,5-12.5C358.321,210.522,355.654,205.855,350.321,202.522z"></path> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g>
										</svg>
										<span class="walk-man-text1" style="display:inline;"><strong class="color-black">{{__('reports/other/metro/map.distance')}}</strong>:</span>
										<span class="walk-man-text1" style="display:inline;" id="bank_one_distance"> 
											{{App\Report::checkEmptyValue(round($response['banks'][0]['distance'], 2))}}{{__('reports/other/metro/map.KM')}}
										</span>
									</div>
								</div>
								<div class="margin-10"></div>
								@if(isset($response['banks'][1]))											
								<div class="name color-black" id="bank_two_name">{{ App\Report::checkEmptyValue($response['banks'][1]['name'])}}</div>
								<div class="address color-black" id="bank_two_address">{{App\Report::checkEmptyValue($response['banks'][1]['vicinity'])}}</div>
								<div class="distance color-black">
									<div class="distance-container">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 470.642 470.642" style="enable-background:new 0 0 470.642 470.642;" xml:space="preserve" class="filla walk-man">
											<g> <g> <path style="fill:#010002;" d="M223.821,76.022c10.333-0.333,19-4.333,26-12s10.333-16.667,10-27    c-0.333-10.335-4.167-19.168-11.5-26.5c-7.333-7.333-16.167-10.833-26.5-10.5s-19,4.333-26,12s-10.5,16.667-10.5,27    s3.833,19.167,11.5,26.5S213.488,76.355,223.821,76.022z"></path> <path style="fill:#010002;" d="M350.321,202.522l-55-30l-45-72c-8.667-10.667-19.333-16-32-16c-8.667,0-17,3.667-25,11l-68,69    c-2,2.667-3.333,5.667-4,9l-9,77v2c0,4.666,1.667,8.666,5,12c3.333,3.332,7.333,5,12,5s8.5-1.668,11.5-5c3-3.334,4.833-7,5.5-11    l7-66l24-24l-22,184l-39,87.001c-1.333,4-2,7.658-2,11.002c0,7.322,2.5,13.5,7.5,18.5s11.167,7.164,18.5,6.5    c10,0,17.333-4.678,22-14l42-94.002c0-0.67,0.333-1.835,1-3.5c0.668-1.67,1.335-3.17,2-4.5c0.667-1.335,1-2.67,1-4l5-45.001    l43,148.003c4.667,12,13,17.666,25,17c6.667,0,12.5-2.5,17.5-7.5s7.5-11.178,7.5-18.5c0-0.678-0.167-1.5-0.5-2.5    s-0.5-1.836-0.5-2.502l-60-205.001l7-67l17,27c1.333,2,3,3.667,5,5l59,33c4,1.333,6.667,2,8,2c4.667,0,8.667-1.833,12-5.5    c3.333-3.668,5-7.834,5-12.5C358.321,210.522,355.654,205.855,350.321,202.522z"></path> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g>
										</svg>
										<span class="walk-man-text1" style="display:inline;"><strong class="color-black">{{__('reports/other/metro/map.distance')}}</strong>:</span>
										<span class="walk-man-text1" style="display:inline;" id="bank_two_distance"> 
											{{App\Report::checkEmptyValue(round($response['banks'][1]['distance'], 2))}}{{__('reports/other/metro/map.KM')}}
										</span>
									</div>
								</div>
								@endif			
								@else
								<div style="font-family: Raleway;">{{__('reports/other/metro/map.noBank')}} {{config('app.radius')/1000}}{{__('reports/other/metro/map.KMRadius')}}</div>
								@endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="row row-eq-height">
                            <div class="backgroundd item vcenter">
                                <div class="icon color-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 19.955 19.955" style="enable-background:new 0 0 19.955 19.955;" xml:space="preserve" class="fillf" > <g> <path d="M18.435,9.003c0.229,0.012,1.288,0.024,1.52,0.039l-1.793-6.162H18.13   c0.308-0.134,0.52-0.396,0.52-0.702V1.713c0-0.44-0.437-0.798-0.975-0.798H2.249c-0.538,0-0.974,0.357-0.974,0.798v0.465   c0,0.306,0.211,0.567,0.519,0.702H1.762L0,9.161c0.01-0.002,1.06-0.036,1.487-0.085v8.569H0.738v1.396h18.416v-1.396h-0.718   L18.435,9.003L18.435,9.003z M13.212,3.678l0.332,4.716c-0.84-0.024-1.631-0.04-2.383-0.05L11.06,3.678   c0-0.306,0.212-0.568,0.52-0.702h1.112C13.001,3.11,13.212,3.373,13.212,3.678z M9.149,3.678l-0.1,4.654   C8.183,8.335,7.391,8.347,6.667,8.365l0.33-4.687c0-0.306,0.212-0.568,0.52-0.702h1.114C8.938,3.11,9.149,3.373,9.149,3.678z    M2.979,3.678c0-0.305,0.212-0.568,0.52-0.702h1.113C4.919,3.11,5.131,3.373,5.131,3.678L4.593,8.439   c-1.009,0.049-1.807,0.109-2.41,0.164L2.979,3.678z M11.404,14.002H3.121v-3.84h8.283V14.002z M16.72,16.783h-3.217v-6.621h3.217   V16.783z M15.619,8.466l-0.54-4.788c0-0.306,0.212-0.568,0.519-0.702h1.114c0.306,0.134,0.518,0.397,0.518,0.702l0.793,4.901   C17.188,8.535,16.387,8.498,15.619,8.466z"></path> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>
                                    <span class="title colorb">
										{{__('reports/other/metro/map.convenienceStores')}}
                                    </span>
                                </div>
								@if(isset($response['conStores'][0]))
								<div class="name color-white" id="store_one_name">{{ App\Report::checkEmptyValue($response['conStores'][0]['name'])}}</div>
								<div class="address color-white" id="store_one_address">{{App\Report::checkEmptyValue($response['conStores'][0]['vicinity'])}}</div>
								<div class="distance color-white">
									<div class="distance-container">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 470.642 470.642" style="enable-background:new 0 0 470.642 470.642;" xml:space="preserve" class="filla walk-man">
											<g> <g> <path style="fill:#010002;" d="M223.821,76.022c10.333-0.333,19-4.333,26-12s10.333-16.667,10-27    c-0.333-10.335-4.167-19.168-11.5-26.5c-7.333-7.333-16.167-10.833-26.5-10.5s-19,4.333-26,12s-10.5,16.667-10.5,27    s3.833,19.167,11.5,26.5S213.488,76.355,223.821,76.022z"></path> <path style="fill:#010002;" d="M350.321,202.522l-55-30l-45-72c-8.667-10.667-19.333-16-32-16c-8.667,0-17,3.667-25,11l-68,69    c-2,2.667-3.333,5.667-4,9l-9,77v2c0,4.666,1.667,8.666,5,12c3.333,3.332,7.333,5,12,5s8.5-1.668,11.5-5c3-3.334,4.833-7,5.5-11    l7-66l24-24l-22,184l-39,87.001c-1.333,4-2,7.658-2,11.002c0,7.322,2.5,13.5,7.5,18.5s11.167,7.164,18.5,6.5    c10,0,17.333-4.678,22-14l42-94.002c0-0.67,0.333-1.835,1-3.5c0.668-1.67,1.335-3.17,2-4.5c0.667-1.335,1-2.67,1-4l5-45.001    l43,148.003c4.667,12,13,17.666,25,17c6.667,0,12.5-2.5,17.5-7.5s7.5-11.178,7.5-18.5c0-0.678-0.167-1.5-0.5-2.5    s-0.5-1.836-0.5-2.502l-60-205.001l7-67l17,27c1.333,2,3,3.667,5,5l59,33c4,1.333,6.667,2,8,2c4.667,0,8.667-1.833,12-5.5    c3.333-3.668,5-7.834,5-12.5C358.321,210.522,355.654,205.855,350.321,202.522z"></path> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g>
										</svg>
										<span class="walk-man-text1" style="display:inline;"><strong class="color-white">{{__('reports/other/metro/map.distance')}}</strong>:</span>
										<span class="walk-man-text1" style="display:inline;" id="store_one_distance"> 
											{{App\Report::checkEmptyValue(round($response['conStores'][0]['distance'], 2))}}{{__('reports/other/metro/map.KM')}}
										</span>
									</div>
								</div>
								@endif
								<div class="margin-10"></div>
								@if(isset($response['conStores'][1]))											
								<div class="name color-white" id="store_two_name">{{ App\Report::checkEmptyValue($response['conStores'][1]['name'])}}</div>
								<div class="address color-white" id="store_two_address">{{App\Report::checkEmptyValue($response['conStores'][1]['vicinity'])}}</div>
								<div class="distance color-white">
									<div class="distance-container">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 470.642 470.642" style="enable-background:new 0 0 470.642 470.642;" xml:space="preserve" class="filla walk-man">
											<g> <g> <path style="fill:#010002;" d="M223.821,76.022c10.333-0.333,19-4.333,26-12s10.333-16.667,10-27    c-0.333-10.335-4.167-19.168-11.5-26.5c-7.333-7.333-16.167-10.833-26.5-10.5s-19,4.333-26,12s-10.5,16.667-10.5,27    s3.833,19.167,11.5,26.5S213.488,76.355,223.821,76.022z"></path> <path style="fill:#010002;" d="M350.321,202.522l-55-30l-45-72c-8.667-10.667-19.333-16-32-16c-8.667,0-17,3.667-25,11l-68,69    c-2,2.667-3.333,5.667-4,9l-9,77v2c0,4.666,1.667,8.666,5,12c3.333,3.332,7.333,5,12,5s8.5-1.668,11.5-5c3-3.334,4.833-7,5.5-11    l7-66l24-24l-22,184l-39,87.001c-1.333,4-2,7.658-2,11.002c0,7.322,2.5,13.5,7.5,18.5s11.167,7.164,18.5,6.5    c10,0,17.333-4.678,22-14l42-94.002c0-0.67,0.333-1.835,1-3.5c0.668-1.67,1.335-3.17,2-4.5c0.667-1.335,1-2.67,1-4l5-45.001    l43,148.003c4.667,12,13,17.666,25,17c6.667,0,12.5-2.5,17.5-7.5s7.5-11.178,7.5-18.5c0-0.678-0.167-1.5-0.5-2.5    s-0.5-1.836-0.5-2.502l-60-205.001l7-67l17,27c1.333,2,3,3.667,5,5l59,33c4,1.333,6.667,2,8,2c4.667,0,8.667-1.833,12-5.5    c3.333-3.668,5-7.834,5-12.5C358.321,210.522,355.654,205.855,350.321,202.522z"></path> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g>
										</svg>
										<span class="walk-man-text1" style="display:inline;"><strong class="color-white">{{__('reports/other/metro/map.distance')}}</strong>:</span>
										<span class="walk-man-text1" style="display:inline;" id="store_two_distance"> 
											{{App\Report::checkEmptyValue(round($response['conStores'][1]['distance'], 2))}}{{__('reports/other/metro/map.KM')}}
										</span>
									</div>
								</div>
								@endif											
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="row row-eq-height">
                            <div class="backgrounde item vcenter">
                                <div class="icon color-black">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 384 384" style="enable-background:new 0 0 384 384;" xml:space="preserve" class="fillf"> <g> <g> <path d="M352.427,90.24l0.32-0.32L273.28,10.667L250.667,33.28l45.013,45.013c-20.053,7.68-34.347,26.987-34.347,49.707    c0,29.44,23.893,53.333,53.333,53.333c7.573,0,14.827-1.6,21.333-4.48v153.813C336,342.4,326.4,352,314.667,352    c-11.733,0-21.333-9.6-21.333-21.333v-96c0-23.573-19.093-42.667-42.667-42.667h-21.333V42.667C229.333,19.093,210.24,0,186.667,0    h-128C35.093,0,16,19.093,16,42.667V384h213.333V224h32v106.667c0,29.44,23.893,53.333,53.333,53.333    c29.44,0,53.333-23.893,53.333-53.333V128C368,113.28,362.027,99.947,352.427,90.24z M186.667,149.333h-128V42.667h128V149.333z     M314.667,149.333c-11.733,0-21.333-9.6-21.333-21.333s9.6-21.333,21.333-21.333c11.733,0,21.333,9.6,21.333,21.333    S326.4,149.333,314.667,149.333z"></path> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>
                                    <span class="title colorb">
										{{__('reports/other/metro/map.gasStation')}}
                                    </span>
                                </div>
								@if(isset($response['gasstations'][0]))
								<div class="name color-black" id="gas_one_name">{{ App\Report::checkEmptyValue($response['gasstations'][0]['name'])}}</div>
								<div class="address color-black" id="gas_one_address">{{App\Report::checkEmptyValue($response['gasstations'][0]['vicinity'])}}</div>
								<div class="distance color-black">
									<div class="distance-container">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 470.642 470.642" style="enable-background:new 0 0 470.642 470.642;" xml:space="preserve" class="filla walk-man">
											<g> <g> <path style="fill:#010002;" d="M223.821,76.022c10.333-0.333,19-4.333,26-12s10.333-16.667,10-27    c-0.333-10.335-4.167-19.168-11.5-26.5c-7.333-7.333-16.167-10.833-26.5-10.5s-19,4.333-26,12s-10.5,16.667-10.5,27    s3.833,19.167,11.5,26.5S213.488,76.355,223.821,76.022z"></path> <path style="fill:#010002;" d="M350.321,202.522l-55-30l-45-72c-8.667-10.667-19.333-16-32-16c-8.667,0-17,3.667-25,11l-68,69    c-2,2.667-3.333,5.667-4,9l-9,77v2c0,4.666,1.667,8.666,5,12c3.333,3.332,7.333,5,12,5s8.5-1.668,11.5-5c3-3.334,4.833-7,5.5-11    l7-66l24-24l-22,184l-39,87.001c-1.333,4-2,7.658-2,11.002c0,7.322,2.5,13.5,7.5,18.5s11.167,7.164,18.5,6.5    c10,0,17.333-4.678,22-14l42-94.002c0-0.67,0.333-1.835,1-3.5c0.668-1.67,1.335-3.17,2-4.5c0.667-1.335,1-2.67,1-4l5-45.001    l43,148.003c4.667,12,13,17.666,25,17c6.667,0,12.5-2.5,17.5-7.5s7.5-11.178,7.5-18.5c0-0.678-0.167-1.5-0.5-2.5    s-0.5-1.836-0.5-2.502l-60-205.001l7-67l17,27c1.333,2,3,3.667,5,5l59,33c4,1.333,6.667,2,8,2c4.667,0,8.667-1.833,12-5.5    c3.333-3.668,5-7.834,5-12.5C358.321,210.522,355.654,205.855,350.321,202.522z"></path> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g>
										</svg>
										<span class="walk-man-text1" style="display:inline;"><strong class="color-black">{{__('reports/other/metro/map.distance')}}</strong>:</span>
										<span class="walk-man-text1" style="display:inline;" id="gas_one_distance">
											{{App\Report::checkEmptyValue(round($response['gasstations'][0]['distance'], 2))}}{{__('reports/other/metro/map.KM')}}
										</span>
									</div>
								</div>
								@endif
								<div class="margin-10"></div>
								@if(isset($response['gasstations'][1]))											
								<div class="name color-black" id="gas_two_name">{{ App\Report::checkEmptyValue($response['gasstations'][1]['name'])}}</div>
								<div class="address color-black" id="gas_two_address">{{App\Report::checkEmptyValue($response['gasstations'][1]['vicinity'])}}</div>
								<div class="distance color-black">
									<div class="distance-container">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 470.642 470.642" style="enable-background:new 0 0 470.642 470.642;" xml:space="preserve" class="filla walk-man">
											<g> <g> <path style="fill:#010002;" d="M223.821,76.022c10.333-0.333,19-4.333,26-12s10.333-16.667,10-27    c-0.333-10.335-4.167-19.168-11.5-26.5c-7.333-7.333-16.167-10.833-26.5-10.5s-19,4.333-26,12s-10.5,16.667-10.5,27    s3.833,19.167,11.5,26.5S213.488,76.355,223.821,76.022z"></path> <path style="fill:#010002;" d="M350.321,202.522l-55-30l-45-72c-8.667-10.667-19.333-16-32-16c-8.667,0-17,3.667-25,11l-68,69    c-2,2.667-3.333,5.667-4,9l-9,77v2c0,4.666,1.667,8.666,5,12c3.333,3.332,7.333,5,12,5s8.5-1.668,11.5-5c3-3.334,4.833-7,5.5-11    l7-66l24-24l-22,184l-39,87.001c-1.333,4-2,7.658-2,11.002c0,7.322,2.5,13.5,7.5,18.5s11.167,7.164,18.5,6.5    c10,0,17.333-4.678,22-14l42-94.002c0-0.67,0.333-1.835,1-3.5c0.668-1.67,1.335-3.17,2-4.5c0.667-1.335,1-2.67,1-4l5-45.001    l43,148.003c4.667,12,13,17.666,25,17c6.667,0,12.5-2.5,17.5-7.5s7.5-11.178,7.5-18.5c0-0.678-0.167-1.5-0.5-2.5    s-0.5-1.836-0.5-2.502l-60-205.001l7-67l17,27c1.333,2,3,3.667,5,5l59,33c4,1.333,6.667,2,8,2c4.667,0,8.667-1.833,12-5.5    c3.333-3.668,5-7.834,5-12.5C358.321,210.522,355.654,205.855,350.321,202.522z"></path> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g>
										</svg>
										<span class="walk-man-text1" style="display:inline;"><strong class="color-black">{{__('reports/other/metro/map.distance')}}</strong>:</span>
										<span class="walk-man-text1" style="display:inline;" id="gas_two_distance">
											{{App\Report::checkEmptyValue(round($response['gasstations'][1]['distance'], 2))}}{{__('reports/other/metro/map.KM')}}
										</span>
									</div>
								</div>
								@endif											
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="row row-eq-height">
                            <div class="backgroundd item vcenter" style="padding-left: 16px; padding-right:16px;">
                                <div class="icon color-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve" class="fillf"> <g> <g> <path d="M423.892,229.581h-21.406v-43.154H49.378v82.953c0,97.352,79.202,176.554,176.554,176.554    c62.029,0,116.683-32.159,148.182-80.675h49.777c37.406,0,67.839-30.433,67.839-67.839    C491.731,260.015,461.298,229.581,423.892,229.581z M423.892,331.867h-32.839c7.379-19.436,11.433-40.496,11.433-62.487v-6.408    h21.406c18.994,0,34.448,15.453,34.448,34.448S442.886,331.867,423.892,331.867z"></path> </g> </g> <g> <g> <rect x="20.27" y="478.61" width="411.325" height="33.391"></rect> </g> </g> <g> <g> <path d="M297.392,86.894c0-6.167,1.312-8.316,4.187-13.023c3.832-6.275,9.081-14.869,9.081-30.427    c0-15.557-5.249-24.15-9.082-30.425c-2.875-4.706-4.186-6.854-4.186-13.019h-33.391c0,15.557,5.249,24.151,9.082,30.425    c2.875,4.706,4.186,6.853,4.186,13.018c0,6.167-1.312,8.316-4.187,13.023c-3.832,6.278-9.081,14.871-9.081,30.43    c0,15.558,5.249,24.152,9.081,30.426c2.875,4.707,4.187,6.855,4.187,13.023h33.391c0-15.558-5.249-24.152-9.081-30.427    C298.705,95.21,297.392,93.062,297.392,86.894z"></path> </g> </g> <g> <g> <path d="M174.595,86.894c0-6.167,1.312-8.316,4.187-13.023c3.832-6.275,9.081-14.869,9.081-30.427    c0-15.557-5.249-24.15-9.082-30.425c-2.875-4.706-4.186-6.854-4.186-13.019h-33.391c0,15.557,5.249,24.151,9.082,30.425    c2.875,4.706,4.186,6.853,4.186,13.018c0,6.167-1.312,8.316-4.187,13.023c-3.832,6.278-9.081,14.871-9.081,30.43    c0,15.558,5.249,24.152,9.081,30.426c2.875,4.707,4.187,6.855,4.187,13.023h33.391c0-15.558-5.249-24.152-9.081-30.427    C175.907,95.21,174.595,93.062,174.595,86.894z"></path> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>
                                    <span class="title colorb">
										{{__('reports/other/metro/map.cafe')}}
                                    </span>
                                </div>
								@if(isset($response['cafe'][0]))
								<div class="name color-white" id="cafe_one_name">{{ App\Report::checkEmptyValue($response['cafe'][0]['name'])}}</div>
								<div class="address color-white" id="cafe_one_address">{{App\Report::checkEmptyValue($response['cafe'][0]['vicinity'])}}</div>
								<div class="distance color-white">
									<div class="distance-container">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 470.642 470.642" style="enable-background:new 0 0 470.642 470.642;" xml:space="preserve" class="filla walk-man">
											<g> <g> <path style="fill:#010002;" d="M223.821,76.022c10.333-0.333,19-4.333,26-12s10.333-16.667,10-27    c-0.333-10.335-4.167-19.168-11.5-26.5c-7.333-7.333-16.167-10.833-26.5-10.5s-19,4.333-26,12s-10.5,16.667-10.5,27    s3.833,19.167,11.5,26.5S213.488,76.355,223.821,76.022z"></path> <path style="fill:#010002;" d="M350.321,202.522l-55-30l-45-72c-8.667-10.667-19.333-16-32-16c-8.667,0-17,3.667-25,11l-68,69    c-2,2.667-3.333,5.667-4,9l-9,77v2c0,4.666,1.667,8.666,5,12c3.333,3.332,7.333,5,12,5s8.5-1.668,11.5-5c3-3.334,4.833-7,5.5-11    l7-66l24-24l-22,184l-39,87.001c-1.333,4-2,7.658-2,11.002c0,7.322,2.5,13.5,7.5,18.5s11.167,7.164,18.5,6.5    c10,0,17.333-4.678,22-14l42-94.002c0-0.67,0.333-1.835,1-3.5c0.668-1.67,1.335-3.17,2-4.5c0.667-1.335,1-2.67,1-4l5-45.001    l43,148.003c4.667,12,13,17.666,25,17c6.667,0,12.5-2.5,17.5-7.5s7.5-11.178,7.5-18.5c0-0.678-0.167-1.5-0.5-2.5    s-0.5-1.836-0.5-2.502l-60-205.001l7-67l17,27c1.333,2,3,3.667,5,5l59,33c4,1.333,6.667,2,8,2c4.667,0,8.667-1.833,12-5.5    c3.333-3.668,5-7.834,5-12.5C358.321,210.522,355.654,205.855,350.321,202.522z"></path> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g>
										</svg>
										<span class="walk-man-text1" style="display:inline;"><strong class="color-white">{{__('reports/other/metro/map.distance')}}</strong>:</span>
										<span class="walk-man-text1" style="display:inline;" id="cafe_one_distance"> 
											{{App\Report::checkEmptyValue(round($response['cafe'][0]['distance'], 2))}}{{__('reports/other/metro/map.KM')}}
										</span>
									</div>
								</div>
								@endif
								<div class="margin-10"></div>
								@if(isset($response['cafe'][1]))
								<div class="name color-white" id="cafe_two_name">{{ App\Report::checkEmptyValue($response['cafe'][1]['name'])}}</div>
								<div class="address color-white" id="cafe_two_address">{{App\Report::checkEmptyValue($response['cafe'][1]['vicinity'])}}</div>
								<div class="distance color-white">
									<div class="distance-container">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 470.642 470.642" style="enable-background:new 0 0 470.642 470.642;" xml:space="preserve" class="filla walk-man">
											<g> <g> <path style="fill:#010002;" d="M223.821,76.022c10.333-0.333,19-4.333,26-12s10.333-16.667,10-27    c-0.333-10.335-4.167-19.168-11.5-26.5c-7.333-7.333-16.167-10.833-26.5-10.5s-19,4.333-26,12s-10.5,16.667-10.5,27    s3.833,19.167,11.5,26.5S213.488,76.355,223.821,76.022z"></path> <path style="fill:#010002;" d="M350.321,202.522l-55-30l-45-72c-8.667-10.667-19.333-16-32-16c-8.667,0-17,3.667-25,11l-68,69    c-2,2.667-3.333,5.667-4,9l-9,77v2c0,4.666,1.667,8.666,5,12c3.333,3.332,7.333,5,12,5s8.5-1.668,11.5-5c3-3.334,4.833-7,5.5-11    l7-66l24-24l-22,184l-39,87.001c-1.333,4-2,7.658-2,11.002c0,7.322,2.5,13.5,7.5,18.5s11.167,7.164,18.5,6.5    c10,0,17.333-4.678,22-14l42-94.002c0-0.67,0.333-1.835,1-3.5c0.668-1.67,1.335-3.17,2-4.5c0.667-1.335,1-2.67,1-4l5-45.001    l43,148.003c4.667,12,13,17.666,25,17c6.667,0,12.5-2.5,17.5-7.5s7.5-11.178,7.5-18.5c0-0.678-0.167-1.5-0.5-2.5    s-0.5-1.836-0.5-2.502l-60-205.001l7-67l17,27c1.333,2,3,3.667,5,5l59,33c4,1.333,6.667,2,8,2c4.667,0,8.667-1.833,12-5.5    c3.333-3.668,5-7.834,5-12.5C358.321,210.522,355.654,205.855,350.321,202.522z"></path> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g>
										</svg>
										<span class="walk-man-text1" style="display:inline;"><strong class="color-white">{{__('reports/other/metro/map.distance')}}</strong>:</span>
										<span class="walk-man-text1" style="display:inline;" id="cafe_two_distance"> 
											{{App\Report::checkEmptyValue(round($response['cafe'][1]['distance'], 2))}}{{__('reports/other/metro/map.KM')}}
										</span>
									</div>
								</div>
								@endif										
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="row row-eq-height">
                            <div class="backgrounde item vcenter">
                                <div class="icon color-black">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 511.999 511.999" style="enable-background:new 0 0 511.999 511.999;" xml:space="preserve" class="fillf"><path d="M187.383 112.446c23.751 0 43.003-19.252 43.003-42.999 0-23.746-19.252-42.998-43.003-42.998-23.745 0-42.997 19.252-42.997 42.998 0 23.747 19.251 42.999 42.997 42.999z"/><path d="M201.427 168.63c14.601 25.078 28.466 50.598 41.783 76.393-19.684 10.062-42.975 27.699-54.849 37.328-11.874 9.63-34.012 58.849-45.395 82.382-12.228 25.272 27.115 43.604 39.298 18.438 10.041-20.741 26.951-62.021 36.794-70.124 9.843-8.104 42.155-30.97 66.806-39.557a23.576 23.576 0 0 0 3.364-1.488c30.175 38.297 89.277 56.387 139.688 26.928 26.562-15.524 2.536-53.799-24.104-38.228-36.924 21.593-75.352-6.017-92.753-40.587-17.402-34.571-29.732-58.904-43.838-83.386 27.547-8.786 52.733-.761 72.54 26.978 16.108 22.568 53.787.927 37.495-21.908-38.337-53.687-95.5-67.011-152.731-33.035-2.378 1.413-13.122 7.333-15.543 8.77-35.576 21.12-68.637 17.116-93.326-17.468-16.12-22.57-53.791-.929-37.487 21.903 31.499 44.125 75.726 60.918 122.258 46.661z"/><path d="M461.989 416.046H72.901L42.228 240.731h77.229c10.767 0 19.494-8.728 19.494-19.494s-8.728-19.493-19.494-19.493H19.493C8.727 201.744 0 210.472 0 221.237v2.657c0 1.126.098 2.25.291 3.359l37.028 211.646c1.633 9.328 9.732 16.134 19.202 16.134h405.468c10.766 0 19.493-8.728 19.493-19.493 0-10.767-8.727-19.494-19.493-19.494z"/><g/><g/><g/><g/><g/><g/><g/><g/><g/><g/><g/><g/><g/><g/><g/></svg>
                                    <span class="title colorb">
										{{__('reports/other/metro/map.gyms')}}
                                    </span>
                                </div>
								@if(isset($response['gym'][0]))
								<div class="name color-black" id="gym_one_name">{{ App\Report::checkEmptyValue($response['gym'][0]['name'])}}</div>
								<div class="address color-black" id="gym_one_address">{{App\Report::checkEmptyValue($response['gym'][0]['vicinity'])}}</div>
								<div class="distance color-black">
									<div class="distance-container">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 470.642 470.642" style="enable-background:new 0 0 470.642 470.642;" xml:space="preserve" class="filla walk-man">
											<g> <g> <path style="fill:#010002;" d="M223.821,76.022c10.333-0.333,19-4.333,26-12s10.333-16.667,10-27    c-0.333-10.335-4.167-19.168-11.5-26.5c-7.333-7.333-16.167-10.833-26.5-10.5s-19,4.333-26,12s-10.5,16.667-10.5,27    s3.833,19.167,11.5,26.5S213.488,76.355,223.821,76.022z"></path> <path style="fill:#010002;" d="M350.321,202.522l-55-30l-45-72c-8.667-10.667-19.333-16-32-16c-8.667,0-17,3.667-25,11l-68,69    c-2,2.667-3.333,5.667-4,9l-9,77v2c0,4.666,1.667,8.666,5,12c3.333,3.332,7.333,5,12,5s8.5-1.668,11.5-5c3-3.334,4.833-7,5.5-11    l7-66l24-24l-22,184l-39,87.001c-1.333,4-2,7.658-2,11.002c0,7.322,2.5,13.5,7.5,18.5s11.167,7.164,18.5,6.5    c10,0,17.333-4.678,22-14l42-94.002c0-0.67,0.333-1.835,1-3.5c0.668-1.67,1.335-3.17,2-4.5c0.667-1.335,1-2.67,1-4l5-45.001    l43,148.003c4.667,12,13,17.666,25,17c6.667,0,12.5-2.5,17.5-7.5s7.5-11.178,7.5-18.5c0-0.678-0.167-1.5-0.5-2.5    s-0.5-1.836-0.5-2.502l-60-205.001l7-67l17,27c1.333,2,3,3.667,5,5l59,33c4,1.333,6.667,2,8,2c4.667,0,8.667-1.833,12-5.5    c3.333-3.668,5-7.834,5-12.5C358.321,210.522,355.654,205.855,350.321,202.522z"></path> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g>
										</svg>
										<span class="walk-man-text1" style="display:inline;"><strong class="color-black">{{__('reports/other/metro/map.distance')}}</strong>:</span>
										<span class="walk-man-text1" style="display:inline;" id="gym_one_distance"> 
											{{App\Report::checkEmptyValue(round($response['gym'][0]['distance'], 2))}}{{__('reports/other/metro/map.KM')}}
										</span>
									</div>
								</div>
								@endif
								<div class="margin-10"></div>
								@if(isset($response['gym'][1]))
								<div class="name color-black" id="gym_two_name">{{ App\Report::checkEmptyValue($response['gym'][1]['name'])}}</div>
								<div class="address color-black" id="gym_two_address">{{App\Report::checkEmptyValue($response['gym'][1]['vicinity'])}}</div>
								<div class="distance color-black">
									<div class="distance-container">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 470.642 470.642" style="enable-background:new 0 0 470.642 470.642;" xml:space="preserve" class="filla walk-man">
											<g> <g> <path style="fill:#010002;" d="M223.821,76.022c10.333-0.333,19-4.333,26-12s10.333-16.667,10-27    c-0.333-10.335-4.167-19.168-11.5-26.5c-7.333-7.333-16.167-10.833-26.5-10.5s-19,4.333-26,12s-10.5,16.667-10.5,27    s3.833,19.167,11.5,26.5S213.488,76.355,223.821,76.022z"></path> <path style="fill:#010002;" d="M350.321,202.522l-55-30l-45-72c-8.667-10.667-19.333-16-32-16c-8.667,0-17,3.667-25,11l-68,69    c-2,2.667-3.333,5.667-4,9l-9,77v2c0,4.666,1.667,8.666,5,12c3.333,3.332,7.333,5,12,5s8.5-1.668,11.5-5c3-3.334,4.833-7,5.5-11    l7-66l24-24l-22,184l-39,87.001c-1.333,4-2,7.658-2,11.002c0,7.322,2.5,13.5,7.5,18.5s11.167,7.164,18.5,6.5    c10,0,17.333-4.678,22-14l42-94.002c0-0.67,0.333-1.835,1-3.5c0.668-1.67,1.335-3.17,2-4.5c0.667-1.335,1-2.67,1-4l5-45.001    l43,148.003c4.667,12,13,17.666,25,17c6.667,0,12.5-2.5,17.5-7.5s7.5-11.178,7.5-18.5c0-0.678-0.167-1.5-0.5-2.5    s-0.5-1.836-0.5-2.502l-60-205.001l7-67l17,27c1.333,2,3,3.667,5,5l59,33c4,1.333,6.667,2,8,2c4.667,0,8.667-1.833,12-5.5    c3.333-3.668,5-7.834,5-12.5C358.321,210.522,355.654,205.855,350.321,202.522z"></path> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g>
										</svg>
										<span class="walk-man-text1" style="display:inline;"><strong class="color-black">{{__('reports/other/metro/map.distance')}}</strong>:</span>
										<span class="walk-man-text1" style="display:inline;" id="gym_two_distance"> 
											{{App\Report::checkEmptyValue(round($response['gym'][1]['distance'], 2))}}{{__('reports/other/metro/map.KM')}}
										</span>
									</div>
								</div>
								@endif										
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <hr class="style4">
</div>