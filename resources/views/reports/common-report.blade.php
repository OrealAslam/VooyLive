@if(Auth::user() && Auth::user()->role == 'admin' && isset($edit_report_address) && $edit_report_address == 'address')
<div class="cps-main-wrap">
  <!-- Custom Features -->
    <div class="cps-section">
        <div class="container">
      <div class="col-md-12">
        <div class="create_report_main account-form">
            <label for="">{{__('reports/commonReport.changeAddress')}}</label>
            <div class="form-group">
                <input type="text" class="form-control" id="address" name="address">
                <input type="hidden" id="edit_report_address" value="address" data-report-id="{{$urlParams['reportId']}}" data-user-id="{{$urlParams['userId']}}">
                <span class="input-group-addon" style="cursor: pointer;" id="clearInput"><span class="btn_txt">x</span><i class="fa fa-spinner fa-spin hide" style="font-size:18px"></i></span>
                <div class="clearfix"></div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endif

<div class="common-report cps-gray-bg" style="background-color: #fff;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                <input name="template_type" class="template_type" type="checkbox" data-toggle="toggle" data-on="{{__('reports/commonReport.metro')}}" data-off="{{__('reports/commonReport.lite')}}">
            </div>
        </div>
    </div>
</div>
@if (Auth::guest() == false)
<div class="common-report cps-gray-bg" style="background-color: #fff;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                <a href="{{url('report/edit') }}/{{$urlParams['reportId']}}" class="btn btn-default">{{__('reports/commonReport.edit')}}</a>
            </div>
        </div>
    </div>
</div>

@endif