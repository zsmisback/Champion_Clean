<?php include("header.php"); ?> 

<section class="search-banner text-white py-3 form-arka-plan" id="search-banner"style="background: url('images/home/sportsbg1.jpg');">
    <div class="container py-5 my-5">
           <nav>
          <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Infrastruture</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Trainers</a>
			<a class="nav-item nav-link" id="nav-events-tab" data-toggle="tab" href="#nav-events" role="tab" aria-controls="nav-events" aria-selected="false">Events</a>
            
          </div>
        </nav>
		<div class="tab-content" id="nav-tabContent">
		<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
		<h1>Search for any sport professional</h1>
        <div class="row">
            <div class="col-md-12">
			<form action="index.php?page=search" method="get">
			<input type="hidden" name="page" value="search"/>
                <div class="card acik-renk-form  bg-white">
                    <div class="card-body">
					<div class="row p-2">
            <div class="col-md-12">
                <h2 class="">Search for the sport you plan to play </h2>
            </div>
        </div>
                        <div class="row">	
                           <div class="col-md-3">
                               <div class="form-group">									
                                 <select class="border w-100 form-control" placeholder="" name="sport">
									<option value="cricket">Cricket</option>
									<option value="football">Football</option>
									<option value="basketball">BasketBall</option>
									<option value="kickboxing">Kickboxing</option>
									<option value="rifleshooting">Rifle Shooting</option>
									<!--<option value="mma">MMA</option> -->
								</select>
                                </div>
                            </div> 						
                            <div class="col-md-3">
                                <div class="form-group">									
                                    <select class="border w-100 form-control" placeholder="" name="type">
									<option value="Coach">Coach</option>
									<option value="Fitness">Fitness Trainer</option>
									<option value="Referee">Referee / Umpire</option>
									<option value="Commentator">Commentator</option>
									<option value="Medical">Medical Staff</option>
									<option value="Blogger">Blogger</option>
									</select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">									
                                    <select class="border w-100 form-control" placeholder="" name="city">
									<?php
									
									foreach($response as $city)
									{
										echo'<option value='.$city['city'].'>'.$city['city'].'</option>';
									}
									?>
									</select>
                                </div>
                            </div>  
 
								
                            <div class="col-md-3">
                             <button type="submit" class="btn btn-warning  pl-5 pr-5">Go !</button>
                            </div>
                        </div>                        
                    </div>
                </div>
				</form>
            </div>
        </div>
		</div>
		<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
		<h1>Search for any ground/turf</h1>
		    <div class="row">
            <div class="col-md-12">
			<form action="index.php?page=infra" method="get">
			<input type="hidden" name="page" value="infra"/>
                <div class="card acik-renk-form  bg-white">
                    <div class="card-body">
					<div class="row p-2">
            <div class="col-md-12">
                <h2 class="">Search for the sport you plan to play </h2>
            </div>
        </div>
                        <div class="row">	
                           <div class="col-md-5">
                               <div class="form-group">									
                                 <select class="border w-100 form-control" placeholder="" name="sport">
									<option value="cricket">Cricket</option>
									<option value="football">Football</option>
									<option value="basketball">BasketBall</option>
									<option value="kickboxing">Kickboxing</option>
									<option value="rifleshooting">Rifle Shooting</option>
									<!--<option value="mma">MMA</option> -->
								</select>
                                </div>
                            </div> 						
                            <div class="col-md-5">
                                <div class="form-group">									
                                    <select class="border w-100 form-control" placeholder="" name="city">
									<?php
									
									foreach($response2 as $city2)
									{
										echo'<option value='.$city2['city'].'>'.$city2['city'].'</option>';
									}
									?>
									</select>
                                </div>
                            </div>  
 
								
                            <div class="col-md-2">
                             <button type="submit" class="btn btn-warning  pl-5 pr-5">Go !</button>
                            </div>
                        </div>                        
                    </div>
                </div>
				</form>
            </div>
        </div>
		</div>
		<div class="tab-pane fade show" id="nav-events" role="tabpanel" aria-labelledby="nav-events-tab">
		<h1>Search for any events</h1>
		    <div class="row">
            <div class="col-md-12">
			<form action="index.php?page=events" method="get">
			<input type="hidden" name="page" value="events"/>
                <div class="card acik-renk-form  bg-white">
                    <div class="card-body">
					<div class="row p-2">
            <div class="col-md-12">
                <h2 class="">Search for the sport you plan to play </h2>
            </div>
        </div>
                        <div class="row">	
                           <div class="col-md-3">
                               <div class="form-group">									
                                 <select class="border w-100 form-control" placeholder="" name="sport">
									<option value="cricket">Cricket</option>
									<option value="football">Football</option>
									<option value="basketball">BasketBall</option>
									<option value="kickboxing">Kickboxing</option>
									<option value="rifleshooting">Rifle Shooting</option>
									<!--<option value="mma">MMA</option> -->
								</select>
                                </div>
                            </div> 						
                            <div class="col-md-3">
                                <div class="form-group">									
                                    <select class="border w-100 form-control" placeholder="" name="city">
									<?php
									
									foreach($response3 as $city3)
									{
										echo'<option value='.$city3['city'].'>'.$city3['city'].'</option>';
									}
									?>
									</select>
                                </div>
                            </div> 
							<div class="col-md-3">
                                <div class="form-group">									
                                   <input type="date" class="form-control" id="email" placeholder="Enter Event Name" name="date"/>
                                </div>
                            </div> 
 
								
                            <div class="col-md-3">
                             <button type="submit" class="btn btn-warning  pl-5 pr-5">Go !</button>
                            </div>
                        </div>                        
                    </div>
                </div>
				</form>
            </div>
        </div>
		</div>
		</div>
    </div>
