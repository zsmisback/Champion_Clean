<?php include("header.php"); ?>

<!--===============================
=            Hero Area            =
================================-->

<section class="hero-area bg-1 text-center overly" style="background: url('images/home/events_main.jpg');">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Header Contetnt -->
				<div class="content-block">
					<h1>Create and manage your events</h1>
					<p><b>Create/Manage/Advertise</b> with us and get your event popularized <br>  around the nation.</p>
					
					<div class="content-holder"><br>
					<?php 
					if(!isset($_SESSION['username']))
					{
						echo '
						<a class="nav-link text-white add-button" href="?page=login"><i class="fa fa-plus-circle"></i> Add an event</a>';
					}
					else
					{
						echo '
						<a class="nav-link text-white add-button" href="?page=addevents"><i class="fa fa-plus-circle"></i> Add an event</a>';
					}
						?>
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
<p>
Champion.in is a platform to fulfill every necessity required to perform a sport, under one roof. </p>
		    <p>All those who have the talent but lack some of the necessities such as, the perfect infrastructure, the correct guidance, the equipment required, or even the motivation to leap, we are here to provide you with all that is required to be a successful athlete. It is a platform to make your path to success as easy as possible from our end.</p>
		    <a href="?page=aboutus"><button type="button" class="btn btn-success">Let's Know More</button></a>

		</div>
		<div class="col-md-6">
		    <img src="images/home/events.png" alt="" width="100%">
		</div>
	</div>
</div>
</section>

<section class="call-to-action overly bg-3 section-sm">
	<!-- Container Start -->
	<div class="container">
		<div class="row justify-content-md-center text-center">
			<div class="col-md-8">
				<div class="content-holder">
					<h2>Start today to get more exposure and
					grow your business</h2>
					<ul class="list-inline mt-30">
					<?php
					if(!isset($_SESSION['uid']))
					{
						echo'<li class="list-inline-item"><a class="btn btn-main" href="?page=signup">Add Listing</a></li>';
					}
						?>
					<!--	<li class="list-inline-item"><a class="btn btn-secondary" href="category.html">Browser Listing</a></li>-->
					</ul>
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
                    <h2 style="font-size: 60px;line-height: 60px;margin-bottom: 20px;font-weight: 900;">Go Champions!!!</h2>
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
                                        <div class="name">Location</div>
                                     <!--   <div class="info">Anywhere you want</div> -->
                                        <div>We have plenty of options for your perfection event location. You just need to give us your event details and consider your work done.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-md-4">
                                <div class="service-block" style="visibility: visible;">
                                    <div class="ico fa fa-code highlight"></div>
                                    <div class="text-block">
                                        <div class="name">Technical Support</div>
                                  <!--       <div class="info">Quality code that lasts</div> -->
                                        <div>Our team is on toes to help you with any query or problem that comes your way</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-md-4">
                                <div class="service-block" style="visibility: visible;">
                                    <div class="ico fa fa-pencil highlight"></div>
                                    <div class="text-block">
                                        <div class="name">Sponsors</div>
                                   <!--      <div class="info">Here for that extra support</div> -->
                                        <div>As we have a pool of vendors registered with us, we can provide you with the needed vendor of your choice and you can get your work done</div>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-sm-6 col-md-4 col-md-4">
                                <div class="service-block" style="visibility: visible;">
                                    <div class="ico fa fa-eye highlight"></div>
                                    <div class="text-block">
                                        <div class="name">Marketing</div>
                                       <!-- <div class="info">Leave a lasting impression</div> -->
                                        <div>We are here to market your event and get you plenty of registrations with the help of our platform</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-md-4">
                                <div class="service-block" style="visibility: visible;">
                                    <div class="ico fa fa-umbrella highlight"></div>
                                    <div class="text-block">
                                        <div class="name">Other requirements</div>
                                    <!--     <div class="info">Thinking beyond tomorrow</div> -->
                                        <div>Any requirements such as medical staff etc. will be handled by us</div>
                                    </div>
                                </div>
                            </div>
							 <div class="col-sm-6 col-md-4 col-md-4">
                                <div class="service-block" style="visibility: visible;">
                                    <div class="ico fa fa-bullhorn highlight"></div>
                                    <div class="text-block">
                                        <div class="name">Social Media Shout-out</div>
                                    <!--     <div class="info">Converting users to customers</div> -->
                                        <div>We help you market your events via various social media apps. </div>
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





<!--====================================
=            Call to Action            =
=====================================-->



<?php require("footer.php"); ?>