@extends('layouts.template')
@section('content')

<link href="/css/hdi/style.css" rel="stylesheet" type="text/css">
<link href="/css/hdi/print.css" rel="stylesheet" type="text/css" media="print">
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
        <h2 class="page-title">House Details Infographic</h2>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Home</a></li>
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
                    <h1 class="head1 text-center colora">4356 Penwood Dr</h1>
                    <h2 class="head2 text-center colora">Alexandria, VA 22310</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-print-12">
                    <hr class="style1">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-print-12">
                    <div class="para1 text-center colora">
                        This home is listed for sale by <strong>Shoshanna Tanner</strong>, Realtor®and Accredited Staging Professional®
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
                    <div class="text1 text-center colora">
                    6 BEDS
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-print-4 vdiv-child1">
                    <div class="client-logo">
                        <img src="/img/client-logo.jpeg" class="img-responsive">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-print-4 vdiv-child1">
                    <div class="text2 text-center colora">
                    3.5 BATHS
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-print-12">
                    <div class="head3 backgrounde colorb">
                        <div class="about-this-home">
                            ABOUT THIS HOME
                        </div>
                        <div class="neighborhood-text">
                            NEIGHBORHOOD: CLERMONT
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-print-12">
                    <div class="para3 colora">
                        This Morris Construction home situated on a cul-de-sac in a commuter-friendly location has been expertly renovated throughout, with
                        nishes that are on point and spaces that are styled to perfection. Completely renovated in 2017, the kitchen is the highlight of the home and is a design blogger’s dream! Another featured space is the luxurious Master suite which includes a spacious walk-in closet and a bath
                        epitomizing Modern Luxury: Carrara marble shower, dual vanities in a soothing shade of blue , heated ooring, shiny new sconces and
                        contrasting rustic mirrors for a designer's touch. The basement space has unlimited possibilities for use: guest space and recreation area
                        with an attached kitchenette, au pair or in-law suite, or short/long-term rental. You are not going to nd another home like this in the
                        area.
                    </div>
                </div>
            </div>
            <div class="row item-container">
                @for($i=0; $i<12; $i++)
                <div class="col-lg-3 col-md-3 col-sm-3 col-print-3">
                    <div class="item">
                        <div class="svg-icon-container">
                            <div class="svg-icon fillf bgcolor-white">
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                                <g>
                                    <path d="M1,20.9c0,0.3,0.2,0.5,0.5,0.5h3.2h2.7h9.2h2.7h3.2c0.3,0,0.5-0.2,0.5-0.5s-0.2-0.5-0.5-0.5h-2.7V10c0-0.3-0.2-0.5-0.5-0.5
                                        s-0.5,0.2-0.5,0.5v10.4h-1.7v-8.6c0-0.3-0.2-0.5-0.5-0.5H7.4c-0.3,0-0.5,0.2-0.5,0.5v8.6H5.2V10c0-0.3-0.2-0.5-0.5-0.5
                                        S4.2,9.8,4.2,10v10.4H1.5C1.3,20.4,1,20.6,1,20.9z M16.1,16.1H7.9v-1.2h8.2V16.1z M7.9,17.1h8.2v1.2H7.9V17.1z M16.1,12.3v1.5H7.9
                                        v-1.5H16.1z M7.9,19.4h8.2v1.1H7.9V19.4z"/>
                                    <path d="M1.6,10.3c0.2,0.2,0.5,0.3,0.7,0.1L12,3.7l9.7,6.7c0.1,0.1,0.2,0.1,0.3,0.1c0.2,0,0.3-0.1,0.4-0.2c0.2-0.2,0.1-0.5-0.1-0.7
                                        l-10-6.9c-0.2-0.1-0.4-0.1-0.6,0l-10,6.9C1.5,9.7,1.4,10,1.6,10.3z"/>
                                </g>
                                </svg>
                            </div>
                        </div>
                        <div class="text-block1 text-center colora">
                            Year
                        </div>
                        <div class="text-block2 text-center colora">
                            Built
                        </div>
                        <div class="text-block3 text-center backgroundd colorb">
                            1989
                        </div>
                    </div>
                </div>
                @endfor
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-print-12">
                    <div class="schools">
                        <div class="schools-icon-container backgrounde">
                            <div class="col-lg-offset-5 col-lg-2 col-md-offset-5 col-md-2 col-sm-offset-5 col-sm-2 col-print-offset-5 col-print-2 icon-container">
                                <div class="icon fillf">
                                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                         width="514.08px" height="514.08px" viewBox="0 0 514.08 514.08" style="enable-background:new 0 0 514.08 514.08;"
                                         xml:space="preserve">
                                        <g>
                                        <g>
                                            <path d="M225.216,298.656h20.808c3.672,0,6.12-2.448,6.12-6.12V263.16c0-3.672-2.448-6.12-6.12-6.12h-20.808
                                                c-3.672,0-6.12,2.448-6.12,6.12v29.376C219.096,294.984,221.544,298.656,225.216,298.656z"/>
                                            <path d="M268.056,298.656h20.809c3.672,0,6.12-2.448,6.12-6.12V263.16c0-3.672-2.448-6.12-6.12-6.12h-20.809
                                                c-3.672,0-6.119,2.448-6.119,6.12v29.376C261.937,294.984,264.384,298.656,268.056,298.656z"/>
                                            <path d="M225.216,243.576h20.808c3.672,0,6.12-2.448,6.12-6.12V208.08c0-3.672-2.448-6.12-6.12-6.12h-20.808
                                                c-3.672,0-6.12,2.448-6.12,6.12v29.376C219.096,241.128,221.544,243.576,225.216,243.576z"/>
                                            <path d="M268.056,243.576h20.809c3.672,0,6.12-2.448,6.12-6.12V208.08c0-3.672-2.448-6.12-6.12-6.12h-20.809
                                                c-3.672,0-6.119,2.448-6.119,6.12v29.376C261.937,241.128,264.384,243.576,268.056,243.576z"/>
                                            <path d="M80.784,362.304H59.976c-3.672,0-6.12,2.448-6.12,6.12V397.8c0,3.672,2.448,6.12,6.12,6.12h20.808
                                                c3.672,0,6.12-2.448,6.12-6.12v-29.376C86.904,364.752,84.456,362.304,80.784,362.304z"/>
                                            <path d="M80.784,418.608H59.976c-3.672,0-6.12,2.447-6.12,6.119v28.152c0,3.672,2.448,6.12,6.12,6.12h20.808
                                                c3.672,0,6.12-2.448,6.12-6.12v-29.376C86.904,421.056,84.456,418.608,80.784,418.608z"/>
                                            <path d="M124.848,362.304H104.04c-3.672,0-6.12,2.448-6.12,6.12V397.8c0,3.672,2.448,6.12,6.12,6.12h20.808
                                                c3.672,0,6.12-2.448,6.12-6.12v-29.376C130.968,364.752,128.52,362.304,124.848,362.304z"/>
                                            <path d="M124.848,418.608H104.04c-3.672,0-6.12,2.447-6.12,6.119v28.152c0,3.672,2.448,6.12,6.12,6.12h20.808
                                                c3.672,0,6.12-2.448,6.12-6.12v-29.376C130.968,421.056,128.52,418.608,124.848,418.608z"/>
                                            <path d="M80.784,308.448H59.976c-3.672,0-6.12,2.448-6.12,6.12v28.151c0,3.672,2.448,6.12,6.12,6.12h20.808
                                                c3.672,0,6.12-2.448,6.12-6.12v-29.376C86.904,310.896,84.456,308.448,80.784,308.448z"/>
                                            <path d="M124.848,308.448H104.04c-3.672,0-6.12,2.448-6.12,6.12v28.151c0,3.672,2.448,6.12,6.12,6.12h20.808
                                                c3.672,0,6.12-2.448,6.12-6.12v-29.376C130.968,310.896,128.52,308.448,124.848,308.448z"/>
                                            <path d="M389.232,402.696h20.808c3.672,0,6.12-2.448,6.12-6.12V367.2c0-3.672-2.448-6.12-6.12-6.12h-20.808
                                                c-3.673,0-6.12,2.448-6.12,6.12v29.376C383.112,400.248,385.56,402.696,389.232,402.696z"/>
                                            <path d="M389.232,459h20.808c3.672,0,6.12-2.448,6.12-6.12v-29.376c0-3.672-2.448-6.12-6.12-6.12h-20.808
                                                c-3.673,0-6.12,2.448-6.12,6.12v29.376C383.112,456.552,385.56,459,389.232,459z"/>
                                            <path d="M433.296,402.696h20.809c3.672,0,6.119-2.448,6.119-6.12V367.2c0-3.672-2.447-6.12-6.119-6.12h-20.809
                                                c-3.672,0-6.12,2.448-6.12,6.12v29.376C427.176,400.248,429.624,402.696,433.296,402.696z"/>
                                            <path d="M433.296,459h20.809c3.672,0,6.119-2.448,6.119-6.12v-29.376c0-3.672-2.447-6.12-6.119-6.12h-20.809
                                                c-3.672,0-6.12,2.448-6.12,6.12v29.376C427.176,456.552,429.624,459,433.296,459z"/>
                                            <path d="M389.232,348.84h20.808c3.672,0,6.12-2.448,6.12-6.12v-29.376c0-3.672-2.448-6.12-6.12-6.12h-20.808
                                                c-3.673,0-6.12,2.448-6.12,6.12v29.376C383.112,346.392,385.56,348.84,389.232,348.84z"/>
                                            <path d="M433.296,348.84h20.809c3.672,0,6.119-2.448,6.119-6.12v-29.376c0-3.672-2.447-6.12-6.119-6.12h-20.809
                                                c-3.672,0-6.12,2.448-6.12,6.12v29.376C427.176,346.392,429.624,348.84,433.296,348.84z"/>
                                            <path d="M509.184,217.872c-3.672-3.672-8.567-4.896-13.464-4.896H367.2v-31.824c0-6.12-3.672-12.24-8.568-14.688L275.4,110.16
                                                V93.024h59.976c9.792,0,18.36-8.568,18.36-18.36V33.048c0-9.792-8.568-18.36-18.36-18.36h-61.2
                                                c-2.448-7.344-9.792-12.24-17.136-12.24c-9.792,0-18.36,8.568-18.36,18.36v12.24V73.44v36.72l-83.232,55.08
                                                c-4.896,3.672-8.568,8.568-8.568,14.688v31.824H18.36C8.568,212.976,0,220.32,0,231.336v39.168l0,0v222.769
                                                c0,9.792,8.568,18.359,18.36,18.359h477.36c9.792,0,18.36-8.567,18.36-18.359V270.504l0,0v-39.168
                                                C514.08,226.44,511.632,221.544,509.184,217.872z M183.6,190.944l73.44-48.96l73.44,48.96v40.392v39.168l0,0l0,0v204.408h-23.257
                                                v-85.68c0-28.152-23.256-50.185-50.184-50.185c-26.928,0-50.184,23.256-50.184,50.185v85.68H183.6V270.504V190.944z
                                                 M36.72,288.864h110.16v186.048H36.72V288.864z M477.36,474.912H367.2V288.864h110.16V474.912z"/>
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
                                <tr class="table-row-bg">
                                    <td>Elementary</td>
                                    <td>Bush Hill Elementary School</td>
                                    <td>PK-6</td>
                                    <td>472 Students</td>
                                </tr>
                                <tr class="table-row-bg">
                                    <td>Elementary</td>
                                    <td>Bush Hill Elementary School</td>
                                    <td>PK-6</td>
                                    <td>472 Students</td>
                                </tr>
                                <tr class="table-row-bg">
                                    <td>Elementary</td>
                                    <td>Bush Hill Elementary School</td>
                                    <td>PK-6</td>
                                    <td>472 Students</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-print-12">
                    <div class="para4 color4 text-center">
                        *Information should not be relied upon as it<br>
                        may be subject to change by Arlington County<br>
                        elementary school redistricting
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-print-12">
                    <hr class="style1 footer-top-line">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-5 col-print-5">
                    <div class="footerdiv1">
                        <div class="for-more-info">
                            For More Information:
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-print-3">
                                <div class="row">
                                    <img src="/img/your-image-here2.png" class="img-responsive" style="">
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-print-9">
                                <div class="row cline-info">
                                    SHOSHANNA TANNER, J.D., LL.M.<br>
                                    REALTOR® VA/DC<br>
                                    ACCREDITED STAGING PROFESSIONAL<br>
                                    202.957.9399<br>
                                    SHOSHANNA@COMPASS.COM
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-print-4">
                    <div class="footerdiv2">
                        <div class="footerdiv2-container colora">
                            <div class="client-logo-footer">
                                <img src="/img/client-logo.jpeg" class="img-responsive">
                            </div>
                            3001 Washington Blvd. Suite 400 Arlington, VA 22201
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-print-3">
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

@endsection