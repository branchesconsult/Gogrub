@extends('frontend.layouts.app')
@section('before-styles')
    {!! Html::style(asset('frontend/lightgallery/css/lightgallery.css')) !!}
    {!! Html::style(asset('frontend/lightslider/css/lightslider.css')) !!}
@stop
@section('content')
    {{--@include('frontend.includes.search-fullwidth-banner')--}}
    <section class="food-detail">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="col-12 food-main">
                            <ul id="product-detail-banner">
                                @foreach($product['images'] as $key => $val)
                                    <li data-src="{!! $val['image_large'] !!}"
                                        data-thumb="{!! $val['small_thumb'] !!}">
                                        <img src="{!! $val['medium_thumb'] !!}"/>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row">

                        <div class="col-9 food-title">
                            <h2>{!! $product['name'] !!}</h2>
                            <p>{!! $product['description'] !!}
                            </p>
                        </div>

                        <div class="col-3">
                            <h3 class="text-right"><strong>{!! $product['price_view'] !!}</strong></h3>
                        </div>

                        <div class="col-12">
                            <div class="star-rating d-inline-block">
                                {!! printRatingStars($product['chef']['avg_rating']) !!}
                            </div>
                            <div class="chef-review d-inline-block">
                                ({!! count($product['chef']['rating_reviews']) !!})
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="food-boxes d-flex">
                                <div class="food-box">
                                    <strong>Servings Left</strong>
                                    <span>{!! $product['servings_left'] !!}</span>
                                </div>
                                <div class="food-box">
                                    <strong>Serving Size</strong>
                                    <span>
                                        @for($i=1;$i<=$product['serving_size'];$i++)
                                            <i class="fa fa-user"></i>
                                        @endfor
                                    </span>
                                </div>
                                <div class="food-box">
                                    <strong>Availability</strong>
                                    <span>{!! $product['availability_time'] !!}</span>
                                </div>
                                <div class="food-box">
                                    <strong>Posted</strong>
                                    <span>{!! $product['posted_at'] !!}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 food-chef">
                            <img src="{!! getImgSrc($product['chef']['avatar'], 70, 70) !!}"/>
                            <h5><strong>{!! $product['chef']['full_name'] !!}</strong>
                            </h5>
                            {{--<i class="fa fa-comment"></i> <span>text chef for any query</span>--}}
                            <button onclick="openBsModal('addToCartModel')" class="btn btn-success">
                                Add to meal
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                @include('frontend.partials.rating-reviews',[
                'rating_reviews' => $product['chef']['rating_reviews'],
                'colSize' => 7
                ])
                <div class="col-5">
                    @if(!empty($product['chef']['products']))
                        <p class="text-center">Other Meals by <strong>{!! $product['chef']['full_name'] !!}</strong></p>
                        <div class="row">
                            @include('frontend.partials.product-grid', [
                            'products' => $product['chef']['products'],
                            'colSize' => 6
                            ])
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </section>
    @include('frontend.includes.add-to-card-model', ['product_id' => $product['id']])
@stop
@section('before-scripts')
    {!! Html::script(asset('frontend/lightslider/js/lightslider.min.js')) !!}
    {!! Html::script(asset('frontend/lightgallery/js/lightgallery.js')) !!}
    <script>
        $(document).ready(function () {
            $("#product-detail-banner").lightSlider({
                gallery: true,
                item: 1,
                vertical: true,
                verticalHeight: 400,
                vThumbWidth: 120,
                thumbItem: 8,
                thumbMargin: 10,
                slideMargin: 0,
                onSliderLoad: function (el) {
                    el.lightGallery({
                        selector: '#product-detail-banner .lslide'
                    });
                }
            });
        });
    </script>
@stop