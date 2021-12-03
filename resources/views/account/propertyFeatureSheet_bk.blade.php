@extends('layouts.template')
@section('content')
<!-- Page Header -->
<div class="page-header style-11">
  <div class="container">
    <h2 class="page-title">Create Property Feature Sheet</h2>
    <ol class="breadcrumb">
      <li class="active">Home</li>
    </ol>
  </div>
</div>
<!-- Page Header End -->
<div class="cps-main-wrap">
  <!-- Custom Features -->
    <div class="cps-section cps-section-padding" id="features">
        <div class="container">
      <div class="col-md-12">
        <h1>Create Property Feature Sheet</h1>
        <div class="create_report_main account-form">
            <label for="">Enter Name of New Property Feature Sheet</label>
            <div class="form-group">
                <form action="{{ URL::route('generateFlyer') }}" method="post" id="create_pfs">
                    <input type="text" class="form-control" id="name" name="name">
                    <span class="input-group-addon" style="cursor: pointer;" id="clearInput"><span class="btn_txt">Create</span><i class="fa fa-spinner fa-spin hide" style="font-size:18px"></i></span>
                    <div class="clearfix"></div>
                    <div class="pfs_msg"></div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('footer_script')
<div class="modal fade" id="chooseProduct">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="gridSystemModalLabel">Choose Product</h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 text-center">
                <div class="selectProduct">
                    <a href="javascript:void(0)" id="cfs">
                        Community Feature Sheet®
                        <img src="/img/products/classic.jpg" class="img-responsive">
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 text-center">
                <div class="selectProduct">
                    <a href="javascript:void(0)" id="pfs">
                        Property Feature Sheet
                        <img src="/img/products/property_feature_shee_page1.jpg" class="img-responsive">
                    </a>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="property_feature_sheet">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="gridSystemModalLabel">Property Feature Sheet</h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                <form class="form-horizontal" action="{{ URL::route('generateFlyer') }}" method="post">
                    <div class="pfs_msg"></div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="pfs_name" id="pfs_name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-default" id="generateFlyer">Generate <span class="flyer_btn_txt"><i class="fa fa-spinner fa-spin hide" style="font-size:18px"></i></span></button>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    var processProductFunc = function (json) {
    var that;
        processProduct = {
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
                $('#chooseProduct').find('#cfs').unbind().on('click',function(){
                    $('#chooseProduct').modal('hide');
                });
                $('#chooseProduct').find('#pfs').unbind().on('click',function(){
                    that.showPFSName();
                });
                $('#generateFlyer').unbind().on('click',function(){
                    that.showLoading();
                    that.params.flyerName = $('#pfs_name').val();
                    $('.pfs_msg').html('');
                    if (that.params.flyerName != '') {
                        that.generateFlyer();
                    } else {
                        $('.pfs_msg').html('<p>Please enter Flyer name to generate it</p>');
                        that.hideLoading();
                    }
                });
            },
            showMessagePopup : function (msg) {
                that.showDebug('showMessagePopup');
                $('#message div.modal-body').html('').html(msg);
                $('#message').modal('show');
            },
            showLoading : function () {
                that.showDebug('showLoading');
                $('span.flyer_btn_txt').find('.fa.fa-spinner').removeClass('hide');
            },
            hideLoading : function () {
                that.showDebug('hideLoading');
                $('span.flyer_btn_txt').find('.fa.fa-spinner').addClass('hide');
            },
            showPFSName : function () {
                that.showDebug('showPFSName');
                $('#chooseProduct').modal('hide');
                $('#property_feature_sheet').modal('show');
            },
            hidePFSName : function () {
                that.showDebug('hidePFSName');
                $('#property_feature_sheet').modal('hide');
            },
            generateFlyer : function () {
                that.showDebug('generateFlyer');
                that.hidePFSName();
                $.ajax({
                    dataType:'json',
                    type:'post',
                    url:"{{ URL::route('generateFlyer') }}",
                    data: { _token: "{{ csrf_token() }}", flyerName: that.params.flyerName },
                    beforeSend:function(){
                        that.showDebug('generateFlyer - beforeSend');
                        that.showLoading();
                        that.showMessagePopup('<p>Process Started</p>');
                    },
                    //url:'{{ url('/generateReport') }}',
                    success:function(data){
                        that.showDebug('generateReport - success');
                        console.log('data',data);
                        if (data) {
                            if (data.status == 1) {
                                //location.href='{{ url('/report/highlights') }}/'+data.reportId;
                                //console.log('that.params.reportDetailUrl', that.params.reportDetailUrl);
                                that.params.flyerDetailsUrl=that.params.flyerDetailsUrl.replace("-1", data.flyerId).replace("-2", data.userId);
                                //console.log('that.params.reportDetailUrl', that.params.reportDetailUrl);
                                location.href = that.params.flyerDetailsUrl;
                                that.showMessagePopup('<p>Please Wait you are redirecting to flyer page</p>');
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
                        //alert('Could Not Complete Request At the Moment');
                        that.showMessagePopup('<p>Could Not Complete Request At the Moment</p>');
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
                $('#chooseProduct').modal('show');

            }
        }
        processProduct.init(json);
    }
    var json = '';
    //processProductFunc(json);
});
</script>
@endsection