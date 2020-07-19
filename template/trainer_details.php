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
                      <img src="<?php echo $response['profilepic']; ?>" alt="image" width="" alt="" width="" height="350px">
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
                             
                              <h5> <b>Location :</b>&nbsp;<?php echo $response['city']; ?> &nbsp; <b>Working Hours :</b>&nbsp;<?php echo $response['training_hours']; ?></h5>

                              <h5> <b>Height :</b> &nbsp;<?php echo $response['height']; ?> cm &nbsp; <b>Weight :</b>&nbsp;<?php echo $response['weight']; ?> kg</h5>
                              <h5> <b>Charges :</b>&nbsp;<?php echo $response['hourly_charges']; ?></h5>
                              <div class="row">
                                <div class="col-lg-12">
                                  <h5 class=''><?php if($response['question_1'] == 1){echo" <img src='img-test/online-learning.png' alt='' width='25px'>&nbsp; Online Services &nbsp;";} ?> <?php if($response['question_2'] == 1){echo"<img src='img-test/premium.png' alt='' width='25px'>&nbsp;Verified Member.";} ?> </h5> 
                                  <h5 class=''><?php if($response['question_3'] == 1){echo"<img src='img-test/clock.png' alt='' width='25px'>&nbsp; Flexible timings. &nbsp;";} ?>  <?php if($response['question_4'] == 1){echo" <img src='img-test/nutrition.png' alt='' width='25px'>&nbsp; Diet Plans.";}?></h5>
                                  <h5 class=''> <?php if($response['question_5'] == 1){echo"<img src='img-test/song.png' alt='' width='25px'>&nbsp; Workout Music";} ?></h5>
                                </div>
                              </div> <br>
                    <?php
                    
				   if(!isset($_SESSION['uid']) || !$_SESSION['uid'])
                    {
	                 echo"<a href='index.php?page=login'><button type='button' class='btn py-3 px-5 ' style='background-color: #146935 !important; color: #fff;'>Contact Trainer</button></a>";
	
                   }
				   elseif($_SESSION['type'] !== "User")
				   {
					   echo"";
				   }
				   elseif($results['booked'] > 0)
				   {
					   echo"<button type='button' class='btn py-3 px-5 ' style='background-color: #146935 !important; color: #fff;'>Contacted</button>";
				   }
                   else
				   {					   
					 echo"<button type='button' class='btn py-3 px-5 ' style='background-color: #146935 !important; color: #fff;' data-toggle='modal' data-target='#exampleModal' data-whatever='@mdo'>Contact Trainer</button>";
				   }
					 echo $results['booked'];
                     
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
                              <input type = "hidden" name="trainer_enquiries|enquiry_for" value="<?php echo $_GET['id']; ?>"/>
		                      <input type = "hidden" name="trainer_enquiries|enquiry_by" value="<?php echo $_SESSION["uid"]; ?>"/>
		                      <input type = "hidden" name="trainer_enquiries|name" value="<?php echo $_SESSION["name"]; ?>"/>
		                      <input type = "hidden" name="trainer_enquiries|email" value="<?php echo $_SESSION["username"]; ?>"/>
		                      <input type = "hidden" name="trainer_enquiries|contact_number" value="<?php echo $_SESSION["contact_no"]; ?>"/>
                              <div class="col-md-12 form-group">
                                <label for="name">Alternate Contact Number</label>
                                <input type="number" id="name" class="form-control py-2" name="trainer_enquiries|alt_contact_number">
                              </div>
                              <div class="col-md-12 form-group required">
                                <label for="name" class="control-label">Enquiry</label> <br>
                                <textarea rows="1" cols="50" class="form-control" name="trainer_enquiries|query"></textarea>
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
                  
                          <img src="<?php echo $response['certificate']; ?>" class="img-fluid" alt="">
                  
              </div>
              <div class="col-lg-6">
                <div class="award-text">
                  
                      <img src="<?php echo $response['degree']; ?>" class="img-fluid" alt="">
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