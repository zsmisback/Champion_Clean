<?php include("includes/header.php"); ?>

<section class="login py-5 border-top-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 align-item-center">
                <div class="border">
                    <h3 class="bg-gray p-4">Your Charges</h3>
					<?php if(isset($response["error"])){	
							echo '<div class="alert alert-danger">
							<strong>Error!</strong> Username or Password Not Found !
							</div>';}		
							?>
                    <form method="post">
                        <fieldset class="p-4">
                            Rupees<input type="number" name="trainer_charges|hourly_charges" placeholder="Hourly Charges" class="border p-3 w-100 my-2">
                            <input type="hidden" class="form-control" id="" value="<?php echo $_SESSION['uid']; ?>" name="trainer_charges|uid"/>
                            <div class="loggedin-forgot">
                                    <input type="checkbox" id="keep-me-logged-in">
                                    <label for="keep-me-logged-in" class="pt-3 pb-2">You agree to the terms and condition</label>
                            </div>
                            <button type="submit" class="d-block py-3 px-5 bg-primary text-white border-0 rounded font-weight-bold mt-3">Submit</button>                            
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include("includes/footer.php"); ?>