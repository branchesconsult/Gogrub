@extends('frontend.layouts.app')
@section('before-styles')

@stop
@section('content')
    <section class="my-order">
        {!! Form::open(['route' => 'frontend.order.checkout']) !!}
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-xl-10 col-md-12">
                    <div class="row">
                        <div class="col-xl-8 col-md-12">
                            @foreach($cart_contents as $key => $val)
                                <div class="receipt" id="item-{!! $key !!}">
                                    <h3>{!! $val['qty'] !!} x {!! $val['name'] !!}</h3>
                                    <span>{!! formatPrice($val['price']) !!}</span>
                                    <i onclick="removeItemFromCart('{!! $key !!}')" class="fa fa-close"></i>
                                </div>
                            @endforeach
                            <div class="receipt-form">
                                <h2>Delivery time</h2>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <select id="estimate_delivery_mins" name="estimate_delivery_mins"
                                                class="form-control">
                                            @foreach($delivery_slots as $key => $val)
                                                <option value="{!! $val !!}">
                                                    {!! $val !!}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <h2>Delivery Address</h2>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputBuilding">Complete Address</label>
                                        <textarea class="form-control"
                                                  placeholder="Nearest Land mark, Floor, building, street, house number etc"
                                                  name="customer_address"
                                                  id="customer_address"></textarea>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputInformation">Additional Delivery Information</label>
                                        <textarea class="form-control" name="special_instructions"
                                                  id="special_instructions"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="receipt-form">
                                <h2>Personal details</h2>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="fullName">Full name</label>
                                        <input value="{!! \Auth::user()->full_name !!}" type="text" class="form-control"
                                               id="fullName" name="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="customerMobile">Mobile</label>
                                        <span>+92</span>
                                        <input type="text"
                                               value="{!! \Auth::user()->mobile !!}"
                                               class="form-control"
                                               id="customer_phone"
                                               name="customer_phone"
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-12">
                            <div class="cart-detail">
                                @foreach($cart_contents as $key => $val)
                                    <div class="cart-box">
                                        <h5>{!! $val['qty'] !!} x {!! $val['name'] !!}</h5>
                                        <span>{!! formatPrice($val['price']) !!}</span>
                                    </div>
                                @endforeach
                                <hr/>
                                <div class="cart-box">
                                    <h5><strong>Subtotal</strong></h5>
                                    <span>{!! formatPrice($subtotal) !!}</span>
                                </div>
                                <div class="cart-box">
                                    <h5><strong>Delivery Charges</strong></h5>
                                    <span>{!! formatPrice($delivery_charges) !!}</span>
                                </div>
                                <hr/>
                                <div class="cart-box">
                                    <h5><strong>Total</strong></h5>
                                    <span>{!! formatPrice($total) !!}</span>
                                </div>

                                <div class="cart-box">
                                    <h5><strong>Payment Method</strong></h5>
                                    <span>
                                         <label>
                                            <input type="radio" value="cod" required name="payment_method"/> Cash On
                                            Delivery
                                        </label>
                                    </span>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Checkout
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </section>
@stop
@section('cart-page-scripts')
    <script>

        function removeItemFromCart(cartItemId) {
            var isConfirm = confirm('Are you sure?');
            if (isConfirm) {
                $.ajax({
                    url: '{!! route('frontend.cart.remove.item') !!}',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        cartItemId: cartItemId
                    },
                    beforeSend: function () {

                    },
                    success: function (data) {
                        $("#item-" + cartItemId).remove();
                        $("#head-cart-count").html(data.cart_count);
                        return (data.cart_count == 0) ? window.location.reload(true) : false;
                    },
                    error: function (data) {

                    }
                });
            }
        }
    </script>
@stop