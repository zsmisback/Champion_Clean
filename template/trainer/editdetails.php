<?php include_once("header.php"); ?>

<section class="ad-post bg-gray py-5">
    <div class="container">
        <form method="post" enctype="multipart/form-data">
<?php if(isset($error_mysql)){echo "<br>".$error_mysql;} ?>
<input type="hidden" class="form-control" id="" value="<?php echo $_SESSION['uid']; ?>" name="trainer_details|uid"/>
<input type="hidden" class="form-control" id="" value="<?php echo $_SESSION['uid']; ?>" name="user_profilepic|uid"/>


<hr>


<h3 class="text-center">Trainer Information</h3>
<hr>

<div class="row">

<div class="col-md-6">
<input type="file" class="form-control mb-4" name="user_profilepic|profilepic|0|<?php echo $_SESSION['uid']; ?>" placeholder="Enter your profile picture">
<br>
Current Profile Picture:
<br>
<img src="<?php echo $response['profilepic']; ?>" width="90%" height="250px;"/>
<br><br>
</div> 


<div class="col-md-6">
<select name="trainer_details|type">
<option value="<?php echo $response['type']; ?>"><?php echo $response['type']; ?></option>
<option value="Coach">Coach</option>
<option value="Fitness">Fitness Trainer</option>
<option value="Referee">Referee / Umpire</option>
<option value="Commentator">Commentator</option>
<option value="Medical">Medical Staff</option>
<option value="Blogger">Blogger</option>
</select>
</div> 

<div class="col-md-6">
<input type="text" class="form-control mb-4" name="trainer_details|add_contact_no" placeholder="Enter your contact number" value="<?php echo $response['add_contact_no']; ?>">
</div>
<div class="col-md-6">
<input type="text" class="form-control mb-4" name="trainer_details|pincode" placeholder="Enter the pincode of your area" value="<?php echo $response['pincode']; ?>">
</div>

</div>

<br><br>
<input type="text" class="form-control mb-4" name="trainer_details|address" placeholder="Enter your address" value="<?php echo $response['address']; ?>">
<label for="name " class="control-label">City</label>
<input type="text" id="search" class="form-control py-2" name="trainer_details|city" value="<?php echo $response['city']; ?>">
<br>
<div id="cities">
	
</div>
<textarea class="form-control mb-4" rows="5" name="trainer_details|about_us" placeholder="Enter information about you"><?php echo $response['about_us']; ?></textarea>

	

	
	Select the sport that you coach:
	<br><br>
	<?php 
	
	//Get all the sports selected by the trainer and convert the string to an array
	$sports = explode(",",$response['sports']);
	
	
	
	?>
	<input type="checkbox" id="crick" name="trainer_details|sports[]" value="cricket" <?php foreach($sports as $test){if($test === "cricket"){ echo 'checked';}} ?>>
  <label for="crick">Cricket</label><br>
  <input type="checkbox" id="footb" name="trainer_details|sports[]" value="football" <?php foreach($sports as $test){if($test === "football"){ echo 'checked';}} ?>>
  <label for="footb">Football</label><br>
  <input type="checkbox" id="basketb" name="trainer_details|sports[]" value="basketball" <?php foreach($sports as $test){if($test === "basketball"){ echo 'checked';}} ?>>
  <label for="basketb">Basketball</label><br>
  <input type="checkbox" id="mm" name="trainer_details|sports[]" value="mma" <?php foreach($sports as $test){if($test === "mma"){ echo 'checked';}} ?>>
  <label for="mm">MMA</label><br><br>


<div class="row">
<div class="col-md-6">
<button type="submit" id="signup" class="btn btn-primary">Update Details</button>
</div>
                                  
 </div>
 <br>
                           

 </form>

    </div>
</section>
    <script>
$(document).ready(function(){
	$("#search").keyup(function(){
		var search = $("#search").val();
		if(search.length > 2)
	{
		$.ajax({
			url:"getcities.php",
			method:"POST",
			data:{search:search},
			success:function(data){
				$('#cities').html(data);
			}
		})
		$(document).on('click','li',function(){
			$('#search').val($(this).text());
		});
	}	
	});
	
});
</script>
<?php include_once("footer.php"); ?>