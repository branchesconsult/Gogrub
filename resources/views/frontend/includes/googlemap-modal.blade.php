<div class="modal fade gopop" id="map-modal" tabindex="-1" role="dialog" aria-labelledby="map-modal"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <img src="{!! asset('frontend/images/Group489@2x.png') !!}"/>
                <h5 class="modal-title">Pin Your location</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="arrow-down"><img src="{!! asset('frontend/images/Path828@2x.png') !!}"/></div>
            <div class="modal-body var-num" style="padding: 0">
                <div class="col-12 food-quan d-inline-flex">
                    <div id="location-map-in-popup" style="height: 500px;width: 100%;"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button onclick="setUserGlobalLocation()" class="btn-success btn">
                    Update location
                </button>
            </div>
        </div>
    </div>
</div>
@section('google-map-modal-scripts')
    {{--<script type="text/javascript">--}}
    {{--$(document).ready(function () {--}}
    {{--$("#location-map-in-popup").geocomplete({--}}
    {{--map: "#location-map-in-popup",--}}
    {{--markerOptions: {--}}
    {{--draggable: true--}}
    {{--}--}}
    {{--}).bind('geocode:dragged', function (event, latLng) {--}}
    {{--getAddressByLatLng(latLng);--}}
    {{--}).bind('geocode:result', function (event, latLng) {--}}
    {{--getAddressByLatLng(latLng.geometry.location);--}}
    {{--});--}}
    {{--});--}}
    {{--</script>--}}
@stop