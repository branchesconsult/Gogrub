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
@yield('before-styles')
@yield('after-styles')
{!! Html::style(asset('frontend/pincode-input/bootstrap-pincode-input.css')) !!}
{!! Html::style('//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css') !!}
{!! Html::style(asset('frontend/dropzone/dropzone.css')) !!}
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
        #wait-overley {
            position: fixed;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 9999999;
            display: none;
        }

        .hide {
            display: none;
        }

        .gopop#varify .var-num .code input {
            padding: 0;
        }

        .fa.fa-star.active {
            color: #23d25b !important;
        }

        /**Step form**/
        /*form styles*/
        #msform {
            text-align: center;
            position: relative;
            margin-top: 30px;
        }

        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 0px;
            box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
            padding: 20px 30px;
            box-sizing: border-box;
            width: 80%;
            margin: 0 10%;

            /*stacking fieldsets above each other*/
            position: relative;
        }

        /*Hide all except first fieldset*/
        #msform fieldset:not(:first-of-type) {
            display: none;
        }

        /*inputs*/
        #msform input, #msform textarea {
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 0px;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
            font-family: montserrat;
            color: #2C3E50;
            font-size: 13px;
        }

        #msform input:focus, #msform textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #ee0979;
            outline-width: 0;
            transition: All 0.5s ease-in;
            -webkit-transition: All 0.5s ease-in;
            -moz-transition: All 0.5s ease-in;
            -o-transition: All 0.5s ease-in;
        }

        /*buttons*/
        #msform .action-button {
            width: 100px;
            background: #ee0979;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 25px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px;
        }

        #msform .action-button:hover, #msform .action-button:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #ee0979;
        }

        #msform .action-button-previous {
            width: 100px;
            background: #C5C5F1;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 25px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px;
        }

        #msform .action-button-previous:hover, #msform .action-button-previous:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #C5C5F1;
        }

        /*headings*/
        .fs-title {
            font-size: 18px;
            text-transform: uppercase;
            color: #2C3E50;
            margin-bottom: 10px;
            letter-spacing: 2px;
            font-weight: bold;
        }

        .fs-subtitle {
            font-weight: normal;
            font-size: 13px;
            color: #666;
            margin-bottom: 20px;
        }

        /*progressbar*/
        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            /*CSS counters to number the steps*/
            counter-reset: step;
        }

        #progressbar li {
            list-style-type: none;
            color: white;
            text-transform: uppercase;
            font-size: 9px;
            width: 33.33%;
            float: left;
            position: relative;
            letter-spacing: 1px;
        }

        #progressbar li:before {
            content: counter(step);
            counter-increment: step;
            width: 24px;
            height: 24px;
            line-height: 26px;
            display: block;
            font-size: 12px;
            color: #333;
            background: white;
            border-radius: 25px;
            margin: 0 auto 10px auto;
        }

        /*progressbar connectors*/
        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: white;
            position: absolute;
            left: -50%;
            top: 9px;
            z-index: -1; /*put it behind the numbers*/
        }

        #progressbar li:first-child:after {
            /*connector not needed before the first step*/
            content: none;
        }

        /*marking active/completed steps green*/
        /*The number of the step and the connector before it = green*/
        #progressbar li.active:before, #progressbar li.active:after {
            background: #ee0979;
            color: white;
        }

        /* Not relevant to this form */
        .dme_link {
            margin-top: 30px;
            text-align: center;
        }

        .dme_link a {
            background: #FFF;
            font-weight: bold;
            color: #ee0979;
            border: 0 none;
            border-radius: 25px;
            cursor: pointer;
            padding: 5px 25px;
            font-size: 12px;
        }

        .dme_link a:hover, .dme_link a:focus {
            background: #C5C5F1;
            text-decoration: none;
        }
    </style>
</head>
<body id="app-layout">
<div id="wait-overley"></div>
<section id="pg-area-to-change"><!--Section Id Start-->
    <div id="app">
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
            <div class="col-2">
                <ul class="footer-nav">
                    <li><a href="">About Us</a></li>
                    <li><a href="">Contact</a></li>
                    <li><a href="">Terms and Condition</a></li>
                </ul>
            </div>
            <div class="col-2">
                <ul class="footer-nav">
                    <li><a href="">Facebook</a></li>
                    <li><a href="">Twitter</a></li>
                    <li><a href="">Instagram</a></li>
                </ul>
            </div>
            <div class="col-4">
                <p>Send Us Your Feedback</p>
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="email" placeholder="Email Address" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">OK</button>
                </form>
            </div>
            <div class="col-4">
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
<script>
    $(document).ready(function () {
        initMap();
        $("#address-autocomplete").geocomplete();
        //Global ajax spinner
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
        jQuery('#step-1').click(function () {
            jQuery(this).parent().parent().parent().hide().next().show();//hide parent and show next
        });

        //Replace all broken images
        {{--$("img").each(function () {--}}
        {{--$(this).attr("onerror", "this.src='http://gogrub.docs/frontend/images/images@2x.png'");--}}
        {{--});--}}
    });
    function editName(number) {
        document.getElementById('name' + number).readOnly = false;
    };
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
</script>
</body>
</html>