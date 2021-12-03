@extends('layouts.adminLayout')
@section('pageLevelCSS')
<!-- page Level CSS -->
@endsection
@section('content')
<style>
    div.html5buttons {
        float: right;
    }
    div.dataTables_filter {
        width: auto;
    }
    div.dataTables_filter label {
        margin-right: 5px;
    }
    div.html5buttons a.btn {
        padding-top: 4px;
        padding-bottom: 4px;
    }
</style>


<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="row">
            <div class="x_title">
                <div class="col-md-6">
                    <h2>Survey Testing</h2>
                </div>
                <div class="col-md-6 text-right">
                    <!-- <a href="{{ route('profile.colour.create') }}" class="btn btn-success">Add Profile Colours</a> -->
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="x_content">
            <p class="text-muted font-13 m-b-30">
            </p>
            <div class="container">
        <div class="top-header section" id="top-header">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <br>
                        <div class="col-md-12">
                            <p>Select your city (Canadian Cities Only)</p>
                        </div>
                        <div class="col-md-12">
                             <select class="js-select2 form-control select-city" name="canadian_city">
                                <option value="0">-- Select Any Canadian City --</option>
                                @foreach(canadianCityList() as $key=>$value)
                                    @if(!is_null(Request('city_name')))
                                        <option {{ arrayCityKeyDisable($value) ? 'disabled' : '' }} value="{{ $value }}" {{ Request('city_name') == $value ? 'selected' : '' }}>{{ $value }}</option>
                                    @else
                                        <option {{ arrayCityKeyDisable($value) ? 'disabled' : '' }} value="{{ $value }}">{{ $value }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-6">
                    <br>
                    <div class="col-md-12">
                        <p>Based On week</p>
                    </div>
                    <div class="col-md-12">
                        <select class="js-select2 form-control select-week" name="canadian_city">
                            <option value="0">-- Select Week --</option>
                            <option value="1" {{ Request('week') == 1 ? 'selected' : '' }}>{{ $firstWeek }}</option>
                            <option value="2" {{ Request('week') == 2 ? 'selected' : '' }}>{{ $secondWeek }}</option>
                            <option value="3" {{ Request('week') == 3 ? 'selected' : '' }}>{{ $thiredWeek }}</option>
                        </select>
                    </div>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Total Record</th>
                                <th>Closed</th>
                                <th>Escrow</th>
                                <th>Listed</th>
                                <th>Sales</th>
                                <th>Prices</th>
                                <th>Listing</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ getTestSurveydata(Request::get('city_name'),Request::get('week') ,'transaction_close_this_week')['totalRecord']  }}</td>
                                <td>{{ getTestSurveydata(Request::get('city_name') ,Request::get('week') ,'transaction_close_this_week')['totalRecordYes']  }}</td>
                                <td>{{ getTestSurveydata(Request::get('city_name') ,Request::get('week') ,'escrow_this_week')['totalRecordYes']  }}</td>
                                <td>{{ getTestSurveydata(Request::get('city_name') ,Request::get('week') ,'next_week_listing_will_go')['totalRecordYes']  }}</td>
                                <td>{{ getTestSurveydata(Request::get('city_name') ,Request::get('week') ,'next_week_sales_will_go')['totalRecordYes']  }}</td>
                                <td>{{ getTestSurveydata(Request::get('city_name') ,Request::get('week') ,'next_week_prices_will_go')['totalRecordYes']  }}</td>
                                <td>{{ getTestSurveydata(Request::get('city_name') ,Request::get('week') ,'property_this_week')['totalRecordYes']  }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
      </div>
    </div>
  </div>
</div>
@stop
    
@section('pageLevelJS')
<!-- page Level JS -->
<script type="text/javascript">
    $('select').on('change', function() {
        var city = $('.select-city').val();
        var week = $('.select-week').val();
        console.log(city);
        if (city != 0 && week != 0) {
            var url = "{{ route('my.surveys.test') }}";
            var url = url+'?city_name='+city+'&week='+week;
            window.location.href = url;
        }
    });
    // $('select').on('change', function() {
    //     var url = "{{ route('my.surveys.test') }}";
    //     var url = url+'?week_name='+this.value;
    //     window.location.href = url;
    // });
</script>
@endsection