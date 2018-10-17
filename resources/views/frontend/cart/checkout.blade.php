@extends('frontend.layouts.app')
@section('before-styles')

@stop
@section('content')
    <section class="my-order">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-10">
                    <div class="row">
                        <div class="col-8">
                            @foreach($cart_contents as $key => $val)
                                <div class="receipt" id="item-{!! $key !!}">
                                    <h3>{!! $val['qty'] !!} x {!! $val['name'] !!}</h3>
                                    <span>{!! formatPrice($val['price']) !!}</span>
                                    <i onclick="removeItemFromCart('{!! $key !!}')" class="fa fa-close"></i>
                                </div>
                            @endforeach

                            {!! Form::open([]) !!}
                            <div class="receipt-form">
                                <h2>Delivery time</h2>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <select class="form-control">
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
                                    <div class="form-group col-md-6">
                                        <label for="inputBuilding">Building</label>
                                        <input type="text" class="form-control" id="inputBuilding"
                                               placeholder="Apartment, studio, or floor">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputStreet">Street</label>
                                        <input type="text" class="form-control" id="inputStreet"
                                               placeholder="1234 Main St">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputArea">Area</label>
                                        <input type="text" class="form-control" id="inputArea">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputFloor">Floor/unit(optional)</label>
                                        <input type="text" class="form-control" id="inputFloor">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputInformation">Additional Delivery Information</label>
                                        <textarea class="form-control" id="inputInformation"></textarea>
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                            <div class="receipt-form">
                                <h2>Personal details</h2>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="col-4">
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
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Checkout
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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