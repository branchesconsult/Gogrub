<section class="banner">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>are you</h3>
                <h1>Hungry?</h1>
                <form class="form-inline banner-form">
                    <input
                            class="form-control mr-sm-2"
                            type="search"
                            placeholder="Find yourself on map"
                            id="address-autocomplete"
                            value="{!! session()->get('customer.customer_address') !!}"
                    />
                    <a href="#"></a>
                    <button class="btn btn-outline-success my-2 my-sm-0 active" type="submit">Find Food Around Me
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@include('frontend.includes.googlemap-modal')
@section('search-banner-js')
    <script>
        $(document).ready(function () {
            $("#address-autocomplete")
                .geocomplete()
                .bind("geocode:result", function (event, result) {
                    console.log(result, result.geometry.location.lat());
                    $.ajax({
                        url: '{!! route('frontend.session.location.store') !!}',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            session_customer_address: result.formatted_address,
                            session_customer_location: result.geometry.location.lat() + ',' + result.geometry.location.lng()
                        },
                        beforeSend: function () {
                        },
                        success: function (data) {
                            openBsModal('map-modal');
                        },
                        error: function (data) {

                        }
                    });
                }).bind('geocode:dragged', function (event, latLng) {
                getAddressByLatLng(latLng);
            });
        });

        function getAddressByLatLng(latlng) {
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
@stop