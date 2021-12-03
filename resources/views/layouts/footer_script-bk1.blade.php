<div class="modal fade" id="card-charge">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
        <p>You are subscribed to Pay Per Report Plan. 
        So your card will be Charged for Report.</p>
        <p>
          I want to create a Community Feature Sheet® for
        </p>
        Address: <h2 id="reportAddress"></h2>
        Amount: <h2>{{env('CURRENCY_SYMBOL').(double)env('REPORTCHARGE')/100 }}</h2>
        <!-- <small>If you already own the report You won't be charged</small> -->
        <div class="form-group">
          <label for="discount" class="control-label">Discount Code</label>
          <input type="text" id="discount" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" id="charge-button" class="btn btn-primary">Confirm</button>
      </div>
    </div>
  </div>
</div>

@if(Auth::guest()==false)
    <script>

      var country_long_name = 'Canada';
      var country_short_name = 'CA';
      var locality = 'Edmonton';
      var is_country = false;
      var is_city = false;

      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;
      var report;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('address')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }
      
      function generateReport(){
        var reportDetailUrl = "{{ URL::route('reportDetails', ['reportId' => -1]) }}";
        $.ajax({
          dataType:'json',
          type:'post',
          data:'_token={{ csrf_token() }}&long='+report.geometry.location.lng()+'&lat='+report.geometry.location.lat()+'&address='+report.formatted_address+'&discount='+$('#discount').val(),
          url:"{{ URL::route('generateReport') }}",
          beforeSend:function(){
            $('#charge-button').attr('disabled',true);
            $('#charge-button').html('Processing...');
          },
          //url:'{{ url('/generateReport') }}',
          success:function(data){
             //location.href='{{ url('/report/highlights') }}/'+data.reportId;
             location.href=reportDetailUrl.replace("-1", data.reportId);
          },
          error:function(data){
              alert('Could Not Complete Request At the Moment');
          },
          complete:function(){
            $('#charge-button').removeAttr('disabled');
            $('#charge-button').html('Confirm');
          }

        });
      }
      function showPopup(){
        $('#reportAddress').html(place.formatted_address);
        $('#card-charge').modal('show');
      }
      function fillInAddress() {
        report=place = autocomplete.getPlace();
        document.getElementById('address').value=place.formatted_address;

        var address_components = place.address_components;
        $.each(address_components, function(index, value) {
            //console.log(index, value);
            if (!is_country) {
              if (value.long_name == country_long_name && value.short_name == country_short_name) {
                is_country = true;
              }
            }
            if (!is_city) {
              if (value.long_name == locality) {
                is_city = true;
              }
            }
            //console.log('is_country',is_country,'is_city',is_city);
        }); 
        if (is_country && is_city) {
          if (is_country && is_city) {
            @if(Auth::user()->plan=='payasyougo')
              $.ajax({
                dataType:'json',
                type:'post',
                data:'_token={{ csrf_token() }}&long='+report.geometry.location.lng()+'&lat='+report.geometry.location.lat()+'&address='+report.formatted_address+'&discount='+$('#discount').val(),
                url:"{{ URL::route('checkUserReportAccess') }}",
                beforeSend:function(){
                },
                success:function(data){
                  console.log('data', data);
                  console.log('status', typeof(data.status));
                  if (data && data.status && data.status == 1) {
                    console.log('0',data.status);
                    generateReport();
                  } else {
                    console.log('1',data.status);
                    showPopup();
                  }
                },
                error:function(data){
                    alert('Could Not Complete Request At the Moment');
                },
                complete:function(){
                }
              });
            @else
            generateReport();
            @endif
          }
        } else {
          document.getElementById('address').value='';
          alert('You can only search in city '+locality+', '+country_long_name);
        }
      }
      $('#charge-button').on('click',function(){
        generateReport();
      });

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    $('#clearInput').on('click',function(){
        $('#address').val('');
        $('#addressList').html('');

    });
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVK0DvbTLo3EvQ5u3bGlM4gzlK_d6Qjo4&libraries=places&callback=initAutocomplete"></script>

@endif