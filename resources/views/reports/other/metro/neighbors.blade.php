<div class="row">
    <div class="col-lg-5 col-md-5 col-sm-5">
        <div class="left-side colora">
            {{__('reports/other/metro/neighbors.location')}}
        </div>
    </div>
    <div class="col-lg-5 col-md-5 col-sm-5">
        <div class="row">
            <div id="neighborhoods-map-container">
                <div id="neighborhoods-map">
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2">
        <div class="row">
            <div class="location-welcome backgroundd colorb font-raleway">
                {{__('reports/other/metro/neighbors.welcomeHome')}}
            </div>
            <div class="welcome-text font-raleway">
                <p>{{__('reports/other/metro/neighbors.welcomeText1')}}</p>
                <p>{{__('reports/other/metro/neighbors.welcomeText2')}}</p>
                <p>{{__('reports/other/metro/neighbors.welcomeText3')}}</p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <hr class="style4">
</div>

<script>
    var map2;
    function loadNeighbourHoodMap () {
        var myCenter = new google.maps.LatLng( {{ $report->lat }}, {{ $report->long }} );

        var mapOptions2 = {
            center: myCenter,
            zoom: 14,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        map2 = new google.maps.Map(document.getElementById("neighborhoods-map"), mapOptions2);

        var marker = new google.maps.Marker({
            position:myCenter,
         });
        marker.setMap(map2);
        var infowindow = new google.maps.InfoWindow({
            content:"{{ $report->address }}"
        });
        infowindow.open(map2,marker);
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map2,marker);
        });

        google.maps.event.trigger(map2, "resize");
        map2.setZoom( map2.getZoom() )
    }
</script>