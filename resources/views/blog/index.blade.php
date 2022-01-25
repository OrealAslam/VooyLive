@extends('layouts.template')

<style type="text/css">
    
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
                    <article class="post">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-6">
                                <a class="post-thumb" href="blog-single.html">
                                    <img class="img-responsive" src="{{ asset('images/blog/l1.jpg')}}" alt="Blog Image">
                                </a>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-6">
                                <div class="post-content">
                                    <h4 class="post-title"><a href="blog-single.html">First Firework in New York City</a></h4>
                                    <p class="post-date">25 December 2018</p>
                                    <p class="post-excerpt">Lorem ipsum dolor sit amet, consectetur adipisicing sed do eiusmod tempor incididunt ut labore </p>
                                    <a class="post-readmore" href="blog-single.html">Read More...</a>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="post">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-6">
                                <a class="post-thumb" href="blog-single.html">
                                    <img class="img-responsive" src="{{ asset('images/blog/l1.jpg')}}" alt="Blog Image">
                                </a>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-6">
                                <div class="post-content">
                                    <h4 class="post-title"><a href="blog-single.html">First Firework in New York City</a></h4>
                                    <p class="post-date">25 December 2018</p>
                                    <p class="post-excerpt">Lorem ipsum dolor sit amet, consectetur adipisicing sed do eiusmod tempor incididunt ut labore </p>
                                    <a class="post-readmore" href="blog-single.html">Read More...</a>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="post">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-6">
                                <a class="post-thumb" href="blog-single.html">
                                    <img class="img-responsive" src="{{ asset('images/blog/l1.jpg')}}" alt="Blog Image">
                                </a>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-6">
                                <div class="post-content">
                                    <h4 class="post-title"><a href="blog-single.html">First Firework in New York City</a></h4>
                                    <p class="post-date">25 December 2018</p>
                                    <p class="post-excerpt">Lorem ipsum dolor sit amet, consectetur adipisicing sed do eiusmod tempor incididunt ut labore </p>
                                    <a class="post-readmore" href="blog-single.html">Read More...</a>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="post">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-6">
                                <a class="post-thumb" href="blog-single.html">
                                    <img class="img-responsive" src="{{ asset('images/blog/l1.jpg')}}" alt="Blog Image">
                                </a>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-6">
                                <div class="post-content">
                                    <h4 class="post-title"><a href="blog-single.html">First Firework in New York City</a></h4>
                                    <p class="post-date">25 December 2018</p>
                                    <p class="post-excerpt">Lorem ipsum dolor sit amet, consectetur adipisicing sed do eiusmod tempor incididunt ut labore </p>
                                    <a class="post-readmore" href="blog-single.html">Read More...</a>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="post">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-6">
                                <a class="post-thumb" href="blog-single.html">
                                    <img class="img-responsive" src="{{ asset('images/blog/l1.jpg')}}" alt="Blog Image">
                                </a>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-6">
                                <div class="post-content">
                                    <h4 class="post-title"><a href="blog-single.html">First Firework in New York City</a></h4>
                                    <p class="post-date">25 December 2018</p>
                                    <p class="post-excerpt">Lorem ipsum dolor sit amet, consectetur adipisicing sed do eiusmod tempor incididunt ut labore </p>
                                    <a class="post-readmore" href="blog-single.html">Read More...</a>
                                </div>
                            </div>
                        </div>
                    </article>
                    <nav class="navigation post-pagination" role="navigation">
                        <div class="nav-links">
                            <a class="prev page-numbers" href="#"><i class="fa fa-angle-double-left"></i></a>
                            <span class="page-numbers current">1</span>
                            <a class="page-numbers" href="#">2</a>
                            <a class="page-numbers" href="#">3</a>
                            <a class="page-numbers" href="#">4</a>
                            <a class="page-numbers" href="#">5</a>
                            <a class="next page-numbers" href="#"><i class="fa fa-angle-double-right"></i></a>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="col-lg-3 col-lg-offset-1 col-md-4 col-sm-5 col-xs-12">
                <div class="sidebar">
                    <aside class="widget search_widget">
                        <form id="sidebarSearch" class="sidebar-search" action="#" method="post">
                            <input type="search" placeholder="Search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </aside>
                    <aside class="widget category_widget">
                        <h4 class="widget-title">Categories</h4>
                        <ul class="categories">
                            <li><a href="#">Business (10)</a></li>
                            <li><a href="#">Software (25)</a></li>
                            <li><a href="#">Web Development (12)</a></li>
                            <li><a href="#">Android Apps (08)</a></li>
                            <li><a href="#">Web UI Design (35)</a></li>
                        </ul>
                    </aside>
                    <aside class="widget post_widget">
                        <h4 class="widget-title">Recent Posts</h4>
                        <div class="recent-posts">
                            <div class="recent-post">
                                <a class="recent-post-thumb" href="blog-single.html">
                                    <img class="img-responsive" src="{{ asset('images/blog/s1.jpg')}}" alt="Post Title">
                                </a>
                                <a class="post-title" href="blog-single.html">First Fireworks in New York City</a>
                                <div class="clearfix"></div>
                            </div>
                            <div class="recent-post">
                                <a class="recent-post-thumb" href="blog-single.html">
                                    <img class="img-responsive" src="{{ asset('images/blog/s1.jpg')}}" alt="Post Title">
                                </a>
                                <a class="post-title" href="blog-single.html">First Fireworks in New York City</a>
                                <div class="clearfix"></div>
                            </div>
                            <div class="recent-post">
                                <a class="recent-post-thumb" href="blog-single.html">
                                    <img class="img-responsive" src="{{ asset('images/blog/s1.jpg')}}" alt="Post Title">
                                </a>
                                <a class="post-title" href="blog-single.html">First Fireworks in New York City</a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </aside>
                    <aside class="widget tag_widget">
                        <h4 class="widget-title">Tag</h4>
                        <div class="tags">
                            <a href="#">Business</a>
                            <a href="#">Web Application</a>
                            <a href="#">Design</a>
                            <a href="#">Development</a>
                            <a href="#">iOS</a>
                            <a href="#">Android</a>
                            <a href="#">Interface</a>
                            <a href="#">Apps</a>
                        </div>
                    </aside>
                    <aside class="widget subscribe_widget">
                        <h4 class="widget-title">Subscribe</h4>
                        <label>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do</label>
                        <form id="widgetSubscription" class="widget-subscription">
                            <input type="email" name="email" placeholder="Enter your email here">
                            <button type="submit"><i class="fa fa-paper-plane"></i></button>
                            <p class="newsletter-success"></p>
                            <p class="newsletter-error"></p>
                        </form>
                    </aside>
                    <aside class="widget social_profile_widget">
                        <h4 class="widget-title">Follow us in Social</h4>
                        <div class="widget-social">
                            <a href="{!! getSettingValue('facebook-link')  !!}"><i class="fa fa-facebook"></i></a>
                            <!-- <a href="{!! getSettingValue('twitter-link')  !!}"><i class="fa fa-twitter"></i></a> -->
                            <a href="{!! getSettingValue('instagram-link')  !!}"><i class="fa fa-instagram"></i></a>
                            <a href="{!! getSettingValue('linkedin-link')  !!}"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <a id="button-scroll"></a>
    <footer class="style-5">
        @include('layouts.footer')
    </footer>
</div>

@endsection
