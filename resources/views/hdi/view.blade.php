@extends('layouts.template')
@section ('title') {{ $hdi->name }}@stop
@section('content')
<link rel="stylesheet" href="/newPlugin/croppie.css">
<link href="/newPlugin/toastr.min.css" rel="stylesheet" />
<link href="/css/hdi/style.css" rel="stylesheet" type="text/css">
@if($editMode)
<link href="/css/hdi/editModeStyle.css" rel="stylesheet" type="text/css">
<link href="{{ asset('css/selectize.css') }}" rel="stylesheet">
<link href="{{ asset('css/selectize.default.css') }}" rel="stylesheet">
<link href="{{ asset('css/selectize-normalize.css') }}" rel="stylesheet">
@endif
<link href="/css/hdi/print.css" rel="stylesheet" type="text/css" media="print">
<script async src="https://static.addtoany.com/menu/page.js"></script>


@include('reports.common-programmed-css-metro')

<style>
div.sharethiscontainer {
    margin-top: 20px;
    margin-bottom: 20px;
}

.selectize-control::before {
    font-family: 'FontAwesome';
    -moz-transition: opacity 0.2s;
    -webkit-transition: opacity 0.2s;
    transition: opacity 0.2s;
    content: ' ';
    z-index: 2;
    position: absolute;
    display: block;
    top: 50%;
    right: 8px;
    width: 16px;
    height: 16px;
    margin: -10px 0 0 0;
    line-height: 16px;
    text-align: center;
    content: "\f110";
    opacity: 0;

    -webkit-animation: spin 2s infinite linear;
    -moz-animation: spin 2s infinite linear;
    -o-animation: spin 2s infinite linear;
    animation: spin 2s infinite linear;
}

.selectize-control.loading::before {
    opacity: 1;
}
</style>


<!-- Page Header -->
<div class="page-header style-11 no-print">
    <div class="container">
        <h2 class="page-title">House Details Infographic</h2>
        <ol class="breadcrumb">
            <li><a href="{{ Route('home') }}">Home</a></li>
            <li class="active">House Details Infographic</li>
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
                <!-- <a class="a2a_button_twitter"></a> -->
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

