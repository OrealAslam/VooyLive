@extends('layouts.template')
<link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" id="bootstrap-css">
<style type="text/css">
    .i-agree-model .modal-content{
      border:2px double #EA2448;
    }
    .i-agree-model{
      font-size:16px;
      margin-top:80px;
    }
    .check-i-agree label{
      position: unset !important;
      width: 50% !important;
      display: block !important;
      font-size:18px;
      padding:4px 0px !important;
      color:#000;
      font-weight: bold;
      position: relative;
      left:10px; 
    }
    input:not([type=submit]):not([type=radio]):not([type=checkbox]):last-child, select:last-child, textarea:last-child{
        border-radius:0px !important;
        position: relative;
        top:-10px;
        border:1px solid #d2d2d2;
    }
    .fa-check{
        background: #3fb73f;
        color: #fff;
        padding: 10px;
        border-radius: 50%;
        font-size: 60px !important;
        margin: 10px 0px 20px;
    }
    .title-text{
        margin-bottom:50px;
    }
    .custom-radio-part input {
      position: absolute;
      left: -9999px;
    }
    .custom-radio-part label {
      display: block !important;
      position: relative;
      padding: 15px 20px;
      border-radius: 5px;
      color: #000;
      font-size:17px;
      font-weight: normal;
      background-color: #f3f3f3;
      box-shadow: none;
      white-space: nowrap;
      cursor: pointer;
      margin-bottom:10px;
    }
    .custom-radio-part label:hover,
    .custom-radio-part input:focus + label {
      box-shadow: none;
      background:#e2e2e2e2;
    }
    .custom-radio-part input:checked + label {
      color: #fff;
      background-color: #EA2448;
    }
    .custom-radio-part input:checked + label::before {
      background-color: #EA2448;
      border: 1px solid #fff;
    }
    .custom-radio-part-box p{
        font-size:18px;
        margin:25px 0px 20px 0px !important; 
    }
    .custom-text-box{
        position: relative !important;
        left: 0px !important;
        top:-10px;
        border:1px solid #000 !important;
        border-radius:0px !important;
        margin-bottom:0px !important;
    }
    .custom-radio-part-box::before{
        clear: unset !important;
        color:red !important;
        position: absolute !important;
    }
    .disabled{
        pointer-events: none;
        background:#d2d2d2 !important;
    }
    .select2.select2-container {
      width: 100% !important;
    }

    .select2.select2-container .select2-selection {
      border: 1px solid #ccc;
      -webkit-border-radius: 3px;
      -moz-border-radius: 3px;
      border-radius: 3px;
      height: 34px;
      margin-bottom: 15px;
      outline: none;
      transition: all 0.15s ease-in-out;
    }

    .select2.select2-container .select2-selection .select2-selection__rendered {
      color: #333;
      line-height: 32px;
      padding-right: 33px;
    }

    .select2.select2-container .select2-selection .select2-selection__arrow {
      background: #f8f8f8;
      border-left: 1px solid #ccc;
      -webkit-border-radius: 0 3px 3px 0;
      -moz-border-radius: 0 3px 3px 0;
      border-radius: 0 3px 3px 0;
      height: 32px;
      width: 33px;
    }

    .select2.select2-container.select2-container--open .select2-selection.select2-selection--single {
      background: #f8f8f8;
    }

    .select2.select2-container.select2-container--open .select2-selection.select2-selection--single .select2-selection__arrow {
      -webkit-border-radius: 0 3px 0 0;
      -moz-border-radius: 0 3px 0 0;
      border-radius: 0 3px 0 0;
    }

    .select2.select2-container.select2-container--open .select2-selection.select2-selection--multiple {
      border: 1px solid #34495e;
    }

    .select2.select2-container.select2-container--focus .select2-selection {
      border: 1px solid #34495e;
    }

    .select2.select2-container .select2-selection--multiple {
      height: auto;
      min-height: 34px;
    }

    .select2.select2-container .select2-selection--multiple .select2-search--inline .select2-search__field {
      margin-top: 0;
      height: 32px;
    }

    .select2.select2-container .select2-selection--multiple .select2-selection__rendered {
      display: block;
      padding: 0 4px;
      line-height: 29px;
    }

    .select2.select2-container .select2-selection--multiple .select2-selection__choice {
      background-color: #f8f8f8;
      border: 1px solid #ccc;
      -webkit-border-radius: 3px;
      -moz-border-radius: 3px;
      border-radius: 3px;
      margin: 4px 4px 0 0;
      padding: 0 6px 0 22px;
      height: 24px;
      line-height: 24px;
      font-size: 12px;
      position: relative;
    }

    .select2.select2-container .select2-selection--multiple .select2-selection__choice .select2-selection__choice__remove {
      position: absolute;
      top: 0;
      left: 0;
      height: 22px;
      width: 22px;
      margin: 0;
      text-align: center;
      color: #e74c3c;
      font-weight: bold;
      font-size: 16px;
    }

    .select2-container .select2-dropdown {
      background: transparent;
      border: none;
      margin-top: -5px;
    }

    .select2-container .select2-dropdown .select2-search {
      padding: 0;
    }

    .select2-container .select2-dropdown .select2-search input {
      outline: none;
      border: 1px solid #34495e;
      border-bottom: none;
      padding: 4px 6px;
    }

    .select2-container .select2-dropdown .select2-results {
      padding: 0;
    }

    .select2-container .select2-dropdown .select2-results ul {
      background: #fff;
      border: 1px solid #34495e;
      position: relative;
      top: -10px;
    }

    .select2-container .select2-dropdown .select2-results ul .select2-results__option--highlighted[aria-selected] {
      background-color: #3498db;
    }

    .big-drop {
      width: 600px !important;
    }

    .survey-model-text .btn{
        padding:0px 15px;
        margin-bottom:5px;
    }
    .survey-model-text p{
        font-size:18px;
        padding:15px;
    }
    .quetion-box{
      display: none;
    }
    body {
      -youbkit-touch-callout: none; /* iOS Safari */
      -youbkit-user-select: none;   /* Chrome 6.0+, Safari 3.1+, Edge & Opera 15+ */
      -moz-user-select: none;    /* Firefox */
      -ms-user-select: none;    /* IE 10+ and Edge */
      user-select: none;      /* Non-prefixed version,
                      currently supported by Chrome and Opera */
    }
    @media only screen and (max-width: 600px) {
        .custom-radio-part-box p{
            line-height:25px;
        }
        .custom-radio-part label{
            overflow: auto !important;
        }
    }
