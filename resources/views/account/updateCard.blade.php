@extends('layouts.template')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script>
    Stripe.setPublishableKey("{{ env('STRIPE_KEY') }}");
</script>
<script>
$(document).ready(function() {

  // target the form
  // on form submission, create a token
  $('#subscribe-form').submit(function(e) {
    var form = $(this);

    // disable the form button
    form.find('button').prop('disabled', true);

    Stripe.card.createToken(form, function(status, response) {
      if (response.error) {
        form.find('.stripe-errors').text(response.error.message).addClass('alert alert-danger');
        form.find('button').prop('disabled', false);
      } else {

        // append the token to the form
        form.append($('<input type="hidden" name="cc_token">').val(response.id));

        // submit the form
        form.get(0).submit();
      }
    });

    e.preventDefault();
  });

});
</script>
<!-- Page Header -->
<div class="page-header style-11">
  <div class="container">
    <h2 class="page-title">{{__('account/updateCard.updateCard')}}</h2>
    <ol class="breadcrumb">
      <li><a href="{{ Route('home') }}">{{__('account/updateCard.home')}}</a></li>
      <li><a href="{{ Route('dashboard') }}">{{__('account/updateCard.dashboard')}}</a></li>
      <li class="active">{{__('account/updateCard.updateCard')}}</li>
    </ol>
  </div>
</div>
<!-- Page Header End -->
<div class="cps-main-wrap">
    <div class="cps-section cps-section-padding">
    	@if(session('status'))
            <div class="container">
                <div class="alert alert-info">
                    {{ session('status') }}
                </div>
            </div>
        @endif
        <div class="container">
<div class="col-md-12">
	<h1>{{__('account/updateCard.updateCard')}}</h1>
	<form id="subscribe-form" action="{{ url('account/updateCard') }}" method="post" class="account-form"> {{ csrf_field() }}
<div class="row"><div class="col-xs-12"><hr><h4 class="section-header"><span>{{__('account/updateCard.enterYourCreditCardInfo')}}</span></h4></div></div>                    
                    <div class="form-group">
                <label for="card_number" class="col-md-4 control-label">{{__('account/updateCard.cardNumber')}}</label>

                <div class="col-md-6">
                    <input id="card_number" type="text" class="form-control" data-stripe="number" >
                          @if ($errors->has('card_number'))
                        <span class="help-block">
                            <strong>{{ $errors->first('card_number') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="card_number" class="col-md-4 control-label">{{__('account/updateCard.expiryMonth')}}</label>

                <div class="col-md-6">
                
                <select class="form-control" data-stripe="exp-month">
                    <option value="01">January</option>
                    <option value="02">February </option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
               
                          
                </div>
            </div>
             <div class="form-group" id="expiration-date" >
                  <label for="card_number" class="col-md-4 control-label">{{__('account/updateCard.expiryYear')}}</label>
                
                <div class="col-md-6">
                     <input type="text" class="form-control" placeholder="2020" data-stripe="exp-year">
            </div></div>
            <div class="form-group">
                <label for="card_number" class="col-md-4 control-label">{{__('account/updateCard.CVC')}}</label>

                <div class="col-md-6">
                    <input id="cvc" type="text" class="form-control"  data-stripe="cvc">
                      @if ($errors->has('cvc'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cvc') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="stripe-errors"></div>

<div class="clearfix"></div><br><br>

                
            <div class="form-group">
              
                <div class="col-md-12">
                    <input id="agree_term" type="checkbox"  value="1" name="agree_term" checked required> {{__('account/updateCard.para1')}} <a href="{{ url('terms') }}">{{__('account/updateCard.termsService')}}</a> {{__('account/updateCard.para2')}}
                      @if ($errors->has('agree_term'))
                        <span class="help-block">
                            <strong>{{ $errors->first('agree_term') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="clearfix"></div>
            <br><br> 
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
            @endif
            <div class="form-group">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">
                        {{__('account/updateCard.updateYourCreditCard')}}
                    </button>
                </div>
            </div>
        </form>
        <div class="clearfix"></div>

</div>
</div>
</div>
</div>

<div class="modal fade" id="cancel_subscription" tabindex="-1" role="dialog" aria-labelledby="Cancel Subscription">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{{__('account/updateCard.cancelSubscription')}}</h4>
      </div>
      <div class="modal-body">
        {{__('account/updateCard.para3')}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{__('account/updateCard.cancel')}}</button>
        <a class="btn btn-primary" id="confirm_btn">{{__('account/updateCard.ok')}}</a>
      </div>
    </div>
  </div>
</div>
<script>
    $(document).ready(function(){
        $('#cancel_subscription').on('shown.bs.modal', function(e) {
            $(this).find('#confirm_btn').attr('href', $(e.relatedTarget).data('href'));
        });
    });
</script>


@endsection