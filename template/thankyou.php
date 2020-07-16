<?php include("header.php"); ?>
<section class="section bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center mx-auto">
                <div class="404-img">
                    <h1 class="display-1 pt-1 pb-2">Thank You</h1>
                </div>
                <div class="404-content">                    
                    <p class="px-3 pb-2 text-dark">We are building something awesome ! We will inform you once we are ready. Thanks for signing up. You can email us on care@champion.in</p>
					<?php
					
					//Check which page the user is on
					if($base == "index.php")
					{
						echo'
						<a href="index.php?page=home" class="btn btn-info">';
					}
					elseif($base == "infra.php")
					{
						echo'
						<a href="infra.php?page=home" class="btn btn-info">';
					}
					elseif($base == "trainer.php")
					{
						echo'
						<a href="trainer.php?page=home" class="btn btn-info">';
					}
					elseif($base == "vendor.php")
					{
						echo'
						<a href="vendor.php?page=home" class="btn btn-info">';
					}
					elseif($base == "event.php")
					{
						echo'
						<a href="event.php?page=home" class="btn btn-info">';
					}
					?>
					GO HOME
					</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include("footer.php"); ?>