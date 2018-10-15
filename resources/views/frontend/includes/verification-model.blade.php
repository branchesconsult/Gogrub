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
                {!! Form::open(['route' => 'frontend.auth.mobile.verify', 'id'=>'frm-mobile-verify']) !!}
                <p>Check your phone did you receive the code?</p>
                <p>Is that your number?</p>
                <div class="input-control mb-3">
                    <a href="#"
                       data-name="mobile"
                       id="verify-mobile">
                        @if(\Auth::check())
                            {!! \Auth::user()->mobile !!}
                        @endif
                    </a>
                </div>
                <div class="row code">
                    <input type="text"
                           name="confirmation_code"
                           id="confirmation_code">
                </div>
                @include('frontend.includes.server-messages')
                <div class="btn-sign">
                    <button type="submit" id="step-3" class="btn btn-primary">Next</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<!--verification success msg model-->
<div class="modal fade gopop" id="update-mobile-success" tabindex="-1" role="dialog" aria-labelledby="varifyTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <img src="{!! asset('frontend/images/Group489@2x.png') !!}"/>
                <h5 class="modal-title" id="loginTitle">Mobile verified</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="arrow-down"><img src="{!! asset('frontend/images/Path828@2x.png') !!}"/></div>
            <div class="modal-body var-num">
                <h1>Mobile updated</h1>
                <p>You mobile has been updated you will recieve verification code on it!</p>
            </div>
        </div>
    </div>
</div>
<!--Verification number success-->
<div class="modal fade gopop" id="verify-mobile-success" tabindex="-1" role="dialog" aria-labelledby="varifyTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <img src="{!! asset('frontend/images/Group489@2x.png') !!}"/>
                <h5 class="modal-title" id="loginTitle">Mobile verified</h5>
                <a href="{!! asset('/') !!}"
                >
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div class="arrow-down"><img src="{!! asset('frontend/images/Path828@2x.png') !!}"/></div>
            <div class="modal-body var-num">
                <h1>Congratulations</h1>
                <p>You mobile has been verified you can enjoy food ordering now!!!</p>
            </div>
        </div>
    </div>
</div>
@section('verify-model-scripts')
    {!! Html::script(asset('frontend/pincode-input/bootstrap-pincode-input.js')) !!}
    {!! Html::script(asset('frontend/editable/bootstrap3-editable/js/bootstrap-editable.min.js')) !!}
    <script>
        $(document).ready(function () {
            //Pincode input
            $('#confirmation_code').pincodeInput({inputs: 4, hidedigits: false});
            //jQuery editable
            $.fn.editable.defaults.mode = 'inline';
            $('#verify-mobile').editable({
                type: 'text',
                name: 'mobile',
                savenochange: true,
                pk: 1,
                url: '{!! route('frontend.auth.mobile.update') !!}',
                title: 'Enter user',
                success: function (response, newValue) {
                    openBsModal('update-mobile-success');
                },
                validate: function (value) {
                    if ($.trim(value) == '' || $.trim(value).length < 10) {
                        return 'Please enter valid number';
                    }
                }
            });
            //Ajax form
            $("#frm-mobile-verify").validate({
                submitHandler: function (form) {
                    $.ajax({
                        url: $('#frm-mobile-verify').attr('action'),
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            confirmation_code: $("#confirmation_code").val()
                        },
                        beforeSend: function () {

                        },
                        success: function (data) {
                            openBsModal('verify-mobile-success');
                        },
                        error: function (data, res) {
                            $("#server-ajax-messages div").hide();
                            var divToShow = $("#server-ajax-messages .error");
                            divToShow.html(data.responseJSON.message);
                            divToShow.show();
                        }
                    });
                }
            });
        });
    </script>
@stop