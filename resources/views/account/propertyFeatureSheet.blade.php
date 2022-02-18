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
    <h2 class="page-title">{{__('account/propertyFeatureSheet.createPropertyFeatureSheet')}}</h2>
    <ol class="breadcrumb">
      <li><a href="{{ Route('home') }}">{{__('account/propertyFeatureSheet.home')}}</a></li>
      <li><a href="{{ Route('dashboard') }}">{{__('account/propertyFeatureSheet.dashboard')}}</a></li>
      <li class="active">{{__('account/propertyFeatureSheet.myPropertyFeatureSheet')}}</li>
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
                    <h1>{{__('account/propertyFeatureSheet.createPropertyFeatureSheet')}}</h1>
                    <div class="create_report_main account-form">
                        <label>{{__('account/propertyFeatureSheet.enterNameNewPropertySheet')}}</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="pfs_name" name="pfs_name">
                            <span class="input-group-addon" style="cursor: pointer;" id="pfs_create"><span class="btn_txt">{{__('account/propertyFeatureSheet.create')}}</span>
                            <i class="fa fa-spinner fa-spin hide loading" style="font-size:18px"></i></span>
                            <div class="clearfix"></div>
                            <div class="pfs_msg"></div>
                        </div>
                    </div>
                @else
                    <div class="disable-box">
                        <h1>{{__('account/propertyFeatureSheet.createPropertyFeatureSheet')}}</h1>
                        <div class="create_report_main account-form">
                            <label>{{__('account/propertyFeatureSheet.enterNameNewPropertySheet')}}</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="pfs_name" name="pfs_name">
                                <span class="input-group-addon" style="cursor: pointer;" id="pfs_create"><span class="btn_txt">{{__('account/propertyFeatureSheet.create')}}</span>
                                <i class="fa fa-spinner fa-spin hide loading" style="font-size:18px"></i></span>
                                <div class="clearfix"></div>
                                <div class="pfs_msg"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 col-md-offset-1  text-center purchase-plan-box purchase-plan">
                        <h5>{{__('account/propertyFeatureSheet.para1')}}</h5>
                        <a href="{{ route('purchase.plan') }}" class="btn btn-success">{{__('account/propertyFeatureSheet.selectPlan')}}</a>
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
        <h4 class="modal-title">{{__('account/propertyFeatureSheet.importantInformation')}}</h4>
      </div>
      <div class="modal-body">
        <p>{{__('account/propertyFeatureSheet.pleaseUpdateProfile')}}</p>
        <ul>
            @if(empty($user->firstName) && empty($user->lastName))
                <li>{{__('account/propertyFeatureSheet.nameMissing')}}</li>
            @endif
            @if(!isset($user_details->photo))
                <li>{{__('account/propertyFeatureSheet.photoMissing')}}</li>
            @endif
            @if(!isset($user_details->logo))
                <li>{{__('account/propertyFeatureSheet.logoMissing')}}</li>
            @endif
            @if(empty($user_details->phone))
                <li>{{__('account/propertyFeatureSheet.phoneMissing')}}</li>
            @endif
            @if(empty($user_details->email))
                <li>{{__('account/propertyFeatureSheet.emailMissing')}}</li>
            @endif
        </ul>
        <p>
            <a href="{{ Route('profileview') }}" class="btn btn-default">{{__('account/propertyFeatureSheet.manageProfile')}}</a>
        </p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{__('account/propertyFeatureSheet.close')}}</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="pfs-card-charge">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
        <p>{{__('account/propertyFeatureSheet.para2')}}</p>
        <p>
          {{__('account/propertyFeatureSheet.para3')}}
        </p>
        {{__('account/propertyFeatureSheet.namePropertyFeatureSheet')}} <h2 id="flyerName"></h2>
        {{__('account/propertyFeatureSheet.amount')}} <h2>{{env('CURRENCY_SYMBOL').(double)env('FLYERCHARGE')/100 }}</h2>
        <!-- <small>{{__('account/propertyFeatureSheet.para4')}}</small> -->
        <!--
        <div class="form-group">
          <label for="discount" class="control-label">{{__('account/propertyFeatureSheet.couponCode')}}</label>
          <input type="text" id="discount" class="form-control">
          {{__('account/propertyFeatureSheet.haveCoupon')}}
        </div>
    -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default cancel-button">{{__('account/propertyFeatureSheet.cancel')}}</button>
        <button type="button" id="charge-button" class="btn btn-primary">{{__('account/propertyFeatureSheet.confirm')}}</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('footer_script')

