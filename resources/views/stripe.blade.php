<!DOCTYPE html>
<html>

<head>
    <title>Food Order</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style type="text/css">
        .panel-title {
            display: inline;
            font-weight: bold;
        }

        .display-table {
            display: table;
        }

        .display-tr {
            display: table-row;
        }

        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 61%;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body>

    <div class="container  align-items-center " style="align-content: center;margin-top:160px">
        <div class="row align-items-center">
            <div class="col">
                <div class="card border-0 shadow-sm" style="width:450px;">
                    <img src="{{ asset('images/37152.jpg') }}" class="card-img-top">
                    <div class="card-body mt-2">
                        <h5 class="card-title fs-3">Your Address <i class="fa-solid fa-location-dot text-primary"></i></h5>
                        <p class="card-text fs-4">Your address : {{ Auth::user()->address }}</p>
                        <a href="{{ route('profile') }}" class="btn btn-primary btn-lg fs-4"><i class="fa-regular fa-pen-to-square"></i> Change Address</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="panel panel-default credit-card-box border-0 shadow bg-light rounded">

                    <div class="panel-body">
                        <h1>Stripe Payment Gateway <i class="fa-solid fa-credit-card text-danger"
                                style="margin-right: 8px;"></i><i class="fa-brands fa-cc-mastercard text-warning"
                                style="margin-right: 8px;"></i><i class="fa-brands fa-cc-visa text-primary"
                                style="margin-right: 8px;"></i><i class="fa-brands fa-cc-apple-pay"></i> </h1>

                        @if (Session::has('success'))
                            <div class="alert alert-success text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p>{{ Session::get('success') }}</p>
                            </div>
                        @endif

                        <form role="form" action="{{ route('order.store') }}" method="post"
                            class="require-validation" data-cc-on-file="false"
                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                            @csrf



                            <div class='form-row row'>
                                <div class='col-xs-12 form-group required mt-4 '>
                                    <label class='control-label fs-5'>Name on Card</label>
                                    <input placeholder="ex.John smith" class='form-control bg-white border shadow-sm' size='4' type='text' style="font-size: 14px;"  >
                                </div>
                            </div>

                            <div class='form-row row'>
                                <div class='col-xs-12 border-0 card required  bg-light'>
                                    <label class='control-label bg-light fs-5'>Card Number</label>
                                    <input autocomplete='off' placeholder="xxxx-xxxx-xxxx-xx" class='form-control card-number  border shadow-sm' size='20' type='text' style="font-size: 14px;">
                                </div>
                            </div>

                            <div class='form-row row mt-4 '>
                                <div class='col-xs-12 col-md-4 form-group cvc required'>
                                    <label class='control-label fs-5 '>CVC</label>
                                    <input autocomplete='off' class='form-control card-cvc bg-white border shadow-sm' placeholder='ex. 311' size='4' type='text' style="font-size: 14px;" >
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label fs-5'>Expiration Month</label>
                                    <input class='form-control card-expiry-month bg-white border shadow-sm' placeholder='MM' size='2' type='text' style="background-color: #ecf0f1; font-size: 14px;">
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label fs-5'>Expiration Year</label>
                                    <input class='form-control card-expiry-year bg-white border shadow-sm  ' placeholder='YYYY' size='4' type='text' style="background-color: #ecf0f1; font-size: 14px;">
                                </div>
                            </div>
                            <div class="row d-flex align-items-center justify-content-center">
                                <div class="col">
                                    <span class="btn pull-left fs-4 text-primary" style="font-weight: 800; cursor: default;">Total Price:
                                        {{ $cart->totalprice }}&#8378
                                    </span>
                                </div>
                                <div class="col">
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                    <input type="hidden" name="date" value="{{ Carbon\Carbon::now() }}">
                                    <input type="hidden" name="time" value="{{ Carbon\Carbon::now() }}">
                                    <input type="hidden" name="total_price" value="{{ $cart->totalprice }}">
                                    @foreach ($cart->items as $meal)
                                        <input type="hidden" name="order_id" value="{{ $last_order_id + 1 }}">
                                        <input type="hidden" name="meal_id[]" value="{{ $meal['id'] }}">
                                        <input type="hidden" name="quantity[]" value="{{ $meal['qty'] }}">
                                        <input type="hidden" name="price[]" value="{{ $meal['price'] }}">
                                    @endforeach
                                    <button type="submit" class="btn btn-primary  pull-right btn-lg fs-4"><i
                                            class="fa-regular fa-credit-card"></i> Chekout</button>
                                </div>
                            </div>

                    </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
    </div>

</body>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
    $(function() {

        var $form = $(".require-validation");

        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('hide');

            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {
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

        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];

                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }

    });
</script>

</html>
