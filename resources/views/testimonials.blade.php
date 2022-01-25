@extends('layouts.template')
@section('content')

<!-- Page Header -->
<div class="page-header style-11">
    <div class="container">
        <h2 class="page-title">{{__('testimonials.testimonials')}}</h2>
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">{{__('testimonials.home')}}</a></li>
            <li class="active">{{__('testimonials.testimonials')}}</li>
        </ol>
    </div>
</div>
<!-- Page Header End -->
<div class="cps-main-wrap">
    
    <!-- Testimonial -->
    <div class="cps-section cps-section-padding cps-gray-bg cps-testimonial style-3">
        <div class="container">
            <div class="cps-testimonials-wrap">
                <div class="owl-carousel testimonial-carousel" id="testimonial-carousel-2">
                    @if(!empty($testimonial))
                        @foreach($testimonial as $key=>$value)
                            <div class="cps-testimonial-item">
                                <div class="cps-commenter-pic">
                                    <img src="{{ asset('upload/testimonial/'.$value->image) }}" alt="...">
                                </div>
                                <blockquote>
                                    <h5 class="title-testimonial">{{ $value->title }}</h5>
                                    {{ $value->description }}
                                </blockquote>
                                <h5 class="cps-reviewer-name">{{ $value->name }}</h5>
                                <p class="cps-reviewer-company">{{ $value->designation }}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
    
    @include('sub_views.getstarted')

</div>

@endsection