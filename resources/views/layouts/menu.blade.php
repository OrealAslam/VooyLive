@inject('category', 'App\Category')
@php
$cat = $category->orderBy('type','asc')->first();
@endphp
<ul class="nav navbar-nav navbar-right">
@if (Auth::guest())
    <!-- <li><a href="{{-- url('/') --}}">Home</a></li> -->
    <!-- <li><a href="{{-- Route('page.hdi') --}}">HDI</a></li> -->
    <li><a href="{{ url('/about') }}">{{__('layouts_menu.about')}}</a></li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <span id="selected">{{__('layouts_menu.products')}}</span><span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="{{ url('/productdetail') }}">{{__('layouts_menu.communityfeaturesheet')}}</a></li>
            <li><a href="{{ route('property.feature.sheets.detail') }}">{{__('layouts_menu.propertyfeaturesheet')}}</a></li>
            <li><a href="{{ route('home.details.infographic.detail') }}">{{__('layouts_menu.homedetailinfographic')}}</a></li>
            <li><a href="{{ route('survey-detail') }}">{{__('layouts_menu.REALTORSmarketsentimentsurvey')}}</a></li>           
        </ul>
    </li>
    <!-- <li><a href="{{-- url('/productdetail') --}}">Product Details</a></li> -->
    <!-- <li><a href="{{-- url('/faqs') --}}">FAQs</a></li> -->
    <!-- <li><a href="{{-- url('/termsconditions') --}}">Terms & Conditions</a></li> -->
    <!-- <li><a href="{{-- url('/pricing') --}}">{{-- config('app.trial_period') --}} Days Free</a></li> -->
    <li><a href="{{ url('/pricing') }}">{{__('layouts_menu.pricing')}}</a></li>
    <li><a href="{{ route('blog') }}">{{__('layouts_menu.blog')}}</a></li>
    <li><a href="{{ url('/login') }}">{{__('layouts_menu.signin')}}</a></li>
    <li class="try-it"><a href="{{ url('/register') }}">{{__('layouts_menu.register')}}</a></li>
@else

    <li><a href="{{Route('user.refer-a-colleague')}}" style="color: #ea2349;font-weight: bold;">{{__('layouts_menu.getafreereport')}}</a></li>       
    <li><a href="{{Route('dashboard')}}">{{__('layouts_menu.dashboard')}}</a></li>       
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{__('layouts_menu.myaccount')}} <b class="caret"></b> </a>
        <ul class="dropdown-menu">
            <li><a href="{{ url('/account/password') }}">{{__('layouts_menu.changepassword')}}</a></li>
            <li><a href="{{ Route('profileview') }}">{{__('layouts_menu.profile')}}</a></li>
            @if(Auth::User()->parent_id == NULL || Auth::User()->user_type == 1)
                <li><a href="{{ url('/account/manage') }}">{{__('layouts_menu.manageaccount')}}</a></li>
            @endif
            <!-- <li><a href="{{ url('/account/updateCard') }}">{{__('layouts_menu.updateCreditCard')}}</a></li> -->
            <li><a href="{{ url('/account/transactions') }}">{{__('layouts_menu.myCFSreports')}}</a></li>
            <li><a href="{{ Route('flyers-list') }}">{{__('layouts_menu.myPFSreports')}}</a></li>
            <li><a href="{{ Route('hdis-list') }}">{{__('layouts_menu.myHDIreports')}}</a></li>
            <li><a href="{{ route('my.surveys') }}">{{__('layouts_menu.mysurveys')}}</a></li>
            @if(Auth::User()->parent_id == NULL || Auth::User()->user_type == 1)
                <li><a href="{{ Route('user.invoices') }}">{{__('layouts_menu.myinvoices')}}</a></li>
                <li><a href="{{ Route('user.referrals-list') }}">{{__('layouts_menu.myreferral')}}</a></li>
                <li><a href="{{ Route('user.credits-list') }}">{{__('layouts_menu.mycredits')}}</a></li>
            @endif

            @if(auth::user()->user_type == 1)
                <li><a href="{{ Route('users.list') }}">{{__('layouts_menu.users')}}</a></li>
            @endif
            
            <!--
            <li><a href="{{ url('/account/recharge') }}">{{__('layouts_menu.recharge')}}</a></li> -->           
        </ul>
    </li>
    @yield('nav')
    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          {{__('layouts_menu.logout')}}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
          </form>
    </li>
    @if (Auth::user()->role == 'admin')
        <li><a href="{{Route('adminDashboard')}}">{{__('layouts_menu.admindashboard')}}</a></li>
    @endif
    @if (!isset($hide_top_address_search))
    @if (!Auth::user()->role == 'admin')
    <li>
        <div class="create_report_main account-form">
            <div class="form-group">
                <input type="text" class="form-control" id="address" name="address">
                <span class="input-group-addon" style="cursor: pointer;" id="clearInput">x</span>
                <div class="clearfix"></div>
            </div>
        </div>
    </li>
    @endif
    @endif
@endif
<!-- <ul class="text-right cart-button-head">
    <li>
        <a><span class="quantity"></span> item(s) - $ <span class="total"></span> <i class="fa fa-shopping-cart"></i></a>
    </li>
    <div class="append-data-cart">
            
    </div>
</ul> -->
@if (App::isLocale('fr'))
<li><a href="{{url('en')}}">En</a></li>
@endif
@if (App::isLocale('en'))
<li><a href="{{url('fr')}}">Fr</a></li>
@endif

</ul>