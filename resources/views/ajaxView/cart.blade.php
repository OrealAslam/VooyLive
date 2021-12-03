    <div class="hover-box-cart" style="display: none;">
    @if(!empty(session('cart')))
        @foreach((array) session('cart') as $id => $details)
            <div class="row" style="margin-top:10px;">
                <div class="col-md-2 col-xs-3">
                    <img src="{{ asset('/upload/product/'.$details['image']) }}">
                </div>
                <div class="col-md-5 col-xs-5 cart-box-detail text-left p-0">
                    <a href="#">{{ $details['name'] }}</a><br>
                    @if(!empty($details['neighborhood']))
                        <p style="display: inline;"> - Neighborhood : {{ $details['neighborhood'] }}</p><br>
                    @endif
                    @if(!empty($details['address']))
                        <p style="display: inline;"> - Address : {{ $details['address'] }}</p>
                    @endif
                </div>
                <div class="col-md-5 col-xs-4 cart-box-price">
                    <p>${{ number_format($details['quantity'] * $details['price'],2)  }} <i class="fa fa-times-circle delete-cart" aria-hidden="true" data-id="{{ $id }}" style="position: relative;top:1px;"></i></p>
                </div>
            </div>
        @endforeach
        <div class="row cart-box-price-total-main">
            <div class="col-md-7 cart-box-price-total col-md-offset-5">
                <div class="row">
                    <div class="col-md-6 col-xs-6 total-text-wi text-right">
                        <p>Sub-Total</p>
                    </div>
                    <div class="col-md-6 col-xs-6 total-text-wi text-right">
                        <p>${{ number_format($total,2) }}</p>
                    </div>
                    <div class="col-md-6 col-xs-6 total-text-wi text-right">
                        <p>GST</p>
                    </div>
                    <div class="col-md-6 col-xs-6 total-text-wi text-right">
                        <p>${{ number_format(amountGst($total),2) }} ({{ getSettingValue('home-product-gst')}}%)</p>
                    </div>
                    <div class="col-md-6 col-xs-6 total-text-wi text-right">
                        <p>Total</p>
                    </div>
                    <div class="col-md-6 col-xs-6 total-text-wi text-right">
                        <p>${{ number_format($total + amountGst($total),2) }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row cart-box-button-check text-center">
            <a href="{{ route('payment') }}" class="btn btn-checkout btn-sm">CHECKOUT</a>
        </div>
    @else
        <div class="row empty-card-box">
            <div class="col-md-12 text-center">
                <i>Your Shopping Cart Is Empty!</i>
            </div>
        </div>
    @endif
</div>