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
<!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <?php
    echo $google_analytics ?? null;
    ?>
</head>
<body id="app-layout">
<div id="app">
    @include('frontend.includes.nav')

    @include('includes.partials.messages')
    @yield('content')
</div><!--#app-->

<!-- Scripts -->
@yield('before-scripts')
@yield('after-scripts')
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
    <!--Signup-->
    <div class="modal fade gopop" id="signup" tabindex="-1" role="dialog" aria-labelledby="signupTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="{!! asset('frontend/images/Group489@2x.png') !!}"/>
                    <h5 class="modal-title" id="signupTitle">Sign up</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="arrow-down"><img src="{!! asset('frontend/images/Path828@2x.png') !!}"/></div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="FormInputGroupMobile">Mobile Number</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">+92</div>
                                </div>
                                <input type="text" class="form-control" id="FormInputGroupMobile">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword2">Re enter password</label>
                            <input type="password" class="form-control" id="exampleInputPassword2">
                        </div>
                        <div class="btn-sign">
                            <button type="submit" class="btn btn-primary">Sign up</button>
                        </div>
                    </form>
                    <div class="text-sign">
                        Do you have a account? <a href="">Sign In</a>
                    </div>
                </div>
                <div class="modal-footer">
                    Connect using Social Media Accounts
                </div>
            </div>
        </div>
    </div>
    <!--Login-->
    <div class="modal fade gopop" id="login" tabindex="-1" role="dialog" aria-labelledby="loginTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="{!! asset('frontend/images/Group489@2x.png') !!}"/>
                    <h5 class="modal-title" id="loginTitle">Sign In</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="arrow-down"><img src="{!! asset('frontend/images/Path828@2x.png') !!}"/></div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="inlineFormInputMobile">Mobile Number</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">+92</div>
                                </div>
                                <input type="text" class="form-control" id="inlineFormInputMobile">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="InputPassword1">Password</label>
                            <input type="password" class="form-control" id="InputPassword1">
                        </div>
                        <div class="btn-sign">
                            <button type="submit" class="btn btn-primary">Sign In</button>
                        </div>
                    </form>
                    <div class="text-sign">
                        Donesn't have an account? <a href="">Sign Up</a>
                    </div>
                </div>
                <div class="modal-footer">
                    Connect using Social Media Accounts
                </div>
            </div>
        </div>
    </div>
    <!-- Varification -->
    <div class="modal fade gopop" id="varify" tabindex="-1" role="dialog" aria-labelledby="varifyTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="{!! asset('frontend/images/Group489@2x.png') !!}"/>
                    <h5 class="modal-title" id="loginTitle">Verification</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="arrow-down"><img src="{!! asset('frontend/images/Path828@2x.png') !!}"/></div>
                <div class="modal-body var-num">
                    <form>
                        <p>Check your phone did you receive the code?</p>
                        <p>Is that your number?</p>
                        <div class="input-control mb-3">
                            <input type="text" class="form-control" id="name1" value="+92000000000" readonly>
                            <div class="input-group-addon">
                                <span class="fa fa-pencil" onclick=editName('1')></span>
                            </div>
                        </div>
                        <div class="row code">
                            <div class="col-3">
                                <input type="text" name="code1" placeholder="0"/>
                            </div>
                            <div class="col-3">
                                <input type="text" name="code2" placeholder="0"/>
                            </div>
                            <div class="col-3">
                                <input type="text" name="code3" placeholder="0"/>
                            </div>
                            <div class="col-3">
                                <input type="text" name="code4" placeholder="0"/>
                            </div>
                        </div>
                        <div class="btn-sign">
                            <button type="submit" id="step-3" class="btn btn-primary">Next</button>
                        </div>
                    </form>
                    <div class="text-sign">
                        Do you have a account? <a href="">Sign Up</a>
                    </div>
                </div>
                <div class="modal-footer">
                    Connect using Social Media account
                </div>
            </div>
        </div>
    </div>

</div>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
{!! Html::script(asset('http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js')) !!}
{!! Html::script(asset('frontend/js/bootstrap.min.js')) !!}
{!! Html::script('https://maps.googleapis.com/maps/api/js?key=AIzaSyC263na3AWmXdy9htO50E9kiq2-cgbBsMo&libraries=places,geometry,drawing,v=3.exp') !!}
{!! Html::script(asset('/js/gmaps.js')) !!}
{!! Html::script(asset('/js/jquery.geocomplete.min.js')) !!}
<script>
    $(document).ready(function () {
        initMap();
        $("#address-autocomplete").geocomplete();
        jQuery(".triggerbtn").click(function () {
            jQuery(this).closest('div').find('#files').click();
        });
        jQuery('#step-1').click(function () {
            jQuery(this).parent().parent().parent().hide().next().show();//hide parent and show next
        });
    });
    function editName(number) {
        document.getElementById('name' + number).readOnly = false;
    };
    // locate you.
    function initMap() {

    }
</script>
</body>
</html>