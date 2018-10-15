<!--Always get $products variable-->
@foreach($products as $key => $val)
    <div class="col-3">
        <div class="food-block">
            <a href="{!! route('frontend.product.detail', ['slug' => $val['slug']]) !!}">
                <div class="food-image">
                    @if(empty($val['images']))
                        <img src="{!! asset('frontend/images/images@2x.png') !!}" class="img-fluid"/>
                    @else
                        <img src="z{!! $val['images'][0]['image_url'] !!}" class="img-fluid"/>
                    @endif
                    <div class="food-meal-left">
                        <strong>{!! $val['remaining_servings'] !!}</strong> Left
                    </div>
                    @if($val['remaining_servings'] <= 0)
                        <div class="food-meal-btn red">
                            Sold out
                            <strong>{!! $val['price_view'] !!}</strong>
                        </div>
                    @else
                        <div class="food-meal-btn green">
                            Add to meal
                            <strong>{!! $val['price_view'] !!}</strong>
                        </div>
                    @endif
                </div>
            </a>
            <div class="food-list-details">
                <div class="row">
                    <div class="col-7">
                        <div class="food-name">
                            {!! $val['name'] !!}
                        </div>
                        <div class="food-chef-name">
                            <strong>
                                Chef:</strong> {!! $val['chef']['full_name'] !!}
                        </div>
                        <div class="food-cuisine">
                            <strong>Cuisine:</strong> {!! $val['cuisine']['name'] !!}
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="food-serving">
                            <strong>Serving Size:</strong>
                            @for($i = 1; $i<=$val['serving_size'];$i++)
                                <i class="fa fa-user"></i>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach