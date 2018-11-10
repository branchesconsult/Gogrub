@extends('frontend.layouts.app')
@section('before-styles')

@stop
@section('content')
    <section class="order-live-status">
        <div class="col-12">
            <h4>Thank you for your order</h4>
            <p>You can track live ordeer from here</p>
        </div>
        <div class="col-12 order-status">
            <ol>
                <li>Generate Order</li>
                <li>Chef has prepared your order</li>
                <li>Rider is on the way</li>
                <li>Delievered to you</li>
                <li>Order Completed</li>
            </ol>
        </div>
    </section>
@stop
