<?php include_once("header.php"); ?>

<section class="ad-post bg-gray py-5">
    <div class="container">
        <form method="post" enctype="multipart/form-data">
<?php if(isset($error_mysql)){echo "<br>".$error_mysql;} ?>
<input type="hidden" class="form-control" id="" value="<?php echo $_SESSION['uid']; ?>" name="vendor_details|randomid"/>
<input type="hidden" class="form-control" id="" value="<?php echo $random_id;?>" name="vendor_details|sid"/>
<h2>Vendor Registration</h2>
<hr>


<h3 class="text-center">Vendor Information</h3>
<hr>

<div class="row">



<div class="col-md-6">
<input type="text" class="form-control mb-4" name="vendor_details|name" placeholder="Enter your establishment name">
</div>
<div class="col-md-6">
<input type="text" class="form-control mb-4" name="vendor_details|gstin" placeholder="Enter GST Number">
</div>


<div class="col-md-6">
<input type="text" class="form-control mb-4" name="vendor_details|contact_email" placeholder="Enter email address">
</div>
<div class="col-md-6">
<input type="text" class="form-control mb-4" name="vendor_details|contact_number" placeholder="Enter contact number">
</div>



<div class="col-md-6">
<input type="text" class="form-control mb-4" name="vendor_details|website" placeholder="Enter your website name">
</div>
<div class="col-md-6">
<input type="text" class="form-control mb-4" name="vendor_details|city" placeholder="Enter your city">
</div>


</div>
<input type="text" class="form-control mb-4" name="vendor_details|address" placeholder="Enter your address" value="">
<textarea class="form-control mb-4" rows="5" name="vendor_details|about_us" placeholder="Enter information about you"></textarea>
<textarea class="form-control mb-4" rows="5" name="vendor_details|list_products" placeholder="List your products (Seperated by commas)"></textarea>
<textarea class="form-control mb-4" rows="5" name="vendor_details|brands" placeholder="List the brands you sell (Seperated by commas)"></textarea>
<textarea class="form-control mb-4" rows="5" name="vendor_details|partners" placeholder="Name of your partners if any (Seperated by commas)"></textarea>


<input type="checkbox" id="online" name="vendor_details|online_sale" value="1">
<label for="online"><h4>Do you currently sell your products online?</h4></label>
	

	

<div class="row">
<div class="col-md-6">
<button type="submit" id="signup" class="btn btn-primary">Signup</button>
</div>
                                  
 </div>
 <br>
                           

 </form>

    </div>
</section>
<?php include_once("footer.php"); ?>