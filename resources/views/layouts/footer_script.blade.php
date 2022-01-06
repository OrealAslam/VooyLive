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

<img src="/img/oops.png" width="100px" style="display: none;">
@php 
    $cities = [];
    foreach (App\City::all() as $city) {
        $cities[$city->id] = strtolower($city->name);
    }
    //print_r($cities);
    //var_dump($cities);
    //var_dump(json_encode($cities));
@endphp 



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
        {componentRestrictions: { country: "CA" }},
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
                is_route : false,
                is_street : false,
                country_long_name : "{{env('COUNTRY_LONG_NAME')}}",
                country_short_name : "{{env('COUNTRY_SHORT_NAME')}}",
                //locality : "{{env('LOCALITY')}}",
                // locality : <?php echo json_encode($cities); ?>,
                //locality : '{"edmonton", "calgary"}',
                reportDetailUrl : "{{ URL::route('reportDetails', ['reportId' => -1, 'userId' => -2]) }}",
                report_city : false,
            },
            //locality [&quot;edmonton&quot;,&quot;calgary&quot;]
            //locality {"edmonton", "calgary"}

            init : function (json) {
                that = this;
                that.showDebug('init');
                that.events();
                that.process();
            },
            showDebug : function (str) {
                if (that.params.debug) {
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
// console.log(address_components);return;
                $.each(address_components, function(index, value) {
                    if (!that.params.is_country) {
                      if (value.long_name == that.params.country_long_name && value.short_name == that.params.country_short_name) {
                        that.params.is_country = true;
                      }
                    }
                    that.params.is_city = true;
                    
                    if (value.types[0] == 'postal_code') {
                        that.params.postal_code = value.long_name;
                    }
                    if (value.types[0] == 'administrative_area_level_1') {
                        that.params.province = value.long_name;
                    }
                    if (value.types[0] == 'locality') {
                        that.params.report_city = value.long_name;
                    }
                    if (!that.params.is_street) {
                        if (value.types[0] == 'street_number') {
                            that.params.is_street = true;
                        }
                    }
                    if (!that.params.is_route) {
                        if (value.types[0] == 'route') {
                            that.params.is_route = true;
                        }
                    }
                    if (value.types[0] == 'street_number') {
                        that.params.street_number = value.short_name;
                    }
                    if (value.types[0] == 'route') {
                        that.params.route = value.short_name;
                    }
                    if (value.types[0] == 'locality') {
                        that.params.locality = value.short_name;
                    }
                    if (value.types[0] == 'administrative_area_level_1') {
                        that.params.administrative_area_level_1 = value.short_name;
                    }
                    /*is_house_number : false,*/
                });
                //that.showDebug('end-checkCountryAndCity', );
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
                    if (that.params.is_street && that.params.is_route) {
                        //that.showDebug('all ok');
                        @if(Auth::user()->role=='client')
                            //that.showDebug('role = client');
                            @if(in_array(getValidateUser()->plan, config('app.pay_as_you_go_packages')))
                                //that.showDebug('in_array app.pay_as_you_go_packages');
                                @if(getValidateUser()->subscription('main')->onTrial())
                                    //that.showDebug('onTrial');
                                    that.generateReport();
                                @else
                                    //that.showDebug('Not onTrial');
                                    @if(getValidateUser()->getBalanceCredits() > 0)
                                        //that.showDebug('getBalanceCredits > 0');
                                        that.generateReport();
                                    @else
                                        $.ajax({
                                            dataType:'json',
                                            type:'post',
                                            data:'_token={{ csrf_token() }}&long='+that.params.place.geometry.location.lng()+'&postal_code='+that.params.postal_code+'&lat='+that.params.place.geometry.location.lat()+'&address='+that.params.place.formatted_address+'&discount='+$('#discount').val()+'&report_city='+that.params.report_city+'&province='+that.params.province+'&street_number='+that.params.street_number+'&route='+that.params.route+'&locality='+that.params.locality+'&administrative_area_level_1='+that.params.administrative_area_level_1,
                                            url:"{{ URL::route('checkUserReportAccess') }}",
                                            beforeSend:function(){
                                                that.showLoading();
                                            },
                                            success:function(data){
                                                if (data && data.status && data.status == 1) {
                                                    //that.generateReport();
                                                    that.showMessagePopup('<p>Please Wait you are redirecting to report page</p>');
                                                    location.href=that.params.reportDetailUrl.replace("-1", data.reportId).replace("-2", data.userId);
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
                                @endif
                            @else
                                that.generateReport();
                            @endif
                        @elseif(Auth::user()->role=='admin')
                            that.generateReport();
                        @endif
                    } else {
                        var msg = '';
                        msg += '<center><img src="/img/oops.png" width="100px"></center>'
                        msg += '<p>Incorrect address format </p>';
                        msg += '<p></p>';
                        msg += 'Make sure your address has a \'House Number\',  Street Name or Number for example 123 SHERBROOKE ST or 311 E 6TH AVENUE';
                        that.showMessagePopup(msg);
                    }
                } else {
                    document.getElementById('address').value='';
                    var allPossibleLocations = [];
                    for (var key in that.params.locality) {
                        allPossibleLocations.push('<strong>'+that.params.locality[key].charAt(0).toUpperCase() + that.params.locality[key].slice(1)+'</strong>');
                    }
                    var msg = '';
                    msg += '<center><img src="/img/oops.png" width="100px"></center>'
                    msg += 'You can only run <strong>{{config('app.title')}} </strong> reports for the following cities. '+allPossibleLocations.join(", ")+'</p>';
                    msg += 'You can check our coverage <a href="{{ URL::route('page.coverage') }}">here</a></p>';
                    msg += 'You can always order a custom <strong>{{config('app.title')}}</strong> from <a href="{{ url('/order/'.orderCategory()['slug']) }}">here</a></p>';
                    msg += '<p></p>';
                    msg += 'You want us in your city? Tell us <a href="{{ URL::route('page.contact-us') }}">here</a></p>';

                    that.showMessagePopup(msg)
                }
            },
            generateReport : function () {
                that.showDebug('generateReport');
                var ajaxParams = '_token={{ csrf_token() }}&long='+that.params.place.geometry.location.lng()+'&postal_code='+that.params.postal_code+'&lat='+that.params.place.geometry.location.lat()+'&address='+that.params.place.formatted_address+'&discount='+$('#discount').val()+'&report_city='+that.params.report_city+'&province='+that.params.province+'&street_number='+that.params.street_number+'&route='+that.params.route+'&locality='+that.params.locality+'&administrative_area_level_1='+that.params.administrative_area_level_1;
                var editParams = '';
                if ($('#edit_report_address').val() == 'address') {
                    editParams += '&edit_report_address=address';
                    editParams += '&current_report_id='+$('#edit_report_address').attr('data-report-id');
                    editParams += '&current_user_id='+$('#edit_report_address').attr('data-user-id');
                    //var editParams += 'edit=address&current_user_id=' 
                }
                ajaxParams += editParams;
                $.ajax({
                    dataType:'json',
                    type:'post',
                    data: ajaxParams,
                    url:"{{ URL::route('generateReport') }}",
                    beforeSend:function(){
                        that.showDebug('generateReport - beforeSend');
                        $('#charge-button').attr('disabled',true);
                        $('#charge-button').html('Processing...');
                        that.showLoading();
                        that.showMessagePopup('<p>Process Started</p>');
                    },
                    //url:'{{ url('/generateReport') }}',
                    success:function(data){
                        that.showDebug('generateReport - success');
                        if (data) {
                            if (data.status == 1) {
                                that.params.reportDetailUrl=that.params.reportDetailUrl.replace("-1", data.reportId).replace("-2", data.userId);
                                location.href = that.params.reportDetailUrl;
                                that.showMessagePopup('<p>Please Wait you are redirecting to report page</p>');
                            } else if (data.status == 0) {
                                if (data.msg && data.msg != '') {
                                    that.showMessagePopup('<p>'+data.msg+'</p>');
                                } else {
                                    that.showMessagePopup('<p>Something goes wrong, Please try later</p>');
                                }
                                that.clearFields();
                            }
                        }
                    },
                    error:function(data){
                        that.showDebug('generateReport - error');
                        that.showMessagePopup('<p>Could Not Complete Request At the Moment</p>');
                    },
                    complete:function(){
                        that.showDebug('generateReport - complete');
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
<script
      src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_API')}}&callback=initAutocomplete&libraries=places&v=weekly"
      async
    ></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_API')}}&libraries=places&callback=initAutocomplete"></script> -->
@else
<script src="https://maps.googleapis.com/maps/api/js?v=3&key={{env('GOOGLE_MAP_API')}}&libraries=places" async defer></script>
@endif

@if(isset($page))
    @if($page == 'viewReport')
        <script type="text/javascript">
            $(document).ready(function(){
                //loadNeighbourHoodMap();
                //google.maps.event.addDomListener(window, 'load', loadNeighbourHoodMap);
                setTimeout('loadNeighbourHoodMap()', 2000);
            });
        </script>
    
    @endif
@endif
@if(isset($page))
<link href="/newPlugin/toastr.min.css" rel="stylesheet"/>
<script src="/newPlugin/toastr.min.js"></script>
<script type="text/javascript">
toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "3000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
};
</script>
    @if($page == 'viewReport')
        @php
            $classicReportUrl = URL::route('reportDetails', ['reportId' => $urlParams['reportId'], 'userId' => $urlParams['userId'], 'template' => 'classic']);
            $metroReportUrl = URL::route('reportDetails', ['reportId' => $urlParams['reportId'], 'userId' => $urlParams['userId'], 'template' => 'metro']);
            if (Auth::user() && Auth::user()->role == 'admin' && isset($edit_report_address) && $edit_report_address == 'address') {
                $classicReportUrl .= '?edit=address';
                $metroReportUrl .= '?edit=address';
            }

        @endphp
        <div class="modal fade" id="chooseTemplate">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="gridSystemModalLabel">Choose Format</h4>
              </div>
              <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 text-center">
                        <div class="selectTemplate">
                            <a href="{{$classicReportUrl}}">
                                Classic
                                <img src="/img/products/classic.jpg" class="img-responsive">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 text-center">
                        <div class="selectTemplate">
                            <a href="{{$metroReportUrl}}">
                                Metro
                                <img src="/img/products/metro.jpg" class="img-responsive">
                            </a>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function(){
                @if($noTemplateSelected==0)
                    $('#chooseTemplate').modal('show');
                @endif
            });
        </script>

        <script type="application/javascript">
            $(document).ready(function(){
                var template = '{{$template}}';
                if ( template == 'classic') {
                    $('#template_type').bootstrapToggle('off')
                }
                if ( template == 'metro') {
                    $('#template_type').bootstrapToggle('on')
                }

                $('#template_type').change(function() {
                    if ($(this).prop('checked')) {
                        window.location = '{{$metroReportUrl}}';
                        return false;
                    } else {
                        window.location = '{{$classicReportUrl}}';
                        return false;
                    }
                })
            });
            @if(Auth::user() && Auth::user()->role=='admin')
            var reportAddressEditFunc = function (json) {
                var that;
                reportAddressEdit = {
                    params: {
                        debug : true,
                        rawData : {
                            "address" : "",
                        }
                    },
                    init : function (json) {
                        that = this;
                        that.params.reportAddressUpdateUrl = json.reportAddressUpdateUrl;
                        that.showDebug('init');
                        that.preProcess();
                        that.events();
                        that.process();
                    },
                    showDebug : function (str) {
                        if (that.params.debug) {
                        }
                    },
                    events : function () {
                        that.showDebug('events');
                        $('#features').find('span.edit').unbind().on('click',function(){
                            that.activateEditModeOnEle($(this));
                        });
                        $('#features').find('span.save').unbind().on('click',function(){
                            that.deActivateEditModeOnEle($(this));
                            that.saveTextChanges($(this));
                        });
                        $('#features').find('span.cancel').unbind().on('click',function(){
                            that.deActivateEditModeOnEle($(this));
                            that.cancelTextChanges($(this));
                        });
                    },
                    preProcess : function () {
                        that.showDebug('preProcess');

                        var editOptionsHtmlForText = '';
                        editOptionsHtmlForText += '<div class="options no-print">';
                        editOptionsHtmlForText += '<span class="edit"><i class="fa fa-pencil"></i></span>';
                        editOptionsHtmlForText += '<span class="save"><i class="fa fa-floppy-o fa-disabled"></i></span>';
                        editOptionsHtmlForText += '<span class="cancel"><i class="fa fa-ban fa-disabled"></i></span>'
                        editOptionsHtmlForText += '</div>';
                        $('.text-editable').append(editOptionsHtmlForText);
                    },
                    process : function () {
                        that.showDebug('process');
                    },
                    activateEditModeOnEle : function ($ele) {
                        that.showDebug('activateEditModeOnEle');
                        var field_id = $ele.parent().parent().attr('data-field-id');
                        that.params.rawData[field_id] = $ele.parent().parent().find('.content').html();

                        $ele.parent().find('span.edit i').addClass('fa-disabled');
                        $ele.parent().find('span.save i').removeClass('fa-disabled');
                        $ele.parent().find('span.cancel i').removeClass('fa-disabled');

                        $ele.parent().parent().find('.content').attr({'contenteditable':'true'});
                        $ele.parent().parent().find('.content').addClass('editableBackground');
                        $ele.parent().parent().find('.content').focus();

                        $ele.parent().addClass('show');
                    },
                    deActivateEditModeOnEle : function ($ele) {
                        that.showDebug('blurEditText');
                        $ele.parent().parent().find('.content').removeClass('editableBackground');
                        $ele.parent().parent().find('.content').removeAttr('contenteditable');
                        //that.saveTextChanges($ele);
                        $ele.parent().find('span.save i').addClass('fa-disabled');
                        $ele.parent().find('span.cancel i').addClass('fa-disabled');
                        $ele.parent().find('span.edit i').removeClass('fa-disabled');

                        $ele.parent().removeClass('show');

                    },
                    cancelTextChanges : function ($ele) {
                        that.showDebug('cancelTextChanges');
                        var field_id = $ele.parent().parent().attr('data-field-id');
                        $ele.parent().parent().find('.content').html(that.params.rawData[field_id]);
                    },
                    saveTextChanges : function ($ele) {
                        that.showDebug('saveTextChanges');
                        var hdi_field_id = $ele.parent().parent().attr('data-field-id');
                        var hdi_field_value = $ele.parent().parent().find('.content').html();
                        hdi_field_value = hdi_field_value.trim();
                        if (hdi_field_value == '<br>') {
                            hdi_field_value = '';
                            $ele.parent().parent().find('.content').html('');
                        }

                        $.ajax({
                            dataType : 'json',
                            type : 'post',
                            url : that.params.reportAddressUpdateUrl,
                            data: { _token: "{{ csrf_token() }}", 'hdi_field_id': hdi_field_id, 'hdi_field_value' : hdi_field_value},
                            beforeSend:function(){
                                that.showDebug('saveChanges - beforeSend');
                                toastr.clear();
                                toastr.info('Process Started');
                            },
                            //url:'{{ url('/generateReport') }}',
                            success:function(data){
                                that.showDebug('saveChanges - success');
                                if (data) {
                                    if (data.status == 1) {
                                        that.params.rawData[hdi_field_id] = hdi_field_value;
                                        toastr.success(data.msg);
                                        if (data.default_report_address && data.default_report_address != '') {
                                            $ele.parent().parent().find('.content').html(data.default_report_address);
                                        }
                                        //that.showMessagePopup('<p>'+data.msg+'</p>');
                                    } else if (data.status == 0) {
                                        if (data.msg && data.msg != '') {
                                            toastr.info(data.msg);
                                            //that.showMessagePopup('<p>'+data.msg+'</p>');
                                        } else {
                                            toastr.error('Something goes wrong, Please try later');
                                            //that.showMessagePopup('<p>Something goes wrong, Please try later</p>');
                                        }
                                    }
                                }
                            },
                            error:function(data){
                                that.showDebug('saveChanges - error');
                                toastr.error('Could Not Complete Request At the Moment');
                                //that.showMessagePopup('<p>Could Not Complete Request At the Moment</p>');
                            },
                            complete:function(){
                                that.showDebug('saveChanges - complete');
                            }
                        });

                    }
                }
                reportAddressEdit.init(json);
            }
            var json = {};
            json.reportAddressUpdateUrl = "{{ URL::route('reportAddressUpdate', ['flyerId' => $urlParams['reportId'], 'userId' => $urlParams['userId']]) }}";
            reportAddressEditFunc(json);
            @endif
        </script>
    @endif
@endif



<script type="application/javascript">
    function equal_cols(el)
    {
        var h = 0;
        $(el).each(function(){
            $(this).css({'height':'auto'});
            if($(this).outerHeight() > h)
            {
                h = $(this).outerHeight();
            }
        });
        $(el).each(function(){
            $(this).css({'height':h});
        });
    }
    $(document).ready(function(){
        /*
        equal_cols('div.parent-item1 div.child-item');
        equal_cols('div.parent-item2 div.child-item');
        */
    });

</script>