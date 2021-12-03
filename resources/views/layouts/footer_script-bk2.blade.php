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
          <label for="discount" class="control-label">Coupon Code</label>
          <input type="text" id="discount" class="form-control">
          (Have a coupon? Enter it here!)
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" id="charge-button" class="btn btn-primary">Confirm</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="message">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Message</h4>
      </div>
      <div class="modal-body">
      </div>
    </div>
  </div>
</div>


@if(Auth::guest()==false)
<script>

    // This example displays an address form, using the autocomplete feature
    // of the Google Places API to help users fill in the information.

    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

    function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
        /** @type {!HTMLInputElement} */(document.getElementById('address')),
        {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        //autocomplete.addListener('place_changed', fillInAddress);
        autocomplete.addListener('place_changed', addressSearchFunc);
    }

    var addressSearchFunc = function (json) {
        var that;
        var addressSearch = {
            params: {
                debug : true,
                place : false,
                is_country : false,
                is_city : false,
                country_long_name : "{{env('COUNTRY_LONG_NAME')}}",
                country_short_name : "{{env('COUNTRY_SHORT_NAME')}}",
                locality : "{{env('LOCALITY')}}",
                reportDetailUrl : "{{ URL::route('reportDetails', ['reportId' => -1, 'userId' => 0]) }}",
            },
            init : function (json) {
                that = this;
                that.showDebug('init');
                that.events();
                that.process();
            },
            showDebug : function (str) {
                if (that.params.debug) {
                    console.log(str);
                }
            },
            showPopup : function () {
                that.showDebug('showPopup');
                $('#reportAddress').html(that.params.place.formatted_address);
                $('#card-charge').modal('show');
            },
            hidePopup : function () {
                that.showDebug('hidePopup');
                $('#reportAddress').html();
                $('#card-charge').modal('hide');
            },
            showMessagePopup : function (msg) {
                that.showDebug('showMessagePopup');
                $('#message div.modal-body').html('').html(msg);
                $('#message').modal('show');
            },

            events : function () {
                that.showDebug('events');
                $('#clearInput').on('click',function(){
                    that.clearFields();
                });
                $('#charge-button').unbind().on('click',function(){
                    that.generateReport();
                });
            },
            checkCountryAndCity : function (address_components) {
                that.showDebug('checkCountryAndCity');
                $.each(address_components, function(index, value) {
                    //console.log(index, value);
                    if (!that.params.is_country) {
                      if (value.long_name == that.params.country_long_name && value.short_name == that.params.country_short_name) {
                        that.params.is_country = true;
                      }
                    }
                    if (!that.params.is_city) {
                      if (value.long_name == that.params.locality) {
                        that.params.is_city = true;
                      }
                    }
                });
            },
            clearFields : function () {
                that.showDebug('clearFields');
                $('#address').val('');
                $('#addressList').html('');
                that.hideLoading();
            },
            showLoading : function () {
                that.showDebug('showLoading');
                $('span.btn_txt').addClass('hide');
                $('span.btn_txt').parent().find('.fa.fa-spinner').removeClass('hide');
            },
            hideLoading : function () {
                that.showDebug('hideLoading');
                $('span.btn_txt').removeClass('hide');
                $('span.btn_txt').parent().find('.fa.fa-spinner').addClass('hide');
            },
            process : function () {
                that.showDebug('process');
                that.params.place = autocomplete.getPlace();
                document.getElementById('address').value=that.params.place.formatted_address;
                
                that.checkCountryAndCity(that.params.place.address_components);
                if (that.params.is_country && that.params.is_city) {
                        @if(Auth::user()->plan=='payasyougo')
                            @if(Auth::user()->subscription('main')->onTrial())
                                that.generateReport();
                            @else
                                $.ajax({
                                    dataType:'json',
                                    type:'post',
                                    data:'_token={{ csrf_token() }}&long='+that.params.place.geometry.location.lng()+'&lat='+that.params.place.geometry.location.lat()+'&address='+that.params.place.formatted_address+'&discount='+$('#discount').val(),
                                    url:"{{ URL::route('checkUserReportAccess') }}",
                                    beforeSend:function(){
                                        that.showLoading();
                                    },
                                    success:function(data){
                                        if (data && data.status && data.status == 1) {
                                            //that.generateReport();
                                            that.showMessagePopup('<p>Please Wait you are redirecting to report page</p>');
                                            location.href=that.params.reportDetailUrl.replace("-1", data.reportId).replace("0", data.userId);
                                        } else {
                                            that.showPopup();
                                        }
                                    },
                                    error:function(data){
                                        that.showMessagePopup('<p>Could Not Complete Request At the Moment</p>');
                                    },
                                    complete:function(){
                                        that.hideLoading();
                                    }
                                });
                            @endif
                        @else
                            that.generateReport();
                        @endif
                    @else
                } else {
                    document.getElementById('address').value='';
                    that.showMessagePopup('<p>You can only search in city '+that.params.locality+', '+that.params.country_long_name+'</p>')
                }
            },
            generateReport : function () {
                that.showDebug('generateReport');
                $.ajax({
                    dataType:'json',
                    type:'post',
                    data:'_token={{ csrf_token() }}&long='+that.params.place.geometry.location.lng()+'&lat='+that.params.place.geometry.location.lat()+'&address='+that.params.place.formatted_address+'&discount='+$('#discount').val(),
                    url:"{{ URL::route('generateReport') }}",
                    beforeSend:function(){
                        $('#charge-button').attr('disabled',true);
                        $('#charge-button').html('Processing...');
                        that.showLoading();
                    },
                    //url:'{{ url('/generateReport') }}',
                    success:function(data){
                        //location.href='{{ url('/report/highlights') }}/'+data.reportId;
                        location.href=that.params.reportDetailUrl.replace("-1", data.reportId).replace("0", data.userId);
                        that.showMessagePopup('<p>Please Wait you are redirecting to report page</p>');
                    },
                    error:function(data){
                        //alert('Could Not Complete Request At the Moment');
                        that.showMessagePopup('<p>Could Not Complete Request At the Moment</p>');
                    },
                    complete:function(){
                        $('#charge-button').removeAttr('disabled');
                        $('#charge-button').html('Confirm');
                        that.hideLoading();
                        that.hidePopup();
                    }
                });
            },
        }
        var json = '';
        addressSearch.init(json);
    }



</script>
<script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_API')}}&libraries=places&callback=initAutocomplete"></script>

@endif