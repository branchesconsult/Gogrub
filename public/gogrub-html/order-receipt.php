<?php include 'header.php'; ?> 
 
<section class="my-order">
	<div class="container">
        <div class="row justify-content-md-center">
            
            <div class="col-10">
            <div class="row">
            <div class="col-8">
                <div class="receipt">
                	<h3>1 x Mince Biryani</h3><span>$9</span><i class="fa fa-close"></i>
                </div>
                <div class="receipt">
                	<h3>1x chicken breast fillet</h3><span>$9</span><i class="fa fa-close"></i>
                </div>
                <div class="receipt-form">
                <h2>Delivery Address</h2>
                <form>
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
                      <label for="inputArea">Area</label>
                      <input type="text" class="form-control" id="inputArea">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputFloor">Floor/unit(optional)</label>
                      <input type="text" class="form-control" id="inputFloor">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="inputInformation">Additional Delivery Information</label>
                      <textarea class="form-control" id="inputInformation"></textarea>
                    </div>
                  </div>
                  <div class="clearfix">   
                  	<button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </form>
                </div>
                
        	</div>
            
            <div class="col-4">
                <div class="cart-detail">
                	<div class="cart-box"><h5>1 x Mince Biryani</h5><span>$9</span></div>
                	<div class="cart-box"><h5>1x chicken breast fillet</h5><span>$19</span></div>
                    <hr />
                	<div class="cart-box"><h5><strong>Subtotal</strong></h5><span>$28</span></div>
                	<div class="cart-box"><h5><strong>Delivery Fee</strong></h5><span>$1</span></div>
                    <hr />
                	<div class="cart-box"><h5><strong>Total</strong></h5><span>$29</span></div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Checkout</button>
                </div>
        	</div>
            </div>
            </div>
        </div>
    </div>
</section>        

<?php include 'footer.php'; ?> 