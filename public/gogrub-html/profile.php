<?php include 'header.php'; ?> 
 
<section class="profile">
	<div class="container">
        <div class="row justify-content-md-center">
            <div class="col-6">
                <div class="chef-profile">
                    <img src="images/alleanza_albania_-2@2x.png" />
                      <div class="input mb-3">
                        <input type="text" class="form-control" id="chef-name" value="William Smith" readonly>
                      </div>
                </div>
                  <div class="form-group">
                      <label for="FormInput1">Mobile Number</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">+92</div>
                        </div>
                        <input type="text" class="form-control" id="FormInput1">
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="Password1">Password</label>
                    <input type="password" class="form-control" id="Password1" placeholder="************">
                  </div>
                  <div class="form-group">
                    <label for="Password2">Re enter password</label>
                    <input type="password" class="form-control" id="Password2" placeholder="************">
                  </div>
                  <div class="btn-sign">	
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>                
                
        	</div>
        </div>
    </div>
</section>        

<?php include 'footer.php'; ?> 