</section>


<section class="about-us py-5 " id="about-us">
    <div class="container mt-5">
	<div class="row">
		<div class="col-md-6">
		    <h1 class='text-success'>Welcome!</h1>
		    <h2>Know More About Us</h2>
		    <hr>
		      <p>Champion.in is a platform to fulfill every necessity required to perform a sport, under one roof.
			</p>
			<p>
			All those who have the talent but lack some of the necessities such as, the perfect infrastructure, the correct guidance, the equipment required, or even the motivation to leap, we are here to provide you with all that is required to be a successful athlete. It is a platform to make your path to success as easy as possible from our end.</p>
		    <a href="?page=aboutus"><button type="button" class="btn btn-success">Let's Know More</button></a>

		</div>
		<div class="col-md-6 mt-3">
		    <img src="images/home/abt.png" alt="" width="100%">
		</div>
	</div>
</div>
</section>

<!--====================================
=            Call to Action            =
=====================================-->

<section class="call-to-action overly bg-4 section-sm">
	<!-- Container Start -->
	<div class="container">
		<div class="row justify-content-md-center text-center">
			<div class="col-md-8">
				<div class="content-holder">
					<i class="fa fa-trophy" style="font-size:7em;color:gold;"></i>
					<h1 class="text-white">What is Champion ?</h1>
					<p class="text-center text-white h5">To build a platform for the Athletes - Empowering Indian talents by developing skills, utilizing experiences and other sports resources under one roof. </p>
				</div>
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>
<!-- Services section -->
	<section class="about-us p-5 " id="what-we-do">
		<div class="container-fluid">
			<h2 class="section-title mb-2 h1"><b>Be a Champion </b></h2>
			<p class="text-center text-muted h5">We are one stop solution for all your sports needs. We are  coming up as India's leading sports community. </p>
			<div class="row mt-5">
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
					<div class="card">
						<div class="card-block block-1">
							<h3 class="card-title">Explore</h3>
							<p class="card-text">On Champion.in you can search for the sport you want to play and we will make a plan for you to play it professionally.</p>							
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
					<div class="card">
						<div class="card-block block-2">
							<h3 class="card-title">List your sports location</h3>
							<p class="card-text">You can list clubs, sports ground, turf on our website and then they will never be empty. Be found on the India's local sports network!</p>
							<?php
							if(!isset($_SESSION['uid']))
							{
								echo'<a href="infra.php?page=home" title="Read more" class="read-more" >Read more<i class="fa fa-angle-double-right ml-2"></i></a>';
							}
							?>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
					<div class="card">
						<div class="card-block block-3">
							<h3 class="card-title">For Sport Professionals</h3>
							<p class="card-text">Register with us as trainers, commentator, medical staff, coaches and bloggers. We will make sure that your talent doesn't go waste. </p>
							<?php
							if(!isset($_SESSION['uid']))
							{
								echo'<a href="trainer.php?page=home" title="Read more" class="read-more" >Read more<i class="fa fa-angle-double-right ml-2"></i></a>';
							}
							?>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
					<div class="card">
						<div class="card-block block-5">
							<h3 class="card-title">News And Blog</h3>
							<p class="card-text">Get live and exclusive news coverage daily. Daily digest will keep you updated about your favourite sport.</p>
							<!--<a href="news" title="Read more" class="read-more" >Read more<i class="fa fa-angle-double-right ml-2"></i></a>-->
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
					<div class="card">
						<div class="card-block block-4">
							<h3 class="card-title">Events</h3>
							<p class="card-text">Want to compete against others ? You can find events across India and register online. We are coming out with something amazing soon.</p>
							<a href="event.php?page=home" title="Read more" class="read-more" >Read more<i class="fa fa-angle-double-right ml-2"></i></a></i>
						</div>
					</div>
				</div>			
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
					<div class="card">
						<div class="card-block block-6">
							<h3 class="card-title">Buy Your Favourite Sports Gear</h3>
							<p class="card-text">Buy sports gear suggested and used by professional players. We will be bringing exclusive sports gear to you soon. </p>	
							<?php
							if(!isset($_SESSION['uid']))
							{							
								echo'<a href="vendor.php?page=home" title="Read more" class="read-more" >Read more<i class="fa fa-angle-double-right ml-2"></i></a></i>';
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</section>
	<!-- /Services section -->
<?php include("footer.php"); ?> 