<div id="hdiContainer">
    <div class="hdi font-raleway">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-print-12">
                    <h1 class="head1 text-center colora text-editable" data-field-id="address1">
                        <div class="content" data-placeholder="4356 Penwood Dr">{!!$hdiData['address1']!!}</div>
                    </h1>
                    <h2 class="head2 text-center colora text-editable" data-field-id="address2">
                        <div class="content" data-placeholder="Alexandria, VA 22310">{!!$hdiData['address2']!!}</div>
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-print-12">
                    <hr class="style1">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-print-12">
                    <div class="para1 text-center colora text-editable" data-field-id="welcome">
                        <div class="content"
                            data-placeholder="This home is listed for sale by {{!empty($user->firstName) || !empty($user->lastName) ? $user->firstName .' '. $user->lastName : ''}}, Realtor&reg; {{!empty($user_details->phone) ? $user_details->phone : ''}}">
                            {!!$hdiData['welcome']!!}</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-print-12">
                    <hr class="style1">
                </div>
            </div>
            <div class="row vdiv-container1">
                <div class="col-lg-4 col-md-4 col-sm-12 col-print-4 vdiv-child1">
                    <div class="text1 text-center colora text-editable" data-field-id="beds">
                        <div class="content" data-placeholder="6 BEDS">{!!$hdiData['beds']!!}</div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-print-4 vdiv-child1">
                    <div class="client-logo">
                        @if (isset($user_details->logo))

                        <img src="{{env('AWS_URL').$user_details->logo}}" alt="{{ $user_details->title }}"
                            class="img-responsive">


                        @else
                        <a href="{{ url('/account/profileview').'?img=logo' }}" title="Click Here to Upload Logo">
                            <img src="/img/your-logo.png" class="img-responsive">
                        </a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-print-4 vdiv-child1">
                    <div class="text2 text-center colora text-editable" data-field-id="baths">
                        <div class="content" data-placeholder="3.5 BATHS">{!!$hdiData['baths']!!}</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-print-12">
                    <div class="head3 backgrounde colorb">
                        <div class="about-this-home">
                            ABOUT THIS HOME
                        </div>
                        <div class="neighborhood-text text-editable" data-field-id="neighborhood">
                            <div class="pull-left">NEIGHBORHOOD:&nbsp</div>
                            <div class="content pull-left" data-placeholder="Enter Neighborhood">
                                {!!$hdiData['neighborhood']!!}</div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-print-12">
                    <div class="para3 colora text-editable" data-field-id="detail">
                        <div class="content"
                            data-placeholder="This Morris Construction home situated on a cul-de-sac in a commuter-friendly location has been expertly renovated throughout, with nishes that are on point and spaces that are styled to perfection. Completely renovated in 2017, the kitchen is the highlight of the home and is a design blogger’s dream! Another featured space is the luxurious Master suite which includes a spacious walk-in closet and a bath epitomizing Modern Luxury: Carrara marble shower, dual vanities in a soothing shade of blue , heated ooring, shiny new sconces and contrasting rustic mirrors for a designer's touch. The basement space has unlimited possibilities for use: guest space and recreation area with an attached kitchenette, au pair or in-law suite, or short/long-term rental. You are not going to nd another home like this in the area.">
                            {!!$hdiData['detail']!!}</div>
                    </div>
                </div>
            </div>
            <div class="row item-container">
                @for($i=0; $i<12; $i++) <div class="col-lg-3 col-md-3 col-sm-3 col-print-3">
                    <div class="item">
                        <div class="svg-icon-container">
                            <div class="svg-icon fillf bgcolor-white image-editable" data-img-name="items_{{$i}}_icons">
                                <div class="icon-content">
                                    <img src="{{env('AWS_URL').$hdi_images['items_'.$i.'_icons']}}" />
                                </div>
                            </div>
                        </div>
                        <div class="text-block1 text-center text-editable" data-field-id="items_{{$i}}_text1">
                            <div class="content" data-placeholder="Year">{!!$hdiData['items_'.$i.'_text1']!!}</div>
                        </div>
                        <div class="text-block2 text-center text-editable" data-field-id="items_{{$i}}_text2">
                            <div class="content" data-placeholder="Built">{!!$hdiData['items_'.$i.'_text2']!!}</div>
                        </div>
                        <div class="text-block3 text-center backgroundd colorb text-editable"
                            data-field-id="items_{{$i}}_text3">
                            <div class="content" data-placeholder="1989">{!!$hdiData['items_'.$i.'_text3']!!}</div>
                        </div>
                    </div>
            </div>
            @endfor
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-print-12">
                <div class="schools">
                    <div class="schools-icon-container backgrounde">
                        <div
                            class="col-lg-offset-5 col-lg-2 col-md-offset-5 col-md-2 col-sm-offset-5 col-sm-2 col-xs-offset-4 col-xs-5 col-print-offset-5 col-print-2 icon-container">
                            <div class="icon fillf">
                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="514.08px"
                                    height="514.08px" viewBox="0 0 514.08 514.08"
                                    style="enable-background:new 0 0 514.08 514.08;" xml:space="preserve">
                                    <g>
                                        <g>
                                            <path
                                                d="M225.216,298.656h20.808c3.672,0,6.12-2.448,6.12-6.12V263.16c0-3.672-2.448-6.12-6.12-6.12h-20.808
                                                c-3.672,0-6.12,2.448-6.12,6.12v29.376C219.096,294.984,221.544,298.656,225.216,298.656z" />
                                            <path
                                                d="M268.056,298.656h20.809c3.672,0,6.12-2.448,6.12-6.12V263.16c0-3.672-2.448-6.12-6.12-6.12h-20.809
                                                c-3.672,0-6.119,2.448-6.119,6.12v29.376C261.937,294.984,264.384,298.656,268.056,298.656z" />
                                            <path
                                                d="M225.216,243.576h20.808c3.672,0,6.12-2.448,6.12-6.12V208.08c0-3.672-2.448-6.12-6.12-6.12h-20.808
                                                c-3.672,0-6.12,2.448-6.12,6.12v29.376C219.096,241.128,221.544,243.576,225.216,243.576z" />
                                            <path
                                                d="M268.056,243.576h20.809c3.672,0,6.12-2.448,6.12-6.12V208.08c0-3.672-2.448-6.12-6.12-6.12h-20.809
                                                c-3.672,0-6.119,2.448-6.119,6.12v29.376C261.937,241.128,264.384,243.576,268.056,243.576z" />
                                            <path
                                                d="M80.784,362.304H59.976c-3.672,0-6.12,2.448-6.12,6.12V397.8c0,3.672,2.448,6.12,6.12,6.12h20.808
                                                c3.672,0,6.12-2.448,6.12-6.12v-29.376C86.904,364.752,84.456,362.304,80.784,362.304z" />
                                            <path
                                                d="M80.784,418.608H59.976c-3.672,0-6.12,2.447-6.12,6.119v28.152c0,3.672,2.448,6.12,6.12,6.12h20.808
                                                c3.672,0,6.12-2.448,6.12-6.12v-29.376C86.904,421.056,84.456,418.608,80.784,418.608z" />
                                            <path
                                                d="M124.848,362.304H104.04c-3.672,0-6.12,2.448-6.12,6.12V397.8c0,3.672,2.448,6.12,6.12,6.12h20.808
                                                c3.672,0,6.12-2.448,6.12-6.12v-29.376C130.968,364.752,128.52,362.304,124.848,362.304z" />
                                            <path
                                                d="M124.848,418.608H104.04c-3.672,0-6.12,2.447-6.12,6.119v28.152c0,3.672,2.448,6.12,6.12,6.12h20.808
                                                c3.672,0,6.12-2.448,6.12-6.12v-29.376C130.968,421.056,128.52,418.608,124.848,418.608z" />
                                            <path
                                                d="M80.784,308.448H59.976c-3.672,0-6.12,2.448-6.12,6.12v28.151c0,3.672,2.448,6.12,6.12,6.12h20.808
                                                c3.672,0,6.12-2.448,6.12-6.12v-29.376C86.904,310.896,84.456,308.448,80.784,308.448z" />
                                            <path
                                                d="M124.848,308.448H104.04c-3.672,0-6.12,2.448-6.12,6.12v28.151c0,3.672,2.448,6.12,6.12,6.12h20.808
                                                c3.672,0,6.12-2.448,6.12-6.12v-29.376C130.968,310.896,128.52,308.448,124.848,308.448z" />
                                            <path
                                                d="M389.232,402.696h20.808c3.672,0,6.12-2.448,6.12-6.12V367.2c0-3.672-2.448-6.12-6.12-6.12h-20.808
                                                c-3.673,0-6.12,2.448-6.12,6.12v29.376C383.112,400.248,385.56,402.696,389.232,402.696z" />
                                            <path
                                                d="M389.232,459h20.808c3.672,0,6.12-2.448,6.12-6.12v-29.376c0-3.672-2.448-6.12-6.12-6.12h-20.808
                                                c-3.673,0-6.12,2.448-6.12,6.12v29.376C383.112,456.552,385.56,459,389.232,459z" />
                                            <path
                                                d="M433.296,402.696h20.809c3.672,0,6.119-2.448,6.119-6.12V367.2c0-3.672-2.447-6.12-6.119-6.12h-20.809
                                                c-3.672,0-6.12,2.448-6.12,6.12v29.376C427.176,400.248,429.624,402.696,433.296,402.696z" />
                                            <path
                                                d="M433.296,459h20.809c3.672,0,6.119-2.448,6.119-6.12v-29.376c0-3.672-2.447-6.12-6.119-6.12h-20.809
                                                c-3.672,0-6.12,2.448-6.12,6.12v29.376C427.176,456.552,429.624,459,433.296,459z" />
                                            <path
                                                d="M389.232,348.84h20.808c3.672,0,6.12-2.448,6.12-6.12v-29.376c0-3.672-2.448-6.12-6.12-6.12h-20.808
                                                c-3.673,0-6.12,2.448-6.12,6.12v29.376C383.112,346.392,385.56,348.84,389.232,348.84z" />
                                            <path
                                                d="M433.296,348.84h20.809c3.672,0,6.119-2.448,6.119-6.12v-29.376c0-3.672-2.447-6.12-6.119-6.12h-20.809
                                                c-3.672,0-6.12,2.448-6.12,6.12v29.376C427.176,346.392,429.624,348.84,433.296,348.84z" />
                                            <path
                                                d="M509.184,217.872c-3.672-3.672-8.567-4.896-13.464-4.896H367.2v-31.824c0-6.12-3.672-12.24-8.568-14.688L275.4,110.16
                                                V93.024h59.976c9.792,0,18.36-8.568,18.36-18.36V33.048c0-9.792-8.568-18.36-18.36-18.36h-61.2
                                                c-2.448-7.344-9.792-12.24-17.136-12.24c-9.792,0-18.36,8.568-18.36,18.36v12.24V73.44v36.72l-83.232,55.08
                                                c-4.896,3.672-8.568,8.568-8.568,14.688v31.824H18.36C8.568,212.976,0,220.32,0,231.336v39.168l0,0v222.769
                                                c0,9.792,8.568,18.359,18.36,18.359h477.36c9.792,0,18.36-8.567,18.36-18.359V270.504l0,0v-39.168
                                                C514.08,226.44,511.632,221.544,509.184,217.872z M183.6,190.944l73.44-48.96l73.44,48.96v40.392v39.168l0,0l0,0v204.408h-23.257
                                                v-85.68c0-28.152-23.256-50.185-50.184-50.185c-26.928,0-50.184,23.256-50.184,50.185v85.68H183.6V270.504V190.944z
                                                 M36.72,288.864h110.16v186.048H36.72V288.864z M477.36,474.912H367.2V288.864h110.16V474.912z" />
                                        </g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="title bgcolor-black color-white text-center">
                        SCHOOLS
                    </div>
                    <div class="table-responsive">
                        <table class="table colora school-table">
                            <thead>
                                <tr>
                                    <th>Level</th>
                                    <th>School Name</th>
                                    <th>Grades</th>
                                    <th>Students</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for($i=0; $i<3; $i++) <tr class="table-row-bg">
                                    <td class="text-editable" data-field-id="schools_{{$i}}_level">
                                        <div class="content" data-placeholder="Elementary">
                                            {!!$hdiData['schools_'.$i.'_level']!!}</div>
                                    </td>
                                    <td class="text-editable" data-field-id="schools_{{$i}}_name">
                                        <div class="content" data-placeholder="Bush Hill Elementary School">
                                            {!!$hdiData['schools_'.$i.'_name']!!}</div>
                                    </td>
                                    <td class="text-editable" data-field-id="schools_{{$i}}_grade">
                                        <div class="content" data-placeholder="PK-6">
                                            {!!$hdiData['schools_'.$i.'_grade']!!}</div>
                                    </td>
                                    <td class="text-editable" data-field-id="schools_{{$i}}_students">
                                        <div class="content" data-placeholder="472 Students">
                                            {!!$hdiData['schools_'.$i.'_students']!!}</div>
                                    </td>
                                    </tr>
                                    @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-print-12">
                <div class="para4 color4 text-center">
                    *School Information provided is intended to be used as reference only. To verify enrollment
                    eligibility for a property, contact the school directly
                    <!-- *Information should not be relied upon as it may be subject to change by Arlington County elementary school redistricting -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-print-12">
                <hr class="style1 footer-top-line">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-print-4">
                <div class="footerdiv1">
                    <div class="for-more-info">
                        For More Information:
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-3 col-print-4 client-image">
                            @if (isset($user_details->photo))

                            <img src="{{env('AWS_URL').$user_details->photo}}"
                                alt="{{ $user->firstName }} {{ $user->lastName }}" class="img-responsive">

                            @else
                            <a href="{{ url('/account/profileview').'?img=profile' }}"
                                title="Click Here to Upload Image">
                                <img src="/img/your-image-here2.png" class="img-responsive" style="">
                            </a>
                            @endif
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-5 col-print-8">
                            <div class="row cline-info text-uppercase">
                                {{!empty($user->firstName) || !empty($user->lastName) ? $user->firstName .' '. $user->lastName : ''}}<br>
                                {{!empty($user_details->phone) ? $user_details->phone : ''}}<br>
                                {{!empty($user_details->email) ? $user_details->email : ''}}<br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-print-4">
                <div class="footerdiv2">
                    <div class="footerdiv2-container colora">
                        <div class="client-logo-footer">
                            @if (isset($user_details->logo))
                            <img src="{{env('AWS_URL').$user_details->logo}}" alt="{{ $user_details->title }}"
                                class="img-responsive">
                            @else
                            <a href="{{ url('/account/profileview').'?img=logo' }}" title="Click Here to Upload Logo">
                                <img src="/img/your-logo.png" class="img-responsive">
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-print-4">
                <div class="footerdiv3">
                    <img src="/img/cfs-logo-black.jpg" class="img-responsive">
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
                <!-- <a class="a2a_button_twitter"></a> -->
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

