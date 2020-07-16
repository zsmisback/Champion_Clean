<?php include_once("header.php"); ?>

<section class="login py-5 border-top-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 align-item-center">
                    <div class="border border">
                        <h3 class="bg-gray p-4">Register Now</h3>							
                        <form action="" method="post">	
                            <!--Check whether the user has clicked on register from infra/trainer/vendor-->
                            <?php
							
                            //$base = $_SERVER['PHP_SELF'] with basename()
							
							if($base == "index.php")
							{	
                             echo'							
							 <input type="hidden" name="users|type" value="User">';
							}
							elseif($base == "infra.php")
							{
								echo'							
							 <input type="hidden" name="users|type" value="Infra">';
							}
							elseif($base == "trainer.php")
							{
								echo'<input type="hidden" name="users|type" value="Trainer">';
							}
							elseif($base == "vendor.php")
							{
								echo'<input type="hidden" name="users|type" value="Vendor">';
							}
							elseif($base == "event.php")
							{
								echo'<input type="hidden" name="users|type" value="Infra">';
							}
							
							?>
							<input type="hidden" name="users|randomid" value="<?php echo $random_id; ?>">
                            <fieldset class="p-4">
							<?php if(isset($error_mysql)){echo $error_mysql;}  ?>
                                <input type="email" name="users|username" placeholder="Email*" class="border p-3 w-100 my-2">
								<input type="name" name="users|name" placeholder="Name*" class="border p-3 w-100 my-2">								
								<input type="name" name="users|contact_no" placeholder="Contact Number*" class="border p-3 w-100 my-2">
                                <input type="password" name="users|password" placeholder="Password*" class="border p-3 w-100 my-2">
                                <input type="password" name="vpassword" placeholder="Confirm Password*" class="border p-3 w-100 my-2">
                                <div class="loggedin-forgot d-inline-flex my-3">
                                        <label for="registering" class="px-2">By registering, you accept our <a class="text-primary font-weight-bold" href="terms-condition.html">Terms & Conditions</a></label>
                                </div>
                                <button type="submit" class="d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold">Register Now</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section><?php include_once("footer.php"); ?>