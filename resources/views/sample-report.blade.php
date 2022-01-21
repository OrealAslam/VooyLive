@extends('layouts.template')

<style type="text/css">
    .cps-pack-feature-list li ul{
        list-style: none;
        margin:0px;
        padding:0px;
    }
    .team-select-section span{
        position: relative;
        top:-5px;
        color:#000 !important;
        left: -4px;
    }
    .team-select-section .btn{
        margin:25px 0px 35px;
        padding: 0 11px !important;
    }
    .team-select-section .btn:hover{
        background: #EA2349 !important;
        color: #fff !important;
    }
    .btn.btn-primary, .btn.btn-primary:focus, .btn.btn-primary:visited, .btn.btn-primary:active, .btn.btn-primary:active:focus, .btn.btn-red:hover, .btn.btn-red:hover:focus, .btn.btn-red:hover:active, .btn.btn-red:hover:visited, .cps-banner.style-4, .cps-banner.style-14{
        border:1px solid #EA2349 !important;
    }
    #radioBtn .notActive{
        color: #3276b1;
        border:1px solid #EA2349;
        background-color: #fff;
    }
    .year-price{
        font-size:13px;
    }
    .logo-section{
        overflow:unset !important;
        padding-top:70px 0px !important;
    }
    .modal-content{
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        width: 100%;
        pointer-events: auto;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid rgba(0,0,0,.2);
        border-radius: .3rem;
        outline: 0;
    }
    .modal-header{
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: start;
        align-items: flex-start;
        -ms-flex-pack: justify;
        justify-content: space-between;
        padding: 1rem 1rem;
        border-bottom: 1px solid #dee2e6;
        border-top-left-radius: calc(.3rem - 1px);
        border-top-right-radius: calc(.3rem - 1px);
    }
    /* .mt-10 .my-10{
        margin-top: 24px!important;
    } */
    .mb-4, .my-4 {
        margin-bottom: 1.5rem!important;
    }
    @media (min-width: 768px){ 
        .d-md-flex {
            display: -ms-flexbox!important;
            display: flex!important;
        }
    }
    .row {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px;
    }
    .text-center {
        text-align: center!important;
    }
    .modal-title {
        margin-bottom: 0;
        line-height: 1.5;
    }
    .modal-dialog {
        position: relative;
        width: auto;
        margin: 0.5rem;
        pointer-events: none;
    }
    @media (min-width: 768px){
        .text-md-right {
            text-align: right!important;
        }
    }
    .text-center {
        text-align: center!important;
    }
    @media (min-width: 768px){
        .col-md-6 {
            -ms-flex: 0 0 50%;
            flex: 0 0 50%;
            max-width: 50%;
        }
    }
    .col-12 {
        -ms-flex: 0 0 100%;
        flex: 0 0 100%;
        max-width: 100%;
    }
    @media (min-width: 768px){
        .text-md-left {
            text-align: left!important;
        }
    }   
    .pt-md-0, .py-md-0 {
        padding-top: 0!important;
    }
    .pt-4, .py-4 {
        padding-top: 1.5rem!important;
    }
    .btn-modal-head-get {
        height: 46px;
        padding-top: 11px;
        padding-bottom: 11px;
    }
    .cfx-btn-large {
        padding: 15px 72px;
        font-weight: bold;
        border-radius: 4px;
        font-size: 18px;
        line-height: 24px;
        height: auto;
    }
    .cfx-run-vin-btn, .cfx-primary-btn, .cfx-get-report-btn, .btn-home-get-report {
        position: relative;
        margin-left: auto;
        margin-right: auto;
        height: 56px;
        width: auto;
        padding: 20px;
        border-radius: 4px;
        font-size: 18px;
        line-height: 1;
        appareance: none;
        border: none;
        color: #fff;
        background: #EA2349;
    }
    /* a:-webkit-any-link {
        color: -webkit-link;
        cursor: pointer;
        text-decoration: underline;
    } */
    /* body {
        margin: 0;
        font-family: Roboto,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        text-align: left;
        background-color: #fff;
    } */
</style>

@section('content')
<!-- Page Header -->
<div class="page-header style-11">
    <div class="container">
        <h2 class="page-title">Sample Report</h2>
        <ol class="breadcrumb">
            <li><a href="{{ Route('home') }}">Home</a></li>
            <li class="active">Sample Report</li>
        </ol>
    </div>
</div>
<!-- Page Header End -->
 <div class="cps-main-wrap">
    
    <div class="cps-section cps-section-padding cps-gray-bg">
        <div class="container">
            <h3 class="text-center">
                Community Feature Sheet®
                <span style="white-space: nowrap;">Sample Report</span>
            </h3>
            <div class="row" style="margin-top: 20px;">
                <div class="col-sm-6 col-xs-12">
                      <img class="img-responsive" src="{{ asset('img/products/classic.png')}}" alt="Report">
                </div>
                <div class="col-sm-6 col-xs-12 xs-bottom-30 text-center">
                    <h4 class="cps-subsection-title">Select the report you would like to view:</h4>
                    <div class="">
                        <button type="button" title="Community Feature Sheet® Classic" class="btn btn-primary btn-square" style="background:#EA2349;color:#fff;margin-top:10px;font-size:2rem;" data-toggle="modal" data-target="#classicModal">Community Feature Sheet® Classic</button>
                    </div>
                    <div class="">
                        <button type="button" title="Community Feature Sheet® Classic" class="btn btn-primary btn-square" style="background:#EA2349;color:#fff;margin-top:10px;font-size:2rem;padding: 0 38px;" data-toggle="modal" data-target="#metroModal">Community Feature Sheet® Metro</button>
                    </div>                  
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal -->
    <div id="classicModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title text-center mx-auto" style="width:100%">
                    <div class="d-none d-md-flex row">
                        <div class="col-md-6 text-center text-md-right" style="margin-top:20px!important;">
                            Ready to buy a Community Feature Sheet® report?
                        </div>
                        <div class="col-md-6 text-center text-md-left">
                            <a id="getReport" class="btn btn-primary btn-square" style="background:#EA2349;color:#fff;margin-top:10px;font-size:2rem;" href="#" title="Get Report">Get Report</a>
                        </div>
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <img class="img-responsive" src="{{ asset('img/products/classic.jpg')}}" alt="Classic Report">
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div> -->
            </div>
        </div>
    </div>
    <div id="metroModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title text-center mx-auto" style="width:100%">
                    <div class="d-none d-md-flex row">
                        <div class="col-md-6 text-center text-md-right" style="margin-top:20px!important;">
                            Ready to buy a Community Feature Sheet® report?
                        </div>
                        <div class="col-md-6 text-center text-md-left">
                            <a id="getReport" class="btn btn-primary btn-square" style="background:#EA2349;color:#fff;margin-top:10px;font-size:2rem;" href="#" title="Get Report">Get Report</a>
                        </div>
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <img class="img-responsive" src="{{ asset('img/products/metro.jpg')}}" alt="Metro Report">
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div> -->
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer_script')
<script type="text/javascript">    
    $(document).ready(function () {
        $('#classicModal').modal('show');
    });
</script>
@endsection