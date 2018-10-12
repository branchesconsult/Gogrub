<!--Always get $products variable-->
@foreach($products as $key => $val)
    <div class="col-3">
        <div class="food-block">
            <div class="food-image">
                <img src="{!! asset('frontend/images/images@2x.png') !!}" class="img-fluid"/>
                <div class="food-meal-left">
                    <a href="#"><strong>{!! $val['remaining_servings'] !!}</strong> Left</a>
                </div>
                @if($val['remaining_servings'] <= 0)
                    <div class="food-meal-btn red">
                        <a href="#">
                            Sold out
                            <strong>{!! $val['price_view'] !!}</strong>
                        </a>
                    </div>
                @else
                    <div class="food-meal-btn green">
                        <a href="#">
                            Add to meal
                            <strong>{!! $val['price_view'] !!}</strong>
                        </a>
                    </div>
                @endif
            </div>
            <div class="food-list-details">
                <div class="row">
                    <div class="col-7">
                        <div class="food-name">
                            {!! $val['name'] !!}
                        </div>
                        <div class="food-chef-name">
                            <strong>Chef:</strong> {!! $val['chef']['full_name'] !!}
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