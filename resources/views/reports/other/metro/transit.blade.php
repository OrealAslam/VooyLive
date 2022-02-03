<div class="row">
    <div class="col-lg-5 col-md-5 col-sm-5">
        <div class="left-side colora">
            {{__('reports/other/metro/transit.transportation')}}
        </div>
    </div>
    <div class="col-lg-7 col-md-7 col-sm-7 school-item-container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="row item">
                    <div class="transport-head icon backgrounde">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve" class="fillf">
                            <metadata> Svg Vector Icons : http://www.onlinewebfonts.com/icon </metadata>
                            <g><g><circle cx="277.5" cy="748.8" r="49"/><circle cx="722.5" cy="748.8" r="49"/><path d="M370.5,217.5h242.9c23.9,0,43.2-19.4,43.2-43.2S637.3,131,613.4,131H370.5c-23.9,0-43.2,19.4-43.2,43.2S346.6,217.5,370.5,217.5z"/><path d="M919.4,220.3c-1.4,0-2.9,0.1-4.3,0.2v-29.5C915.1,91.2,833.9,10,734,10H266C166.1,10,84.9,91.2,84.9,191.1v29.5c-1.4-0.1-2.8-0.2-4.3-0.2c-23.9,0-43.2,19.4-43.2,43.2v216.2c0,23.9,19.4,43.2,43.2,43.2c1.4,0,2.9-0.1,4.3-0.2v345.3c0,23.9,19.4,43.2,43.2,43.2h80.1v35.4c0,23.9,19.4,43.2,43.2,43.2h52.4c23.9,0,43.2-19.4,43.2-43.2v-35.4h305.8v35.4c0,23.9,19.4,43.2,43.2,43.2h52.4c23.9,0,43.2-19.4,43.2-43.2v-35.4h80.1c23.9,0,43.2-19.4,43.2-43.2V522.8c1.4,0.1,2.8,0.2,4.3,0.2c23.9,0,43.2-19.4,43.2-43.2V263.6C962.7,239.7,943.3,220.3,919.4,220.3z M171.3,346.3h657.3v240.5H171.3V346.3z M266,96.5H734c52.2,0,94.6,42.4,94.6,94.6v68.7H171.3v-68.7C171.3,138.9,213.8,96.5,266,96.5z M171.3,824.9V673.2h657.3v151.7H171.3z"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></g>
                            </svg>
                        <span class="transport-title colorb">
                            {{__('reports/other/metro/transit.busStop')}}
                        </span>
                    </div>
                    <div class="info">
                        <div class="transport-name" id="bus_name">
                        {{ (!empty($bus_station) && !empty($bus_station['name'])) ? $bus_station['name'] : 'N/A' }}
                        </div>
                        <div class="transport-address" id="bus_address">
                        {{ (!empty($bus_station) && !empty($bus_station['vicinity'])) ? $bus_station['vicinity'] : 'N/A' }}
                        </div>
                        <div class="transport-distance color-black">
                            <div class="distance-container">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 470.642 470.642" style="enable-background:new 0 0 470.642 470.642;" xml:space="preserve" class="filla walk-man">
                                    <g> <g> <path style="fill:#010002;" d="M223.821,76.022c10.333-0.333,19-4.333,26-12s10.333-16.667,10-27    c-0.333-10.335-4.167-19.168-11.5-26.5c-7.333-7.333-16.167-10.833-26.5-10.5s-19,4.333-26,12s-10.5,16.667-10.5,27    s3.833,19.167,11.5,26.5S213.488,76.355,223.821,76.022z"></path> <path style="fill:#010002;" d="M350.321,202.522l-55-30l-45-72c-8.667-10.667-19.333-16-32-16c-8.667,0-17,3.667-25,11l-68,69    c-2,2.667-3.333,5.667-4,9l-9,77v2c0,4.666,1.667,8.666,5,12c3.333,3.332,7.333,5,12,5s8.5-1.668,11.5-5c3-3.334,4.833-7,5.5-11    l7-66l24-24l-22,184l-39,87.001c-1.333,4-2,7.658-2,11.002c0,7.322,2.5,13.5,7.5,18.5s11.167,7.164,18.5,6.5    c10,0,17.333-4.678,22-14l42-94.002c0-0.67,0.333-1.835,1-3.5c0.668-1.67,1.335-3.17,2-4.5c0.667-1.335,1-2.67,1-4l5-45.001    l43,148.003c4.667,12,13,17.666,25,17c6.667,0,12.5-2.5,17.5-7.5s7.5-11.178,7.5-18.5c0-0.678-0.167-1.5-0.5-2.5    s-0.5-1.836-0.5-2.502l-60-205.001l7-67l17,27c1.333,2,3,3.667,5,5l59,33c4,1.333,6.667,2,8,2c4.667,0,8.667-1.833,12-5.5    c3.333-3.668,5-7.834,5-12.5C358.321,210.522,355.654,205.855,350.321,202.522z"></path> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g>
                                </svg>
                                <span class="walk-man-text1" style="display:inline;"><strong>{{__('reports/other/metro/transit.distance')}}</strong>:</span>
                                <span class="walk-man-text1" style="display:inline;" id="bus_distance">
                                    {{ (!empty($bus_station) && !empty($bus_station['distance'])) ? round($bus_station['distance'], 2).'KM'  : 'N/A' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="row item train-item">
                    <div class="transport-head icon backgrounde">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve" class="fillf">
                            <metadata> Svg Vector Icons : http://www.onlinewebfonts.com/icon </metadata>
                            <g><g><g><path d="M243.9,990l141.8-206.3h228.5L756.1,990h76.8L690,782.1c48.3-8.3,85.1-50.2,85.1-100.9v-500c0-56.6-45.9-102.5-102.5-102.5H586V44.4c0-19-15.4-34.4-34.4-34.4s-34.4,15.4-34.4,34.4v34.4h-51.6V44.4c0-19-15.4-34.4-34.4-34.4s-34.4,15.4-34.4,34.4v34.4h-86.7c-56.6,0-102.5,45.9-102.5,102.5v500c0,56.2,45.2,101.7,101.2,102.4L167.1,990H243.9z M632.2,694.2c-29.5,0-53.3-23.9-53.3-53.3s23.9-53.3,53.3-53.3c29.5,0,53.3,23.9,53.3,53.3S661.6,694.2,632.2,694.2z M345.3,491.4h292.3c9.5,0,17.2,7.7,17.2,17.2c0,9.5-7.7,17.2-17.2,17.2H345.3c-9.5,0-17.2-7.7-17.2-17.2C328.1,499.1,335.8,491.4,345.3,491.4z M328.1,457c0-9.5,7.7-17.2,17.2-17.2h292.3c9.5,0,17.2,7.7,17.2,17.2s-7.7,17.2-17.2,17.2H345.3C335.8,474.2,328.1,466.5,328.1,457z M276.5,198.8c0-28.3,22.9-51.2,51.2-51.2h103.5h120.4h103.5c28.3,0,51.2,22.9,51.2,51.2v121.1c0,28.3-22.9,51.2-51.2,51.2H327.7c-28.3,0-51.2-22.9-51.2-51.2L276.5,198.8L276.5,198.8z M284.5,640.9c0-29.5,23.9-53.3,53.3-53.3c29.5,0,53.3,23.9,53.3,53.3s-23.9,53.3-53.3,53.3C308.4,694.2,284.5,670.3,284.5,640.9z"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></g>
                            </svg>
                        <span class="transport-title colorb">
                            {{__('reports/other/metro/transit.lrt')}}
                        </span>
                    </div>
                    <div class="info">
                        <div class="transport-name" id="train_name">
                        {{ (!empty($train_station) && !empty($train_station['name'])) ? $train_station['name'] : 'N/A' }}
                        </div>
                        <div class="transport-address" id="train_address">
                        {{ (!empty($train_station) && !empty($train_station['vicinity'])) ? $train_station['vicinity'] : 'N/A' }}
                        </div>
                        <div class="transport-distance color1">
                            <div class="distance-container">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 470.642 470.642" style="enable-background:new 0 0 470.642 470.642;" xml:space="preserve" class="filla walk-man">
                                    <g> <g> <path style="fill:#010002;" d="M223.821,76.022c10.333-0.333,19-4.333,26-12s10.333-16.667,10-27    c-0.333-10.335-4.167-19.168-11.5-26.5c-7.333-7.333-16.167-10.833-26.5-10.5s-19,4.333-26,12s-10.5,16.667-10.5,27    s3.833,19.167,11.5,26.5S213.488,76.355,223.821,76.022z"></path> <path style="fill:#010002;" d="M350.321,202.522l-55-30l-45-72c-8.667-10.667-19.333-16-32-16c-8.667,0-17,3.667-25,11l-68,69    c-2,2.667-3.333,5.667-4,9l-9,77v2c0,4.666,1.667,8.666,5,12c3.333,3.332,7.333,5,12,5s8.5-1.668,11.5-5c3-3.334,4.833-7,5.5-11    l7-66l24-24l-22,184l-39,87.001c-1.333,4-2,7.658-2,11.002c0,7.322,2.5,13.5,7.5,18.5s11.167,7.164,18.5,6.5    c10,0,17.333-4.678,22-14l42-94.002c0-0.67,0.333-1.835,1-3.5c0.668-1.67,1.335-3.17,2-4.5c0.667-1.335,1-2.67,1-4l5-45.001    l43,148.003c4.667,12,13,17.666,25,17c6.667,0,12.5-2.5,17.5-7.5s7.5-11.178,7.5-18.5c0-0.678-0.167-1.5-0.5-2.5    s-0.5-1.836-0.5-2.502l-60-205.001l7-67l17,27c1.333,2,3,3.667,5,5l59,33c4,1.333,6.667,2,8,2c4.667,0,8.667-1.833,12-5.5    c3.333-3.668,5-7.834,5-12.5C358.321,210.522,355.654,205.855,350.321,202.522z"></path> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g>
                                </svg>
                                <span class="walk-man-text1" style="display:inline;"><strong>{{__('reports/other/metro/transit.distance')}}</strong>:</span>
                                <span class="walk-man-text1" style="display:inline;" id="train_distance">
                                    {{ (!empty($train_station) && !empty($train_station['distance'])) ? round($train_station['distance'], 2).'KM'  : 'N/A' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <hr class="style4">
</div>