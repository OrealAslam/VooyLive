@extends('layouts.template')
@section ('title') {{ $flyer->name }}@stop
@section('content')
<link rel="stylesheet" href="/newPlugin/croppie.css">
<link href="/newPlugin/toastr.min.css" rel="stylesheet"/>
<link href="/css/flyer/style.css" rel="stylesheet" type="text/css">
@if($editMode)
<link href="/css/flyer/editModeStyle.css" rel="stylesheet" type="text/css">
@endif
<link href="/css/flyer/print.css" rel="stylesheet" type="text/css" media="print">
<script async src="https://static.addtoany.com/menu/page.js"></script>


@include('reports.common-programmed-css-metro')

<style>
div.sharethiscontainer {
    margin-top: 20px;
    margin-bottom: 20px;
}
</style>


<!-- Page Header -->
<div class="page-header style-11 no-print">
    <div class="container">
        <h2 class="page-title">Property Feature Sheet</h2>
        <ol class="breadcrumb">
            <li><a href="{{ Route('home') }}">Home</a></li>
            <li class="active">Property Feature Sheet</li>
        </ol>
    </div>
</div>

<div class="container sharethiscontainer">
    <div class="row">
        <div class="col-xs-12">
            <!-- <div class="sharethis-inline-share-buttons"></div> -->
            <!-- AddToAny BEGIN -->
            <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                <a class="a2a_button_facebook"></a>
                <a class="a2a_button_twitter"></a>
                <a class="a2a_button_google_plus"></a>
                <a class="a2a_button_linkedin"></a>
                <a class="a2a_button_whatsapp"></a>
                <a class="a2a_button_print"></a>
            </div>
            <script>
                var a2a_config = a2a_config || {};
                a2a_config.onclick = 1;
                a2a_config.color_main = "D7E5ED";
                a2a_config.color_border = "AECADB";
                a2a_config.color_link_text = "333333";
                a2a_config.color_link_text_hover = "333333";
            </script>
            <!-- AddToAny END -->
        </div>
    </div>
</div>

