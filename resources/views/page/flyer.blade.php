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

<div class="flyer">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <hr class="style1 margin5">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="row">
                    <div class="client-logo">
                        <img src="/img/flyer/client-logo.jpg" class="img-responsive">
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9">
                <div class="row">
                    <div class="welcome-text text-right font-raleway color1">
                        WELCOME TO THE LAWRENCE MARKET AREA!
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="address1 font-raleway color2 text-editable">
                        320 Richmond St East Suite 1014
                        <span class="edit"><a href="#"><i class="fa fa-pencil"></i></a></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="row">
                    <div class="address2 font-raleway color2 text-editable">
                        Toronto, ON M5A 2R3
                        <span class="edit"><a href="#"><i class="fa fa-pencil"></i></a></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="row">
                    <div class="list-price font-raleway text-right color2 text-editable">
                        LIST PRICE: $679,900
                        <span class="edit"><i class="fa fa-pencil"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <hr class="style2 margin15">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="big-image">
                        <img src="/img/flyer/img1.jpg" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <hr class="style1 margin15">
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="row">
                    <div class="three-images-img1">
                        <img src="/img/flyer/img2.jpg" class="img-responsive">
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="row">
                    <div class="three-images-img2">
                        <img src="img/flyer/img3.jpg" class="img-responsive">
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="row">
                    <div class="three-images-img3">
                        <img src="/img/flyer/img4.jpg" class="img-responsive">
                    </div>
                </div>
            </div>  
        </div>
        <div class="row pageBreakAfter">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <hr class="style2 margin15">
                </div>
            </div>
        </div>
        <div class="row page2-section1">
            <div class="col-lg-3 col-md-3 col-sm-3 div1">
                <div class="row">
                    <div class="two-images-img1">
                        <img src="/img/flyer/img5.jpg" class="img-responsive">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 div2">
                <div class="row">
                    <div class="two-images-img2">
                        <img src="/img/flyer/img6.jpg" class="img-responsive">
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 div3 font-raleway property-info text-center background1">
                <div class="row color3 property-info-text">
                    2 BEDROOMS<br>
                    2 BATHROOMS<br>
                    825 sqft<br>
                    Plus Extra<br>
                    Large Balcony
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 font-raleway">
                        <div class="row">
                            <div class="for-sale text-center color3 background2">
                                FOR SALE
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 font-raleway">
                        <div class="row">
                            <div class="verticle-image">
                                <img src="/img/flyer/img7.jpg" class="img-responsive">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 font-raleway">
                <div class="row home-detail-container">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="row">
                            <div class="home-details color4">
                                HOME DETAILS
                            </div>
                        </div>
                        <div class="row">
                            <hr class="style3">
                            <div class="col-lg-2 col-md-2 col-sm-2 overview color3 background1">
                                OVERVIEW
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-10">
                                <div class="row overview-text">
                                    Welcome to The Modern! Stunning Corner Suite And Fully Upgraded, Split 2 Bedroom 2 Bathroom Functional Layout. This Stylish Condo Boasts Expansive Windows With An Abundance Of Natural Light And Gorgeous City Sunset Views! Hardwood Floors Throughout, Quartz Countertops And Modern European Style Kitchen Appliances. Features An Extra Large Private Balcony. Steps To St Lawrence Market, King East Design District, Distillery & Financial District, Streetcar And Subway. One parking space included
                                </div>
                            </div>
                            <div class="clearfix">
                            </div>
                        </div>

                        <div class="row">
                            <hr class="style4">
                            <div class="col-lg-2 col-md-2 col-sm-2 features color3 background2">
                                FEATURES
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-10">
                                <div class="row features-text">
                                    Full Time Concierge<br>
                                    Fully Equipped Gym<br>
                                    Rooftop Terrace With BBQ’s<br>
                                    Rooftop Pool & Hot Tub<br>
                                    Steam Sauna<br>
                                    Lots Of Visitor Parking<br>
                                </div>
                            </div>
                            <div class="clearfix">
                            </div>
                        </div>
                        <div class="row">
                            <div class="footer">
                                &copy 2018 by VOOY MARKETING INC. All rights reserved.<br>
                                No part of this document may be reproduced or transmitted in any form or by any means, electronic, mechanical, photocopying, recording, or otherwise, without prior written permission of VOOY MARKETING INC. This feature sheet has been prepared solely for general information purposes only. The publisher and agent(s) are not liable for errors or  omissions. No warranties or representations are made of any kind.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 for-more-info background3">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 font-raleway text-center color3">
                        FOR MORE INFORMATION
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 client-image">
                        <img src="img/flyer/client-image.jpg" class="img-responsive">
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 font-raleway">
                        <div class="more-info">
                            <p class="color3">SHAUNA YLAGAN</p>
                            <p class="color3">CELL: 780-938-3146</p>
                            <p class="email color3">SHAUNA@ACELANGEHOMES.COM</p>
                        </div>
                    </div>
                </div>
                <div class="row to-order-container">
                    <div class="to-order">
                        <p class="color3">TO ORDER A PROPERTY FEATURE SHEET, VISIT</p>
                        <p class="color3">WWW.VOOYMARKETINGINC.COM</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-5">
                        <div class="row img8">
                            <img src="/img/flyer/img8.jpg" class="img-responsive">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-7">
                        <div class="row img9">
                            <img src="/img/flyer/img9.jpg" class="img-responsive">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection