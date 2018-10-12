    </section>    
    <footer>
    	<div class="container">
        	<div class="row">
                <div class="footer-logo">
                    <div class="logo-footer"><img src="images/Group489@2x.png" /></div>
                    <div class="copyright">@ 2018 <strong>Go Grub</strong></div>
                </div>
            </div>
            <div class="row">
            	<div class="col-2">
                	<ul class="footer-nav">
                    	<li><a href="">About Us</a></li>
                    	<li><a href="">Contact</a></li>
                    	<li><a href="">Terms and Condition</a></li>
                    </ul>
                </div>
            	<div class="col-2">
                	<ul class="footer-nav">
                    	<li><a href="">Facebook</a></li>
                    	<li><a href="">Twitter</a></li>
                    	<li><a href="">Instagram</a></li>
                    </ul>
                </div>
            	<div class="col-4">
                	<p>Send Us Your Feedback</p>
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="email" placeholder="Email Address" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">OK</button>
                    </form>
                </div>
            	<div class="col-4">
                	<div class="footer-info">
                    	497 Evergreen Rd. Roseville, CA 95673<br />
                        +44 345 678 903<br />
                        adobexd@mail.com
                    </div>
                </div>
            </div>
        </div>	
    </footer>
    

    <!-- Optional JavaScript -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js" crossorigin="anonymous"></script>

	<script>
		jQuery(".triggerbtn").click(function () {
			jQuery(this).closest('div').find('#files').click();
		});
		jQuery('#step-1').click(function(){
		   jQuery(this).parent().parent().parent().hide().next().show();//hide parent and show next
		});
		function editName(number) {
			document.getElementById('name' + number).readOnly=false;
		};
		function editName(number) {
			document.getElementById('name' + number).readOnly=false;
		};
    </script>