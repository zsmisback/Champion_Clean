<?php include_once("header.php"); ?>

<section class="ad-post bg-gray py-5">
    <div class="container">
        <form method="post" enctype="multipart/form-data">
<?php if(isset($error_mysql)){echo "<br>".$error_mysql;} ?>

<input type="hidden" class="form-control" id="" value="<?php echo $_SESSION['uid']; ?>" name="infra_details|randomid"/>
<input type="hidden" class="form-control" id="" value="<?php echo $_SESSION['uid']; ?>" name="user_profilepic|uid"/>

<h2>Infrastructure registration</h2>
<hr>


<h3 class="text-center">Infrastructure Information</h3>
<hr>

<div class="row">
<div class="col-md-6">
<input type="file" class="form-control mb-4" name="user_profilepic|profilepic|0|<?php echo $_SESSION['uid']; ?>" placeholder="Enter your profile picture">
</div>

<div class="col-md-6">
<input type="text" class="form-control mb-4" name="infra_details|add_contact_no" placeholder="Enter your contact number">
</div>
<div class="col-md-6">
<input type="text" class="form-control mb-4" name="infra_details|pincode" placeholder="Enter the pincode of that area">
</div>
</div>
<input type="text" class="form-control mb-4" name="infra_details|address" placeholder="Enter your infrastructures address" value="">
<textarea class="form-control mb-4" rows="5" name="infra_details|about_us" placeholder="Enter information about your company"></textarea>
<label for="name " class="control-label">City (All Capital Letters:For Example = MUMBAI)</label>
<input type="text" id="search" class="form-control py-2" name="infra_details|city">
<br>
<div id="cities">
	
</div>
	

	
	Select the sport facilities that you provide:
	<br><br>
	<input type="checkbox" id="crick" name="infra_details|sports[]" value="cricket">
  <label for="crick">Cricket</label><br>
  <input type="checkbox" id="footb" name="infra_details|sports[]" value="football">
  <label for="footb">Football</label><br>
  <input type="checkbox" id="basketb" name="infra_details|sports[]" value="basketball">
  <label for="basketb">Basketball</label><br>
  <input type="checkbox" id="kick" name="infra_details|sports[]" value="kickboxing">
  <label for="kick">Kickboxing</label><br>
  <input type="checkbox" id="rifle" name="infra_details|sports[]" value="rifleshooting">
  <label for="rifle">Rifle Shooting</label><br><br>
  <!--<input type="checkbox" id="mm" name="trainer_details|sports[]" value="mma">
  <label for="mm">MMA</label><br><br>-->


<div class="row">
<div class="col-md-6">
<button type="submit" id="signup" name="sign" value="signups" class="btn btn-primary">Signup</button>
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