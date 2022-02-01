@extends('layouts.template')
@section('title', 'News & Blog')
<style>
    .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
        z-index: 3!important;
        color: #fff!important;
        cursor: default!important;
        background-color: #EA2349!important;
        border-color: #EA2349!important;
    }
    .pagination>li>a, .pagination>li>span {
        margin-top: 50px!important;
        position: relative!important;
        float: left!important;
        padding: 6px 12px!important;
        margin-left: -1px!important;
        line-height: 1.42857143!important;
        color: #EA2349!important;
        text-decoration: none!important;
        background-color: #fff!important;
        border: 1px solid #ddd!important;
    }
</style>
@section('content')
<!-- Page Header -->
<div class="page-header style-11">
    <div class="container">
        <h2 class="page-title">News & Blog</h2>
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
                <div class="mainbar post-list">
                    @foreach ($posts as $post)
                    <article class="post">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-6">
                                <a class="post-thumb" href="{{ route('post.view',$post->id) }}">
                                    <img class="img-responsive" src="{{ asset('upload/blog/'.$post->image.'') }}" alt="{{ $post->title }}">
                                </a>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-6">
                                <div class="post-content">
                                    <h4 class="post-title"><a href="{{ route('post.view',$post->id) }}">{{ $post->title }}</a></h4>
                                    <p class="post-date">{{ $post->created_at->format('j F Y') }}</p>
                                    <p class="post-excerpt">{!! Str_limit($post->description, 100, '...') !!} </p>
                                    <a class="post-readmore" href="{{ route('post.view',$post->id) }}">Read More</a>
                                </div>
                            </div>
                        </div>
                    </article>
                    @endforeach
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
@endsection