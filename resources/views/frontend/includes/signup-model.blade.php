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
                {!! Form::open(['route' => 'frontend.auth.user.fromweb.register', 'id'=>'frm-signup']) !!}
                <div class="form-group">
                    <label for="FormInputGroupMobile">Mobile Number</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">+92</div>
                        </div>
                        {!! Form::text('mobile', null, ['class' => 'form-control', 'required'=>true,
                       'id'=>'mobile-reg']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Full name</label>
                    {!! Form::text('full_name', null, ['class' => 'form-control', 'required'=>true,
                       'id'=>'full_name-reg']) !!}
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    {!! Form::text('email', null, ['class' => 'form-control', 'required'=>true,
                       'id'=>'email-reg']) !!}
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    {!! Form::password('password', ['class' => 'form-control', 'required'=>true,
                       'id'=>'password-reg']) !!}
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword2">Re enter password</label>
                    {!! Form::password('password_confirmation', ['class' => 'form-control', 'required'=>true,
                        'id'=>'password_confirmation-reg']) !!}
                </div>

                @include('frontend.includes.server-messages')

                <div class="btn-sign">
                    <button type="submit"
                            onclick="doSignup()"
                            class="btn btn-primary">Sign up
                    </button>
                </div>
                {!! Form::close() !!}
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
@section('signup-modal-scripts')
    <script>
        function doSignup() {
            $("#frm-signup").validate({
                submitHandler: function (form) {
                    $.ajax({
                        url: $("#frm-signup").attr('action'),
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            full_name: $("#full_name-reg").val(),
                            email: $("#email-reg").val(),
                            mobile: $('#mobile-reg').val(),
                            password: $("#password-reg").val(),
                            password_confirmation: $("#password_confirmation-reg").val()
                        },
                        beforeSend: function () {

                        },
                        success: function (data) {
                            openBsModal('login');
                        },
                        error: function (data) {
                            $("#server-ajax-messages div").hide();
                            var divToShow = $("#server-ajax-messages .error");

                            var errHtml = '<ul>';
                            $.each(data.responseJSON.errors, function (k, v) {
                                errHtml += '<li>' + v + '</li>';
                            });
                            errHtml += '</ul>';
                            divToShow.html(errHtml);
                            divToShow.show();
                        }
                    });
                }
            });
        }
    </script>
@stop