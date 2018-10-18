<section class="banner">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>are you</h3>
                <h1>Hungry?</h1>
                {!! Form::open(['route' => 'frontend.products.list',
                'class' =>'form-inline banner-form', 'method' => 'GET']) !!}
                {!! Form::search(
                    's', session()->get('customer.customer_address'),
                    ['class' => 'form-control mr-sm-2',
                    'placeholder' => 'Find yourself on map',
                    'id' => 'address-autocomplete',
                    ]
                ) !!}
                <div style="display: none;">
                    <input type="text" name="session_customer_address" id="session_customer_address"/>
                    <input type="text" name="session_customer_location" id="session_customer_location"/>
                    <input type="text" name="session_customer_city" id="session_customer_city"/>
                    <input type="text" name="session_customer_country" id="session_customer_country"/>
                </div>
                <a href="#"></a>
                <button class="btn btn-outline-success my-2 my-sm-0 active" type="submit">Find Food Around Me
                </button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>
@include('frontend.includes.googlemap-modal')


@section('search-banner-js')
    <script>
        $(document).ready(function () {
            $("#address-autocomplete")
                .geocomplete({
                    map: "#location-map-in-popup",
                    markerOptions: {
                        draggable: true
                    },
                    mapOptions: {
                        zoom: 18
                    }
                })
                .bind("geocode:result", function (event, result) {
                    getAddressByLatLng(result.geometry.location);
                    openBsModal('map-modal');
                }).bind('geocode:dragged', function (event, latLng) {
                getAddressByLatLng(latLng);
            });
        });
        /**
         * get lat long
         * @param latlng
         */
        function getAddressByLatLng(latlng) {
            new google.maps.Geocoder().geocode({'latLng': latlng}, function (results, status) {
                $("#session_customer_location").val(latlng.lat() + ',' + latlng.lng());
                if (status == google.maps.GeocoderStatus.OK) {
                    console.log(results, 'hehrehr');
                    if (results[0]) {
                        $.each(results[0].address_components, function (index, data) {
                            if (data.types[0] == "country") {
                                $("#session_customer_country").val(data.long_name)
                            }
                            if (data.types[0] == "administrative_area_level_1") {
                            }
                            if (data.types[0] == "administrative_area_level_2") {
                            } else {
                            }
                            if (data.types[0] == "postal_code") {
                            } else {
                            }
                            $("#session_customer_address").val(results[1].formatted_address);
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
                        $("#session_customer_city").val(city);
                    }
                }
            });
        }

        function setUserGlobalLocation() {
            $.ajax({
                url: '{!! route('frontend.session.location.store') !!}',
                type: 'POST',
                dataType: 'text',
                data: {
                    session_customer_address: $("#session_customer_address").val(),
                    session_customer_location: $("#session_customer_location").val(),
                    session_customer_city: $("#session_customer_city").val(),
                    session_customer_country: $("#session_customer_country").val()
                },
                beforeSend: function () {
                },
                success: function (data) {
                    $(".modal").modal('hide');
                },
                error: function (data) {

                }
            });
        }
    </script>
@stop