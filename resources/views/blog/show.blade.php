@extends('layouts.template')
@section('title'){{ $post->title }}@endsection
@section('content')
<!-- Page Header -->
<div class="page-header style-11">
    <div class="container">
        <h2 class="page-title">{{ $post->title }}</h2>
        <ol class="breadcrumb">
            <li><a href="{{ Route('home') }}">Home</a></li>
            <li class="active">Blog</li>
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
                <div class="sidebar">
                    <aside class="widget search_widget">
                        <form action="{{ route('search') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="text" id="search" name="search" placeholder="Search for...." class="form-control typeahead">
                            </div>
                            <div class="text-center" style="margin-top: 10px;">
                                <button class="btn btn-primary btn-lg btn-block btn-square" style="background:#EA2349;color:#fff;font-size:3rem;" type="submit">Go</button>
                            </div>
                        </form>
                    </aside>
                    <aside class="widget category_widget">
                        <h4 class="widget-title">Categories</h4>
                        <ul class="categories">
                            @foreach ($categories as $category)
                            <li><a href="{{ route('category.posts',$category->id) }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </aside>
                    <aside class="widget post_widget">
                        <h4 class="widget-title">Recent Posts</h4>
                        <div class="recent-posts">
                            @foreach ($recentPosts as $recentPost)
                            <div class="recent-post">
                                <a class="recent-post-thumb" href="{{ route('post.view',$recentPost->id) }}">
                                    <img class="img-responsive" src="{{ asset('upload/blog/'.$recentPost->image.'') }}" alt="{{ $recentPost->title }}">
                                </a>
                                <a class="post-title" href="{{ route('post.view',$recentPost->id) }}" style="margin-top:auto!important;">{{ $recentPost->title }}</a>
                                <div class="clearfix"></div>
                            </div>
                            @endforeach
                        </div>
                    </aside>
                    <aside class="widget tag_widget">
                        <h4 class="widget-title">Tag</h4>
                        @foreach ($tags as $tag)
                        <div class="tags">
                            <a href="{{ route('tag.posts',$tag->id) }}">{{ $tag->name }}</a>
                        </div>
                        @endforeach
                    </aside>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer_script')
<script type="text/javascript">
    $( document ).ready(function() {    
        $( "#search" ).autocomplete({
            source: "{{ route('autocomplete') }}",
        });
    });
</script>
<script type="text/javascript">
    $( document ).ready(function() {    
        $("#share").jsSocials({
            shares: ["email", "twitter", "facebook", "linkedin", "pinterest"]
        });
    });
</script>
@endsection
