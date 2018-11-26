@extends('frontend.layouts.app')
@section('content')
    @include('frontend.chef.layout.chef_app')
    <div class="container">
        <div class="row">
            @if(!$products->isEmpty())
                @include('frontend.partials.product-grid', ['colSize' => 3])
                <div class="col-12">
                    {{ $products->links() }}
                </div>
            @else
                <div class="alert alert-info">
                    Seems you do not have any product in here
                </div>
            @endif
        </div>
    </div>
@stop