@inject('category', 'App\Category')
@php
$cat = $category->orderBy('type','asc')->first();
@endphp
<ul class="nav navbar-nav navbar-right">
@if (Auth::guest())
    <!-- <li><a href="{{-- url('/') --}}">Home</a></li> -->
    <!-- <li><a href="{{-- Route('page.hdi') --}}">HDI</a></li> -->
    <li><a href="{{ url('/about') }}">About</a></li>
    <!-- <li><a href="{{-- url('/productdetail') --}}">Product Details</a></li> -->
    <!-- <li><a href="{{-- url('/faqs') --}}">FAQs</a></li> -->
    <!-- <li><a href="{{-- url('/termsconditions') --}}">Terms & Conditions</a></li> -->
    <!-- <li><a href="{{-- url('/pricing') --}}">{{-- config('app.trial_period') --}} Days Free</a></li> -->
    <li><a href="{{ url('/pricing') }}">Pricing</a></li>
    <li><a href="{{ url('/login') }}">Sign In</a></li>
    <li class="try-it"><a href="{{ url('/register') }}">Register</a></li>
@else

    <li><a href="{{Route('user.refer-a-colleague')}}" style="color: #ea2349;font-weight: bold;">Get a Free Report</a></li>       
    <li><a href="{{Route('dashboard')}}">Dashboard</a></li>       
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">My Account <b class="caret"></b> </a>
        <ul class="dropdown-menu">
            <li><a href="{{ url('/account/password') }}">Change Password</a></li>
            <li><a href="{{ Route('profileview') }}">Profile</a></li>
            @if(Auth::User()->parent_id == NULL || Auth::User()->user_type == 1)
                <li><a href="{{ url('/account/manage') }}">Manage Account</a></li>
            @endif
            <!-- <li><a href="{{ url('/account/updateCard') }}">Update Credit Card</a></li> -->
            <li><a href="{{ url('/account/transactions') }}">My CFS Reports</a></li>
            <li><a href="{{ Route('flyers-list') }}">My PFS Reports</a></li>
            <li><a href="{{ Route('hdis-list') }}">My HDI Reports</a></li>
            <li><a href="{{ route('my.surveys') }}">My Surveys</a></li>
            @if(Auth::User()->parent_id == NULL || Auth::User()->user_type == 1)
                <li><a href="{{ Route('user.invoices') }}">My Invoices</a></li>
                <li><a href="{{ Route('user.referrals-list') }}">My Referral</a></li>
                <li><a href="{{ Route('user.credits-list') }}">My Credits</a></li>
            @endif

            @if(auth::user()->user_type == 1)
                <li><a href="{{ Route('users.list') }}">Users</a></li>
            @endif
            
            <!--
            <li><a href="{{ url('/account/recharge') }}">Recharge</a></li> -->           
        </ul>
    </li>
    @yield('nav')
    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
          </form>
    </li>
    @if (Auth::user()->role == 'admin')
        <li><a href="{{Route('adminDashboard')}}">Admin Dashboard</a></li>
    @endif
    @if (!isset($hide_top_address_search))
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
<!-- <ul class="text-right cart-button-head">
    <li>
        <a><span class="quantity"></span> item(s) - $ <span class="total"></span> <i class="fa fa-shopping-cart"></i></a>
    </li>
    <div class="append-data-cart">
            
    </div>
</ul> -->
</ul>