<div id="flyerContainer">
    <div class="flyer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-print-12">
                    <div class="row">
                        <hr class="style1 margin5">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-print-3">
                    <div class="row">
                        <div class="client-logo">
                            @if (isset($user_details->logo))
                            <img src="{{url('/'.$user_details->logo)}}" alt="{{ $user_details->title }}" class="img-responsive">
                            @else
                            <a href="{{ url('/account/profileview').'?img=logo' }}" title="Click Here to Upload Logo">
                                <img src="/img/your-logo.png" class="img-responsive">
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-print-9">
                    <div class="row">
                        <div class="welcome-text text-right font-raleway color1 text-editable" data-field-id="welcome_text">
                            <div class="content color1" data-placeholder="WELCOME TO THE LAWRENCE MARKET AREA!">{!!$flyerData->welcome_text!!}</div>
                            <div class="options no-print">
                                <span class="edit"><i class="fa fa-pencil"></i></span>
                                <span class="save"><i class="fa fa-floppy-o fa-disabled"></i></span>
                                <span class="cancel"><i class="fa fa-ban fa-disabled"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-print-12">
                    <div class="row">
                        <div class="address1 font-raleway color2 text-editable" data-field-id="address1">
                            <div class="content color2" data-placeholder="320 Richmond St East Suite 1014">{!!$flyerData->address1!!}</div>
                            <div class="options no-print">
                                <span class="edit"><i class="fa fa-pencil"></i></span>
                                <span class="save"><i class="fa fa-floppy-o fa-disabled"></i></span>
                                <span class="cancel"><i class="fa fa-ban fa-disabled"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-print-6">
                    <div class="row">
                        <div class="address2 font-raleway color2 text-editable" data-field-id="address2">
                            <div class="content color2" data-placeholder="Toronto, ON M5A 2R35">{!!$flyerData->address2!!}</div>
                            <div class="options no-print">
                                <span class="edit"><i class="fa fa-pencil"></i></span>
                                <span class="save"><i class="fa fa-floppy-o fa-disabled"></i></span>
                                <span class="cancel"><i class="fa fa-ban fa-disabled"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-print-6">
                    <div class="row">
                        <div class="list-price font-raleway text-right color2 text-editable" data-field-id="list_price">
                            <div class="content color2" data-placeholder="LIST PRICE: $679,900">{!!$flyerData->list_price!!}</div>
                            <div class="options no-print">
                                <span class="edit"><i class="fa fa-pencil"></i></span>
                                <span class="save"><i class="fa fa-floppy-o fa-disabled"></i></span>
                                <span class="cancel"><i class="fa fa-ban fa-disabled"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-print-12">
                    <div class="row">
                        <hr class="style2 margin15">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-print-12">
                    <div class="row">
                        <div class="big-image image-editable">
                            <img src="/{{$flyer_images['img1']}}" class="img-responsive" data-img-name="img1" data-img-width="1170" data-img-height="825">
                            <div class="options no-print">
                                <span class="edit-img"><i class="fa fa-pencil"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-print-12">
                    <div class="row">
                        <hr class="style1 margin15">
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-lg-4 col-md-4 col-sm-4 col-print-4">
                    <div class="row">
                        <div class="three-images-img1 image-editable">
                            <img src="/{{$flyer_images['img2']}}" class="img-responsive" data-img-name="img2" data-img-width="370" data-img-height="265">
                            <div class="options no-print">
                                <span class="edit-img"><i class="fa fa-pencil"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-print-4">
                    <div class="row">
                        <div class="three-images-img2 image-editable">
                            <img src="/{{$flyer_images['img3']}}" class="img-responsive" data-img-name="img3" data-img-width="370" data-img-height="265">
                            <div class="options no-print">
                                <span class="edit-img"><i class="fa fa-pencil"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-print-4">
                    <div class="row">
                        <div class="three-images-img3 image-editable">
                            <img src="/{{$flyer_images['img4']}}" class="img-responsive" data-img-name="img4" data-img-width="370" data-img-height="265">
                            <div class="options no-print">
                                <span class="edit-img"><i class="fa fa-pencil"></i></span>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
            <div class="row pageBreakAfter">
                <div class="col-lg-12 col-md-12 col-sm-12 col-print-12">
                    <div class="row">
                        <hr class="style2 margin15">
                    </div>
                </div>
            </div>
            <div class="row page2-section1">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 col-print-3 div1">
                    <div class="row">
                        <div class="two-images-img1 image-editable">
                            <img src="/{{$flyer_images['img5']}}" class="img-responsive" data-img-name="img5" data-img-width="292" data-img-height="273">
                            <div class="options no-print">
                                <span class="edit-img"><i class="fa fa-pencil"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-print-6 div2">
                    <div class="row">
                        <div class="two-images-img2 image-editable">
                            <img src="/{{$flyer_images['img6']}}" class="img-responsive" data-img-name="img6" data-img-width="585" data-img-height="273">
                            <div class="options no-print">
                                <span class="edit-img"><i class="fa fa-pencil"></i></span>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 col-print-3 div3 font-raleway property-info text-center background1">
                    <div class="color3 property-info-text text-editable" data-field-id="property_info_text">
                        <div class="content color3" data-placeholder="2 BEDROOMS
                        2 BATHROOMS
                        825 sqft
                        Plus Extra
                        Large Balcony">{!!$flyerData->property_info_text!!}</div>
                        <div class="options no-print">
                            <span class="edit"><i class="fa fa-pencil"></i></span>
                            <span class="save"><i class="fa fa-floppy-o fa-disabled"></i></span>
                            <span class="cancel"><i class="fa fa-ban fa-disabled"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-print-3">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-print-12 font-raleway">
                            <div class="row">
                                <div class="for-sale text-center color3 background2">
                                    FOR SALE
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-print-12 font-raleway">
                            <div class="row">
                                <div class="verticle-image image-editable">
                                    <img src="/{{$flyer_images['img7']}}" class="img-responsive" data-img-name="img7" data-img-width="292" data-img-height="596">
                                    <div class="options no-print">
                                        <span class="edit-img"><i class="fa fa-pencil"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-print-9 font-raleway">
                    <div class="row home-detail-container">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-print-12">
                            <div class="row">
                                <div class="home-details color4">
                                    HOME DETAILS
                                </div>
                            </div>
                            <div class="row">
                                <hr class="style3">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-print-2 overview color3 background1">
                                    OVERVIEW
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10 col-print-10">
                                    <div class="overview-text text-editable" data-field-id="overview_text">
                                        <div class="content" data-placeholder="Welcome to The Modern! Stunning Corner Suite And Fully Upgraded, Split 2 Bedroom 2 Bathroom Functional Layout. This Stylish Condo Boasts Expansive Windows With An Abundance Of Natural Light And Gorgeous City Sunset Views! Hardwood Floors Throughout, Quartz Countertops And Modern European Style Kitchen Appliances. Features An Extra Large Private Balcony. Steps To St Lawrence Market, King East Design District, Distillery & Financial District, Streetcar And Subway. One parking space included">{!!$flyerData->overview_text!!}</div>
                                        <div class="options no-print">
                                            <span class="edit"><i class="fa fa-pencil"></i></span>
                                            <span class="save"><i class="fa fa-floppy-o fa-disabled"></i></span>
                                            <span class="cancel"><i class="fa fa-ban fa-disabled"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix">
                                </div>
                            </div>

                            <div class="row">
                                <hr class="style4">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-print-2 features color3 background2">
                                    FEATURES
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10 col-print-10">
                                    <div class="features-text text-editable" data-field-id="features_text">
                                        <div class="content" data-placeholder="Full Time Concierge
                                        Fully Equipped Gym
                                        Rooftop Terrace With BBQ's
                                        Rooftop Pool & Hot Tub
                                        Steam Sauna
                                        Lots Of Visitor Parking">{!!$flyerData->features_text!!}</div>
                                        <div class="options no-print">
                                            <span class="edit"><i class="fa fa-pencil"></i></span>
                                            <span class="save"><i class="fa fa-floppy-o fa-disabled"></i></span>
                                            <span class="cancel"><i class="fa fa-ban fa-disabled"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix">
                                </div>
                            </div>
                            <div class="row">
                                <div class="footer">
                                    &copy {{ date('Y') }} by VOOY GROUP CANADA INC. All rights reserved.<br>
                                    No part of this document may be reproduced or transmitted in any form or by any means, electronic, mechanical, photocopying, recording, or otherwise, without prior written permission of VOOY GROUP CANADA INC. This feature sheet has been prepared solely for general information purposes only. The publisher and agent(s) are not liable for errors or  omissions. No warranties or representations are made of any kind.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-print-3 for-more-info background3">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-print-12 font-raleway text-center color3">
                            FOR MORE INFORMATION
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-print-12 client-image">
                            @if (isset($user_details->photo))
                            <img src="{{ url('/'.$user_details->photo) }}" alt="{{ $user->firstName }} {{ $user->lastName }}" class="img-responsive">
                            @else
                            <a href="{{ url('/account/profileview').'?img=profile' }}" title="Click Here to Upload Image">
                                <img src="/img/your-image-here2.png" class="img-responsive" style="">
                            </a>
                            @endif
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-print-12 font-raleway">
                            <div class="more-info">
                                <p class="color3 text-uppercase">{{!empty($user->firstName) || !empty($user->lastName) ? $user->firstName .' '. $user->lastName : ''}}</p>
                                <p class="color3 text-uppercase">CELL: {{!empty($user_details->phone) ? $user_details->phone : ''}}</p>
                                <p class="email color3 text-uppercase">{{!empty($user_details->email) ? $user_details->email : ''}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row to-order-container">
                        <div class="to-order">
                            <p class="color3">TO ORDER A PROPERTY FEATURE SHEET, VISIT</p>
                            <p class="color3">WWW.DHARRO.COM</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-print-9">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-5 col-print-5">
                            <div class="row img8 image-editable">
                                <img src="/{{$flyer_images['img8']}}" class="img-responsive" data-img-name="img8" data-img-width="365" data-img-height="300">
                                <div class="options no-print">
                                    <span class="edit-img"><i class="fa fa-pencil"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-print-7">
                            <div class="row img9 image-editable">
                                <img src="/{{$flyer_images['img9']}}" class="img-responsive" data-img-name="img9" data-img-width="511" data-img-height="300">
                                <div class="options no-print">
                                    <span class="edit-img"><i class="fa fa-pencil"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container sharethiscontainer">
    <div class="row">
        <div class="col-xs-12">
            <!-- <div class="sharethis-inline-share-buttons"></div> -->
            <!-- AddToAny BEGIN -->
            <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                <a class="a2a_button_facebook"></a>
                <a class="a2a_button_twitter"></a>
                <a class="a2a_button_google_plus"></a>
                <a class="a2a_button_linkedin"></a>
                <a class="a2a_button_whatsapp"></a>
                <a class="a2a_button_print"></a>
            </div>
            <script>
                var a2a_config = a2a_config || {};
                a2a_config.onclick = 1;
                a2a_config.color_main = "D7E5ED";
                a2a_config.color_border = "AECADB";
                a2a_config.color_link_text = "333333";
                a2a_config.color_link_text_hover = "333333";
            </script>
            <!-- AddToAny END -->
        </div>
    </div>
</div>


<div class="modal fade " tabindex="-1" role="dialog" id="imageUpload">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="row">
                <div class="col-md-12">
                    <center>
                    <div id="upload-img"></div>
                    </center>
                </div>
                <div class="col-md-12" >
                    <strong>Select Image:</strong>
                    <br/>
                    <input type="file" id="upload-img-file">
                    <br/>
                    <center>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button class="btn btn-success upload-image">Upload Image <i class="fa fa-spinner fa-spin hide loading" style="font-size:18px"></i></button>
                    </center>
                </div>
            </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@endsection


@section('flyerEditOptions')
adnan
@endsection

@section('nav')
<li>
    <a href="javascript:window.print()">Save & Print</a>
    <!-- <a href="javascript:void(0)" onclick="printDiv()">Save & Print</a> -->
    
</li>
@endsection


@section('footer_script')
@if($editMode)
<script src="/newPlugin/croppie.min.js"></script>
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
$(document).ready(function(){
    var processFlyerFunc = function (json) {
    var that;
        processFlyer = {
            params: {
                debug : true,
                flyerDetailsUrl : "",
                //editIconHtml : '<span class="edit"><i class="fa fa-pencil"></i></span>',
                flyerHtml : false,
                rawData : {
                            "address1" : "",
                            "address2" : "",
                            "list_price" : "",
                            "property_info_text" : "",
                            "overview_text" : "",
                            "features_text" : ""
                },
            },
            init : function (json) {
                that = this;
                that.params.flyerDetailsUrl = json.flyerDetailsUrl;
                //that.params.flyerId = json.flyerId;
                console.log('params', that.params);
                that.showDebug('init');
                //that.preProcess();
                that.events();
                that.plugins();
                that.process();
                //console.log(that.params);
            },
            showDebug : function (str) {
                if (that.params.debug) {
                    console.log(str);
                }
            },
            showLoading : function ($btn) {
                that.showDebug('showLoading');
                $('i.loading').removeClass('hide');
                $btn.prop('disabled', true);
            },
            hideLoading : function ($btn) {
                that.showDebug('hideLoading');
                $('i.loading').addClass('hide');
                $btn.prop('disabled', false);
            },
            events : function () {
                that.showDebug('events');
                $('#flyerContainer').find('span.edit').unbind().on('click',function(){
                    that.activateEditModeOnEle($(this));
                    /*
                    $ele.parent().parent().find('div.content').unbind().on('blur',function(){
                        //that.blurEditText($ele);
                    });
                    */
                });
                $('#flyerContainer').find('span.save').unbind().on('click',function(){
                    that.deActivateEditModeOnEle($(this));
                    that.saveTextChanges($(this));
                });
                $('#flyerContainer').find('span.cancel').unbind().on('click',function(){
                    that.deActivateEditModeOnEle($(this));
                    that.cancelTextChanges($(this));
                });
                /*
                $('#flyerContainer').find('img.img-editable').parent().unbind().on('click',function(){
                    that.focusEditImage($(this));
                });
                */
                $('#flyerContainer div.image-editable div.options').find('span.edit-img').unbind().on('click',function(){
                    //console.log($(this));
                    //console.log('adnan');
                    that.focusEditImage($(this));
                });
                $('#flyerContainer div.image-editable img').unbind().on('click',function(){
                    //console.log($(this).parent().find('div.options span.edit-img').first());
                    //console.log('adnan');
                    that.focusEditImage($(this).parent().find('div.options span.edit-img').first());
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
                /*
                $('div.text-editable').each(function( index, element ) {
                    console.log(index, element);
                    if ($(this).find('div.content').html() == '') {
                        $(this).find('div.content').html($(this).find('div.content').attr('data-placeholder'));
                    }
                });
                */


            },
            plugins : function () {

            },
            urltoFile : function (url, filename, mimeType){
                mimeType = mimeType || (url.match(/^data:([^;]+);/)||'')[1];
                return (fetch(url)
                    .then(function(res){return res.arrayBuffer();})
                    .then(function(buf){return new File([buf], filename, {type:mimeType});})
                );
            },
            focusEditImage : function ($ele) {
                that.showDebug('focusEditImage');

                $imgEle = $ele.parent().parent().find('img');
                var img_name = $imgEle.attr('data-img-name');
                var img_width = $imgEle.attr('data-img-width');
                var img_height = $imgEle.attr('data-img-height');
                console.log(img_width,img_height);
                $('#upload-img').croppie('destroy');

                $('#imageUpload').modal('show');
                var model_width = parseInt(img_width)+200;
                console.log('model_width', model_width);
                $('#imageUpload').find('div.modal-dialog.modal-lg').css({width:model_width+'px'});

                $uploadCrop = $('#upload-img').croppie({
                    enableExif: true,
                    viewport: { width: img_width, height: img_height },
                    boundary: { width: parseInt(img_width)+100, height: parseInt(img_height)+100 },
                    showZoomer: true,
                    enableResize: true,
                    enableOrientation: true,
                    mouseWheelZoom: 'ctrl'
                });

                $('#upload-img-file').unbind().on('change', function () { 
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $uploadCrop.croppie('bind', {
                            url: e.target.result
                        }).then(function(){
                            console.log('jQuery bind complete');
                        });
                    }
                    reader.readAsDataURL(this.files[0]);
                });
                $('.upload-image').unbind().on('click', function (ev) {
                    $btn = $(this);
                    $uploadCrop.croppie('result', {
                        type: 'canvas',
                        size: 'viewport',
                        format:'jpeg'
                    }).then(function (resp) {
                        console.log('image upload');

                        that.urltoFile(resp, img_name+'.jpeg')
                        .then(function(file){
                            /*
                            console.log(file);
                            $('body').append('<img src="'+file+'" width="500">');
                            */
                            var formData = new FormData();
                            formData.append('_token', "{{ csrf_token() }}");
                            formData.append('img_name', img_name);
                            formData.append(img_name, file);
                            $.ajax({
                                url: "{{ URL::route('updateFlyerImage', ['flyerId' => $flyerId, 'userId' => $userId]) }}",
                                type: "POST",
                                data: formData,
                                processData: false,
                                contentType: false,
                                beforeSend:function(){
                                    that.showLoading($btn);
                                    toastr.info('Image Upload Process Started');
                                },
                                success: function (data) {
                                    that.showDebug('saveChanges - success');
                                    console.log('data',data);
                                    if (data) {
                                        if (data.status == 1) {
                                            $imgEle.attr("src", resp);
                                            $('#imageUpload').modal('hide');
                                            toastr.success(data.msg);
                                        } else if (data.status == 0) {
                                            if (data.msg && data.msg != '') {
                                                toastr.error(data.msg);
                                            } else {
                                                toastr.error('Something goes wrong, Please try later');
                                            }
                                        }
                                    }
                                },
                                complete:function(){
                                    that.hideLoading($btn);
                                }
                            });
                        });
                        /*
                        $.ajax({
                            url: "{{ URL::route('updateFlyerImage', ['flyerId' => $flyerId, 'userId' => $userId]) }}",
                            type: "POST",
                            data: {_token: "{{ csrf_token() }}", "image":resp, "image_name":img_name},
                            beforeSend:function(){
                                that.showLoading($btn);
                                toastr.info('Image Upload Process Started');
                            },
                            success: function (data) {
                                $imgEle.attr("src", resp);
                                $('#imageUpload').modal('hide');
                                toastr.success('You image updated successfully', 'Image updated!');
                            },
                            complete:function(){
                                that.hideLoading($btn);
                            }
                        });
                        */
                    });
                });

            },
            activateEditModeOnEle : function ($ele) {
                that.showDebug('activateEditModeOnEle');
                var field_id = $ele.parent().parent().attr('data-field-id');
                that.params.rawData[field_id] = $ele.parent().parent().find('div.content').html();

                console.log('rawData', that.params.rawData);

                $ele.parent().find('span.edit i').addClass('fa-disabled');
                $ele.parent().find('span.save i').removeClass('fa-disabled');
                $ele.parent().find('span.cancel i').removeClass('fa-disabled');

                $ele.parent().parent().find('div.content').attr({'contenteditable':'true'});
                $ele.parent().parent().find('div.content').addClass('editableBackground');
                $ele.parent().parent().find('div.content').focus();

                $ele.parent().addClass('show');
            },
            deActivateEditModeOnEle : function ($ele) {
                that.showDebug('blurEditText');
                $ele.parent().parent().find('div.content').removeClass('editableBackground');
                $ele.parent().parent().find('div.content').removeAttr('contenteditable');
                //that.saveTextChanges($ele);
                $ele.parent().find('span.save i').addClass('fa-disabled');
                $ele.parent().find('span.cancel i').addClass('fa-disabled');
                $ele.parent().find('span.edit i').removeClass('fa-disabled');

                $ele.parent().removeClass('show');

            },
            showMessagePopup : function (msg) {
                that.showDebug('showMessagePopup');
                $('#message div.modal-body').html('').html(msg);
                $('#message').modal('show');
            },
            cancelTextChanges : function ($ele) {
                that.showDebug('cancelTextChanges');
                var field_id = $ele.parent().parent().attr('data-field-id');
                $ele.parent().parent().find('div.content').html(that.params.rawData[field_id]);
            },
            saveTextChanges : function ($ele) {
                that.showDebug('saveTextChanges');
                var flyer_field_id = $ele.parent().parent().attr('data-field-id');
                var flyer_field_value = $ele.parent().parent().find('div.content').html();
                flyer_field_value = flyer_field_value.trim();
                if (flyer_field_value == '<br>') {
                    flyer_field_value = '';
                    $ele.parent().parent().find('div.content').html('');
                }

                $.ajax({
                    dataType : 'json',
                    type : 'post',
                    url : that.params.flyerDetailsUrl,
                    data: { _token: "{{ csrf_token() }}", 'flyer_field_id': flyer_field_id, 'flyer_field_value' : flyer_field_value},
                    beforeSend:function(){
                        that.showDebug('saveChanges - beforeSend');
                        toastr.clear();
                        toastr.info('Process Started');
                    },
                    //url:'{{ url('/generateReport') }}',
                    success:function(data){
                        that.showDebug('saveChanges - success');
                        console.log('data',data);
                        if (data) {
                            if (data.status == 1) {
                                that.params.rawData[flyer_field_id] = flyer_field_value;
                                toastr.success(data.msg);
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
        processFlyer.init(json);
    }
    var json = {};
    json.flyerDetailsUrl = "{{ URL::route('flyerDetails', ['flyerId' => $flyerId, 'userId' => $userId]) }}";

    processFlyerFunc(json);
});
</script>
@endif

@endsection