@extends('frontend.layouts.app')
@section('content')
    @include('frontend.chef.layout.chef_app')
    <section class="order-list">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-6">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="active-tab" data-toggle="tab" href="#active" role="tab"
                               aria-controls="active" aria-selected="true">Active</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="past-tab" data-toggle="tab" href="#past" role="tab"
                               aria-controls="past" aria-selected="false">Past</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade show active" id="active" role="tabpanel" aria-labelledby="active-tab">
                            @if(!$ordersActive->isEmpty())
                                @foreach($ordersActive as $k => $order)
                                    <div class="order-block">
                                        <h4>Invoice # {!! $order->invoice_num !!}</h4>
                                        <p>
                                            @foreach($order->detail as $dk => $dVal)
                                                {!! $dVal->qty !!} x {!! $dVal->product->name !!}
                                            @endforeach
                                        </p>
                                        <div class="row">
                                            <div class="col-2 price">{!! $order->total !!}</div>
                                            <div class="col-2 cancel-btn">
                                                <button type="button" class="active">
                                                    Cancel
                                                </button>
                                                <a href="{!! route('frontend.chef.order.chat') !!}">
                                                    Chat
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="alert alert-info">
                                    No active order you have
                                </div>
                            @endif
                        </div>
                        <div class="tab-pane fade" id="past" role="tabpanel" aria-labelledby="past-tab">
                            @if(!$ordersPast->isEmpty())
                                @foreach($ordersPast as $k => $order)
                                    <div class="order-block">
                                        <h4>Invoice # {!! $order->invoice_num !!}</h4>
                                        <p>
                                            @foreach($order->detail as $dk => $dVal)
                                                {!! $dVal->qty !!} x {!! $dVal->product->name !!}
                                            @endforeach
                                        </p>
                                        <div class="row">
                                            <div class="col-2 price">{!! $order->total !!}</div>
                                            {{--<div class="col-2 cancel-btn">--}}
                                            {{--<button type="button" class="active">--}}
                                            {{--Cancel--}}
                                            {{--</button>--}}
                                            {{--</div>--}}
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="alert alert-info">
                                    No past order you have
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
