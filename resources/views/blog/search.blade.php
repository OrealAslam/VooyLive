@extends('layouts.template')
@section('title'){{ $post->title }}@endsection
@section('content')
<!-- Page Header -->
<div class="page-header style-11">
    <div class="container">
        <h2 class="page-title">{{__('blog/blog.blog_title')}}</h2>
        <ol class="breadcrumb">
            <li><a href="{{ Route('home') }}">{{__('blog/blog.home_title')}}</a></li>
            <li class="active">{{__('blog/blog.blog_title')}}</li>
        </ol>
    </div>
</div>
<!-- Page Header End -->
<div class="cps-main-wrap cps-section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-7 col-xs-12">
                <div class="mainbar post-single">
                    <article class="post">
                        <div class="post-thumb">
                            <img class="img-responsive" src="{{ asset('upload/blog/'.$post->image.'') }}" alt="{{ $post->title }}">
                        </div>
                        <p class="post-metas">
                            <span>Posted by: <a href="#">{{ $post->user->firstName }} {{ $post->user->lastName }}</a></span>
                            <span>{{ $post->created_at->format('j F Y') }}</span>
                            <span>Category: <a href="#">{{ $post->category->name }}</a></span>
                        </p>
                        <div class="post-entry">
                            {!! $post->description !!}
                        </div>
                        <div class="text-center" style="margin-top:10px;font-size:50px;font-weight:bold;">
                            Share it
                        </div>
                        <div class="post-share" id="share">
                            <!-- <a href="{!! getSettingValue('facebook-link')  !!}"><i class="fa fa-facebook"></i></a>
                            <a href="{!! getSettingValue('instagram-link')  !!}"><i class="fa fa-instagram"></i></a>
                            <a href="{!! getSettingValue('linkedin-link')  !!}"><i class="fa fa-linkedin"></i></a> -->
                        </div>
                    </article>
                </div>
            </div>
            <div class="col-lg-3 col-lg-offset-1 col-md-4 col-sm-5 col-xs-12">
                {!! $sidebar !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer_script')
<script type="text/javascript">
    $(document).ready(function() {
        $("#search").autocomplete({
            source: "{{ route('autocomplete') }}",
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#share").jsSocials({
            shares: ["email", "twitter", "facebook", "linkedin", "pinterest"]
        });
    });
</script>
@endsection