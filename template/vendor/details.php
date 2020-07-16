<?php include_once("includes/header.php"); ?>

<section class="ad-post bg-gray py-5">
    <div class="container">
        <form method="post" enctype="multipart/form-data">
<?php if(isset($error_mysql)){echo "<br>".$error_mysql;} ?>
<input type="hidden" class="form-control" id="" value="<?php echo $_SESSION['uid']; ?>" name="trainer_details|randomid"/>
<input type="hidden" class="form-control" id="" value="<?php echo $_SESSION['uid']; ?>" name="user_profilepic|uid"/>

<h2>Trainer registration</h2>
<hr>


<h3 class="text-center">Trainer Information</h3>
<hr>

<div class="row">
<div class="col-md-6">
<input type="file" class="form-control mb-4" name="user_profilepic|profilepic" placeholder="Enter your profile picture">
</div>


<div class="col-md-6">
<select name="trainer_details|type">
<option value="Coach">Coach</option>
<option value="Fitness">Fitness Trainer</option>
<option value="Referee">Referee / Umpire</option>
<option value="Commentator">Commentator</option>
<option value="Medical">Medical Staff</option>
<option value="Blogger">Blogger</option>
</select>
</div>

<div class="col-md-6">
<input type="text" class="form-control mb-4" name="trainer_details|add_contact_no" placeholder="Enter your contact number">
</div>
<div class="col-md-6">
<input type="text" class="form-control mb-4" name="trainer_details|pincode" placeholder="Enter the pincode of your area">
</div>

</div>
<input type="text" class="form-control mb-4" name="trainer_details|address" placeholder="Enter your address" value="">
<textarea class="form-control mb-4" rows="5" name="trainer_details|about_us" placeholder="Enter information about you"></textarea>

	

	
	Select the sport that you coach:
	<br><br>
	<input type="checkbox" id="crick" name="trainer_details|sports[]" value="cricket">
  <label for="crick">Cricket</label><br>
  <input type="checkbox" id="footb" name="trainer_details|sports[]" value="football">
  <label for="footb">Football</label><br>
  <input type="checkbox" id="basketb" name="trainer_details|sports[]" value="basketball">
  <label for="basketb">Basketball</label><br>
  <input type="checkbox" id="mm" name="trainer_details|sports[]" value="mma">
  <label for="mm">MMA</label><br><br>


<div class="row">
<div class="col-md-6">
<button type="submit" id="signup" class="btn btn-primary">Signup</button>
</div>
                                  
 </div>
 <br>
                           

 </form>

    </div>
</section>
<?php include_once("includes/footer.php"); ?>