<script type="text/javascript">
/*
$(document).ready(function(){
    $('#pfs_create').on('click', function(){
        console.log('click');
        var flyerName = $('#pfs_name').val();
        $('.pfs_msg').html('');
        if (flyerName != '') {
            $('#pfs_form').submit();
        } else {
            $('.pfs_msg').html('<p class="text-danger">Please enter Property Feature Sheet name to generate it</p>');
        }

    });
});
*/
$(document).ready(function(){
    @if($showMissingInfoModal)
        $('#client_info').modal('show');
    @endif;



    var generatFlyerFunc = function (json) {
    var that;
        generatFlyer = {
            params: {
                debug : true,
                flyerDetailsUrl : "{{ URL::route('flyerDetails', ['flyerId' => -1, 'userId' => -2]) }}",
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
                that.params.flyerName = '';
                $('#pfs_name').val('');
            },
            events : function () {
                that.showDebug('events');
                $('#pfs_create').unbind().on('click',function(){
                    that.showLoading();
                    that.params.flyerName = $('#pfs_name').val();
                    $('.pfs_msg').html('');
                    if (that.params.flyerName != '') {
                        @if(Auth::user()->role=='client')
                            @if(in_array($validateUser->plan, config('app.pay_as_you_go_packages')))
                                @if($validateUser->subscription('main')->onTrial())
                                    that.generateFlyer();
                                @else
                                    @if($validateUser->userCredit() >= ((float)env('FLYERCHARGE_CREDIT')/100) )
                                        that.generateFlyer();
                                    @else
                                        //show payment option
                                        that.showPaymentPopup();
                                    @endif
                                @endif
                            @else
                            console.log('JJLLK');
                                that.generateFlyer();
                            @endif
                        @elseif(Auth::user()->role=='admin')
                            that.generateFlyer();
                        @endif
                    } else {
                        $('.pfs_msg').html('<p class="text-danger">Please enter Property Feature Sheet name to generate it</p>');
                        that.hideLoading();
                    }
                });
                $('#pfs-card-charge .cancel-button').unbind().on('click',function(){
                    that.hideLoading();
                    that.hidePaymentPopup();
                });
                $('#pfs-card-charge #charge-button').unbind().on('click',function(){
                    that.generateFlyer();
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
            generateFlyer : function () {
                that.showDebug('generateFlyer');
                $.ajax({
                    dataType:'json',
                    type:'post',
                    url:"{{ URL::route('generateFlyer') }}",
                    data: { _token: "{{ csrf_token() }}", flyerName: that.params.flyerName },
                    beforeSend:function(){
                        that.showDebug('generateFlyer - beforeSend');
                        that.showLoading();
                        that.showMessagePopup('<p class="text-info">Process Started</p>');
                    },
                    //url:'{{ url('/generateReport') }}',
                    success:function(data){
                        that.showDebug('generateReport - success');
                        if (data) {
                            if (data.status == 1) {
                                //location.href='{{ url('/report/highlights') }}/'+data.reportId;
                                //console.log('that.params.reportDetailUrl', that.params.reportDetailUrl);
                                that.params.flyerDetailsUrl=that.params.flyerDetailsUrl.replace("-1", data.flyerId).replace("-2", data.userId);
                                //console.log('that.params.reportDetailUrl', that.params.reportDetailUrl);
                                location.href = that.params.flyerDetailsUrl;
                                that.showMessagePopup('<p class="text-success">Please Wait you are redirecting to Property Feature Sheet page</p>');
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
                $('#flyerName').html(that.params.flyerName);
                $('#pfs-card-charge').modal('show');
            },
            hidePaymentPopup : function () {
                that.showDebug('hidePaymentPopup');
                $('#flyerName').html('');
                $('#pfs-card-charge').modal('hide');
            },

        }
        generatFlyer.init(json);
    }
    var json = '';
    generatFlyerFunc(json);
});
</script>
<script type="text/javascript">
    document.addEventListener('contextmenu', function(e) {
      e.preventDefault();
    });
</script>
@endsection