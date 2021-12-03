@extends('layouts.template')
@section('content')

<link href="/css/flyer/style.css" rel="stylesheet" type="text/css">
<link href="/css/flyer/print.css" rel="stylesheet" type="text/css" media="print">

<!-- Page Header -->
<div class="page-header style-11 no-print">
    <div class="container">
        <h2 class="page-title">Flyer</h2>
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li class="active">Flyer</li>
        </ol>
    </div>
</div>
<div id="flyerContainer">
{!! $flyerHtml !!}
</div>
@endsection


@section('footer_script')
<script type="text/javascript">
$(document).ready(function(){
    var processFlyerFunc = function (json) {
    var that;
        processFlyer = {
            params: {
                debug : true,
                flyerDetailsUrl : "",
                //editIconHtml : '<span class="edit"><i class="fa fa-pencil"></i></span>',
                flyerHtml : false,
            },
            init : function (json) {
                that = this;
                that.params.flyerDetailsUrl = json.flyerDetailsUrl;
                that.params.flyerId = json.flyerId;

                that.showDebug('init');
                //that.preProcess();
                that.events();
                that.process();
                //console.log(that.params);
            },
            showDebug : function (str) {
                if (that.params.debug) {
                    console.log(str);
                }
            },
            events : function () {
                that.showDebug('events');
                $('#flyerContainer').find('span.edit').unbind().on('click',function(){
                    that.focusEditText($(this));
                });
            },
            /*
            preProcess : function () {
                that.showDebug('preProcess');
                $('.text-editable').append(that.params.editIconHtml);
            },
            */
            process : function () {
                that.showDebug('process');
            },
            focusEditText : function ($ele) {
                that.showDebug('processEditText');
                $ele.parent().attr({'contenteditable':'true'});
                $ele.parent().addClass('editableBackground');
                $ele.parent().focus();
                $ele.parent().unbind().on('blur',function(){
                    that.blurEditText($ele);
                });
            },
            blurEditText : function ($ele) {
                that.showDebug('blurEditText');
                $ele.parent().removeClass('editableBackground');
                $ele.parent().removeAttr('contenteditable');
                that.saveChanges();
            },
            showMessagePopup : function (msg) {
                that.showDebug('showMessagePopup');
                $('#message div.modal-body').html('').html(msg);
                $('#message').modal('show');
            },
            saveChanges : function () {
                that.showDebug('saveChanges');
                that.params.flyerHtml = $('#flyerContainer').html();

                $.ajax({
                    dataType : 'json',
                    type : 'post',
                    url : that.params.flyerDetailsUrl,
                    data: { _token: "{{ csrf_token() }}", flyerHtml: that.params.flyerHtml},
                    beforeSend:function(){
                        that.showDebug('saveChanges - beforeSend');
                        that.showMessagePopup('<p>Process Started</p>');
                    },
                    //url:'{{ url('/generateReport') }}',
                    success:function(data){
                        that.showDebug('saveChanges - success');
                        console.log('data',data);
                        if (data) {
                            if (data.status == 1) {
                                that.showMessagePopup('<p>'+data.msg+'</p>');
                            } else if (data.status == 0) {
                                if (data.msg && data.msg != '') {
                                    that.showMessagePopup('<p>'+data.msg+'</p>');
                                } else {
                                    that.showMessagePopup('<p>Something goes wrong, Please try later</p>');
                                }
                            }
                        }
                    },
                    error:function(data){
                        that.showDebug('saveChanges - error');
                        that.showMessagePopup('<p>Could Not Complete Request At the Moment</p>');
                    },
                    complete:function(){
                        that.showDebug('saveChanges - complete');
                    }
                });

            }
        }
        processFlyer.init(json);
    }
    var json = '';
    json.flyerDetailsUrl = "{{ URL::route('flyerDetails', ['flyerId' => $flyerId, 'userId' => $userId]) }}";

    processFlyerFunc(json);
});
</script>
@endsection