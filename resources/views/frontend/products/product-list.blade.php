@extends('frontend.layouts.app')
@section('before-styles')
    {!! Html::style(asset('frontend/lightgallery/css/lightgallery.css')) !!}
    {!! Html::style(asset('frontend/lightslider/css/lightslider.css')) !!}
@stop
@section('content')
    <div class="container">
        <div class="row">
            @include('frontend.partials.product-grid', ['colSize' => 3])
            <div class="col-12">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@stop
