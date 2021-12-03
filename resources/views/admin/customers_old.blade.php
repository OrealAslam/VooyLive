@extends('layouts.adminLayout')

@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel" style="overflow: auto;">
      <div class="x_title">
        <h2>Old Customer</h2>
        <div class="clearfix"></div>
      </div>
        <div class="x_content">
            <table class="table table-bordered">
                <thead>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Region</th>
                <th>Created</th>
                <th>Plan</th>
                <th>Status</th>
                <th>Type</th>
                <th>Activate</th>
                <th>Renew At</th>
                <th>Expired</th>
                <th>Action</th>
                </thead>
                @foreach(\App\User::where('role','client')->orderBy('userId', 'desc')->get() as $user)
                    <tr>
                        <td>{{$user->userId}}</td>
                        <td>{{$user->firstName}}</td>
                        <td>{{$user->lastName}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role}}</td>
                        <td>{{isset($cityArray[$user->region]) ? $cityArray[$user->region] : ''}}</td>
                        <td>{{\Carbon\Carbon::parse($user->created_at)->format('Y-m-d')}}</td>
                        <td>
                            @if($planDetail = \App\Plan::where('planId',$user->plan)->first())
                                {{$planDetail->name}}
                            @else
                                N/A
                            @endif
                        </td>
                        @if ($user->verified == 1)
                            @if($user->subscribed('main'))
                                @if($user->subscription('main')->onGracePeriod())
                                    <td class="danger">Grace Period</td>
                                @else
                                    <td class="success">Active</td>
                                @endif
                            @else
                                @if($user->verified == 1 && !is_null($user->subscription('main')) && $user->subscription('main')->cancelled())
                                    <td class="danger">Canceled</td>
                                @else
                                    <td>N/A</td>
                                @endif
                            @endif
                        @else
                            <td class="info">Not Verified</td>
                        @endif
                        @if ($user->verified == 1  && !is_null($user->subscribed('main')))
                            @if($user->subscribed('main'))
                                @if($user->subscription('main')->onTrial())
                                    <td>Trial</td>
                                    <td>{{\Carbon\Carbon::parse($user->subscription('main')->created_at)->format('Y-m-d')}}</td>
                                    <td>{{\Carbon\Carbon::parse($user->subscription('main')->renews_at)->format('Y-m-d')}}</td>
                                    <td>{{\Carbon\Carbon::parse($user->subscription('main')->trial_ends_at)->format('Y-m-d')}}</td>
                                @else
                                    <td>Paid</th>
                                    <td>{{\Carbon\Carbon::parse($user->subscription('main')->created_at)->format('Y-m-d')}}</td>
                                    <td>{{\Carbon\Carbon::parse($user->subscription('main')->renews_at)->format('Y-m-d')}}</td>
                                    <td>{{ !empty($user->subscription('main')->ends_at) ? \Carbon\Carbon::parse($user->subscription('main')->ends_at)->format('Y-m-d') : ''}}</td>
                                @endif
                            @else
                                <td>N/A</td>
                                <td>N/A</td>
                                <td>N/A</td>
                                <td>{{ !empty($user->subscription('main')->ends_at) ? \Carbon\Carbon::parse($user->subscription('main')->ends_at)->format('Y-m-d') : ''}}</td>
                            @endif
                        @else
                            <td>N/A</td>
                            <td>N/A</td>
                            <td>N/A</td>
                            <td>N/A</td>
                        @endif
                        <td>
                        <form action="{{ url('admin/customers/'.$user->userId) }}" method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                            {!! csrf_field() !!}


                            <a href="{{action('AdminController@editCustomer',$user->userId)}}" class="btn btn-primary"><li class="fa fa-edit"></li></a>
                            <a href="{{action('AdminController@updateCustomerPlan',$user->userId)}}" class="btn btn-info"><li class="fa fa-pencil"></li></a>
                            <button class="btn btn-danger remove-customer" type="submit"><span class="fa fa-remove"></span></button>
                            <a href="{{action('AdminController@customerDetail',$user->userId)}}" class="btn btn-success">View</a>
                            @if(isset($user->email_token) && !empty($user->email_token))
                            <a target="_blank" href="{{URL::route('verifyEmail', ['token' => $user->email_token])}}" class="btn btn-info">Verify Email</a>
                            @else
                            <a href="{{route('userLoginAs',['userId' => $user->userId])}}" class="btn btn-success">Login As</a>
                            @endif
                            
                        </form>
                        </td>
                    </tr>
                    @endforeach
            </table>
        </div>
    </div>
</div>
</div>
@endsection
    
@section('pageLevelJS')
 <script type="text/javascript">
  $(".remove-customer").click(function(e){
    e.preventDefault();
    if(confirm("Are you sure want to remove?")){
      $(this).parent("form").submit();
    }
  });
</script>
@stop