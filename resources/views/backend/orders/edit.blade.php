@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.orders.management') . ' | ' . trans('labels.backend.orders.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.orders.management') }}
        <small>{{ trans('labels.backend.orders.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($order, ['route' => ['admin.orders.update', $order], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-order']) }}

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.orders.edit') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.orders.partials.orders-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!--box-header with-border-->

        <div class="box-body">
            <div class="table-responsive">
                <table class="table-hover table table-condensed table-bordered">
                    <tr>
                        <th>Order at</th>
                        <th>Inoice Number</th>
                        <th>Client info</th>
                        <th>Client address</th>
                        <th>Status</th>
                        <th>Delivery charges</th>
                        <th>Sub Total</th>
                        <th>Total</th>
                    </tr>
                    <tr>
                        <td>{!! $order->created_at !!}</td>
                        <td>{!! $order->invoice_num !!}</td>
                        <td>
                            {!! $order->customer_full_name !!}<br/>
                            {!! $order->customer_phone !!}<br/>
                            {!! $order->customer_email !!}
                        </td>
                        <td>
                            {!! $order->customer_address !!}<br/>
                            <a target="_blank"
                               href="http://www.google.com/maps/place/{!! $order->customer_location->getLat() !!},{!! $order->customer_location->getLng() !!}">
                                Location
                            </a>
                        </td>
                        <td>
                            {!! $order->status->status !!}
                        </td>
                        <td>{!! $order->delivery_charges !!}</td>
                        <td>{!! $order->subtotal !!}</td>
                        <td>{!! $order->total !!}</td>
                    </tr>
                </table>
            </div>
            <div class="section">
                <h4>Products</h4>
                <div class="table-responsive">
                    <table class="table-hover table table-condensed table-bordered">
                        <tr>
                            <th>Product name</th>
                            <th>Special instructions</th>
                            <th>Qty</th>
                            <th>Unit price</th>
                            <th>Total price</th>
                        </tr>
                        @foreach($order->detail as $key => $val)
                            <tr>
                                <td>{!! $val->product->name !!}</td>
                                <td>{!! $val->special_instructions !!}</td>
                                <td>{!! $val->qty !!}</td>
                                <td>{!! $val->price !!}</td>
                                <td>{!! $val->total_price !!}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="form-group">
                {{-- Including Form blade file --}}
                @include("backend.orders.form")
                <div class="edit-form-btn">
                    {{ link_to_route('admin.orders.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                    {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                    <div class="clearfix"></div>
                </div><!--edit-form-btn-->
            </div><!--form-group-->
        </div><!--box-body-->
    </div><!--box box-success -->
    {{ Form::close() }}
@endsection
