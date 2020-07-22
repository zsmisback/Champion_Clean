<?php include("header.php"); ?>					
					

<section class="ad-post bg-gray py-5">
    <div class="container">
                        <form method="post" enctype="multipart/form-data">						
					
<?php if(isset($error_mysql)){echo "<br>".$error_mysql;} ?>
<input type="hidden" class="form-control" id="" value="<?php echo $_SESSION['uid']; ?>" name="infra_images|uid"/>
<input type="hidden" class="form-control" id="" value="<?php echo $_SESSION['uid']; ?>" name="basketballform_info|uid"/>
<input type="hidden" class="form-control" id="" name="infra_timings|ground_uid" value="<?php echo $random_ground; ?>"/>
<input type="hidden" class="form-control" id="" name="basketballform_info|ground_uid" value="<?php echo $random_ground; ?>"/>

<h2>Basketball registration</h2>
<hr>
<h5 class="">The Court</h5>
<fieldset class="border border-gary p-4 mb-5">
<div class="row">
<div class="col-md-6">
<input type="text" class="form-control" name="basketballform_info|court_length" id="colength" placeholder="The Court length (in meters)">
</div>
<div class="col-md-6">
<input type="text" class="form-control" name="basketballform_info|court_width" id="cowidth" placeholder="The Court width (in meters)">
</div>
</div>
<br>

<div class='form-check'>
		     <input type='checkbox' class='form-check-input mb-4' name='basketballform_info|seats' value='seats'>Do you provide seats?
			 </div><div class='form-check'>
		     <input type='checkbox' class='form-check-input mb-4' name='basketballform_info|locker_room' value='locker_room'>Do you provide locker rooms?
			 </div><div class='form-check'>
		     <input type='checkbox' class='form-check-input mb-4' name='basketballform_info|showers' value='showers'>Do you provide showers?
			 </div>
<br>
<textarea class="form-control mb-4" rows="5" name="basketballform_info|summary" id="basketsummary" placeholder="Add a summary about your basketball field"></textarea>


<fieldset class="border border-gary p-4 mb-5">
<h3 class=" mb-3">Features and Rules</h3>
<h5 class="">(Please write these in either numbered or bulleted forms)</h5>
<hr>
<p class="mb-3">Features that you provide for your customers (For example:Bats,Balls,Clothes)(Optional):</p> 

<textarea class="form-control mb-4 ckeditor" rows="5" name="basketballform_info|features" id="cricfeatures"></textarea>
<br>
<p class="mb-3">Rules(If any):</p>	
<textarea class="form-control mb-4 ckeditor" rows="5" name="basketballform_info|rules" id="cricrules"></textarea>
</fieldset>
<fieldset class="border bg-white p-4 my-5 ad-feature bg-gray">
<h3 class=" mb-3">Timings</h3>
<h6 class=" mb-3">Monday</h6>

<div class="row" id="schedule">
<div class="col-md-6 ">
Opening times: 

<input type="time" name="infra_timings|monday_from" id="monfromtime"/>
</div>
<div class="col-md-6 ">
Closing times: 

<input type="time" name="infra_timings|monday_to" id="montotime"/>

</div>
</div>
<br>
<h6 class=" mb-3">Tuesday</h6>
<div class="row" id="schedule">

<div class="col-md-6 ">


Opening times: 

<input type="time" name="infra_timings|tuesday_from" id="tuefromtime"/>

</div>
<div class="col-md-6">
Closing times: 

<input type="time" name="infra_timings|tuesday_to" id="montotime"/>

</div>
</div>
<br>
<h6 class=" mb-3">Wednesday</h6>
<div class="row" id="schedule">

<div class="col-md-6 ">


Opening times: 

<input type="time" name="infra_timings|wednesday_from" id="wedfromtime"/>

</div>
<div class="col-md-6 ">
Closing times: 

<input type="time" name="infra_timings|wednesday_to" id="wedtotime"/>

</div>
</div>
<br>
<h6 class=" mb-3">Thursday</h6>
<div class="row" id="schedule">

<div class="col-md-6 ">


Opening times: 

<input type="time" name="infra_timings|thursday_from" id="thursfromtime"/>

</div>
<div class="col-md-6 ">
Closing times: 

<input type="time" name="infra_timings|thursday_to" id="thurstotime"/>

</div>
</div>
<br>
<h6 class=" mb-3">Friday</h6>
<div class="row" id="schedule">

<div class="col-md-6 ">

Opening times: 

<input type="time" name="infra_timings|friday_from" id="frifromtime"/>

</div>
<div class="col-md-6 ">
Closing times: 

<input type="time" name="infra_timings|friday_to" id="fritotime"/>

</div>
</div>
<br>
<h6 class=" mb-3">Saturday</h6>
<div class="row" id="schedule">
<br>
<div class="col-md-6 ">


Opening times: 

<input type="time" name="infra_timings|saturday_from" id="satfromtime"/>

</div>
<div class="col-md-6 ">
Closing times: 

<input type="time" name="infra_timings|saturday_to" id="sattotime"/>

</div>
</div>
<br>
<h6 class=" mb-3">Sunday</h6>
<div class="row" id="schedule">

<div class="col-md-6 ">


Opening times: 

<input type="time" name="infra_timings|sunday_from" id="sunfromtime"/>

</div>
<div class="col-md-6 ">
Closing times: 

<input type="time" name="infra_timings|sunday_to" id="suntotime"/>

</div>
</div>

</fieldset>

<fieldset class="border border-gary bg-white p-4 mb-2">
<h3 class=" mb-3">Add Image Gallery</h3>
<input type="hidden" class="form-control" value="<?php echo $random_ground; ?>" name="infra_images|ground_uid"/>
<div class="row">
<div class="col-md-6">
<input type="file" class="form-control mb-4" name="infra_images|image1|0|<?php echo $random_ground; ?>">
</div>

<div class="col-md-6">
<input type="file" class="form-control mb-4" name="infra_images|image2|0|<?php echo $random_ground; ?>">
</div>
</div>

<div class="row">
<div class="col-md-6">
<input type="file" class="form-control mb-4" name="infra_images|image3|0|<?php echo $random_ground; ?>">
</div>

<!--<div class="col-md-6">
<input type="file" class="form-control mb-4" name="infra_images|image4|0|<?php echo $random_ground; ?>">
</div>-->
</div>


<!--<div class="row">
<div class="col-md-6">
<input type="file" class="form-control mb-4" name="infra_images|image5|0|<?php echo $random_ground; ?>">
</div>

<div class="col-md-6">
<input type="file" class="form-control mb-4" name="infra_images|image6|0|<?php echo $random_ground; ?>">
</div>
</div>-->
</fieldset>

<div class="row">
<div class="col-md-6">
<button type="submit" id="signup" name="sign" value="signups" class="btn btn-primary">Submit</button>
</div>                                  
 </div>
 <br>
                              
 </div>
 <br>
                           

 </form>

 </div></div>
<?php include("footer.php"); ?>	