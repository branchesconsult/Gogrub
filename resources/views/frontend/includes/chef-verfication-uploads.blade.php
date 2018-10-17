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
                            <fieldset>
                                <h2 class="fs-title">Personal Details</h2>
                                <h3 class="fs-subtitle">Tell us something more about you</h3>
                                <div class="input-group mb-3">
                                    <img id="triggerimg"
                                         src="{!! asset('frontend/images/Group781@2x.png') !!}"
                                         alt="your image"/>
                                </div>
                                <input type="button" name="next" class="next action-button" value="Next"/>
                            </fieldset>
                            <fieldset>
                                <h2 class="fs-title">Social Profiles</h2>
                                <h3 class="fs-subtitle">Your presence on the social network</h3>
                                <input type="text" name="twitter" placeholder="Twitter"/>
                                <input type="text" name="facebook" placeholder="Facebook"/>
                                <input type="text" name="gplus" placeholder="Google Plus"/>
                                <input type="button" name="previous" class="previous action-button-previous"
                                       value="Previous"/>
                                <input type="button" name="next" class="next action-button" value="Next"/>
                            </fieldset>
                            <fieldset>
                                <h3>We will review and send you confirmation in 48 hours.</h3>
                            </fieldset>
                        </form>
                        <!-- link to designify.me code snippets -->
                        <div class="dme_link">
                            <p><a href="http://designify.me/code-snippets-js/" target="_blank">More Code Snippets</a>
                            </p>
                        </div>
                        <!-- /.link to designify.me code snippets -->
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
    <script>
        $(document).ready(function () {
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
                            'transform': 'scale(' + scale + ')'
                        });
                        next_fs.css({'left': left, 'opacity': opacity});
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
                        current_fs.css({'left': left});
                        previous_fs.css({'transform': 'scale(' + scale + ')', 'opacity': opacity});
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