</style>

@section('content')
<!-- Page Header -->
<div class="page-header style-11">
    <div class="container">
        <h2 class="page-title">{{__('survey.REALTORSMarketSentimentSurvey')}}</h2>
        <ol class="breadcrumb">
            <li><a href="{{ Route('home') }}">{{__('survey.home_')}}</a></li>
            <li class="active">{{__('survey.REALTORSMarketSentimentSurvey')}}</li>
        </ol>
    </div>
</div>

<!-- Page Header End -->
<div class="cps-main-wrap">
    <div class="cps-section cps-section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <img src="{{ url('img/dharro.png')}}" class="logo-header-menu" alt="Community Feature Sheet&reg;">
                    <h3 class="title-text">{{__('survey.REALTORSMarketSentimentSurvey')}}</h3>
                </div>
            </div>
            <div class="row">
                <form class="form" method="POST" action="{{ route('survey.store') }}" id="form">
                    {{ csrf_field() }}
                    <div class="col-md-8 col-md-offset-2 custom-radio-part">
                        @if($checkWeekSurvey)
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="2" aria-valuemin="1" aria-valuemax="21" style="width: 25%;"></div>
                        </div>
                        <div class="row custom-radio-part-box quetion-box" style="display: block;" id="q-1">
                            <div class="col-md-12">
                                <p>{{__('survey.Q1')}}</p>
                            </div>
                            <div class="col-md-12">
                                <input id="toggle1" type="radio" name="listing_appointments_this_week" value="1" class="form-control" required>
                                <label for="toggle1">{{__('survey.yes')}}</label>
                                <input id="toggle2" type="radio" name="listing_appointments_this_week" value="2" class="form-control" required>
                                <label for="toggle2">{{__('survey.no')}}</label>
                            </div>
                        </div>
                        <div class="row custom-radio-part-box quetion-box" id="q-2">
                            <div class="col-md-12">
                                <p>{{__('survey.Q2')}}</p>
                            </div>
                            <div class="col-md-12">
                                <input id="radio-2" type="radio" name="property_this_week" value="1" class="form-control" required>
                                <label for="radio-2">{{__('survey.yes')}}</label>
                                <input id="radio-3" type="radio" name="property_this_week" value="2" class="form-control" required>
                                <label for="radio-3">{{__('survey.no')}}</label>
                            </div>
                        </div>
                        <div class="row custom-radio-part-box quetion-box" id="q-3">
                            <div class="col-md-12">
                                <p>{{__('survey.Q3')}}</p>
                            </div>
                            <div class="col-md-12">
                                <input id="radio-4" type="radio" name="escrow_this_week" value="1" class="form-control" required>
                                <label for="radio-4">{{__('survey.yes')}}</label>
                                <input id="radio-5" type="radio" name="escrow_this_week" value="2" class="form-control" required>
                                <label for="radio-5">{{__('survey.no')}}</label>
                            </div>
                        </div>
                        <div class="row custom-radio-part-box quetion-box" id="q-4">
                            <div class="col-md-12">
                                <p>{{__('survey.Q4')}}</p>
                            </div>
                            <div class="col-md-12">
                                <input id="radio-6" type="radio" name="transaction_close_this_week" value="1" class="form-control" required>
                                <label for="radio-6">{{__('survey.yes')}}</label>
                                <input id="radio-7" type="radio" name="transaction_close_this_week" value="2" class="form-control" required>
                                <label for="radio-7">{{__('survey.no')}}</label>
                            </div>
                        </div>
                        <div class="row custom-radio-part-box quetion-box" id="q-5">
                            <div class="col-md-12">
                                <p>{{__('survey.Q5')}}</p>
                            </div>
                            <div class="col-md-12">
                                <input id="radio-8" type="radio" name="coronavirus" value="1" class="form-control" required>
                                <label for="radio-8">{{__('survey.yes')}}</label>
                                <input id="radio-9" type="radio" name="coronavirus" value="2" class="form-control" required>
                                <label for="radio-9">{{__('survey.no')}}</label>
                            </div>
                        </div>
                        <div class="row custom-radio-part-box quetion-box" id="q-6">
                            <div class="col-md-12">
                                <p>{{__('survey.Q6')}}</p>
                            </div>
                            <div class="col-md-12">
                                <input id="radio-10" type="radio" name="expecting_lower_prices" value="1" class="form-control" required>
                                <label for="radio-10">{{__('survey.yes')}}</label>
                                <input id="radio-11" type="radio" name="expecting_lower_prices" value="2" class="form-control" required>
                                <label for="radio-11">{{__('survey.no')}}</label>
                            </div>
                        </div>
                        <div class="row custom-radio-part-box quetion-box" id="q-7">
                            <div class="col-md-12">
                                <p>{{__('survey.Q7')}}</p>
                            </div>
                            <div class="col-md-12">
                                <input id="radio-12" type="radio" name="buyers_withdraw" value="1" class="form-control" required>
                                <label for="radio-12">{{__('survey.yes')}}</label>
                                <input id="radio-13" type="radio" name="buyers_withdraw" value="2" class="form-control" required>
                                <label for="radio-13">{{__('survey.no')}}</label>
                            </div>
                        </div>
                        <div class="row custom-radio-part-box quetion-box" id="q-8">
                            <div class="col-md-12">
                                <p>{{__('survey.Q8')}}</p>
                            </div>
                            <div class="col-md-12">
                                <input id="radio-14" type="radio" name="market_completely_this_week" value="1" class="form-control" required>
                                <label for="radio-14">{{__('survey.yes')}}</label>
                                <input id="radio-15" type="radio" name="market_completely_this_week" value="2" class="form-control" required>
                                <label for="radio-15">{{__('survey.no')}}</label>
                                <input id="radio-16" type="radio" name="market_completely_this_week" value="3" class="form-control" required>
                                <label for="radio-16">{{__('survey.noSure')}}</label>
                            </div>
                        </div>
                        <div class="row custom-radio-part-box quetion-box" id="q-9">
                            <div class="col-md-12">
                                <p>{{__('survey.Q9')}}</p>
                            </div>
                            <div class="col-md-12">
                                <input id="radio-17" type="radio" name="attract_buyers_this_week" value="1" class="form-control" required>
                                <label for="radio-17">{{__('survey.yes')}}</label>
                                <input id="radio-18" type="radio" name="attract_buyers_this_week" value="2" class="form-control" required>
                                <label for="radio-18">{{__('survey.no')}}</label>
                            </div>
                        </div>
                        <div class="row custom-radio-part-box quetion-box" id="q-10">
                            <div class="col-md-12">
                                <p>{{__('survey.Q10')}}</p>
                            </div>
                            <div class="col-md-12">
                                <input id="radio-19" type="radio" name="transaction_fall_escrow_this_week" value="1" class="form-control" required>
                                <label for="radio-19">{{__('survey.yes')}}</label>
                                <input id="radio-20" type="radio" name="transaction_fall_escrow_this_week" value="2" class="form-control" required>
                                <label for="radio-20">{{__('survey.no')}}</label>
                            </div>
                        </div>
                        <div class="row custom-radio-part-box quetion-box" id="q-11">
                            <div class="col-md-12">
                                <p>{{__('survey.Q11')}}</p>
                            </div>
                            <div class="col-md-12">
                                <input id="radio-21" type="radio" name="transaction_first_time_buyer" value="1" class="form-control" required>
                                <label for="radio-21">{{__('survey.yes')}}</label>
                                <input id="radio-22" type="radio" name="transaction_first_time_buyer" value="2" class="form-control" required>
                                <label for="radio-22">{{__('survey.no')}}</label>
                                <input id="radio-23" type="radio" name="transaction_first_time_buyer" value="3" class="form-control" required>
                                <label for="radio-23">{{__('survey.Know_Unsure')}}</label>
                            </div>
                        </div>
                        <div class="row custom-radio-part-box quetion-box" id="q-12">
                            <div class="col-md-12">
                                <p>{{__('survey.doThinkNextWeek')}} <strong>{{__('survey.listings')}}</strong> {{__('survey.will')}} <strong>{{__('survey.go')}}</strong></p>
                            </div>
                            <div class="col-md-12">
                                <input id="radio-35" type="radio" name="next_week_listing_will_go" value="1" class="form-control" required>
                                <label for="radio-35">{{__('survey.up')}}</label>
                                <input id="radio-36" type="radio" name="next_week_listing_will_go" value="2" class="form-control" required>
                                <label for="radio-36">{{__('survey.down')}}</label>
                                <input id="radio-37" type="radio" name="next_week_listing_will_go" value="3" class="form-control" required>
                                <label for="radio-37">{{__('survey.flat')}}</label>
                                <input id="radio-38" type="radio" name="next_week_listing_will_go" value="4" class="form-control" required>
                                <label for="radio-38">{{__('survey.unsure')}}</label>
                            </div>
                        </div>
                        <div class="row custom-radio-part-box quetion-box" id="q-13">
                            <div class="col-md-12">
                                <p>{{__('survey.doThinkNextWeek')}} <strong>{{__('survey.sales')}}</strong> {{__('survey.will')}} <strong>{{__('survey.go')}}</strong></p>
                            </div>
                            <div class="col-md-12">
                                <input id="radio-39" type="radio" name="next_week_sales_will_go" value="1" class="form-control" required>
                                <label for="radio-39">{{__('survey.up')}}</label>
                                <input id="radio-40" type="radio" name="next_week_sales_will_go" value="2" class="form-control" required>
                                <label for="radio-40">{{__('survey.down')}}</label>
                                <input id="radio-41" type="radio" name="next_week_sales_will_go" value="3" class="form-control" required>
                                <label for="radio-41">{{__('survey.flat')}}</label>
                                <input id="radio-42" type="radio" name="next_week_sales_will_go" value="4" class="form-control" required>
                                <label for="radio-42">{{__('survey.unsure')}}</label>
                            </div>
                        </div>
                        <div class="row custom-radio-part-box quetion-box" id="q-14">
                            <div class="col-md-12">
                                <p>{{__('survey.doThinkNextWeek')}} <strong>{{__('survey.prices')}} </strong> {{__('survey.will')}} <strong>{{__('survey.go')}}</strong></p>
                            </div>
                            <div class="col-md-12">
                                <input id="radio-43" type="radio" name="next_week_prices_will_go" value="1" class="form-control" required>
                                <label for="radio-43">{{__('survey.up')}}</label>
                                <input id="radio-44" type="radio" name="next_week_prices_will_go" value="2" class="form-control" required>
                                <label for="radio-44">{{__('survey.down')}}</label>
                                <input id="radio-45" type="radio" name="next_week_prices_will_go" value="3" class="form-control" required>
                                <label for="radio-45">{{__('survey.flat')}}</label>
                                <input id="radio-46" type="radio" name="next_week_prices_will_go" value="4" class="form-control" required>
                                <label for="radio-46">{{__('survey.unsure')}}</label>
                            </div>
                        </div>
                        <div class="row custom-radio-part-box quetion-box" id="q-15">
                            <div class="col-md-12">
                                <p>{{('Q12')}}</p>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="transactions_typical_year">
                                    @foreach(numberOfTransactions() as $key=>$value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row custom-radio-part-box quetion-box" id="q-16">
                            <div class="col-md-12">
                                <p>{{__('survey.Q13')}}</p>
                            </div>
                            <div class="col-md-12">
                                <input id="radio-47" type="radio" name="constitutes_majority_of_business" value="1" class="form-control radio-input2" required>
                                <label for="radio-47">{{__('survey.sellers')}}</label>
                                <input id="radio-48" type="radio" name="constitutes_majority_of_business" value="2" class="form-control radio-input2" required>
                                <label for="radio-48">{{__('survey.buyers')}}</label>
                                <input id="radio-49" type="radio" name="constitutes_majority_of_business" value="3" class="form-control radio-input2" required>
                                <label for="radio-49">{{__('survey.evenMixBoth')}}</label>
                                <input id="radio-50" type="radio" name="constitutes_majority_of_business" value="4" class="form-control radio-input2" required>
                                <!-- <label for="radio-50">{{__('survey.other')}}</label>
                                <input type="text" name="constitutes_majority_of_business" class="custom-text-box form-control disabled text-2-box" placeholder="Enter value..."> -->
                            </div>
                        </div>
                        <div class="row custom-radio-part-box quetion-box" id="q-17">
                            <div class="col-md-12">
                                <p>{{__('survey.Q14')}}</p>
                            </div>
                            <div class="col-md-12">
                                <input id="radio-51" type="radio" name="real_estate_team" value="1" class="form-control" required>
                                <label for="radio-51">{{__('survey.yes')}}</label>
                                <input id="radio-52" type="radio" name="real_estate_team" value="2" class="form-control" required>
                                <label for="radio-52">{{__('survey.no')}}</label>
                            </div>
                        </div>
                        <div class="row custom-radio-part-box quetion-box" id="q-18">
                            <div class="col-md-12">
                                <p>{{__('survey.Q15')}}</p>
                            </div>
                            <div class="col-md-12">
                                <input id="radio-53" type="radio" name="size_of_your_brokerage" class="form-control radio-input4" value="1" required>
                                <label for="radio-53">{{__('survey.brokerageSize')}}</label>
                                <input type="text" name="size_of_your_brokerage_other" class="custom-text-box disabled text-3-input" placeholder="Enter value...">
                                <input id="radio-54" type="radio" name="size_of_your_brokerage" class="form-control radio-input4" value="2" required>
                                <label for="radio-54">{{__('survey.unsure')}}</label>
                                <input id="radio-not-applicable" type="radio" name="size_of_your_brokerage" class="form-control radio-input4" value="3" required>
                                <label for="radio-not-applicable">{{__('survey.notApplicable')}}</label>
                            </div>
                        </div>
                        <div class="row custom-radio-part-box quetion-box" id="q-19">
                            <div class="col-md-12">
                                <p>{{__('survey.selectCity')}}</p>
                            </div>
                            <div class="col-md-12">
                                 <select class="js-select2 form-control" name="canadian_city">
                                    <option>{{__('survey.selectCanadianCity')}}</option>
                                    @foreach(canadianCityList() as $key=>$value)
                                        <option {{ arrayCityKeyDisable($value) ? 'disabled' : '' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary tab-previous" style="display: none;" type="button">{{__('survey.previous')}}</button>
                        <button class="btn btn-primary tab-next" disabled style="float: right;" type="button">{{__('survey.next')}}</button>
                        @endif
                        @if(!is_null($data))
                            @if($checkWeekSurvey)
                                <div class="col-md-6 text-right submit-btn" style="display: none; float: right;">
                                  <button class="btn btn-primary submit" type="submit"  value="submit">{{__('survey.submit')}}</button>
                                </div>
                            @else
                                <div class="col-md-12 text-center">
                                  <a href="{{ route('invite.another.realtor') }}" class="btn btn-primary">{{__('survey.inviteAnotherREALTOR')}}</a>
                                </div>
                                <div class="alert alert-success" role="alert" submit="submit" style="margin-top:60px;">
                                    {{__('survey.para1')}}
                                </div>
                                <div class="col-md-12 text-center">
                                  <a href="{{ route('my.surveys') }}" class="btn btn-primary">{{__('survey.pastSurveysReports')}}</a>
                                </div>
                            @endif
                        @else
                            <div class="col-md-6 text-right submit-btn" style="display: none; float: right;">
                                <button class="btn btn-primary submit" type="submit"  value="submit">{{__('survey.submit')}}</button>
                            </div>
                            <!-- Modal -->
                              <div class="modal fade i-agree-model" id="iAgree" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                          <div class="row">
                                            <div class="col-md-12">
                                              <p>{{__('survey.para2')}}</p>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                          <div class="row">
                                            <div class="col-md-12 test-right">
                                              <button type="button" class="btn btn-primary submit-btn-model" data-dismiss="modal">{{__('survey.iAgree')}}</button>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                  </div>
                              </div>
                              <!-- model -->
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" style="display: inline;">{{__('survey.success')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12 text-center">
                <i class="fa fa-check"></i>
            </div>
            <div class="col-md-12 text-center survey-model-text">
                <div class="row">
                    <div class="col-md-12">
                        <p>{{__('survey.para3')}}</p>
                    </div>
                    <div class="col-md-12">
                        <a href="{{ route('invite.another.realtor') }}" class="btn btn-primary">{{__('survey.inviteAnotherREALTOR')}}</a>
                        <a href="{{ route('my.surveys') }}" class="btn btn-primary">{{__('survey.seePastResults')}}</a>
                    </div>
                    <div class="col-md-12">
                        <p>{{__('survey.para4')}}</p>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('survey.close')}}</button>
      </div>
    </div>
  </div>
</div>
<!-- model success -->



@section('footer_script')
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>
<script src="{{ asset('js/validation.survey.js') }}"></script>
<script type="text/javascript">

// document.oncontextmenu = new Function("return false;");

$(function() {
  var i = 1;
  $('body').on('click','.form-control', function () {
      $('.tab-next').removeAttr('disabled');
  });

  $('body').on('click','.tab-next', function () {
    $('#q-'+i).css('display','none');


    console.log(i);
    if (i >= 1) {
      $('.tab-previous').css('display','inline-block');
    }else{
      $('.tab-previous').css('display','none');
    }
    if(i < 19){
      i++;
    }
    var percent = (parseInt(i) / 19) * 100;
  
    $('.progress-bar').css({width: percent + '%'});
    // $('.progress-bar').text("Step " + i + " of 19");
    if (i == 19) {
      $('.submit-btn').css('display','block');
      $(this).css('display','none');
    }else{
      $('.submit-btn').css('display','none');
      $(this).css('display','inline-block');
    }

    $('#q-'+i).css('display','block');
    $(this).attr('disabled','disabled');
  });

  $('body').on('click','.tab-previous', function () {
    $('#q-'+i).css('display','none');
    if(i <= 19){
      i--;
    }

    console.log(i);
    if (i <= 1) {
      $(this).css('display','none');
    }else{
      $(this).css('display','inline-block');
    }

    if (i == 19) {
      $('.submit-btn').css('display','block');
      $('.tab-next').css('display','none');
    }else{
      $('.submit-btn').css('display','none');
      $('.tab-next').css('display','inline-block');
    }

    $('#q-'+i).css('display','block');
  });

  $("#form").validator();
  // when the form is submitted
  $("#form").on("submit", function(e) {
    // if the validator does not prevent form submit
    if (!e.isDefaultPrevented()) {
      var url = "contact.php";
      var messageAlert = "alert-success";
      var messageText =
        "Your message was sent, thank you. I will get back to you soon.";

      // let's compose Bootstrap alert box HTML
      var alertBox =
        '<div class="alert ' +
        messageAlert +
        ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' +
        messageText +
        "</div>";

      // If we have messageAlert and messageText
      if (messageAlert && messageText) {
        // inject the alert to .messages div in our form
        $("#contact-form").find(".messages").html(alertBox);
        // empty the form
        $("#contact-form")[0].reset();
      }

      return false;
    }
  });
});
</script> 
<script type="text/javascript">
    $(".input1-radio").click(function(){
        var radio1 = $("input[name=last_closed_transaction]:checked").val();
        if(radio1 == 4){
            $('.text-box-1').removeClass('disabled');
        }else if(radio1 != 4){
            $('.text-box-1').addClass('disabled');
            $('.text-box-1').val('');
        }
    });
    $(".radio-input2").click(function(){
        var radio1 = $("input[name=constitutes_majority_of_business]:checked").val();
        if(radio1 == 4){
            $('.text-2-box').removeClass('disabled');
        }else if(radio1 != 4){
            $('.text-2-box').addClass('disabled');
            $('.text-2-box').val('');
        }
    });
    $(".radio-input4").click(function(){
        var radio1 = $("input[name=size_of_your_brokerage]:checked").val();
        if(radio1 == 1){
            $('.text-3-input').removeClass('disabled');
        }else if(radio1 != 1){
            $('.text-3-input').addClass('disabled');
            $('.text-3-input').val('');
        }
    });

    $(document).ready(function () {
      $(".js-select2").select2();

      $(".js-select2-multi").select2();

      $(".large").select2({
        dropdownCssClass: "big-drop"
      });
    });


    @if(session('succesSurvey'))
        $('#exampleModalCenter').modal('show');
        <?php session()->forget('succesSurvey'); ?>
    @endif
    


    $(document).ready(function(){
      $('#iAgree').modal('show');
    });
    
    $("#i-agree").click(function() {
      var checked_status = this.checked;
      if (checked_status == true) {
         $(".submit-btn-model").removeAttr("disabled");
      } else {
         $(".submit-btn-model").attr("disabled", "disabled");
      }
  });

</script>
@endsection

@endsection