<?php include 'header.php'; ?>
      <!-- END header -->
    <!-- Header End -->
    <div class="container">
      <div class="row">
        <div class="col-md-1 pt-5">
          <img src="<?php echo $response['profilepic']; ?>" alt="image" width="" height="80px">
        </div>
        <div class="col-md-11 pt-5">
          <h2> <b><?php echo $response['name']; ?></b> </h2>
    <h5 class="pt-3"> <b><?php echo $response['type']; ?></b></h5> 
        </div>
        
      </div>
    </div>
<div class="container" style="margin: 50px auto;">
    <div class="row">
      <div class="col-xs-12 ">
        <nav>
          <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Profile</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Certificate / Degree</a>
            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Videos</a>
            
          </div>
        </nav>
        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <div class="well">
                <div class="container">
                  <div class="row py-5 px-5">
                    <div class="col-lg-5">
                      <img src="<?php echo $response['image1']; ?>" alt="image" width="" alt="" width="" height="350px">
                  </div>
                      <div class="col-lg-7 ">
                          <div class="details">
                            <div class="row">
                              <div class="col-lg-12">
                                <h5> <b>Name :</b>&nbsp;<?php echo $response['name']; ?></h5>
                                <h5> <b>Type :</b>&nbsp;<?php echo $response['type']; ?></h5>
                                <h5> <b>About :</b>&nbsp;<?php echo $response['about_us']; ?></h5>
                                
                              </div>
                            </div>
                             
                              <h5> <b>Location :</b>&nbsp;<?php echo $response['address']; ?> &nbsp; </h5>


                              <div class="row">
                                <div class="col-lg-12">
                                  <h5 class=''><?php if($response['seats'] == 'seats'){echo" <img src='img-test/online-learning.png' alt='' width='25px'>&nbsp; Online Services &nbsp;";} ?> <?php if($response['locker_room'] == 'locker_room'){echo"<img src='img-test/premium.png' alt='' width='25px'>&nbsp;Verified Member.";} ?> </h5> 
                                  <h5 class=''><?php if($response['showers'] == 'showers'){echo"<img src='img-test/clock.png' alt='' width='25px'>&nbsp; Flexible timings. &nbsp;";} ?> </h4>
								  <p><?php echo $response['monday_from']; ?></p>
								  <p><?php echo $response['summary']; ?></p>
								  <p><?php var_dump($response2); ?></p>
								  <p><?php foreach($response2 as $test){echo $test["COLUMN_NAME"];} ?></p>
                                </div>
                              </div> <br>
							  <table class="table table-bordered">
							      <thead>
									<tr>
									<th>Ground Size</th>
									<th>Pitch Size</th>
									<th>Rules</th>
									</tr>
									</thead>
							  </table>
                    <?php
                    
				   if(!isset($_SESSION['uid']) || !$_SESSION['uid'])
                    {
	                 echo"<a href='index.php?page=login'><button type='button' class='btn py-3 px-5 ' style='background-color: #146935 !important; color: #fff;'>Book Now</button></a>";
	
                   }
                   else
				   {					   
					 echo"<button type='button' class='btn py-3 px-5 ' style='background-color: #146935 !important; color: #fff;' data-toggle='modal' data-target='#exampleModal' data-whatever='@mdo'>Book Now</button>";
				   }
					 
                     
					 ?>
                    
                     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                       <div class="modal-dialog" role="document">
                         <div class="modal-content">
                           <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalLabel">Confirm Booking</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                           <div class="modal-body">
                             <form method="post">
                              <input type = "hidden" name="infra_enquiries|enquiry_for" value="<?php echo $response['randomid']; ?>"/>
		                      <input type = "hidden" name="infra_enquiries|enquiry_by" value="<?php echo $_SESSION['uid']; ?>"/>
		                      <input type = "hidden" name="infra_enquiries|name" value="<?php echo $_SESSION["name"]; ?>"/>
		                      <input type = "hidden" name="infra_enquiries|email" value="<?php echo $_SESSION["username"]; ?>"/>
		                      <input type = "hidden" name="infra_enquiries|contact_number" value="<?php echo $_SESSION["contact_no"]; ?>"/>
							  <input type = "hidden" name="infra_enquiries|sports" value="<?php echo $_GET['sport']; ?>"/>
                              <div class="col-md-12 form-group">
                                <label for="name">Alternate Contact Number</label>
                                <input type="number" id="name" class="form-control py-2" name="infra_enquiries|alt_contact_number">
                              </div>
                              <div class="col-md-12 form-group required">
                                <label for="name" class="control-label">Enquiry</label> <br>
                                <textarea rows="1" cols="50" class="form-control" name="infra_enquiries|query"></textarea>
                              </div>
							  <input type="submit" class="btn btn-primary" style="background-color: #146935 !important;" value="Confirm Booking"/> 
                             </form>
                           </div>
                           
                         </div>
                       </div>
                     </div>
                          </div>
                      </div>
                     
                  </div>
              </div>

            
</div>
          </div>
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
         <!-- Gym Award Section Begin -->
    <section class="gym-award spad">
      <div class="container">
          <div class="row">
              <div class="col-lg-6">
                  
                          <img src="<?php echo $response['image1']; ?>" class="img-fluid" alt="">
                  
              </div>
              <div class="col-lg-6">
                <div class="award-text">
                  
                      <img src="<?php echo $response['image2']; ?>" class="img-fluid" alt="">
              </div>
              </div>
			                <div class="col-lg-6">
                <div class="award-text">
                  
                      <img src="<?php echo $response['image3']; ?>" class="img-fluid" alt="">
              </div>
              </div>
          </div>
       
      </div>
      
  </section>
  <!-- Gym Award Section End -->
          </div>
          <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
           <!-- Gym Award Section Begin -->
  
      <div class="container">
        <div class="row py-5">
            <div class="col-lg-6">
              
              <iframe width="460" height="315" src="<?php echo $response['video_link_1'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                          </div>
                          <div class="col-lg-6">
                            
                            <iframe width="460" height="315" src="<?php echo $response['video_link_2'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        </div>
        </div>
    </div>
 
  <!-- Gym Award Section End -->
          </div>
         
        </div>
      
      </div>
    </div>
</div>
</div>
</div>


     
       <!-- Footer Section Begin -->
<?php include 'footer.php'; ?>