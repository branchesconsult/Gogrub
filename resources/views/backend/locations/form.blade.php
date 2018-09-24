{{Form::hidden('user_role', $locationable_type)}}
{{Form::hidden('locationable_id', $locationable_id)}}
<input type="hidden" name="location_point" id="location"/>
<div class="form-group">
    {{-- Including Form blade file --}}
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('building_name', 'Building Name', ['class' => 'col-lg-2 control-label required']) }}
            <div class="col-lg-10">
                {{ Form::text('building_name', null,
                [
                'class' => 'form-control box-size',
                 'required' => 'required']) }}
            </div>
        </div><!--form-group-->
        <div class="form-group">
            {{ Form::label('', 'Location (google map)', ['class' => 'col-lg-2 control-label']) }}
            <div class="col-lg-10">
                {{ Form::text('address_map', null,
                ['class' => 'form-control box-size', 'id' => 'address_map'])
                 }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('', 'Please drag location marker to adjust location', ['class' => 'col-lg-2 control-label']) }}
            <div class="col-lg-8">
                <div style="height: 400px; width: 100%" class="map" id="location_map"></div>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('address', 'Address', ['class' => 'col-lg-2 control-label required']) }}
            <div class="col-lg-10">
                {{ Form::textarea('address', null,
                [
                'class' => 'form-control box-size',
                 'required' => 'required'])
                 }}
            </div>
        </div>
        <div style="display: none;">
            <div class="form-group">
                {{ Form::label('city', 'City', ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-10">
                    {{ Form::text('city_id', 1,
                    ['class' => 'form-control box-size', 'id' => 'city', 'readonly'=>true])
                     }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('province_id', 'Province', ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-10">
                    {{ Form::text('province_id', 1,
                    ['class' => 'form-control box-size', 'id' => 'province', 'readonly'=>true])
                     }}
                </div>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('phone', 'Phone', ['class' => 'col-lg-2 control-label']) }}
            <div class="col-lg-10">
                {{ Form::text('phone', null,
                ['class' => 'form-control box-size'])
                 }}
            </div>
        </div>
    </div>
</div><!-- form-group -->


@section("after-scripts")
    {!! Html::script(asset('/vendor/laravel-filemanager/js/lfm.js')) !!}
    {!! Html::script(asset('/js/backend/bootstrap-tabcollapse.js')) !!}
    {!! Html::script('https://maps.googleapis.com/maps/api/js?key=AIzaSyC263na3AWmXdy9htO50E9kiq2-cgbBsMo&libraries=places,geometry,drawing,v=3.exp') !!}
    {!! Html::script(asset('/js/gmaps.js')) !!}
    {!! Html::script(asset('/js/jquery.geocomplete.min.js')) !!}
    {{-- For DataTables --}}
    {{ Html::script(mix('js/dataTable.js')) }}
    <script type="text/javascript">
        $(document).ready(function () {
            $("#address_map").geocomplete({
                map: "#location_map",
                markerOptions: {
                    draggable: true
                }
            }).bind('geocode:dragged', function (event, latLng) {
                getAddressByLatLng(latLng);
            }).bind('geocode:result', function (event, latLng) {
                getAddressByLatLng(latLng.geometry.location);
            });
                    @if(!empty($location))
            var map = new GMaps({
                    div: '#location_map',
                    lat: 32.127236058579,
                    lng: 74.004938739844
                });
            map.addMarker({
                lat: 32.127236058579,
                lng: 74.004938739844,
                title: 'Location',
                click: function (e) {

                }
            });
            @endif
        });


        function getAddressByLatLng(latlng) {
            $("#location").val(latlng.lat() + ',' + latlng.lng());
            new google.maps.Geocoder().geocode({'latLng': latlng}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    console.log(results);
                    if (results[0]) {
                        $.each(results[0].address_components, function (index, data) {
                            if (data.types[0] == "country") {
                                $("#country").val(data.long_name)
                            }
                            if (data.types[0] == "administrative_area_level_1") {
                                $("#administrative_area_level_1").val(data.long_name);
                            }
                            if (data.types[0] == "administrative_area_level_2") {
                                $("#district").val(data.long_name);
                            } else {
                                $("#district").val('');
                            }

                            if (data.types[0] == "country") {
                                console.log("Country=" + data.long_name)
                            }
                            if (data.types[0] == "postal_code") {
                                $("#postal_code").val(data.long_name)
                            } else {
                                $("#postal_code").val('')
                            }
                            //$("#address").val(results[1].formatted_address);
                        });
                    }
                    if (results[1]) {
                        var country = null, countryCode = null, city = null, cityAlt = null;
                        var c, lc, component;
                        for (var r = 0, rl = results.length; r < rl; r += 1) {
                            var result = results[r];
                            if (!city && result.types[0] === 'locality') {
                                for (c = 0, lc = result.address_components.length; c < lc; c += 1) {
                                    component = result.address_components[c];
                                    if (component.types[0] === 'locality') {
                                        city = component.long_name;
                                        break;
                                    }
                                }
                            }
                            else if (!city && !cityAlt && result.types[0] === 'administrative_area_level_1') {
                                for (c = 0, lc = result.address_components.length; c < lc; c += 1) {
                                    component = result.address_components[c];
                                    if (component.types[0] === 'administrative_area_level_1') {
                                        cityAlt = component.long_name;
                                        break;
                                    }
                                }
                            } else if (!country && result.types[0] === 'country') {
                                country = result.address_components[0].long_name;
                                countryCode = result.address_components[0].short_name;
                            }

                            if (city && country) {
                                break;
                            }
                        }
                        //$("#city").val(city);
                    }
                }
            });
        }
    </script>
@endsection