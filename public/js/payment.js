  $( document ).ready(function() {
    if (type != 1) {

      var style = {
          hidePostalCode: true,
          base: {
              color: '#32325d',
              lineHeight: '18px',
              fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
              fontSmoothing: 'antialiased',
              fontSize: '16px',
              '::placeholder': {
                  color: '#aab7c4'
              }
          },
          invalid: {
              color: '#fa755a',
              iconColor: '#fa755a'
          }
      };

      const stripe = Stripe(stripeSecret, { locale: 'en' }); // Create a Stripe client.
      const elements = stripe.elements(); // Create an instance of Elements.
      var card = elements.create('card', {hidePostalCode: true, style: style}); // Create an instance of the card Element.

      card.mount('#card-element');

       card.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
          displayError.textContent = event.error.message;
        } else {
          displayError.textContent = '';
        }
      });



      var form = document.getElementById('payment-form');
      form.addEventListener('submit', function(event) {
        event.preventDefault();
        $(".pay-btn").attr("disabled", true);
        stripe.createToken(card).then(function(result) {
        var errorElement = document.getElementById('card-errors');
          if (result.error) {
            // Inform the user if there was an error.
            $(".pay-btn").attr("disabled", false);
            errorElement.textContent = result.error.message;
          } else {
             stripeTokenHandler(result.token);
          }
        });
      });

      // Submit the form with the token ID.
      function stripeTokenHandler(token) {
      	var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);
        // Submit the form
        form.submit();
      }
    }
    $('body').on('click','#code-btn', function() {
        var code = $('.code-input').val();
        var amount = $('.amount-pre-input').val();
        if (code == '') {
            $('.success-msg').html('<small style="color : red;">Please Enter Coupon Code !</small>')
            $('.other-details').html('');
            $('.total-pay').text(amount);
            $('.amount-input').val(amount);
        }else{
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "payment/coupon-code/verify",
                data: {'_token': token, code: code},
                success: function(data){
                    $('.invalid-input').css('display','none');
                    $('.success-msg').text('');
                    if (data.status == 1) {
                        var effectiveAmount = (amount)-(amount/100*parseFloat(data.coupon.value));
                        $('.success-msg').append('<small style="color : #40A35F;">Coupon Code Successfully Applied !</small>')
                        $('.other-details').html('<span style="margin-right: 70px;">'+ data.coupon.code +'</span><span>Dis : </span><strong class="amt">'+ data.coupon.value +'%</strong><hr class="hr"><span style="margin-right: 90px;">Amount</span> <strong class="amt">$'+amount+'</strong><br><span style="margin-right: 126px;">Dis </span> <strong class="amt">$'+ (amount/100*parseFloat(data.coupon.value)).toFixed(2) +'</strong><hr class="hr"><strong style="margin-right: 28px;">Payable Amount</strong> <strong>$'+effectiveAmount.toFixed(2)+'</strong>');
                        $('.amount-input').val(effectiveAmount.toFixed(2));
                        $('.remember-credit').html('<span>Payable Now : </span>'+effectiveAmount.toFixed(2));
                        $('.coupon-code-id').val(data.id);
                    }else if (data.status == 2) {
                        $('.success-msg').append('<small style="color : red;">Coupon Code is Inactive !</small>')
                        $('.other-details').html('');
                        $('.remember-credit').html('<span>Payable Now : </span>'+amount);
                        $('.amount-input').val(amount);
                    }else if (data.status == 4) {
                        $('.success-msg').append('<small style="color : red;">Coupon Code is Already Used !</small>')
                        $('.other-details').html('');
                        $('.remember-credit').html('<span>Payable Now : </span>'+amount);
                        $('.amount-input').val(amount);
                    }else if (data.status == 5) {
                        $('.success-msg').append('<small style="color : red;">Coupon Code is Expired !</small>')
                        $('.other-details').html('');
                        $('.remember-credit').html('<span>Payable Now : </span>'+amount);
                        $('.amount-input').val(amount);
                    }else{
                        $('.success-msg').append('<small style="color : red;">Coupon Code is Invalid !</small>')
                        $('.other-details').html('');
                        $('.remember-credit').html('<span>Payable Now : </span>'+amount);
                        $('.amount-input').val(amount);
                    }
              }
            });
        }
    });

});