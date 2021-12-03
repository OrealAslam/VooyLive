@extends('layouts.adminLayout')

@section('content')
    @if(Session::has('status'))
        <div class="alert alert-danger">{{Session::pull('status')}}</div>
    @endif
    <div class="row">
    	<div class="col-xs-12">
	        @include('common.errors')
	        @include('common.success')
			<form class="form-inline" action="{{URL::route('registerLinks')}}" method="post">
				{{csrf_field()}}
				<div class="form-group">
	                <select class="form-control" name="plan">
	                	<option value="" selected="selected">- Select Plan -</option>
	                    @foreach(App\Plan::where('status',1)->get() as $plan)
	                        @if(strpos($plan->planId, Config::get('app.30DayTrialString')) !== false)
	                            <option value="{{ $plan->planId }}">{{$plan->name}}</option>
	                        @endif
	                    @endforeach
	                </select>
				</div>
				<button type="submit" class="btn btn-primary">Create Link</button>
			</form>
		</div>
	</div>
	<br>
	<br>
<div class="row">
    	<div class="col-xs-12">
    <table class="table table-bordered">
        <thead>
            <th>Id</th>
            <th>Link</th>
            <th>Status</th>
            <th>Plan</th>
            <th>Created At</th>
            <th>Updated At</th>
        </thead>
        <tbody>
            @foreach($records as $record)
            <tr class="{{($record->status == 'used') ? 'success' : ''}}">
                <td>{{ $record->id }}</td>
                {{--url('/register?plan_id='.$record->link)--}}
                {{--route('register', ['plan' => $record->link])--}}
                <td>{{route('register').'?plan='.$record->link}}</td>
                <td class="text-capitalize">{{ $record->status }}</td>
                <td>{{ $allPlans[$record->plan_id] }}</td>
                <td>{{ $record->created_at }}</td>
                <td>{{ $record->updated_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <div class="pull-left">
            Total Records = {{ $total_records }}
        </div>
        <div class="pull-right">
            {{ $records->links() }}
        </div>
    </div>
</div>
</div>
@stop