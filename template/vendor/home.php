<?php include("header.php"); ?>

<!--===============================
=            Hero Area            =
================================-->

<section class="hero-area bg-1 overly" style="background: url('images/home/hero2.jpg');">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Header Contetnt -->
				<div class="content-block">
					<h1>Sell your sports gear to crores of customers across India</h1>
					<p><b>List your products</b> with us and be found by the millions people looking for sports products. <br>Your shop with us is open 24x7 with hassle free technical support. </p>					
					<div class="content-holder"><br>
						<?php if(!isset($_SESSION['uid'])){echo'<a class="nav-link text-white add-button" href="?page=signup"><i class="fa fa-plus-circle"></i> Click here to Join</a>';} ?>
					</div>	
				</div>
				<!-- Advance Search -->
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>

<section class="about-us py-5 " id="about-us">
    <div class="container mt-5">
	<div class="row">
		<div class="col-md-6">
		    <h1 class='text-success'>Welcome!</h1>
		    <h2>Know More About Us</h2>
		    <hr>
		    <p>Champion.in is a platform to fulfill every necessity required to perform a sport, under one roof.
				</p><p>		
				All those who have the talent but lack some of the necessities such as, the perfect infrastructure, the correct guidance, the equipment required, or even the motivation to leap, we are here to provide you with all that is required to be a successful athlete. It is a platform to make your path to success as easy as possible from our end.</p>
		    <a href="?page=aboutus"><button type="button" class="btn btn-success">Let's Know More</button></a>

		</div>
		<div class="col-md-6">
		    <img src="images/home/shop.png" alt="" width="100%">
		</div>
	</div>
</div>
</section>

<!--====================================
=            Call to Action            =
=====================================-->

<section class="call-to-action overly bg-3 section-sm">
	<!-- Container Start -->
	<div class="container">
		<div class="row justify-content-md">
			<div class="col-md-10">
				<div class="content-holder"> 
					<h1 class="text-white">Want to speed up the process of signing up with us ?</h1>		
					<h1 class="text-white">Contact us on +91 7021 980 307 to know more.</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>



<!----------------------------------------------------------------------------- ---->
<!----------------------------------------------------------------------------- ---->
<!----------------------------------------------------------------------------- ---->
<div class="container bootstrap snippet">

<section id="services" class="current">
    <div class="services-top">
        <div class="container bootstrap snippet">
            <div class="row text-center">
                <div class="col-sm-12 col-md-12 col-md-12">
                    <h2>What We Offer</h2>
                    <h2 style="font-size: 60px;line-height: 60px;margin-bottom: 20px;font-weight: 900;">Selling with Champions?</h2>
                    <p>Our <span class="highlight">experienced</span> and <span class="highlight">dedicated</span> staff provide these services with a smile.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-offset-1 col-sm-12 col-md-12 col-md-10">
                    <div class="services-list">
                        <div class="row">
                            <div class="col-sm-6 col-md-4 col-md-4">
                                <div class="service-block" style="visibility: visible;">
                                    <div class="ico fa fa-money highlight"></div>
                                    <div class="text-block">
                                        <div class="name">Easy Listing</div>
                                      <!--  <div class="info">Listing for money</div> -->
                                        <div>Champion.in helps you list yourself as a vendor with the help of a few easy steps. You can sit back and relax while customers come find you with their requirements</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-md-4">
                                <div class="service-block" style="visibility: visible;">
                                    <div class="ico fa fa-code highlight"></div>
                                    <div class="text-block">
                                        <div class="name">Technical Support</div>
                                     <!--   <div class="info">Quality code that lasts</div> -->
                                        <div>Our team is here to guide and support you with regards to any query you have about any orders, payments, etc.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-md-4">
                                <div class="service-block" style="visibility: visible;">
                                    <div class="ico fa fa-pencil highlight"></div>
                                    <div class="text-block">
                                        <div class="name">Hassle-free customers</div>
                                      <!--  <div class="info">Words that tell your story</div> -->
                                        <div>The customers that have a specific requirement can now easily check out the listed vendors and contact you’ll directly. Here, customers come to you and you do not go to them</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-md-4">
                                <div class="service-block" style="visibility: visible;">
                                    <div class="ico fa fa-bullhorn highlight"></div>
                                    <div class="text-block">
                                        <div class="name">Events </div>
                                     <!--   <div class="info">Converting users to customers</div> -->
                                        <div>Whenever there is an event that takes place, the sponsors will be sent to you as per their requirements and you can provide them in quantity as per their needs </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-md-4">
                                <div class="service-block" style="visibility: visible;">
                                    <div class="ico fa fa-eye highlight"></div>
                                    <div class="text-block">
                                        <div class="name">Identity and Branding</div>
                                    <!--    <div class="info">Leave a lasting impression</div> -->
                                        <div>Once you are listed with us your branding and identity responsibility lies with us </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-md-4">
                                <div class="service-block" style="visibility: visible;">
                                    <div class="ico fa fa-umbrella highlight"></div>
                                    <div class="text-block">
                                        <div class="name">All Across India</div>
                                       <!-- <div class="info">Thinking beyond tomorrow</div> -->
                                        <div>You can now provide your products to everyone across India </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</div>

<!----------------------------------------------------------------------------- ---->
<!----------------------------------------------------------------------------- ---->
<!----------------------------------------------------------------------------- ---->






<?php require("footer.php"); ?>