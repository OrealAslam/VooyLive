@extends('layouts.template')
@section('content')

<!-- Page Header -->
<div class="page-header style-11">
  <div class="container">
    <h2 class="page-title">My Credits</h2>
    <ol class="breadcrumb">
      <li><a href="{{ Route('home') }}">Home</a></li>
      <li><a href="{{ Route('dashboard') }}">Dashboard</a></li>
      <li class="active">My Credits</li>
    </ol>
  </div>
</div>
<!-- Page Header End -->
<div class="cps-main-wrap">
  <!-- Custom Features -->
  	<div class="cps-section cps-section-padding" id="features">
      	<div class="container">
			<div class="col-md-12">
                @include('common.errors')
                @include('common.success')
				<!-- <a href="{{ url('/transactions/pdf') }}">Download PDF</a> -->
				<h1 style="display: inline;">My Credits</h1><h3 style="display: inline;font-weight:normal;"> (${{ number_format($user->userCredit(),2) }})</h3>

				<div class="row mt-10">
					<div class="col-md-4 mt-10">
						<table class="table table-bordered text-center">
							<thead>
								<tr>
									<th class="text-center">Credit</th>
									<th class="text-center">Debit</th>
									<th class="text-center">Current Credit</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>${{ number_format($user->currentCreditUser(),2) }}</td>
									<td>${{ number_format($user->currentCreditUserDebit(),2) }}</td>
									<td>${{ number_format($user->userCredit(),2) }}</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col-md-8 mt-10 text-right">
						<a href="{{ url('/order/'.orderCategoryCredit()['slug']) }}" class="btn btn-primary">Buy Credit</a>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-12">
								<h5>Credit</h5>
							</div>
							<div class="col-md-12">
								<table class="table table-striped table-bordered">
									<thead>
										<tr>
											<th width="20">Id</th>
											<th>Description</th>
											<th>Type</th>
											<th>Product</th>
											<th>Referral</th>
											<th>Credit</th>
											<th>Dated</th>
										</tr>
									</thead>
									<tbody>
										@foreach($credits as $key=>$credit)
										<tr>
											<td>{{ ++$key }}</td>
											<td>{{ $credit->descr }}</td>
											<td class="text-capitalize">{{ $credit->type }}</td>
											<td class="text-capitalize">{{ (!empty($credit->product)) ? $credit->product : '' }}</td>
											<td>{{ (!empty($credit->referred_to)) ? $credit->ReferredTo->firstName.' '.$credit->ReferredTo->lastName : ''}}</td>
											<td>${{ number_format($credit->credit,2) }}</td>
											<td>{{ $credit->created_at }}</td>
										</tr>
										@endforeach
									</tbody>
									<tfoot>
										<tr>
											<td colspan="7" align="right">
												Balance Credits : ${{ number_format($user->getBalanceCredits(),2) }}
											</td>
										</tr>
									</tfoot>
								</table>	
								
							</div>	
						</div>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-12">
								<h5>Debit</h5>
							</div>
							<div class="col-md-12">
								<table class="table table-striped table-bordered">
									<thead>
										<tr>
											<th width="20">Id</th>
											<th>Debit</th>
											<th>Dated</th>
										</tr>
									</thead>
									<tbody>
										@foreach($debit as $key=>$value)
											<tr>
												<td>{{ ++$key }}</td>
												<td>${{ number_format($value->debit,2) }}</td>
												<td width="150">{{ $value->created_at }}</td>
											</tr>
										@endforeach
									</tbody>
								</table>	
								
							</div>	
						</div>
					</div>
				</div>
				<nav>
				</nav>
			</div>
		</div>
	</div>
</div>
@endsection


@section('footer_script')

<script src="/newPlugin/toastr.min.js"></script>
<script type="text/javascript">
toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "3000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
};
</script>
<script type="text/javascript">
    $(document).ready(function(){
    	$('#copy_link').click(function(){
		  /* Get the text field */
		  var copyText = document.getElementById("referral_code");

		  /* Select the text field */
		  copyText.select();

		  /* Copy the text inside the text field */
		  document.execCommand("copy");

		  /* Alert the copied text */
		  toastr.success("Link Copied");
		});


        console.log('adnan masood');
    });
</script>
@endsection

