@extends('frontend.layouts.app')
@section('before-styles')

@stop
@section('content')
    <section class="order-live-status">
        <div class="col-12">
            <h4>Thank you for your order</h4>
            <p>You can track live ordeer from here</p>
        </div>
        @foreach($activeOrdersOfUser as $key => $val)
            <div class="col-12 order-status">
                <h5>
                    <strong>Order Number: </strong>{!! $val['invoice_num'] !!}
                </h5>
                <ol>
                    <li>Generate Order</li>
                    <li>Chef has prepared your order</li>
                    <li>Rider is on the way</li>
                    <li>Delievered to you</li>
                    <li>Order Completed</li>
                </ol>
            </div>
            <div class="col-12 order-status">
                <a href="#">
                    <i class="fa fa-comment"></i> Live Chat Supprt
                </a>
            </div>
            @endforeach
    </section>
@stop
