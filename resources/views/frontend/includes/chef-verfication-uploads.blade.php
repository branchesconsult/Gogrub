<div class="modal fade gopop" id="becomechef" tabindex="-1" role="dialog" aria-labelledby="becomechefTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <!-- Step 1 -->
        <div class="modal-content">
            <div class="modal-header">
                <img src="{!! asset('frontend/images/Group489@2x.png') !!}"/>
                <h5 class="modal-title" id="loginTitle">Welcome <span>Step 1 of 2</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="arrow-down">
                <img src="{!! asset('frontend/images/Path828@2x.png') !!}"/>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-12 col-md-offset-3">
                        <form id="msform">
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active">Personal Details</li>
                                <li>Kitchen</li>
                                <li>Account Setup</li>
                            </ul>
                            <!-- fieldsets -->
                            <!--NIC-->
                            <fieldset>
                                <h2 class="fs-title">Personal Details</h2>
                                <h3 class="fs-subtitle">
                                    Please upload your NIC's front and back side
                                </h3>
                                <div class="input-group mb-3 text-center">
                                    <img id="triggerimg"
                                         src="{!! asset('frontend/images/Group781@2x.png') !!}"
                                         alt="your image"/>
                                </div>
                                <div id="get-nics-uploads-gallery-block" class="input-group mb-3 gallery-block">
                                    <div class="field">
                                        <p>Take a clean snap of your ID Card both front and back</p>
                                        <input type="file"
                                               class="ddUpload"
                                               name="nic[]"
                                               accept="image/*"
                                               class="ddUpload"
                                               multiple>
                                    </div>
                                </div>
                                <input type="button"
                                       name="next"
                                       class="next action-button" value="Next"/>
                            </fieldset>
                            <!--Kitchen-->
                            <fieldset>
                                <h2 class="fs-title">Kitchen pics</h2>
                                <h3 class="fs-subtitle">Please upload your kitchen pics</h3>

                                <div class="input-group mb-3 text-center">
                                    <img
                                            src="{!! asset('frontend/images/Group781@2x.png') !!}"
                                            alt="your image"/>
                                </div>
                                <div class="input-group mb-3 gallery-block">
                                    <div class="field">
                                        <p>Take a clean snap of your ID Card both front and back</p>
                                        <div id="image_preview2"></div>
                                        <input type="file"
                                               class="ddUpload"
                                               name="kitchen[]"
                                               accept="image/*"
                                               multiple>
                                    </div>
                                </div>

                                <input type="button" name="previous" class="previous action-button-previous"
                                       value="Previous"/>
                                <input type="button" name="next" class="next action-button" value="Next"/>
                            </fieldset>
                            <fieldset>
                                <h3>We will review and send you confirmation in 48 hours.</h3>
                            </fieldset>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
                <!-- /.MultiStep Form -->
            </div>
            <div class="modal-footer">
                why I have to upload images of my kitchen?
            </div>
        </div>
    </div>
</div>

@section('chef-verification-uploads-scripts')
    {!! Html::script(asset('frontend/imageuploadify/imageuploadify.min.js')) !!}
    <script>
        $(document).ready(function () {

            $('input[type="file"].ddUpload').imageuploadify();
            //jQuery time
            var current_fs, next_fs, previous_fs; //fieldsets
            var left, opacity, scale; //fieldset properties which we will animate
            var animating; //flag to prevent quick multi-click glitches
            $(".next").click(function () {
                if (animating) return false;
                animating = true;
                current_fs = $(this).parent();
                next_fs = $(this).parent().next();
                //activate next step on progressbar using the index of next_fs
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({opacity: 0}, {
                    step: function (now, mx) {
                        //as the opacity of current_fs reduces to 0 - stored in "now"
                        //1. scale current_fs down to 80%
                        scale = 1 - (1 - now) * 0.2;
                        //2. bring next_fs from the right(50%)
                        left = (now * 50) + "%";
                        //3. increase opacity of next_fs to 1 as it moves in
                        opacity = 1 - now;
                        current_fs.css({
                            'transform': 'scale(' + scale + ')',
							'position':'absolute', 'top': '50px'

                        });
                        next_fs.css({'left': left, 'opacity': opacity, 'top': '0',
							'position':'relative'});
                    },
                    duration: 800,
                    complete: function () {
                        current_fs.hide();
                        animating = false;
                    },
                    //this comes from the custom easing plugin
                    easing: 'easeInOutBack'
                });
            });
            $(".previous").click(function () {
                if (animating) return false;
                animating = true;

                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

                //de-activate current step on progressbar
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                //show the previous fieldset
                previous_fs.show();
                //hide the current fieldset with style
                current_fs.animate({opacity: 0}, {
                    step: function (now, mx) {
                        //as the opacity of current_fs reduces to 0 - stored in "now"
                        //1. scale previous_fs from 80% to 100%
                        scale = 0.8 + (1 - now) * 0.2;
                        //2. take current_fs to the right(50%) - from 0%
                        left = ((1 - now) * 50) + "%";
                        //3. increase opacity of previous_fs to 1 as it moves in
                        opacity = 1 - now;
                        current_fs.css({'left': left,
							'position':'absolute', 'top': '50px'});
                        previous_fs.css({'transform': 'scale(' + scale + ')', 'opacity': opacity, 'top': '0',
						'position':'relative'});
                    },
                    duration: 800,
                    complete: function () {
                        current_fs.hide();
                        animating = false;
                    },
                    //this comes from the custom easing plugin
                    easing: 'easeInOutBack'
                });
            });
            $(".submit").click(function () {
                return false;
            });
        });
    </script>
@stop