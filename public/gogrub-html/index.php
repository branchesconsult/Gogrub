
    <?php include 'header.php'; ?> 


    
    	<section class="banner">
        	<div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3>are you</h3> 
                        <h1>Hungry?</h1>
                        <form class="form-inline banner-form">
                            <input class="form-control mr-sm-2" type="search" placeholder="Find yourself on map" />
                            <a href="#"></a>
                            <button class="btn btn-outline-success my-2 my-sm-0 active" type="submit">Find Food Around Me</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="chef-list">
        	<div class="container">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#food" role="tab" aria-controls="food" aria-selected="true">Food</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="chefs-tab" data-toggle="tab" href="#chefs" role="tab" aria-controls="chefs" aria-selected="false">Chefs</a>
                  </li>
                  <li class="nav-item filters pull-right">
                  	<button type="button" data-toggle="modal" data-target="#filteroverlay">Filter Search <span></span></button>
                  </li>
                </ul>
                <!-- Button trigger modal -->

                <!-- Modal -->
                <div class="modal fade" id="filteroverlay" tabindex="-1" role="dialog" aria-labelledby="filteroverlayTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="filteroverlayTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        ...
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="food" role="tabpanel" aria-labelledby="food-tab">
                  <div class="row">
                  	<div class="col-3">
                        <div class="food-block">
                            <div class="food-image">
                                <img src="images/images@2x.png" class="img-fluid" />
                                <div class="food-meal-left">
                                    <a href="#"><strong>20</strong> Left</a>
                                </div>
                                <div class="food-meal-btn red">
                                    <a href="#">Sold Out <strong>$9</strong></a>
                                </div>
                            </div>
                            <div class="food-list-details">
                            	<div class="row">
                                    <div class="col-6">
                                        <div class="food-name">Mince Biryani</div>
                                        <div class="food-chef-name"><strong>Chef:</strong> William Smith</div>
                                        <div class="food-cuisine"><strong>Cuisine:</strong> Desi</div>
                                    </div>
                                    <div class="col-6">
                                        <div class="food-serving"><strong>Serving Size:</strong> 
                                        <i class="fa fa-user"></i> <i class="fa fa-user"></i> <i class="fa fa-user"></i> <i class="fa fa-user"></i> <i class="fa fa-user"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-3">
                        <div class="food-block">
                            <div class="food-image">
                                <img src="images/images@2x.png" class="img-fluid" />
                                <div class="food-meal-left">
                                    <a href="#"><strong>20</strong> Left</a>
                                </div>
                                <div class="food-meal-btn">
                                    <a href="#">Add to meal <strong>$9</strong></a>
                                </div>
                            </div>
                            <div class="food-list-details">
                            	<div class="row">
                                    <div class="col-6">
                                        <div class="food-name">Mince Biryani</div>
                                        <div class="food-chef-name"><strong>Chef:</strong> William Smith</div>
                                        <div class="food-cuisine"><strong>Cuisine:</strong> Desi</div>
                                    </div>
                                    <div class="col-6">
                                        <div class="food-serving"><strong>Serving Size:</strong> 
                                        <i class="fa fa-user"></i> <i class="fa fa-user"></i> <i class="fa fa-user"></i> <i class="fa fa-user"></i> <i class="fa fa-user"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-3">
                        <div class="food-block">
                            <div class="food-image">
                                <img src="images/images@2x.png" class="img-fluid" />
                                <div class="food-meal-left">
                                    <a href="#"><strong>20</strong> Left</a>
                                </div>
                                <div class="food-meal-btn">
                                    <a href="#">Add to meal <strong>$9</strong></a>
                                </div>
                            </div>
                            <div class="food-list-details">
                            	<div class="row">
                                    <div class="col-6">
                                        <div class="food-name">Mince Biryani</div>
                                        <div class="food-chef-name"><strong>Chef:</strong> William Smith</div>
                                        <div class="food-cuisine"><strong>Cuisine:</strong> Desi</div>
                                    </div>
                                    <div class="col-6">
                                        <div class="food-serving"><strong>Serving Size:</strong> 
                                        <i class="fa fa-user"></i> <i class="fa fa-user"></i> <i class="fa fa-user"></i> <i class="fa fa-user"></i> <i class="fa fa-user"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-3">
                        <div class="food-block">
                            <div class="food-image">
                                <img src="images/images@2x.png" class="img-fluid" />
                                <div class="food-meal-btn">
                                    <a href="#">Add to meal <strong>$9</strong></a>
                                </div>
                            </div>
                            <div class="food-list-details">
                            	<div class="row">
                                    <div class="col-6">
                                        <div class="food-name">Mince Biryani</div>
                                        <div class="food-chef-name"><strong>Chef:</strong> William Smith</div>
                                        <div class="food-cuisine"><strong>Cuisine:</strong> Desi</div>
                                    </div>
                                    <div class="col-6">
                                        <div class="food-serving"><strong>Serving Size:</strong> 
                                        <i class="fa fa-user"></i> <i class="fa fa-user"></i> <i class="fa fa-user"></i> <i class="fa fa-user"></i> <i class="fa fa-user"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-3">
                        <div class="food-block">
                            <div class="food-image">
                                <img src="images/images@2x.png" class="img-fluid" />
                                <div class="food-meal-left">
                                    <a href="#"><strong>20</strong> Left</a>
                                </div>
                                <div class="food-meal-btn">
                                    <a href="#">Add to meal <strong>$9</strong></a>
                                </div>
                            </div>
                            <div class="food-list-details">
                            	<div class="row">
                                    <div class="col-6">
                                        <div class="food-name">Mince Biryani</div>
                                        <div class="food-chef-name"><strong>Chef:</strong> William Smith</div>
                                        <div class="food-cuisine"><strong>Cuisine:</strong> Desi</div>
                                    </div>
                                    <div class="col-6">
                                        <div class="food-serving"><strong>Serving Size:</strong> 
                                        <i class="fa fa-user"></i> <i class="fa fa-user"></i> <i class="fa fa-user"></i> <i class="fa fa-user"></i> <i class="fa fa-user"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-3">
                        <div class="food-block">
                            <div class="food-image">
                                <img src="images/images@2x.png" class="img-fluid" />
                                <div class="food-meal-left">
                                    <a href="#"><strong>20</strong> Left</a>
                                </div>
                                <div class="food-meal-btn">
                                    <a href="#">Add to meal <strong>$9</strong></a>
                                </div>
                            </div>
                            <div class="food-list-details">
                            	<div class="row">
                                    <div class="col-6">
                                        <div class="food-name">Mince Biryani</div>
                                        <div class="food-chef-name"><strong>Chef:</strong> William Smith</div>
                                        <div class="food-cuisine"><strong>Cuisine:</strong> Desi</div>
                                    </div>
                                    <div class="col-6">
                                        <div class="food-serving"><strong>Serving Size:</strong> 
                                        <i class="fa fa-user"></i> <i class="fa fa-user"></i> <i class="fa fa-user"></i> <i class="fa fa-user"></i> <i class="fa fa-user"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-3">
                        <div class="food-block">
                            <div class="food-image">
                                <img src="images/images@2x.png" class="img-fluid" />
                                <div class="food-meal-left">
                                    <a href="#"><strong>20</strong> Left</a>
                                </div>
                                <div class="food-meal-btn">
                                    <a href="#">Add to meal <strong>$9</strong></a>
                                </div>
                            </div>
                            <div class="food-list-details">
                            	<div class="row">
                                    <div class="col-6">
                                        <div class="food-name">Mince Biryani</div>
                                        <div class="food-chef-name"><strong>Chef:</strong> William Smith</div>
                                        <div class="food-cuisine"><strong>Cuisine:</strong> Desi</div>
                                    </div>
                                    <div class="col-6">
                                        <div class="food-serving"><strong>Serving Size:</strong> 
                                        <i class="fa fa-user"></i> <i class="fa fa-user"></i> <i class="fa fa-user"></i> <i class="fa fa-user"></i> <i class="fa fa-user"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-3">
                        <div class="food-block">
                            <div class="food-image">
                                <img src="images/images@2x.png" class="img-fluid" />
                                <div class="food-meal-left">
                                    <a href="#"><strong>20</strong> Left</a>
                                </div>
                                <div class="food-meal-btn">
                                    <a href="#">Add to meal <strong>$9</strong></a>
                                </div>
                            </div>
                            <div class="food-list-details">
                            	<div class="row">
                                    <div class="col-6">
                                        <div class="food-name">Mince Biryani</div>
                                        <div class="food-chef-name"><strong>Chef:</strong> William Smith</div>
                                        <div class="food-cuisine"><strong>Cuisine:</strong> Desi</div>
                                    </div>
                                    <div class="col-6">
                                        <div class="food-serving"><strong>Serving Size:</strong> 
                                        <i class="fa fa-user"></i> <i class="fa fa-user"></i> <i class="fa fa-user"></i> <i class="fa fa-user"></i> <i class="fa fa-user"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                  </div>
                  </div>
                  
                  <div class="tab-pane fade" id="chefs" role="tabpanel" aria-labelledby="chefs-tab">
                  <div class="row">
                  
                  	<div class="col-3">
                        <div class="chef-block">
                            <div class="chef-image">
                                <img src="images/alleanza_albania_-1@2x.png" class="img-fluid" />
                                <div class="chef-comment-btn">
                                    <a href=""><i class="fa fa-comment"></i></a>
                                </div>
                            </div>
                            <div class="chef-list-details">
                                <div class="chef-name">William Smith</div>
                                <div class="star-rating">
                                    <i class="fa fa-star active"></i> 
                                    <i class="fa fa-star active"></i> 
                                    <i class="fa fa-star active"></i> 
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="chef-review">(15) Reviews</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-3">
                        <div class="chef-block">
                            <div class="chef-image">
                                <img src="images/alleanza_albania_-2@2x.png" class="img-fluid" />
                                <div class="chef-comment-btn">
                                    <a href=""><i class="fa fa-comment"></i></a>
                                </div>
                            </div>
                            <div class="chef-list-details">
                                <div class="chef-name">William Smith</div>
                                <div class="star-rating">
                                    <i class="fa fa-star active"></i> 
                                    <i class="fa fa-star active"></i> 
                                    <i class="fa fa-star active"></i> 
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="chef-review">(15) Reviews</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="chef-block">
                            <div class="chef-image">
                                <img src="images/alleanza_albania_-3@2x.png" class="img-fluid" />
                                <div class="chef-comment-btn">
                                    <a href=""><i class="fa fa-comment"></i></a>
                                </div>
                            </div>
                            <div class="chef-list-details">
                                <div class="chef-name">William Smith</div>
                                <div class="star-rating">
                                    <i class="fa fa-star active"></i> 
                                    <i class="fa fa-star active"></i> 
                                    <i class="fa fa-star active"></i> 
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="chef-review">(15) Reviews</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-3">
                        <div class="chef-block">
                            <div class="chef-image">
                                <img src="images/alleanza_albania_-4@2x.png" class="img-fluid" />
                                <div class="chef-comment-btn">
                                    <a href=""><i class="fa fa-comment"></i></a>
                                </div>
                            </div>
                            <div class="chef-list-details">
                                <div class="chef-name">William Smith</div>
                                <div class="star-rating">
                                    <i class="fa fa-star active"></i> 
                                    <i class="fa fa-star active"></i> 
                                    <i class="fa fa-star active"></i> 
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="chef-review">(15) Reviews</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="chef-block">
                            <div class="chef-image">
                                <img src="images/alleanza_albania_-5@2x.png" class="img-fluid" />
                                <div class="chef-comment-btn">
                                    <a href=""><i class="fa fa-comment"></i></a>
                                </div>
                            </div>
                            <div class="chef-list-details">
                                <div class="chef-name">William Smith</div>
                                <div class="star-rating">
                                    <i class="fa fa-star active"></i> 
                                    <i class="fa fa-star active"></i> 
                                    <i class="fa fa-star active"></i> 
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="chef-review">(15) Reviews</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-3">
                        <div class="chef-block">
                            <div class="chef-image">
                                <img src="images/alleanza_albania_-6@2x.png" class="img-fluid" />
                                <div class="chef-comment-btn">
                                    <a href=""><i class="fa fa-comment"></i></a>
                                </div>
                            </div>
                            <div class="chef-list-details">
                                <div class="chef-name">William Smith</div>
                                <div class="star-rating">
                                    <i class="fa fa-star active"></i> 
                                    <i class="fa fa-star active"></i> 
                                    <i class="fa fa-star active"></i> 
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="chef-review">(15) Reviews</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-3">
                        <div class="chef-block">
                            <div class="chef-image">
                                <img src="images/alleanza_albania_-7@2x.png" class="img-fluid" />
                                <div class="chef-comment-btn">
                                    <a href=""><i class="fa fa-comment"></i></a>
                                </div>
                            </div>
                            <div class="chef-list-details">
                                <div class="chef-name">William Smith</div>
                                <div class="star-rating">
                                    <i class="fa fa-star active"></i> 
                                    <i class="fa fa-star active"></i> 
                                    <i class="fa fa-star active"></i> 
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="chef-review">(15) Reviews</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-3">
                        <div class="chef-block">
                            <div class="chef-image">
                                <img src="images/alleanza_albania_-8@2x.png" class="img-fluid" />
                                <div class="chef-comment-btn">
                                    <a href=""><i class="fa fa-comment"></i></a>
                                </div>
                            </div>
                            <div class="chef-list-details">
                                <div class="chef-name">William Smith</div>
                                <div class="star-rating">
                                    <i class="fa fa-star active"></i> 
                                    <i class="fa fa-star active"></i> 
                                    <i class="fa fa-star active"></i> 
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="chef-review">(15) Reviews</div>
                            </div>
                        </div>
                    </div>
                    
                  </div>
                  </div>
                </div>
            </div>
        </section>
        
        <section class="become-chef-block">
            <div class="container">
            	<div class="row">
                    <div class="col-6">
                        <h2>Be a Chef in 3 easy steps</h2>
                        <ul>
                            <li>1- Sign up</li>
                            <li>2- Complete your profile</li>
                            <li>3- get yourself approved by admin</li>
                        </ul>
                        <button class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#becomechef" type="submit">Become a Chef</button> 
                    </div>
                    <div class="become-chef-banner">
                        <img src="images/chef_PNG140@2x.png" />
                    </div>
                </div>
            </div>
        </section>    
        
        <section class="chef-reg-step">
      
            <div class="modal fade gopop" id="becomechef" tabindex="-1" role="dialog" aria-labelledby="becomechefTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
            	
                <!-- Step 1 -->
                <div class="modal-content">
                  <div class="modal-header">
                    <img src="images/Group489@2x.png" />
                    <h5 class="modal-title" id="loginTitle">Welcome <span>Step 1 of 2</span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                    <div class="arrow-down"><img src="images/Path828@2x.png" /></div>
                  <div class="modal-body">
                    <form>
                      <p>Please verify yourself</p>
                      <div class="input-group mb-3">
						<img id="triggerimg" src="images/Group781@2x.png" alt="your image" />
                      </div>
                      <div class="input-group mb-3 gallery-block">
                        <div class="field">
                          <p>Take a clean snap of your ID Card both front and back</p>
                          <input type="file" id="files" name="files[]" multiple />
                          <button type="button" class="triggerbtn">Upload</button>
                        </div>
                      </div>
                    </form>
                      <div class="btn-sign">	
                        <button type="submit" id="step-1" class="btn btn-primary">Next</button>
                      </div>
                  </div>
                  <div class="modal-footer">
                    why I have to upload images of my kitchen?
                  </div>
                </div>
                
                <!-- Step 2 -->
                <div class="modal-content" style="display:none;">
                  <div class="modal-header">
                    <img src="images/Group489@2x.png" />
                    <h5 class="modal-title" id="loginTitle">Hello Chef Ali  <span>Step 2 of 2</span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                    <div class="arrow-down"><img src="images/Path828@2x.png" /></div>
                  <div class="modal-body">
                    <form>
                      <p>We would love to see your kitchen</p>
                      <div class="input-group mb-3">
						<img id="triggerimg" src="images/Group777@2x.png" alt="your image" />
                      </div>
                      <div class="input-group mb-3 gallery-block">
                        <div class="field">
                          <p>Upload up to 6 images of your kitchen</p>
  
                          <div class="fallback" id="demo-upload">
                            <input name="file" type="file" multiple />
                          </div><script src="js/dropzone.js"></script>
                          <script>//var myDropzone = new Dropzone("div#myId", { url: "/file/post"});</script>
  
                          <button type="button" class="triggerbtn2">Upload</button>
                        </div>
                      </div>
                    </form>
                      <div class="btn-sign">	
                        <button type="submit" id="step-2" class="btn btn-primary">Next</button>
                      </div>
                  </div>
                  <div class="modal-footer">
                    why I have to upload images of my kitchen?
                  </div>
                </div>
              
                
              
              
              </div>
            </div>
            
            
            
        </section>
        
        <section class="steps-block">
            <div class="container">
            	<div class="row">
                	<div class="col-4">
                    	<h3>SignUp</h3>
                        <p>Fill in the form with <br />your phone and email</p>
                  </div>
                	<div class="col-4">
                    	<h3>Set up your kitchen</h3>
                        <p>Provide us with some cool pictures or your kitchen and necessary information that we will ask you</p>
                    </div>
                	<div class="col-4">
                    	<h3>Admin Approval</h3>
                        <p>Provide us clear image of your CNIC and get yourself approved and your are ready to go</p>
                    </div>
                </div>
            </div>
        </section>        
        
        <section class="apps-block">
            <div class="container">
            	<div class="row">
                    <div class="col-6">
                        <h2>Take us<br />
                            with You<br />
                            wherever you go</h2>
                        <a href="#"><img src="images/Group785@2x.png" /></a>
                        <a href="#"><img src="images/Group786@2x.png" /></a>
                    </div>
                    <div class="apps-banner">
                        <img src="images/white-mockup@2x.png" />
                    </div>
                </div>
            </div>
        </section>        
        

    <?php include 'footer.php'; ?> 