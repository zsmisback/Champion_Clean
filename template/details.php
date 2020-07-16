<?php include_once("includes/header.php"); ?>

<section class="ad-post bg-gray py-5">
    <div class="container">
        <form method="post">
<?php if(isset($error_mysql)){echo "<br>".$error_mysql;} ?>
<input type="hidden" class="form-control" id="" value="<?php echo $_SESSION['uid']; ?>" name="infra_details|randomid"/>


<h2>Infrastructure registration</h2>
<hr>


<h3 class="text-center">Infrastructure Information</h3>
<hr>

<div class="row">
<div class="col-md-6">
<input type="text" class="form-control mb-4" name="infra_details|add_contact_no" placeholder="Enter your contact number">
</div>
<div class="col-md-6">
<input type="text" class="form-control mb-4" name="infra_details|pincode" placeholder="Enter the pincode of that area">
</div>
</div>
<input type="text" class="form-control mb-4" name="infra_details|address" placeholder="Enter your infrastructures address" value="">
<textarea class="form-control mb-4" rows="5" name="infra_details|about_us" placeholder="Enter information about your company"></textarea>

	

	
	Select the sport facilities that you provide:
	<br><br>
	<input type="checkbox" id="crick" name="infra_details|sports[]" value="cricket">
  <label for="crick">Cricket</label><br>
  <input type="checkbox" id="footb" name="infra_details|sports[]" value="football">
  <label for="footb">Football</label><br>
  <input type="checkbox" id="basketb" name="infra_details|sports[]" value="basketball">
  <label for="basketb">Basketball</label><br>
  <input type="checkbox" id="mm" name="infra_details|sports[]" value="mma">
  <label for="mm">MMA</label><br><br>


<div class="row">
<div class="col-md-6">
<button type="submit" id="signup" name="sign" value="signups" class="btn btn-primary">Signup</button>
</div>
                                  
 </div>
 <br>
                           

 </form>

    </div>
</section>
<?php include_once("includes/footer.php"); ?>