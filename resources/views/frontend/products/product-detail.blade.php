@extends('frontend.layouts.app')
@section('before-styles')
    {!! Html::style(asset('frontend/lightgallery/css/lightgallery.css')) !!}
    {!! Html::style(asset('frontend/lightslider/css/lightslider.css')) !!}
@stop
@section('content')
    @include('frontend.includes.search-fullwidth-banner')
    <section class="food-detail">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="col-12 food-main">
                            <ul id="product-detail-banner">
                                @foreach($product['images'] as $key => $val)
                                    <li data-src="{!! $val['image_large'] !!}" data-thumb="{!! $val['small_thumb'] !!}">
                                        <img src="{!! $val['image_large'] !!}"/>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row">

                        <div class="col-10 food-title">
                            <h2>{!! $product['name'] !!}</h2>
                            <p>{!! $product['description'] !!}
                            </p>
                        </div>

                        <div class="col-2">
                            <h1><strong>{!! $product['price_view'] !!}</strong></h1>
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
                            <img src="{!! $product['chef']['avatar'] !!}"/>
                            <h5><strong>{!! $product['chef']['full_name'] !!}</strong>
                            </h5>
                            {{--<i class="fa fa-comment"></i> <span>text chef for any query</span>--}}
                        </div>

                        <div class="col-12 food-quan d-inline-flex">
                            <strong>Quantity</strong>
                            <div class="input-group">
                                <span class="input-group-btn">
                              <button type="button" class="btn btn-default btn-number" data-type="minus"
                                      data-field="quant[1]">
                                  <span class="fa fa-minus"></span>
                                </button>
                                </span>
                                <input type="text" name="quant[1]" class="input-number" value="1" min="1" max="10">
                                <span class="input-group-btn">
                              <button type="button" class="btn btn-default btn-number" data-type="plus"
                                      data-field="quant[1]">
                                  <span class="fa fa-plus"></span>
                                </button>
                                </span>
                            </div>
                            <button class="btn btn-success">Add to meal</button>
                        </div>

                        <div class="col-12">
                            <textarea class="food-textarea" placeholder="Special Instructions"></textarea>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                @if(count($product['chef']['rating_reviews']) > 0)
                    <div class="col-7">
                        <div class="order-comments">
                            <h2>Reviews ({!! count($product['chef']['rating_reviews']) !!})</h2>
                            <div class="order-scroll">
                                @foreach($product['chef']['rating_reviews'] as $key => $val)
                                    <div class="cmnt-box">
                                        <img src="{!! $val['user']['avatar'] !!}"/>
                                        <h5>{!! $val['user']['full_name'] !!}</h5>
                                        <p>“{!! $val['review'] !!}”</p>
                                        <span>
                                        {!! $val['posted_at'] !!}
                                            <br/>{!! printRatingStars($val['rating']) !!}
                                    </span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                @if(!empty($product['chef']['products']))
                    <div class="col-5">
                        <p class="text-center">Other Meals by <strong>Michael</strong></p>
                        <div class="row">
                            @include('frontend.partials.product-grid', [
                            'products' => $product['chef']['products'],
                            'colSize' => 6
                            ])
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
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
                verticalHeight: 295,
                vThumbWidth: 50,
                thumbItem: 8,
                thumbMargin: 4,
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