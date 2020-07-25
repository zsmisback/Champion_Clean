<?php include_once("header.php"); ?>

<section class="ad-post bg-gray py-5">
    <div class="container">
        <form method="post" enctype="multipart/form-data">
<?php if(isset($error_mysql)){echo "<br>".$error_mysql;} ?>
<input type="hidden" value="<?php include $_GET['id']; ?>" name="ground_uid"/>


<h2>Infrastructure registration</h2>
<hr>


<h3 class="text-center">Infrastructure Information</h3>
<hr>


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






<div class="row">
<div class="col-md-6">
<button type="submit" id="signup" value="signups" class="btn btn-primary">Delete</button>
</div>
                                  
 </div>
 <br>
                           

 </form>

    </div>
</section>

<?php include 'footer.php'; ?>