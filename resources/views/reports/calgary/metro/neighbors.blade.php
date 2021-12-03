<div class="row">
    <div class="col-lg-5 col-md-5 col-sm-5">
        <div class="left-side colora">
            LOCATION
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
                WELCOME HOME
            </div>
            <div class="welcome-text font-raleway">
                <p>A community is a place that people call home. It’s a place to work, play, learn, share and relax.</p>
                <p>This Community Feature Sheet® is designed to help you to get to know this community.</p>
                <p>Who knows, maybe someday soon you will call this exceptional community home.</p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <hr class="style4">
</div>

<script>
	function loadNeighbourHoodMap () {
		var myCenter = new google.maps.LatLng({{ $report->lat }}, {{ $report->long }});

		var mapOptions2 = {
		    center: myCenter,
		    zoom: 14,
		    mapTypeId: google.maps.MapTypeId.ROADMAP
		}
		var map2 = new google.maps.Map(document.getElementById("neighborhoods-map"), mapOptions2);

		var marker = new google.maps.Marker({
		    position:myCenter,
		    //animation:google.maps.Animation.BOUNCE
		 });
		marker.setMap(map2);
		var infowindow = new google.maps.InfoWindow({
		    content:"{{ $report->address }}"
		});
		infowindow.open(map2,marker);
		google.maps.event.addListener(marker, 'click', function() {
			infowindow.open(map2,marker);
		});


	}
</script>