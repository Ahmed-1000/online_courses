@extends('header.header')


@section('content')
<style type="text/css">
.formular {
  margin: 10%;
  border: 1px solid #ddd;
  background-color: #fff;
  border-radius: 4px 4px 0 0;
  padding: 20px;
}
.hide{
  display: none;
}
.bg-danger {
  margin: -20px;
}
.bg-danger p {
  padding: 20px;
}

.bg-info {
  padding: 10px;
  text-align: center;
}

.center {
  text-align: center;
}

fieldset {
  clear: both;
  border-bottom: 1px solid lightgrey;
  margin: 20px -20px;
  padding: 20px 0;
}

.center {
  text-align: center;
}

small {
  font-size: 0.8em;
}


</style>


 <div class="row">
    <h1>Checkout</h1>
   
   
  <form role="form" action="{{route('dashboard.payment')}}" method="POST" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
   @csrf
   <div class="row">
          <div class="col-xs-12">
            <div class="form-group required">
              <label for="name">Name</label>
              <input type="text"  class="form-control name" required>
            </div>
          </div>
          <div class="col-xs-12">
            <div class="form-group required">
              <label for="name">Address</label>
              <input type="text"  class="form-control address" required>
            </div>
          </div>
          <div class="col-xs-12">
            <div class="form-group required">
              <label for="name">Name on Card</label>
              <input type="text"  class="form-control card-name" required>
            </div>
          </div>
          <div class="col-xs-12">
            <div class="form-group required">
              <label for="name">Credit Card Number</label>
              <input type="text"  class="form-control card-number" required>
            </div>
          </div>
          <div class="col-xs-6">
            <div class="form-group required">
              <label for="name">Expiration Month</label>
              <input type="text"  placeholder='MM' class="form-control card-expiry-month" required>
            </div>
          </div>
          <div class="col-xs-6">
            <div class="form-group required">
              <label for="name">Expiration Year</label>
              <input type="text"  placeholder='YYYY' class="form-control card-expiry-year" required>
            </div>
          </div>
          <div class="col-xs-12">
              <div class="form-group required">
              <label for="name">
              CVC</label>
              <input type="text"  placeholder='CVC' class="form-control card-cvc" required>
              </div>
          </div>
      </div>
      <button type="submit" class="btn btn-success">Buy Now</button>
      <div class="col-md-12 error form-group hide">
          <div class="alert-danger alert"> please correct the errors and try again</div>
      </div>
  </form>
</div>
<div class="center">Test Card is: 4242424242424242</div>
</div>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
   $(function(){
        var $form = $(".require-validation");
      $('form.require-validation').bind('submit', function(e){
            inputSelector = ['input[type=email]', 'input[type=password]', 'input[type=text]', 'input[type=file]','textarea'].join(','),
            $inputs = $form.find('.required').find(inputSelector),
            $errorMessage = $form.find('div.error'),
            valid = true;
            $errorMessage.addClass('hide');
            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el){
                  var $input = $(el);
                  if($input.val() === ''){
                     $input.parent().addClass('has-error');
                     $errorMessage.removeClass('hide');
                     e.preventDefault();
                  }

            });
            if (!$form.data('cc-on-file')){
              e.preventDefault();
              Stripe.setPublishableKey($form.data('stripe-publishable-key'));
              Stripe.createToken({
                 number: $('.card-number').val(),
                 cvc: $('.card-cvc').val(),
                 exp_month: $('.card-expiry-month').val(),
                 exp_year: $('.card-expiry-year').val()
              }, stripeResponseHandler);
            }
        });
        function stripeResponseHandler(status, response){
          if (response.error) {
            $('.error').removeClass('hide').find('.alert').text(response.error.message);
          }else{
              var token = response['id'];
              $form.find('input[type=text]').empty();
              $form.append("<input type='hidden' name='stripeToken' value='"+ token +"'/> ");
              $form.get(0).submit();
          }
        }
   });

</script>

@endsection