<style>
#iconGallery .modal-body {
    padding-bottom: 5px;
}

#iconGallery .svg-icon-list {
    padding-bottom: 10px;
    padding-top: 10px;
}

#iconGallery .svg-icon-container {
    border: 1px solid #ea2349;
    margin-bottom: 10px;
    cursor: pointer;
}

#iconGallery .svg-icon-container .svg-icon {
    width: 70px;
    height: 70px;
    text-align: center;
    padding-top: 5px;
}

#iconGallery .svg-icon-container .svg-icon svg {
    width: 64px;
    height: 64px;
}

#iconGallery .svg-icon-container .svg-icon-option {
    text-align: center;
}

#iconGallery .page-navigation {
    text-align: right;
}

#iconGallery .page-navigation .pagination {
    margin: 0;
}

#iconGallery .page-navigation .pagination .goto-page {
    cursor: pointer;
}


#iconGallery #search_tag_btn,
#iconGallery #search_tag_reset {
    padding-top: 2px;
    padding-bottom: 2px;
}
</style>


<div class="modal fade" tabindex="-1" role="dialog" id="iconGallery">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Icon Gallery <i class="fa fa-spinner fa-spin hide loading"
                        style="font-size:18px"></i></h4>
            </div>
            <div class="modal-body">
                <div class="row ">
                    <form class="form-inline">
                        <div class="form-group col-md-8">
                            <select id="search_tag" name="search_tag[]" placeholder="Start Typing...">
                            </select>
                        </div>
                        <button type="button" class="btn btn-default btn-sm" id="search_tag_btn">Search</button>
                        <button type="button" class="btn btn-default btn-sm" id="search_tag_reset">Reset</button>
                    </form>
                </div>
                <div class="row svg-icon-list">
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <nav aria-label="Page navigation" class="page-navigation">
                            <ul class="pagination">
                                <!--
                            <li>
                              <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                              </a>
                            </li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                              <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                              </a>
                            </li>
                        -->
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary change-icon">Ok</button>
                <button type="button" class="btn btn-primary upload-icon">Upload</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<div class="modal fade" tabindex="-1" role="dialog" id="iconUpload">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Upload Icon <i class="fa fa-spinner fa-spin hide loading"
                        style="font-size:18px"></i></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" onsubmit="return false;">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="new_icon_name" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Icon File</label>
                        <div class="col-sm-10">
                            <input id="icon_file" type="file" class="form-control" name="icon_file" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Tags</label>
                        <div class="col-sm-10">
                            <select id="new_icon_tags" name="tags[]" placeholder="Start Typing..." multiple>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary upload-icon-file">Upload <i
                        class="fa fa-spinner fa-spin hide loading" style="font-size:18px"></i></button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade " tabindex="-1" role="dialog" id="imageUpload1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <div class="row">
                    <div class="col-md-12">
                        <center>
                            <div id="upload-img"></div>
                        </center>
                    </div>
                    <div class="col-md-12">
                        <strong>Select Image:</strong>
                        <br />
                        <input type="file" id="upload-img-file" name="upload-img-file">
                        <br />
                        <center>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button class="btn btn-success upload-image">Upload Image <i
                                    class="fa fa-spinner fa-spin hide loading" style="font-size:18px"></i></button>
                        </center>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@endsection


