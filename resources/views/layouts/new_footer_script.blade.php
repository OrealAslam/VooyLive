<script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_API')}}&libraries=places"></script>

<script>
    function loadNeighbourHoodMap () {
        var myCenter = new google.maps.LatLng(53.544389, -113.4909267);

        var mapOptions2 = {
            center: myCenter,
            zoom: 10,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map2 = new google.maps.Map(document.getElementById("neighborhoods-map"), mapOptions2);

        var marker = new google.maps.Marker({
            position:myCenter,
            //animation:google.maps.Animation.BOUNCE
         });
        marker.setMap(map2);
        var infowindow = new google.maps.InfoWindow({
            content:"Edmonton"
        });
        infowindow.open(map2,marker);
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map2,marker);
        });
    }
    $(document).ready(function(){
        loadNeighbourHoodMap();
    });
</script>