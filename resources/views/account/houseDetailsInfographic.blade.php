@extends('layouts.template')

@section('customStyle')
    <style type="text/css">
        .disable-box{
            pointer-events: none;
            opacity: 0.4;
        }        
    </style>
@endsection

@section('content')
<!-- Page Header -->
<div class="page-header style-11">
  <div class="container">
    <h2 class="page-title">Create House Details Infographic</h2>
    <ol class="breadcrumb">
      <li><a href="{{ Route('home') }}">Home</a></li>
      <li><a href="{{ Route('dashboard') }}">Dashboard</a></li>
      <li class="active">My House Details Infographic</li>
    </ol>
  </div>
</div>
<!-- Page Header End -->
<div class="cps-main-wrap">
  <!-- Custom Features -->
    <div class="cps-section cps-section-padding" id="features">
        <div class="container">
            <div class="col-md-12">
                @if(!empty($user['plan']) || checkPlan(Auth::User()->parent_id))
                    <h1>Create House Details Infographic</h1>
                    <div class="create_report_main account-form">
                        <label>Enter Name of New House Details Infographic</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="hdi_name" name="hdi_name">
                            <span class="input-group-addon" style="cursor: pointer;" id="hdi_create"><span class="btn_txt">Create</span>
                            <i class="fa fa-spinner fa-spin hide loading" style="font-size:18px"></i></span>
                            <div class="clearfix"></div>
                            <div class="hdi_msg"></div>
                        </div>
                    </div>
                @else
                    <div class="disable-box">
                        <h1>Create House Details Infographic</h1>
                        <div class="create_report_main account-form">
                            <label>Enter Name of New House Details Infographic</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="hdi_name" name="hdi_name">
                                <span class="input-group-addon" style="cursor: pointer;" id="hdi_create"><span class="btn_txt">Create</span>
                                <i class="fa fa-spinner fa-spin hide loading" style="font-size:18px"></i></span>
                                <div class="clearfix"></div>
                                <div class="hdi_msg"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 col-md-offset-1  text-center purchase-plan-box purchase-plan">
                        <h5>You need an active plan or subscription to run reports</h5>
                        <a href="{{ route('purchase.plan') }}" class="btn btn-success">Select Plan</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="client_info">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Important Information</h4>
      </div>
      <div class="modal-body">
        <p>Please update your profile.</p>
        <ul>
            @if(empty($user->firstName) && empty($user->lastName))
                <li>Name is missing</li>
            @endif
            @if(!isset($user_details->photo))
                <li>Photo is missing</li>
            @endif
            @if(!isset($user_details->logo))
                <li>Logo is missing</li>
            @endif
            @if(empty($user_details->phone))
                <li>Phone is missing</li>
            @endif
            @if(empty($user_details->email))
                <li>Email is missing</li>
            @endif
        </ul>
        <p>
            <a href="{{ Route('profileview') }}" class="btn btn-default">Manage Profile</a>
        </p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="hdi-card-charge">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
        <p>You are subscribed to Pay Per Report Plan. 
        So your card will be Charged for House Details Infographic.</p>
        <p>
          I want to create a House Details Infographic for
        </p>
        Name House Details Infographic: <h2 id="hdiName"></h2>
        Amount: <h2>{{env('CURRENCY_SYMBOL').(double)env('HDICHARGE')/100 }}</h2>
        <!-- <small>If you already own the report You won't be charged</small> -->
        <!--
        <div class="form-group">
          <label for="discount" class="control-label">Coupon Code</label>
          <input type="text" id="discount" class="form-control">
          (Have a coupon? Enter it here!)
        </div>
    -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default cancel-button">Cancel</button>
        <button type="button" id="charge-button" class="btn btn-primary">Confirm</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('footer_script')

<script type="text/javascript">