@section('hdiEditOptions')
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
<script src="{{ asset('js/selectize.js') }}"></script>
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
$(document).ready(function() {
    var processHdiFunc = function(json) {
        var that;
        processHdi = {
            params: {
                debug: false,
                hdiDetailsUrl: "",
                //editIconHtml : '<span class="edit"><i class="fa fa-pencil"></i></span>',
                hdiHtml: false,
                rawData: {
                    "address1": "",
                    "address2": "",
                    "welcome": "",
                    "beds": "",
                    "baths": "",
                    "neighborhood": "",
                    "detail": "",

                    "items_0_icons": "",
                    "items_0_text1": "",
                    "items_0_text2": "",
                    "items_0_text3": "",
                    "items_1_icons": "",
                    "items_1_text1": "",
                    "items_1_text2": "",
                    "items_1_text3": "",
                    "items_2_icons": "",
                    "items_2_text1": "",
                    "items_2_text2": "",
                    "items_2_text3": "",
                    "items_3_icons": "",
                    "items_3_text1": "",
                    "items_3_text2": "",
                    "items_3_text3": "",
                    "items_4_icons": "",
                    "items_4_text1": "",
                    "items_4_text2": "",
                    "items_4_text3": "",
                    "items_5_icons": "",
                    "items_5_text1": "",
                    "items_5_text2": "",
                    "items_5_text3": "",
                    "items_6_icons": "",
                    "items_6_text1": "",
                    "items_6_text2": "",
                    "items_6_text3": "",
                    "items_7_icons": "",
                    "items_7_text1": "",
                    "items_7_text2": "",
                    "items_7_text3": "",
                    "items_8_icons": "",
                    "items_8_text1": "",
                    "items_8_text2": "",
                    "items_8_text3": "",
                    "items_9_icons": "",
                    "items_9_text1": "",
                    "items_9_text2": "",
                    "items_9_text3": "",
                    "items_10_icons": "",
                    "items_10_text1": "",
                    "items_10_text2": "",
                    "items_10_text3": "",
                    "items_11_icons": "",
                    "items_11_text1": "",
                    "items_11_text2": "",
                    "items_11_text3": "",

                    "schools_0_level": "",
                    "schools_0_name": "",
                    "schools_0_grade": "",
                    "schools_0_students": "",
                    "schools_1_level": "",
                    "schools_1_name": "",
                    "schools_1_grade": "",
                    "schools_1_students": "",
                    "schools_2_level": "",
                    "schools_2_name": "",
                    "schools_2_grade": "",
                    "schools_2_students": "",

                    "footer_text": ""
                },
                tempFile: '',
                iconGalleryOptions: {
                    tag_id: '',
                    limit: 12,
                    order_dir: 'desc',
                    order_by: 'id',
                    current_page: 1
                }
            },
            init: function(json) {
                that = this;
                that.params.hdiDetailsUrl = json.hdiDetailsUrl;
                //that.params.hdiId = json.hdiId;
                //console.log('params', that.params);
                that.showDebug('init');
                that.preProcess();
                that.events();
                that.plugins();
                that.process();
                //console.log(that.params);
            },
            showDebug: function(str) {
                if (that.params.debug) {
                    console.log(str);
                }
            },
            showLoading: function($btn) {
                that.showDebug('showLoading');
                $btn.find('i.loading').removeClass('hide');
                $btn.prop('disabled', true);
            },
            hideLoading: function($btn) {
                that.showDebug('hideLoading');
                $btn.find('i.loading').addClass('hide');
                $btn.prop('disabled', false);
            },
            events: function() {
                that.showDebug('events');
                $('#hdiContainer').find('span.edit').unbind().on('click', function() {
                    that.activateEditModeOnEle($(this));
                    /*
                    $ele.parent().parent().find('div.content').unbind().on('blur',function(){
                        //that.blurEditText($ele);
                    });
                    */
                });
                $('#hdiContainer').find('span.save').unbind().on('click', function() {
                    that.deActivateEditModeOnEle($(this));
                    that.saveTextChanges($(this));
                });
                $('#hdiContainer').find('span.cancel').unbind().on('click', function() {
                    that.deActivateEditModeOnEle($(this));
                    that.cancelTextChanges($(this));
                });
                /*
                $('#hdiContainer').find('img.img-editable').parent().unbind().on('click',function(){
                    that.focusEditImage($(this));
                });
                */
                $('#hdiContainer div.image-editable div.options').find('span.edit-img').unbind().on(
                    'click',
                    function() {
                        //console.log($(this));
                        //console.log('adnan');
                        //that.focusEditImage($(this));
                        that.changeIconProcess($(this));
                    });
                /*
                $('#hdiContainer div.image-editable img').unbind().on('click',function(){
                    //console.log($(this).parent().find('div.options span.edit-img').first());
                    //console.log('adnan');
                    that.focusEditImage($(this).parent().find('div.options span.edit-img').first());
                });
                */

            },
            preProcess: function() {
                that.showDebug('preProcess');

                var editOptionsHtmlForText = '';
                editOptionsHtmlForText += '<div class="options no-print">';
                editOptionsHtmlForText += '<span class="edit"><i class="fa fa-pencil"></i></span>';
                editOptionsHtmlForText +=
                    '<span class="save"><i class="fa fa-floppy-o fa-disabled"></i></span>';
                editOptionsHtmlForText +=
                    '<span class="cancel"><i class="fa fa-ban fa-disabled"></i></span>'
                editOptionsHtmlForText += '</div>';
                /*
                $('div.text-editable').each(function( index, element ) {
                    $(this).append(editOptionsHtmlForText);
                });
                */
                $('.text-editable').append(editOptionsHtmlForText);


                $('.image-editable').each(function(index, element) {
                    var data_img_name = $(this).attr('data-img-name');
                    var editOptionsHtmlForImage = '';
                    editOptionsHtmlForImage += '<div class="options no-print">';
                    editOptionsHtmlForImage += '<span class="edit-img" data-img-name="' +
                        data_img_name + '"><i class="fa fa-pencil"></i></span>';
                    editOptionsHtmlForImage += '</div>';
                    $(this).append(editOptionsHtmlForImage);
                });

            },
            process: function() {
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
            plugins: function() {

            },
            urltoFile: function(url, filename, mimeType) {
                mimeType = mimeType || (url.match(/^data:([^;]+);/) || '')[1];
                return (fetch(url)
                    .then(function(res) {
                        return res.arrayBuffer();
                    })
                    .then(function(buf) {
                        return new File([buf], filename, {
                            type: mimeType
                        });
                    })
                );
            },
            changeIconProcess: function($ele) {
                that.showDebug('changeIconProcess');
                that.params.iconToBeChange = $ele.attr('data-img-name');
                //show dialog
                $('#iconGallery').modal('show');
                that.loadIconGallery();
            },

            loadIconGallery: function() {
                that.showDebug('loadIconGallery');
                //console.log('iconGalleryOptions', that.params.iconGalleryOptions);

                $.ajax({
                    dataType: 'json',
                    type: 'post',
                    url: "{{ URL::route('iconGalleryProcess', ['userId' => $userId]) }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        params: that.params.iconGalleryOptions
                    },
                    beforeSend: function() {
                        that.showDebug('loadIconGallery - beforeSend');
                        $('#iconGallery .modal-header i.loading').removeClass('hide');
                    },
                    //url:'{{ url('/generateReport') }}',
                    success: function(data) {
                        that.showDebug('loadIconGallery - success');
                        //console.log('data',data);
                        if (data && data.status && data.status == 1) {
                            that.params.iconGalleryData = data.icons;
                            that.renderIcons();
                        } else if (data.status == 0) {
                            toastr.error(data.msg);
                            that.params.iconGalleryData = {};
                            that.renderIcons();
                        }
                    },
                    error: function(data) {
                        that.showDebug('loadIconGallery - error');
                        toastr.error('Could Not Complete Request At the Moment');
                        //that.showMessagePopup('<p>Could Not Complete Request At the Moment</p>');
                    },
                    complete: function() {
                        $('#iconGallery .modal-header i.loading').addClass('hide');
                        that.showDebug('loadIconGallery - complete');
                    }
                });
            },

            getNavigation: function(start, last_page, current_page) {
                var html = '';
                html += '<li ';
                html += (current_page == start) ? 'class="disabled"' : '';
                html += ' >';
                html += '<a class="';
                html += (current_page == start) ? '' : 'goto-page';
                html += '" ';
                html += 'data-page="';
                html += (current_page == start) ? '' : (current_page - 1);
                html += '" ';
                html += 'aria-label="Previous">';
                html += '<span aria-hidden="true">&laquo;</span>';
                html += '</a>';
                html += '</li>';

                for (var i = start; i <= last_page; i++) {
                    html += '<li ';
                    html += (current_page == i) ? 'class="active"' : '';
                    html += ' >';
                    html += '<a class="';
                    html += (current_page == i) ? '' : 'goto-page';
                    html += '" ';
                    html += 'data-page="';
                    html += (current_page == i) ? '' : i;
                    html += '" ';
                    html += '>' + i + '</a></li>';
                }

                html += '<li ';
                html += (current_page == last_page) ? 'class="disabled"' : '';
                html += ' >';
                html += '<a class="';
                html += (current_page == last_page) ? '' : 'goto-page';
                html += '" ';
                html += 'data-page="';
                html += (current_page == last_page) ? '' : (current_page + 1);
                html += '" ';
                html += 'aria-label="Next">';
                html += '<span aria-hidden="true">&raquo;</span>';
                html += '</a>';
                html += '</li>';

                return html;
            },


            getIconsHtml: function(iconData) {
                that.showDebug('getIconsHtml');
                //iconData.name
                var html = '';
                html += '<div class="col-lg-2 col-md-2 col-sm-2">';
                html += '<div class="svg-icon-container icon_' + iconData.id + '">';
                html += '<div class="svg-icon fillf">';
                //html += '<i class="fa fa-spinner fa-spin loading" style="font-size:18px"></i>';
                html += iconData.icon_data;
                html += '</div>';
                html += '<div class="svg-icon-option">';
                html += '<input class="icon_checkbox" type="checkbox" name="" data-icon-id="icon_' +
                    iconData.id + '" value="' + iconData.icon_file + '" />';
                html += '</div>';
                html += '</div>';
                html += '</div>';
                html += '</div>';
                return html;
            },

            renderIcons: function() {
                that.showDebug('renderIcons');
                if (that.params.iconGalleryData && that.params.iconGalleryData.data && that.params
                    .iconGalleryData.data.length > 0) {
                    MaxLoopCount = that.params.iconGalleryData.data.length;
                    //console.log('MaxLoopCount', MaxLoopCount);
                    var html = '';
                    for (var i = 0; i < MaxLoopCount; i++) {
                        html += that.getIconsHtml(that.params.iconGalleryData.data[i])
                    }
                    $('#iconGallery .svg-icon-list').html(html);

                    var navigationHtml = that.getNavigation(1, that.params.iconGalleryData
                        .last_page, that.params.iconGalleryData.current_page);
                    $('#iconGallery .pagination').html(navigationHtml);


                    //select Icon
                    $('#iconGallery').find('.svg-icon-container').unbind().on('click', function() {
                        //$(this).find('input.icon_checkbox').click();
                        $(this).find('input.icon_checkbox').prop('checked', true);
                        $('input.icon_checkbox').not($(this).find('input.icon_checkbox'))
                            .prop('checked', false);
                    });
                    $('input.icon_checkbox').change(function() {
                        $('input.icon_checkbox').not(this).prop('checked', false);
                    });

                    //update Icon
                    $('#iconGallery .change-icon').unbind().on('click', function() {
                        if ($('#iconGallery').find('.svg-icon-container').find(
                                'input.icon_checkbox:checked').length > 0) {
                            var icon_id = $('#iconGallery').find('.svg-icon-container')
                                .find('input.icon_checkbox:checked').attr('data-icon-id');
                            var icon_file = $('#iconGallery').find('.svg-icon-container')
                                .find('input.icon_checkbox:checked').val();
                            that.updateIcon(icon_id, icon_file);
                        }
                    });

                    //Upload Icon
                    $('#iconGallery .upload-icon').unbind().on('click', function() {
                        that.uploadIcon();
                        //$('.item .svg-icon-container').find('div[data-img-name="'+that.params.iconToBeChange+'"]').find('div.icon-content').html(data.new_icon_data);
                    });

                    //change page
                    $('#iconGallery .pagination .goto-page').unbind().on('click', function() {
                        that.params.iconGalleryOptions.current_page = $(this).attr(
                            'data-page');
                        that.loadIconGallery();
                        //that.uploadIcon();
                        //$('.item .svg-icon-container').find('div[data-img-name="'+that.params.iconToBeChange+'"]').find('div.icon-content').html(data.new_icon_data);
                    });
                } else {
                    var html = '';
                    html = '<h3 class="text-center">No Record Found</h3>'
                    $('#iconGallery .svg-icon-list').html(html);
                    $('#iconGallery .pagination').html('');
                }

                //apply activateMultiSelectTags
                that.activateMultiSelectTags($('#iconGallery #search_tag'), 1);
                //search icons for tag
                $('#iconGallery #search_tag_btn').unbind().on('click', function() {
                    that.params.iconGalleryOptions.tag_id = $('#iconGallery #search_tag')
                        .val();
                    that.loadIconGallery();
                });
                $('#iconGallery #search_tag_reset').unbind().on('click', function() {
                    that.params.iconGalleryOptions.tag_id = '';
                    that.params.iconGalleryOptions.current_page = 1;
                    that.loadIconGallery();
                });


            },

            updateIcon: function(icon_id, icon_file) {
                that.showDebug('updateIcon');
                var data = {
                    _token: "{{ csrf_token() }}",
                    icon_id: icon_id,
                    icon_file: icon_file,
                    hdi_icon_name: that.params.iconToBeChange,
                    type: 'update-hdi-icon'
                }
                $.ajax({
                    url: "{{ URL::route('updateHdiImage', ['hdiId' => $hdiId, 'userId' => $userId]) }}",
                    type: "POST",
                    data: data,
                    dataType: 'json',
                    beforeSend: function() {
                        //that.showLoading($btn);
                        toastr.info('updateIcon Process Started');
                    },
                    success: function(data) {
                        that.showDebug('updateIcon - success');
                        //console.log('data',data);
                        if (data) {
                            if (data.status == 1) {
                                //$imgEle.attr("src", resp);
                                //$imgEle.attr("src", '/hdis/{{$userId}}/{{$hdiId}}/'+img_name+'.svg'+'#' + new Date().getTime());
                                /*
                                $imgEle.find('div.icon-content').html(data.resp_data);
                                $('#imageUpload').modal('hide');
                                */
                                if (data.new_icon_data) {
                                    $('.item .svg-icon-container').find(
                                        'div[data-img-name="' + that.params
                                        .iconToBeChange + '"]').find(
                                        'div.icon-content').html(data.new_icon_data);
                                }
                                $('#iconGallery').modal('hide');
                                toastr.success(data.msg);
                            } else if (data.status == 0) {
                                if (data.msg && data.msg != '') {
                                    toastr.error(data.msg);
                                } else {
                                    toastr.error(
                                        'Something goes wrong, Please try later');
                                }
                            }
                        }
                    },
                    complete: function() {
                        //that.hideLoading($btn);
                    }
                });
            },

            activateMultiSelectTags: function($ele, maxItems) {

                var max_items = null;
                if (maxItems) {
                    max_items = maxItems;
                }
                that.showDebug('activateMultiSelectTags');
                $ele.selectize({
                    valueField: 'id',
                    labelField: 'title',
                    searchField: 'title',

                    create: false,
                    persist: false,
                    createOnBlur: true,

                    maxOptions: 100,
                    maxItems: max_items,
                    //loadingClass: '',
                    //options: options,
                    load: function(query, callback) {
                        if (!query.length) return callback();
                        $.ajax({
                            url: "{{ URL::route('getIconTags', ['userId' => $userId]) }}",
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                'q': query,
                                'limit': 10,
                                '_token': "{{ csrf_token() }}"
                            },
                            error: function() {
                                callback();
                            },
                            success: function(res) {
                                //console.log(res);
                                callback(res.tags);
                            }
                        });
                    },
                });
            },


            uploadIcon: function($ele) {
                that.showDebug('uploadIcon');

                $('#icon_file').val('');
                that.params.tempFile = '';
                $('#iconUpload #new_icon_name').val('');
                $('#iconUpload #new_icon_tags').val('');

                //$imgEle = $ele.parent().parent().parent().find('.image-editable');
                var img_name = that.params.iconToBeChange;

                $('#iconUpload').modal('show');
                that.activateMultiSelectTags($('#iconUpload #new_icon_tags'));

                $('#icon_file').unbind().on('change', function(e) {
                    /*
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $uploadCrop.croppie('bind', {
                            url: e.target.result
                        }).then(function(){
                            console.log('jQuery bind complete');
                        });
                    }
                    reader.readAsDataURL(this.files[0]);
                    */
                    that.params.tempFile = e.target.files[0];
                    //console.log('that.params.tempFile',that.params.tempFile);
                });


                $('.upload-icon-file').unbind().on('click', function(ev) {
                    var $btn = $(this);
                    var icon_name = $('#iconUpload #new_icon_name').val();
                    var icon_tags = $('#iconUpload #new_icon_tags').val();
                    if (icon_name != '' && that.params.tempFile != '') {
                        /*
                        var files = $('#upload-img-file').files;
                        console.log('upload-image-file', $('#upload-img-file'));
                        console.log('files', files);
                        */

                        var formData = new FormData();
                        formData.append('_token', "{{ csrf_token() }}");
                        formData.append('img_name', img_name);
                        formData.append('icon_file', that.params.tempFile);
                        formData.append('icon_name', icon_name);
                        formData.append('icon_tags', icon_tags);
                        formData.append('hdi_icon_name', that.params.iconToBeChange);
                        formData.append('type', 'upload-hdi-icon');

                        $.ajax({
                            url: "{{ URL::route('updateHdiImage', ['hdiId' => $hdiId, 'userId' => $userId]) }}",
                            type: "POST",
                            data: formData,
                            processData: false,
                            contentType: false,
                            beforeSend: function() {
                                that.showLoading($btn);
                                toastr.info('Image Upload Process Started');
                            },
                            success: function(data) {
                                that.showDebug('saveChanges - success');
                                //console.log('data',data);
                                if (data) {
                                    if (data.icon_file) {
                                        if (data.icon_file.status == 1) {
                                            toastr.success(data.icon_file.msg);
                                            if (data.new_icon_data) {
                                                $('.item .svg-icon-container')
                                                    .find(
                                                        'div[data-img-name="' +
                                                        that.params
                                                        .iconToBeChange + '"]')
                                                    .find('div.icon-content')
                                                    .html(data.new_icon_data);
                                            }
                                            $('#iconUpload').modal('hide');
                                            $('#iconGallery').modal('hide');
                                        } else {
                                            toastr.error(data.icon_file.msg);
                                        }
                                    }
                                    if (data.icon_tags) {
                                        if (data.icon_tags.status == 1) {
                                            toastr.success(data.icon_tags.msg);
                                        } else {
                                            toastr.error(data.icon_tags.msg);
                                        }
                                    }
                                    if (data.icon_update) {
                                        if (data.icon_update.status == 1) {
                                            toastr.success(data.icon_update
                                                .msg);
                                        } else {
                                            toastr.error(data.icon_update.msg);
                                        }
                                    }
                                }
                            },
                            complete: function() {
                                that.hideLoading($btn);
                            }
                        });


                    } else {
                        if (icon_name == '') {
                            toastr.info('You need to provdie name of the icon');
                        }
                        if (that.params.tempFile <= 0) {
                            toastr.info('You need to select icon file');
                        }
                    }



                });

            },
            activateEditModeOnEle: function($ele) {
                that.showDebug('activateEditModeOnEle');
                var field_id = $ele.parent().parent().attr('data-field-id');
                that.params.rawData[field_id] = $ele.parent().parent().find('div.content').html();

                //console.log('rawData', that.params.rawData);

                $ele.parent().find('span.edit i').addClass('fa-disabled');
                $ele.parent().find('span.save i').removeClass('fa-disabled');
                $ele.parent().find('span.cancel i').removeClass('fa-disabled');

                $ele.parent().parent().find('div.content').attr({
                    'contenteditable': 'true'
                });
                $ele.parent().parent().find('div.content').addClass('editableBackground');
                $ele.parent().parent().find('div.content').focus();

                $ele.parent().addClass('show');
            },
            deActivateEditModeOnEle: function($ele) {
                that.showDebug('blurEditText');
                $ele.parent().parent().find('div.content').removeClass('editableBackground');
                $ele.parent().parent().find('div.content').removeAttr('contenteditable');
                //that.saveTextChanges($ele);
                $ele.parent().find('span.save i').addClass('fa-disabled');
                $ele.parent().find('span.cancel i').addClass('fa-disabled');
                $ele.parent().find('span.edit i').removeClass('fa-disabled');

                $ele.parent().removeClass('show');

            },
            showMessagePopup: function(msg) {
                that.showDebug('showMessagePopup');
                $('#message div.modal-body').html('').html(msg);
                $('#message').modal('show');
            },
            cancelTextChanges: function($ele) {
                that.showDebug('cancelTextChanges');
                var field_id = $ele.parent().parent().attr('data-field-id');
                $ele.parent().parent().find('div.content').html(that.params.rawData[field_id]);
            },
            saveTextChanges: function($ele) {
                that.showDebug('saveTextChanges');
                var hdi_field_id = $ele.parent().parent().attr('data-field-id');
                var hdi_field_value = $ele.parent().parent().find('div.content').html();
                hdi_field_value = hdi_field_value.trim();
                if (hdi_field_value == '<br>') {
                    hdi_field_value = '';
                    $ele.parent().parent().find('div.content').html('');
                }

                $.ajax({
                    dataType: 'json',
                    type: 'post',
                    url: that.params.hdiDetailsUrl,
                    data: {
                        _token: "{{ csrf_token() }}",
                        'hdi_field_id': hdi_field_id,
                        'hdi_field_value': hdi_field_value
                    },
                    beforeSend: function() {
                        that.showDebug('saveChanges - beforeSend');
                        toastr.clear();
                        toastr.info('Process Started');
                    },
                    //url:'{{ url('/generateReport') }}',
                    success: function(data) {
                        that.showDebug('saveChanges - success');
                        //console.log('data',data);
                        if (data) {
                            if (data.status == 1) {
                                that.params.rawData[hdi_field_id] = hdi_field_value;
                                toastr.success(data.msg);
                                //that.showMessagePopup('<p>'+data.msg+'</p>');
                            } else if (data.status == 0) {
                                if (data.msg && data.msg != '') {
                                    toastr.info(data.msg);
                                    //that.showMessagePopup('<p>'+data.msg+'</p>');
                                } else {
                                    toastr.error(
                                        'Something goes wrong, Please try later');
                                    //that.showMessagePopup('<p>Something goes wrong, Please try later</p>');
                                }
                            }
                        }
                    },
                    error: function(data) {
                        that.showDebug('saveChanges - error');
                        toastr.error('Could Not Complete Request At the Moment');
                        //that.showMessagePopup('<p>Could Not Complete Request At the Moment</p>');
                    },
                    complete: function() {
                        that.showDebug('saveChanges - complete');
                    }
                });

            }
        }
        processHdi.init(json);
    }
    var json = {};
    json.hdiDetailsUrl = "{{ URL::route('hdiDetails', ['hdiId' => $hdiId, 'userId' => $userId]) }}";

    processHdiFunc(json);
});
</script>
@endif

@endsection