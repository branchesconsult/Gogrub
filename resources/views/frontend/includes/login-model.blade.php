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
                {!! Form::open(['route' => 'frontend.auth.login', 'id' => 'frm-login']) !!}
                <div class="form-group">
                    <label for="mobile">Mobile Number</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">+92</div>
                        </div>
                        {!! Form::text('mobile', null, ['class' => 'form-control', 'required'=>true,
                        'id'=>'mobile']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    {!! Form::text('password', null, ['class' => 'form-control required',
                    'id'=>'password']) !!}
                </div>

                @include('frontend.includes.server-messages')

                <div class="btn-sign">
                    <button type="submit"
                            onclick="doLogin()"
                            class="btn btn-primary">
                        Sign In
                    </button>
                </div>
                {!! Form::close() !!}
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
@section('login-model-scripts')

    <script>
        function doLogin() {
            $("#frm-login").validate({
                submitHandler: function (form) {
                    $.ajax({
                        url: $("#frm-login").attr('action'),
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            mobile: $("#mobile").val(),
                            password: $("#password").val(),
                            device_type: navigator.userAgent,
                            fcm_token: 'N/A',
                            device_id: navigator.userAgent
                        },
                        beforeSend: function () {

                        },
                        success: function (data) {
                            $("#server-ajax-messages div").hide();
                            var divToShow = $("#server-ajax-messages ." + data.message_type);
                            if (data.success == false) {
                                divToShow.html(data.message);
                                divToShow.show();
                            } else {
                                if (data.user.confirmed == 1) {
                                    window.location.reload(true);
                                } else {
                                    $("#verify-mobile").html(data.user.mobile);
                                    openBsModal('varify');
                                }
                            }
                        },
                        error: function (data) {
                            $("#server-ajax-messages div").hide();
                            var divToShow = $("#server-ajax-messages .error");
                            divToShow.html(data.responseJSON.message);
                            divToShow.show();
                        }
                    });
                }
            });
        }
    </script>
@stop