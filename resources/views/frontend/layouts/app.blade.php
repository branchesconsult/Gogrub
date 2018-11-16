@php
    use Illuminate\Support\Facades\Route;
@endphp
        <!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', app_name())</title>

    <!-- Meta -->
    <meta name="description" content="@yield('meta_description', 'Laravel AdminPanel')">
    <meta name="author" content="@yield('meta_author', 'Viral Solani')">
@yield('meta')

<!-- Styles -->
    <!-- Bootstrap CSS -->
{!! Html::style(asset('frontend/css/bootstrap.min.css')) !!}
{!! Html::style(asset('frontend/css/font-awesome.min.css')) !!}
{!! Html::style(asset('frontend/css/star-rating.css')) !!}
{!! Html::style(asset('frontend/css/style.css')) !!}
{!! Html::style(mix('css/frontend.css')) !!}
@yield('before-styles')
@yield('after-styles')
{!! Html::style('//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css') !!}

<!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <?php
    echo $google_analytics ?? null;
    ?>
    <style>

    </style>
</head>
<body id="app-layout">
<div id="wait-overley"></div>
<section id="pg-area-to-change"><!--Section Id Start-->
    <div id="app">
        @if(request()->has('error_message') && !empty(request()->get('error_message')))
            <div class="col-12">
                <div class="alert alert-danger">
                    {!! request()->get('error_message') !!}
                </div>
            </div>
        @endif
        @include('frontend.includes.nav')
        @include('includes.partials.messages')
        @yield('content')
    </div><!--#app-->
</section><!----------- Section Id Closed -------------->
<footer>
    <div class="container">
        <div class="row">
            <div class="footer-logo">
                <div class="logo-footer"><img src="{!! asset('frontend/images/Group489@2x.png') !!}"/></div>
                <div class="copyright">@ 2018 <strong>Go Grub</strong></div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6 col-sm-12">
                <ul class="footer-nav">
                    <li><a href="">About Us</a></li>
                    <li><a href="">Contact</a></li>
                    <li><a href="">Terms and Condition</a></li>
                </ul>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12">
                <ul class="footer-nav">
                    <li><a href="">Facebook</a></li>
                    <li><a href="">Twitter</a></li>
                    <li><a href="">Instagram</a></li>
                </ul>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12">
                <p>Send Us Your Feedback</p>
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="email" placeholder="Email Address" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">OK</button>
                </form>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12">
                <div class="footer-info">
                    497 Evergreen Rd. Roseville, CA 95673<br/>
                    +44 345 678 903<br/>
                    adobexd@mail.com
                </div>
            </div>
        </div>
    </div>
</footer>
<div id="all-models">
    @include('frontend.includes.login-model')
    @include('frontend.includes.signup-model')
    @if(\Auth::check())
        @include('frontend.includes.verification-model')
        @include('frontend.includes.chef-verfication-uploads')
    @endif
</div>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
{!! Html::script(asset('frontend/js/jquery.min.js')) !!}
{!! Html::script('http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js') !!}
{!! Html::script(asset('frontend/popperjs/popper.min.js')) !!}
{!! Html::script(asset('frontend/js/bootstrap.min.js')) !!}
{!! Html::script(asset('frontend/validation/jquery.validate.js')) !!}
{!! Html::script(asset('frontend/validation/additional-methods.js')) !!}
{!! Html::script('https://maps.googleapis.com/maps/api/js?key=AIzaSyC263na3AWmXdy9htO50E9kiq2-cgbBsMo&libraries=places,geometry,drawing,v=3.exp') !!}
{!! Html::script(asset('/js/gmaps.js')) !!}
{!! Html::script(asset('/js/jquery.geocomplete.min.js')) !!}
<!-- Scripts -->
@yield('before-scripts')
@yield('after-scripts')
@yield('login-model-scripts')
@yield('verify-model-scripts')
@yield('signup-modal-scripts')
@yield('add-to-card-modal-scripts')
@yield('cart-page-scripts')
@yield('chef-verification-uploads-scripts')
@yield('search-banner-js')
@yield('google-map-modal-scripts')

<script>
    $(document).ready(function () {
        initMap();
        //Global ajax spinner
        $('.tooltip-input').tooltip();
        $(document)
            .ajaxStart(function () {
                $("#wait-overley").show();
            })
            .ajaxStop(function () {
                $("#wait-overley").hide();
            });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Device-Type': 'browser'
            }
        });
        jQuery(".triggerbtn").click(function () {
            jQuery(this).closest('div').find('#files').click();
        });
        //Replace all broken images
        $("img").each(function () {
            $(this).attr("onerror", "this.src='http://gogrub.docs/frontend/images/images@2x.png'");
        });
    });
    // locate you.
    function initMap() {

    }
    function openBsModal(modelId) {
        $("#server-ajax-messages div").hide();
        $(".modal").modal('hide');
        setTimeout(function () {
            $("#" + modelId).modal('show');
        }, 700);
        return false;
    }

    function redirectTo(pgUrl) {
        return window.location.href = pgUrl;
    }
    function scrollToEle(eleId) {
        $('html, body').animate({
            scrollTop: $("#" + eleId).offset().top
        }, 200, 'linear', $('.tooltip-input').tooltip('show'));
    }
</script>
</body>
</html>