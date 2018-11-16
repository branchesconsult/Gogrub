@extends('frontend.layouts.app')

@section('content')
    {{--@include('frontend.includes.search-fullwidth-banner')--}}
    <section class="food-detail my-order">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-5 col-sm-12 text-center">
                    <div class="chef-detail">
                        <img src="{!! getImgSrc($chef['avatar'], 300, 300) !!}"/>
                        <h2>Hi! i am {!! $chef['full_name'] !!}</h2>
                        <div class="star-rating">
                            {!! printRatingStars($chef['avg_rating']) !!}
                        </div>
                        {{--<p>typically replies within <strong>{!! $chef['avg_reply_time'] !!}</strong> Min</p>--}}
                        <div class="chef-circles">
                            <div class="row">
                                <div class="col-6">
                                    <div class="round">{!! $chef['success_percentage'] !!}</div>
                                    <p>Success rate</p>
                                </div>
                                <div class="col-6">
                                    <div class="round">{!! $chef['avg_reply_time'] !!} min</div>
                                    <p>Avg.response time</p>
                                </div>
                            </div>
                        </div>
                        <p>
                            <em>
                                {!! $chef['description'] !!}
                            </em>
                        </p>
                    </div>
                </div>
                <div class="col-xl-8 col-md-7 col-sm-12">
                    <h5 class="food-head">Food by {!! $chef['full_name'] !!}</h5>
                    <div class="row">
                    @include('frontend.partials.product-grid', [
                        'products' => $chef['products'],
                        'colSize' => 4
                        ])
                    <!--Ratings-->
                        @include('frontend.partials.rating-reviews',[
                                    'rating_reviews' => $chef['rating_reviews'],
                                    'colSize' => 12
                                    ])
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop