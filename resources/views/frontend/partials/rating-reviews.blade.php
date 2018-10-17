<div class="col-{!! $colSize !!}">
    @if(count($rating_reviews) > 0)
        <div class="order-comments">
            <h2>Reviews ({!! count($rating_reviews) !!})</h2>
            <div class="order-scroll">
                @foreach($rating_reviews as $key => $val)
                    <div class="cmnt-box">
                        <img src="{!! getImgSrc($val['user']['avatar'], 70, 70) !!}"/>
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
    @endif
</div>