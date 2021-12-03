@extends('layouts.adminLayout')

@section('content')

<a href="{{route('userCredits')}}" class="pull-right btn btn-success" style="margin-right: 5%">User Credits</a>

<table class="table table-bordered">
    <thead>
        <th>Id</th>
        <th>Description</th>
        <th>Type</th>
        <th>Product</th>
        <th>Referred By</th>
        <th>Referred To</th>
        <th>Credit</th>
        <th>Dated</th>
    </thead>
    <tbody>
    @foreach($credits as $credit)
    <tr>
        <td>{{ $credit->id }}</td>
        <td>{{ $credit->descr }}</td>
        <td class="text-capitalize">{{ $credit->type }}</td>
        <td class="text-capitalize">{{ (!empty($credit->product)) ? $credit->product : '' }}</td>
        <td>{{ (!empty($credit->referred_by) && $credit->ReferredBy) ? $credit->ReferredBy->email : ''}}</td>
        <td>{{ (!empty($credit->referred_to) && $credit->ReferredTo) ? $credit->ReferredTo->email : ''}}</td>
        <td>{{ $credit->credit }}</td>
        <td>{{ $credit->created_at }}</td>
    </tr>
    @endforeach
    </tbody>
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