$(document).ready(function(){
    @if($showMissingInfoModal)
        $('#client_info').modal('show');
    @endif;



    var generatHdiFunc = function (json) {
    var that;
        generatHdi = {
            params: {
                debug : true,
                hdiDetailsUrl : "{{ URL::route('hdiDetails', ['hdiId' => -1, 'userId' => -2]) }}",
            },
            init : function (json) {
                that = this;
                that.showDebug('init');
                that.events();
                that.process();
                //console.log(that.params);
            },
            showDebug : function (str) {
                if (that.params.debug) {
                    console.log(str);
                }
            },
            clearFields : function () {
                that.showDebug('clearFields');
                that.params.hdiName = '';
                $('#hdi_name').val('');
            },
            events : function () {
                that.showDebug('events');
                $('#hdi_create').unbind().on('click',function(){
                    that.showLoading();
                    that.params.hdiName = $('#hdi_name').val();
                    $('.hdi_msg').html('');
                    if (that.params.hdiName != '') {
                        @if(Auth::user()->role=='client')
                            @if(in_array($validateUser, config('app.pay_as_you_go_packages')))
                                @if($validateUser->subscription('main')->onTrial())
                                    that.generateHdi();
                                @else
                                    @if($validateUser->getBalanceCredits() > 0)
                                        that.generateHdi();
                                    @else
                                        //show payment option
                                        that.showPaymentPopup();
                                    @endif
                                @endif
                            @else
                                that.generateHdi();
                            @endif
                        @elseif(Auth::user()->role=='admin')
                            //console.log('generateReport-adnan');
                            that.generateHdi();
                        @endif
                    } else {
                        $('.hdi_msg').html('<p class="text-danger">Please enter House Details Infographic name to generate it</p>');
                        that.hideLoading();
                    }
                });
                $('#hdi-card-charge .cancel-button').unbind().on('click',function(){
                    that.hideLoading();
                    that.hidePaymentPopup();
                });
                $('#hdi-card-charge #charge-button').unbind().on('click',function(){
                    that.generateHdi();
                });
            },
            showMessagePopup : function (msg) {
                that.showDebug('showMessagePopup');
                $('#message div.modal-body').html('').html(msg);
                $('#message').modal('show');
            },
            showLoading : function () {
                that.showDebug('showLoading');
                $('i.loading').removeClass('hide');
            },
            hideLoading : function () {
                that.showDebug('hideLoading');
                $('i.loading').addClass('hide');
            },
            generateHdi : function () {
                that.showDebug('generateHdi');
                $.ajax({
                    dataType:'json',
                    type:'post',
                    url:"{{ URL::route('generateHdi') }}",
                    data: { _token: "{{ csrf_token() }}", hdiName: that.params.hdiName },
                    beforeSend:function(){
                        that.showDebug('generateHdi - beforeSend');
                        that.showLoading();
                        that.showMessagePopup('<p class="text-info">Process Started</p>');
                    },
                    //url:'{{ url('/generateReport') }}',
                    success:function(data){
                        that.showDebug('generateReport - success');
                        console.log('data',data);
                        if (data) {
                            if (data.status == 1) {
                                //location.href='{{ url('/report/highlights') }}/'+data.reportId;
                                //console.log('that.params.reportDetailUrl', that.params.reportDetailUrl);
                                that.params.hdiDetailsUrl=that.params.hdiDetailsUrl.replace("-1", data.hdiId).replace("-2", data.userId);
                                //console.log('that.params.reportDetailUrl', that.params.reportDetailUrl);
                                location.href = that.params.hdiDetailsUrl;
                                that.showMessagePopup('<p class="text-success">Please Wait you are redirecting to House Details Infographic page</p>');
                            } else if (data.status == 0) {
                                if (data.msg && data.msg != '') {
                                    that.showMessagePopup('<p class="text-info">'+data.msg+'</p>');
                                } else {
                                    that.showMessagePopup('<p class="text-danger">Something goes wrong, Please try later</p>');
                                }
                                that.clearFields();
                            }
                        }
                    },
                    error:function(data){
                        that.showDebug('generateReport - error');
                        //alert('Could Not Complete Request At the Moment');
                        that.showMessagePopup('<p class="text-danger">Could Not Complete Request At the Moment</p>');
                    },
                    complete:function(){
                        that.showDebug('generateReport - complete');
                    }
                });
            },
            process : function () {
                that.showDebug('process');
                //show dialog to choose product
                that.clearFields();
            },
            showPaymentPopup : function () {
                that.showDebug('showPaymentPopup');
                $('#hdiName').html(that.params.hdiName);
                $('#hdi-card-charge').modal('show');
            },
            hidePaymentPopup : function () {
                that.showDebug('hidePaymentPopup');
                $('#hdiName').html('');
                $('#hdi-card-charge').modal('hide');
            },

        }
        generatHdi.init(json);
    }
    var json = '';
    generatHdiFunc(json);
});
</script>
<script type="text/javascript">
    document.addEventListener('contextmenu', function(e) {
      e.preventDefault();
    });
</script>
@endsection