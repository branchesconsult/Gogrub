<!--Var = chefs-->
@foreach($chefs as $key => $val)
    <div class="col-3">
        <div class="chef-block">
            <div class="chef-image">
                <img src="{!! getImgSrc($val['avatar'], 290, 290) !!}"
                     class="img-fluid"/>
                {{--<div class="chef-comment-btn">--}}
                {{--<a href=""><i class="fa fa-comment"></i></a>--}}
                {{--</div>--}}
            </div>
            <div class="chef-list-details">
                <div class="chef-name">{!! $val['full_name'] !!}</div>
                <div class="star-rating">
                    {!! printRatingStars($val['avg_rating']) !!}
                </div>
                <div class="chef-review">
                    ({!! $val['rating_reviews_count'] !!})
                    {!! ($val['rating_reviews_count'] > 1)?'Reviews':'Review' !!}</div>
            </div>
        </div>
    </div>
@endforeach