@extends('frontend.layouts.app')
@section('content')
    <section class="my-order">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12">
                    <h1>kitchen</h1>
                    <div class="post-new">
                        <button type="button" style="cursor:pointer;" data-toggle="modal" data-target="#new-post">Post New Food</button>
                        
                        
                        
                        <div class="modal fade gopop" id="new-post" tabindex="-1" role="dialog" aria-labelledby="new-postTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                  	<img src="images/Group489@2x.png" />
                    <h5 class="modal-title" id="loginTitle">Edit Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                    <div class="arrow-down"><img src="images/Path828@2x.png" /></div>
                  <div class="modal-body">
                  	<div class="main-img">
                    	<img src="images/images@2x.png" class="img-fluid" />
                    </div>
                    <div class="thumb-img">
                    	<ul>
                        	<li><a href="#"><img src="images/images@2x.png" class="img-fluid" /></a></li>
                        	<li><a href="#"><img src="images/images@2x.png" class="img-fluid" /></a></li>
                        	<li><a href="#"><img src="images/images@2x.png" class="img-fluid" /></a></li>
                        	<li><a href="#"><img src="images/images@2x.png" class="img-fluid" /></a></li>
                        	<li><a href="#"><img src="images/images@2x.png" class="img-fluid" /></a></li>
                        </ul>
                    </div>
                    <form>
                      <div class="form-group">
                          <label for="inlineTitleMobile">Food Title</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="inlineTitleMobile">
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="Input1">Food Description</label>
                        <textarea class="form-control"></textarea>
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="inputBuilding">Building</label>
                            <input type="text" class="form-control" id="inputBuilding" placeholder="Apartment, studio, or floor">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputStreet">Street</label>
                            <input type="text" class="form-control" id="inputStreet" placeholder="1234 Main St">
                          </div>
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-6">
                            <label>Building</label>
                            <select type="text" class="form-control">
                            	<option>Apartment</option>
                            	<option>Studio</option>
                            	<option>Floor</option>
                            </select>
                          </div>
                          <div class="form-group col-md-6">
                            <label>Street</label>
                            <select type="text" class="form-control">
                            	<option>Apartment</option>
                            	<option>Studio</option>
                            	<option>Floor</option>
                            </select>
                          </div>
                      </div>
                      <div class="btn-sign">	
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
                        
                        
                        
                    </div>

                    <div class="dash-menu">
                        <ul class="nav justify-content-center">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">My Posts</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-md-8 col-sm-12">
                    <div class="chef-profile">
                        <img src="images/alleanza_albania_-2@2x.png"/>
                        <div class="input mb-3">
                            <input type="text" class="form-control" id="chef-name" value="William Smith" readonly>
                        </div>
                    </div>

                    <div class="chef-circles">
                        <div class="row">
                            <div class="col-4">
                                <div class="round">80%</div>
                                <p>Success rate</p>
                            </div>
                            <div class="col-4">
                                <div class="round">1 hr</div>
                                <p>Avg.response time</p>
                            </div>
                            <div class="col-4">
                                <div class="round">4.5</div>
                                <p>avg. rating</p>
                            </div>
                        </div>
                    </div>
                    <div class="desc-edit">
                        <textarea rows="4" class="form-control" id="chef-name" value="William Smith" readonly>Lorem Ipsum je fiktívny text, používaný pri návrhu tlačovín a typografie. Lorem Ipsum je štandardným výplňovým textom už od 16. storočia, keď neznámy tlačiar zobral sadzobnicu plnú tlačových znakov a pomiešal ich, aby tak vytvoril vzorkovú knihu. Prežil nielen päť storočí, ale aj skok do elektronickej</textarea>
                        <div class="input-group-addon">
                            <span class="fa fa-pencil" onclick=editName('1')></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop