<div class="col-xs-12">
	<div class="row" style="background:  {{ Auth::User()->ClientDetail->colorc }};color: white;">
		<h4>{{__('reports/other/classic/juniorschool.elementary')}}</h4>
	</div>					

	<div class="row text-center">
		<p><strong>{{__('reports/other/classic/juniorschool.name')}}</strong> {{ $juniorSchools->school_name }}</p>
		<p><strong>{{__('reports/other/classic/juniorschool.address')}}</strong> {{ $juniorSchools->address }}</p>
		<p><strong>{{__('reports/other/classic/juniorschool.grade')}}</strong> {{ $juniorSchools->grades_offered }}</p>
		<div>
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 470.642 470.642" style="enable-background:new 0 0 470.642 470.642;" xml:space="preserve" width="30px" height="30px" class="filla"> <g> <g> <path style="fill:#010002;" d="M223.821,76.022c10.333-0.333,19-4.333,26-12s10.333-16.667,10-27    c-0.333-10.335-4.167-19.168-11.5-26.5c-7.333-7.333-16.167-10.833-26.5-10.5s-19,4.333-26,12s-10.5,16.667-10.5,27    s3.833,19.167,11.5,26.5S213.488,76.355,223.821,76.022z"></path> <path style="fill:#010002;" d="M350.321,202.522l-55-30l-45-72c-8.667-10.667-19.333-16-32-16c-8.667,0-17,3.667-25,11l-68,69    c-2,2.667-3.333,5.667-4,9l-9,77v2c0,4.666,1.667,8.666,5,12c3.333,3.332,7.333,5,12,5s8.5-1.668,11.5-5c3-3.334,4.833-7,5.5-11    l7-66l24-24l-22,184l-39,87.001c-1.333,4-2,7.658-2,11.002c0,7.322,2.5,13.5,7.5,18.5s11.167,7.164,18.5,6.5    c10,0,17.333-4.678,22-14l42-94.002c0-0.67,0.333-1.835,1-3.5c0.668-1.67,1.335-3.17,2-4.5c0.667-1.335,1-2.67,1-4l5-45.001    l43,148.003c4.667,12,13,17.666,25,17c6.667,0,12.5-2.5,17.5-7.5s7.5-11.178,7.5-18.5c0-0.678-0.167-1.5-0.5-2.5    s-0.5-1.836-0.5-2.502l-60-205.001l7-67l17,27c1.333,2,3,3.667,5,5l59,33c4,1.333,6.667,2,8,2c4.667,0,8.667-1.833,12-5.5    c3.333-3.668,5-7.834,5-12.5C358.321,210.522,355.654,205.855,350.321,202.522z"></path> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>
			<span style="vertical-align:top;"><strong>{{__('reports/other/classic/juniorschool.distanceToHouse')}}</strong> {{ round($juniorSchools->distance, 2) }}{{__('reports/other/classic/juniorschool.reports')}}KM</span>
		</div>
	</div>
</div>