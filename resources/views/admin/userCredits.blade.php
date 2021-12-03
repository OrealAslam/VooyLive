@extends('layouts.adminLayout')

@section('content')

    <table class="table table-bordered">
        <thead>
        <th>Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Credits Get</th>
        <th>Credits Used</th>
        <th>Credits Balance</th>
        <th>Plan</th>
        <th>Status</th>
        <th>Type</th>
        <th>Action</th>
        </thead>
        @foreach(\App\User::where('role','client')->get() as $user)
            <tr>
                <td>{{$user->userId}}</td>
                <td>{{$user->firstName}}</td>
                <td>{{$user->lastName}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->getPositiveCredits()}}</td>
                <td>{{$user->getNegativeCredits()}}</td>
                <td>{{$user->getBalanceCredits()}}</td>
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
                @if ($user->verified == 1)
                    @if($user->subscribed('main'))
                        @if($user->subscription('main')->onTrial())
                            <td>Trial</td>
                        @else
                            <td>Paid</th>
                        @endif
                    @else
                        <td>N/A</td>
                    @endif
                @else
                    <td>N/A</td>
                @endif
                <td>
                    <a href="{{route('userCreditsDetail',['userId' => $user->userId])}}" class="btn btn-primary">View</a>
                    <a href="{{route('userCreditsUpsert',['userId' => $user->userId])}}" class="btn btn-success">Add</a>
                </td>
            </tr>
            @endforeach
    </table>

    @stop
    
@section('pageLevelJS')
 <script type="text/javascript">
  /*
  $(".remove-customer").click(function(e){
    e.preventDefault();
    if(confirm("Are you sure want to remove?")){
      $(this).parent("form").submit();
    }
  });
  */
</script>
@stop