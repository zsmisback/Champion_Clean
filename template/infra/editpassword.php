<?php include_once("header.php"); ?>

<section class="login py-5 border-top-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 align-item-center">
                    <div class="border border">
                        <h3 class="bg-gray p-4">Edit Registration Form</h3>							
                        <form action="" method="post">	
                            <fieldset class="p-4">
							<?php if(isset($error_mysql)){echo $error_mysql;}  ?>
								<input type="text" name="users|username" placeholder="Email*" class="border p-3 w-100 my-2" value="<?php echo $response['username']; ?>">
								<input type="password" placeholder="Current Password*" class="border p-3 w-100 my-2">
                                <input type="password" name="users|password" placeholder="New Password*" class="border p-3 w-100 my-2">
                                <input type="password" placeholder="Confirm Password*" class="border p-3 w-100 my-2">
                                <div class="loggedin-forgot d-inline-flex my-3">
                                <label for="registering" class="px-2">By registering, you accept our <a class="text-primary font-weight-bold" href="terms-condition.html">Terms & Conditions</a></label>
                                </div>
								<div class="row">
								<div class="col-md-6">
                                <button type="submit" class="d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold">Change Password</button>
								</div>
								<div class="col-md-6">
                                <a href="infra.php?page=editprofile"><button type="button" class="d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold">Go Back</button></a>
								</div>
								</div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section><?php include_once("footer.php"); ?>