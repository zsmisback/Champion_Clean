<?php include_once("header.php"); ?>

<section class="ad-post bg-gray py-5">
    <div class="container">
        <form method="post" enctype="multipart/form-data">
<?php if(isset($error_mysql)){echo "<br>".$error_mysql;} ?>

<input type="hidden" class="form-control" id="" value="<?php echo $_SESSION['uid']; ?>" name="infra_details|randomid"/>
<input type="hidden" class="form-control" id="" value="<?php echo $_SESSION['uid']; ?>" name="user_profilepic|uid"/>

<!-- <h2>Infrastructure registration</h2> -->
<hr>


<h3 class="text-center">Infrastructure Information</h3>
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
<input type="text" class="form-control mb-4" name="infra_details|add_contact_no" placeholder="Enter your contact number" value="<?php echo $response['add_contact_no']; ?>">
</div>
<div class="col-md-6">
<input type="text" class="form-control mb-4" name="infra_details|pincode" placeholder="Enter the pincode of that area" value="<?php echo $response['pincode']; ?>">
</div>
</div>
<input type="text" class="form-control mb-4" name="infra_details|address" placeholder="Enter your infrastructures address" value="<?php echo $response['address']; ?>">
<textarea class="form-control mb-4" rows="5" name="infra_details|about_us" placeholder="Enter information about your company"><?php echo $response['about_us']; ?></textarea>
<label for="name " class="control-label">City</label>
<input type="text" id="search" class="form-control py-2" name="infra_details|city" value="<?php echo $response['city']; ?>">
<br>
<div id="cities">
	
</div>
	
	<?php 
	
	//Get all the sports selected by the trainer and convert the string to an array
	$sports = explode(",",$response['sports']);
	
	
	
	?>
	
	Select the sport facilities that you provide:
	<br><br>
	<input type="checkbox" id="crick" name="infra_details|sports[]" value="cricket" <?php foreach($sports as $test){if($test === "cricket"){ echo 'checked';}} ?>>
  <label for="crick">Cricket</label><br>
  <input type="checkbox" id="footb" name="infra_details|sports[]" value="football" <?php foreach($sports as $test){if($test === "football"){ echo 'checked';}} ?>>
  <label for="footb">Football</label><br>
  <input type="checkbox" id="basketb" name="infra_details|sports[]" value="basketball" <?php foreach($sports as $test){if($test === "basketball"){ echo 'checked';}} ?>>
  <label for="basketb">Basketball</label><br>
  <input type="checkbox" id="kick" name="infra_details|sports[]" value="kickboxing" <?php foreach($sports as $test){if($test === "kickboxing"){ echo 'checked';}} ?>>
  <label for="kick">Kickboxing</label><br>
  <input type="checkbox" id="rifle" name="infra_details|sports[]" value="rifleshooting">
  <label for="rifle">Rifle Shooting</label><br><br>
  <!--<input type="checkbox" id="mm" name="trainer_details|sports[]" value="mma">
  <label for="mm">MMA</label><br><br>-->


<div class="row">
<div class="col-md-6">
<button type="submit" id="signup" name="sign" value="signups" class="btn btn-primary">Update Details</button>
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
			url:"getcities_infra.php",
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