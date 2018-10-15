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
