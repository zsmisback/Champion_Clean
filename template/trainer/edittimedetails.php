<?php include("header.php"); ?>

<section class="login py-5 border-top-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-10 align-item-center">
                <div class="border">
                    <h3 class="bg-gray p-4">Edit Additional Details</h3>
					<?php if(isset($response["error"])){	
							echo '<div class="alert alert-danger">
							<strong>Error!</strong> Username or Password Not Found !
							</div>';}		
							?>
                    <form method="post" enctype="multipart/form-data">
                        <fieldset class="p-4">
                            Hourly Charges (Rupees)<input type="number" value="<?php echo $response['hourly_charges']; ?>" name="trainer_charges|hourly_charges" placeholder="Hourly Charges" class="border p-3 w-100 my-2">
							<div class="row mb-2">

                   
							<div class="col-md-6 form-group required">
							<label for="name" class="control-label">Height(in cm)</label>
							<input type="number" id="name" class="form-control py-2" value="<?php echo $response['height']; ?>" name="trainer_charges|height">
							</div>
							<div class="col-md-6 form-group required">
							<label for="name" class="control-label">Weight(in kg)</label>
							<input type="number" id="name" class="form-control py-2" value="<?php echo $response['weight']; ?>" name="trainer_charges|weight">
							</div>
							</div>
							<div class="form-group">
							<label for="sel1">Training Hours:</label>
							<select class="form-control" id="sel1" name="trainer_charges|training_hours">
							<option value="<?php echo $response['training_hours']; ?>"><?php echo $response['training_hours']; ?></option>
							<option value="1-2hr">1-2hr</option>
							<option value="2-3hrs">2-3hrs</option>
							<option value="3-4hrs">3-4hrs</option>
							<option value="4+hrs">4+hrs</option>
							</select>
							</div>
							
                  
							<div class="form-group required">
							<label for="name " class="control-label">Certificate(Or Degree) - Image</label>
							<input type="file" id="image" name="trainer_images|certificate|0|<?php echo $certificate[1]; ?>" class=" py-2">
							<br>
							Current Certificate/Degree:
							<br>
							<img src="<?php echo $response['certificate']; ?>" width="100%" class="img-fluid"/>
							<br><br>
							</div>
               

							<div class="form-group required">
							<label for="name " class="control-label">Degree - Image</label> <br>
							<input type="file" id="image2" name="trainer_images|degree|0|<?php echo $degree[1]; ?>" class=" py-2">
							<br>
							Current Degree:
							<br>
							<img src="<?php echo $response['degree']; ?>" width="100%" class="img-fluid"/>
							<br><br>
							</div>
							<div class="form-group required">
							<label for="name " class="control-label">Aadhar Card - Image</label><br>
							<input type="file" id="image4" name="trainer_images|aadhar|0|<?php echo $aadhar[1]; ?>" class=" py-2">
							<br>
							Current Aadhar Card:
							<br>
							<img src="<?php echo $response['aadhar']; ?>" width="100%" class="img-fluid"/>
							<br><br>
							</div>
							 <h5>Do you provide Online Classes? :</h5>
							<div class="row">
                  
							<div class="col-md-6 form-group required">
							<label class="radio-inline">
							<input type="radio" name="trainer_charges|question_1" <?php if ($response['question_1'] == 1){ echo "checked";}?> value="1" > Yes
							</label>
                      
							</div>
                  
                        <div class="col-md-6 form-group required">
                          <label class="radio-inline">
                            <input type="radio" name="trainer_charges|question_1" <?php if ($response['question_1'] == 0){ echo "checked";}?> value="0"> No
                          </label>
  
						</div>
						</div>
                   
						<h5>Would you like to apply as a premuim member? :</h5>
						<div class="row">
                  
						<div class="col-md-6 form-group required">
						<label class="radio-inline">
                        <input type="radio" name="trainer_charges|question_2" <?php if ($response['question_2'] == 1){ echo "checked";}?> value="1" > Yes
						</label>
                      
						</div>
                  
                        <div class="col-md-6 form-group required">
                          <label class="radio-inline">
                            <input type="radio" name="trainer_charges|question_2" <?php if ($response['question_2'] == 0){ echo "checked";}?> value="0"> No
                          </label>
  
							</div>
							</div>

                   
							<h5>Are your flexible with your timings? :</h5>
							<div class="row">
                  
							<div class="col-md-6 form-group required">
							<label class="radio-inline">
							<input type="radio" name="trainer_charges|question_3" <?php if ($response['question_3'] == 1){ echo "checked";}?> value="1" > Yes
							</label>
                      
							</div>
                  
                        <div class="col-md-6 form-group required">
                          <label class="radio-inline">
                            <input type="radio" name="trainer_charges|question_3" <?php if ($response['question_3'] == 0){ echo "checked";}?> value="0"> No
                          </label>
  
							</div>
                  </div>
				  <h5>Do you provide a diet plan? :</h5>
                  <div class="row">
                  
                    <div class="col-md-6 form-group required">
                      <label class="radio-inline">
                        <input type="radio" name="trainer_charges|question_4" <?php if ($response['question_4'] == 1){ echo "checked";}?> value="1" > Yes
                      </label>
                      
                    </div>
                  
                        <div class="col-md-6 form-group required">
                          <label class="radio-inline">
                            <input type="radio" name="trainer_charges|question_4" <?php if ($response['question_4'] == 0){ echo "checked";}?> value="0"> No
                          </label>
  
                  </div>
                  </div>
                            
                  <h5>Do you have your own workout music playlist? :</h5>
                  <div class="row">
                  
                    <div class="col-md-6 form-group required">
                      <label class="radio-inline">
                        <input type="radio" name="trainer_charges|question_5" <?php if ($response['question_5'] == 1){ echo "checked";}?> value="1" > Yes
                      </label>
                      
                    </div>
                  
                        <div class="col-md-6 form-group required">
                          <label class="radio-inline">
                            <input type="radio" name="trainer_charges|question_5" <?php if ($response['question_5'] == 0){ echo "checked";}?> value="0"> No
                          </label>
  
                  </div>
                  </div>
				


                  <div class="row">
                  
                    <div class="col-md-12 form-group">
                      <label for="name " class="control-label">Video Link 1 (Embed Links) Example: https://www.youtube.com/embed/tKH01ji8L70</label>
                      <input type="text" id="name" class="form-control py-2" name="trainer_charges|video_link_1" value="<?php echo $response['video_link_1']; ?>">
                    </div>
                  </div>

                  
                  <div class="row">
                  
                    <div class="col-md-12 form-group mb-3">
                      <label for="name " class="control-label">Video Link 2 (Embed Links) Example: https://www.youtube.com/embed/tKH01ji8L70</label>
                      <input type="text" id="name" class="form-control py-2" name="trainer_charges|video_link_2" value="<?php echo $response['video_link_1']; ?>">
                    </div>
                  </div>
                            <input type="hidden" class="form-control" id="" value="<?php echo $_SESSION['uid']; ?>" name="trainer_charges|uid"/>
							<!--<input type="hidden" class="form-control" id="" value="<?php echo $random_id; ?>" name="trainer_images|randomid"/>-->
							<input type="hidden" class="form-control" id="" value="<?php echo $_SESSION['uid']; ?>" name="trainer_images|uid"/>
                            <div class="loggedin-forgot">
                                    <input type="checkbox" id="keep-me-logged-in">
                                    <label for="keep-me-logged-in" class="pt-3 pb-2">You agree to the terms and condition</label>
                            </div>
                            <button type="submit" class="d-block py-3 px-5 bg-primary text-white border-0 rounded font-weight-bold mt-3">Update Charges</button>                            
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include("footer.php"); ?>