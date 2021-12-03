@extends('layouts.template')

@section('content')

<style type="text/css">
    .g-recaptcha{
        margin:20px 5px 15px;
    }
</style>


<!-- Page Header -->
<div class="page-header style-11">
    <div class="container">
        <h2 class="page-title">Contact Us</h2>
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li class="active">Contact Us</li>
        </ol>
    </div>
</div>
<!-- Page Header End -->
<div class="cps-main-wrap">
    <!-- FAQ -->
    <div class="cps-section cps-section-padding cps-gradient-bg" id="faq">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-xs-12">
                    <div class="cps-section-header text-center">
                        <h3 class="cps-section-title">Get in Touch</h3>
                        <p class="cps-section-text">We are eager to support, and answer any questions you may have.<br>Enter your query and we’ll get back to you shortly.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    @include('common.errors')
                    @include('common.success')

                    <form id="contactForm" class="cps-contact-form style-2" action="" method="post">
                    	{{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <input id="name" type="text" name="name" placeholder="Your Name"@if (isset($isLoggedIn) && $isLoggedIn === true) readonly="readonly" @endif value="{{ old('name',  isset($clientName) ? $clientName : null) }}" >
                                <input id="email" type="email" name="email" placeholder="Email" @if (isset($isLoggedIn) && $isLoggedIn === true) readonly="readonly" @endif value="{{ old('email',  isset($clientEmail) ? $clientEmail : null) }}">
                                <input id="phone" type="tel" name="phone" placeholder="Phone" value="{{old('phone')}}">
                            </div>
                            <div class="col-md-8 col-sm-6 text-center">
                                <textarea id="message" name="message" placeholder="Your Message Here">{{old('message')}}</textarea>
                                <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_SITE_KEY') }}"></div>
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </div>
                        <p class="input-success">Your message sent. Thanks for contacting.</p>
                        <p class="input-error">Sorry, something went wrong. try again later.</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- FAQ End -->
</div>

@endsection

@section('footer_script')
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
@endsection
