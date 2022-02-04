<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Admin Panel</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap -->

    <link href="{{asset('vend/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('vend/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('vend/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('vend/iCheck/skins/flat/green.css')}}" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{{asset('vend/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{asset('vend/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('vend/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <link href="{{asset('vend/bootstrap-sweetalert/sweet-alert.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('build/css/custom.min.css')}}" rel="stylesheet">

    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">

    @yield('pageLevelCSS')

</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="{{route('adminDashboard')}}" class="site_title"><i class="fa fa-paw"></i> <span>Admin Panel</span></a>
                </div>
                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <!-- /menu profile quick info -->
                <br />
                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <li><a href="{{action('AdminController@customerList')}}"><i class="fa fa-home"></i>Customers</a>
                            </li>
                            <!-- <li><a href="{{action('AdminController@oldCustomerList')}}"><i class="fa fa-home"></i>Old Customers</a>
                            </li> -->
                            <li><a href="{{action('AdminController@plans')}}"><i class="fa fa-edit"></i>Plans</a>
                            </li>
                            <li><a href="{{action('AdminController@cfsSales')}}"><i class="fa fa-desktop"></i> CFS Sales </a>
                            </li>
                            <li><a href="{{action('AdminController@pfsSales')}}"><i class="fa fa-desktop"></i> PFS Sales </a>
                            </li>
                            <li><a href="{{action('AdminController@hdiSales')}}"><i class="fa fa-desktop"></i> HDI Sales </a>
                            </li>
                            <li><a href="{{action('AdminController@userCredits')}}"><i class="fa fa-desktop"></i> Credits </a>
                            </li>
                            <li><a href="{{action('AdminController@weekly')}}"><i class="fa fa-table"></i> Weekly</a>
                            </li>
                            <li><a href="{{action('AdminController@discounts')}}"><i class="fa fa-bar-chart-o"></i> Discounts</a>
                            </li>
                            <!-- <li><a href="{{action('AdminController@viewEmailJobs')}}"><i class="fa fa-envelope"></i> View Email Logs</a></li>
                            <li><a href="{{action('AdminController@viewFailEmailJobs')}}"><i class="fa fa-envelope"></i> View Fail Email Logs</a></li> -->
                            <li><a href="{{route('registerLinks')}}"><i class="fa fa-envelope"></i> Special Register Link</a></li>
                            <li><a href="{{route('HdiIcons')}}"><i class="fa fa-picture-o"></i> Hdi Icons</a></li>
                            <li><a href="{{route('HdiIconTags')}}"><i class="fa fa-picture-o"></i> Hdi Icon Tags</a></li>
                            <li><a href="{{ route('categorys') }}"><i class="fa fa-list-alt" aria-hidden="true"></i>Categorys</a></li>
                            <li><a href="{{ route('products') }}"><i class="fa fa-product-hunt" aria-hidden="true"></i>Products</a></li>
                            <li><a href="{{ route('purches.products') }}"><i class="fa fa-product-hunt" aria-hidden="true"></i>Purchase Products</a></li>
                            <li><a href="{{ route('faq-question-title.index') }}"><i class="fa fa-question" aria-hidden="true"></i>FAQ</a></li>
                            <li><a href="{{ route('fr-faq-question-title.index') }}"><i class="fa fa-question" aria-hidden="true"></i>FR FAQ</a></li>
                            <li><a href="{{ route('subscribe.us.list') }}"><i class="fa fa-envelope-o" aria-hidden="true"></i>Subscribe Us</a></li>
                            <li><a href="{{ route('testimonial') }}"><i class="fa fa-quote-left" aria-hidden="true"></i>Testimonial</a></li>
                            <li><a href="{{ route('logo.index') }}"><i class="fa fa-picture-o" aria-hidden="true"></i>Logo</a></li>
                            <li><a href="{{ route('contactUs') }}"><i class="fa fa-phone" aria-hidden="true"></i>Contact Us</a></li>
                            <li><a href="{{ route('video') }}"><i class="fa fa-video-camera" aria-hidden="true"></i>Videos</a></li>
                            <li><a href="{{ route('blog.posts') }}"><i class="fa fa-newspaper-o" aria-hidden="true"></i>Blog Posts</a></li>
                            <li><a href="{{ route('blog.categories') }}"><i class="fa fa-list-alt" aria-hidden="true"></i>Blog Categories</a></li>
                            <li><a href="{{ route('blog.tags') }}"><i class="fa fa-tags" aria-hidden="true"></i>Blog Tags</a></li>
                            <li><a href="{{ route('profileColours') }}"><i class="fa fa-paint-brush" aria-hidden="true"></i>Profile Colours</a></li>
                            <li><a href="{{ route('surveyList') }}"><i class="fa fa-paint-brush" aria-hidden="true"></i>Survey</a></li>
                            <li><a href="{{ route('my.surveys.test') }}"><i class="fa fa-paint-brush" aria-hidden="true"></i>Survey Testing</a></li>
                            <li><a href="{{ route('ecard.categorys') }}"><i class="fa fa-paint-brush" aria-hidden="true"></i>Ecards Categories</a></li>
                            <li><a href="{{ route('ecard.photo') }}"><i class="fa fa-paint-brush" aria-hidden="true"></i>Ecards Photos</a></li>
                            <li><a href="{{route('smtp.settings')}}"><i class="fa fa-paint-brush" aria-hidden="true"></i>Smtp Settings</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">

                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout"   href="{{ route('logout') }}"  onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="images/img.jpg" alt="">
                                {{Auth::user()->firstName.' '.Auth::user()->lastName}}
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="{{ route('dashboard')}}" >Front Dashboard</a></li>
                                <li><a href="{{ route('adminUpdateProfile') }}" >Update Profile</a></li>
                                <li><a href="{{ route('setting') }}" >Setting</a></li>
                                <li><a href="{{ route('frsetting') }}" >FR Setting</a></li>
                                <li><a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green">{{\App\Notification::count()}}</span>
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                @foreach(\App\Notification::where('seen','no')->get() as $notification)
                                <li>
                                    <a>
                                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                        <span>
                          <span>{{$notification->name}}</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                        <span class="message">
                                            {{$notification->message}}
                        </span>
                                    </a>
                                </li>
                                @endforeach
                                <li>
                                    <a>
                                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                        <span>
                          <span>{{Auth::user()->firstName.' '.Auth::user()->lastName}}</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <div class="text-center">
                                        <a>
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <!-- top tiles -->
            @include('common.errors')
            @include('common.success')
            
            @yield('content')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Community Feature Sheet®
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="{{asset('vend/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('vend/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('vend/fastclick/lib/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{asset('vend/nprogress/nprogress.js')}}"></script>
<!-- Chart.js -->
<script src="{{asset('vend/Chart.js/dist/Chart.min.js')}}"></script>
<!-- gauge.js -->
<script src="{{asset('vend/gauge.js/dist/gauge.min.js')}}"></script>
<!-- bootstrap-progressbar -->
<script src="{{asset('vend/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('vend/iCheck/icheck.min.js')}}"></script>
<!-- Skycons -->
<script src="{{asset('vend/skycons/skycons.js')}}"></script>
<!-- Flot -->
<script src="{{asset('vend/Flot/jquery.flot.js')}}"></script>
<script src="{{asset('vend/Flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('vend/Flot/jquery.flot.time.js')}}"></script>
<script src="{{asset('vend/Flot/jquery.flot.stack.js')}}"></script>
<script src="{{asset('vend/Flot/jquery.flot.resize.js')}}"></script>
<!-- Flot plugins -->
<script src="{{asset('vend/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
<script src="{{asset('vend/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
<script src="{{asset('vend/flot.curvedlines/curvedLines.js')}}"></script>
<!-- DateJS -->
<script src="{{asset('vend/DateJS/build/date.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('vend/jqvmap/dist/jquery.vmap.js')}}"></script>
<script src="{{asset('vend/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
<script src="{{asset('vend/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{asset('vend/moment/min/moment.min.js')}}"></script>
<script src="{{asset('vend/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- highcharts -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<!-- Custom Theme Scripts -->
<script src="{{asset('build/js/custom.min.js')}}"></script>
<script src="{{asset('vend/bootstrap-sweetalert/sweet-alert.min.js')}}"></script>

<script src="{{ asset('js/select2.min.js') }}"></script>

<script type="text/javascript">
      //global variable
      var token = $('meta[name="csrf-token"]').attr('content');  
  </script>

@yield('pageLevelJS')

</body>
</html>
