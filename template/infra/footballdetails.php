<?php include("header.php"); ?>					
					
<script src="ckeditor/ckeditor.js"></script>
<section class="ad-post bg-gray py-5">
    <div class="container">
                        <form method="post" enctype="multipart/form-data">						
						
<?php if(isset($error_mysql)){echo "<br>".$error_mysql;} ?>
<input type="hidden" class="form-control" id="" value="<?php echo $_SESSION['uid']; ?>" name="infra_images|uid"/>
<input type="hidden" class="form-control" id="" value="<?php echo $_SESSION['uid']; ?>" name="footballform_info|uid"/>
<input type="hidden" class="form-control" id="" name="infra_timings|ground_uid" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['ground_uid']."'";}else{echo "value='".$random_ground."'";}?>/>
<input type="hidden" class="form-control" id="" name="footballform_info|ground_uid" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['ground_uid']."'";}else{echo "value='".$random_ground."'";}?>/>

<h2>Football registration</h2>
<hr>

<h5 class="">The Field</h5>
<br>
<div class="row">
<div class="col-md-6">
<input type="text" class="form-control mb-4" name="footballform_info|field_length" id="footfieldlength" placeholder="Football field length size (in meters)" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['field_length']."'";}?>>
</div>
<div class="col-md-6">
<input type="text" class="form-control mb-4" name="footballform_info|field_width" id="footfieldwidth" placeholder="Football field width size (in meters)" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['field_width']."'";}?>>
</div>
</div>
<h5 class="">The Goal Area</h5>
<br>
<div class="row">
<div class="col-md-6">
<input type="text" class="form-control mb-4" name="footballform_info|goal_length" id="golength" placeholder="The goal area length size (in meters)" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['goal_length']."'";}?>>
</div>
<div class="col-md-6">
<input type="text" class="form-control mb-4" name="footballform_info|goal_width" id="gowidth" placeholder="The goal area width size (in meters)" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['goal_width']."'";}?>>
</div>
</div>
<h5 class="">The Penalty Area</h5>
<br>
<div class="row">
<div class="col-md-6">
<input type="text" class="form-control mb-4" name="footballform_info|penalty_length" id="penlength" placeholder="The penalty area length size (in meters)" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['penalty_length']."'";}?>>
</div>
<div class="col-md-6">
<input type="text" class="form-control mb-4" name="footballform_info|penalty_width" id="penwidth" placeholder="The penalty area width size (in meters)" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['penalty_width']."'";}?>>
</div>
</div>
<br>
<div class='form-check'>
		     <input type='checkbox' class='form-check-input mb-4' name='footballform_info|seats' value='seats' <?php if($_GET['page'] == 'editinfra'){if(!empty($response['seats'])){echo 'checked';}}?>>Do you provide seats?
			 </div><div class='form-check'>
		     <input type='checkbox' class='form-check-input mb-4' name='footballform_info|locker_room' value='locker_room' <?php if($_GET['page'] == 'editinfra'){if(!empty($response['locker_room'])){echo 'checked';}}?>>Do you provide locker rooms?
			 </div><div class='form-check'>
		     <input type='checkbox' class='form-check-input mb-4' name='footballform_info|showers' value='showers' <?php if($_GET['page'] == 'editinfra'){if(!empty($response['showers'])){echo 'checked';}}?>>Do you provide showers?
			 </div>
<br>
<textarea class="form-control mb-4" rows="5" name="footballform_info|summary" id="footsummary" placeholder="Add a summary about your football field"><?php if($_GET['page'] == 'editinfra'){echo $response['summary'];}?></textarea>


<fieldset class="border border-gary p-4 mb-5">
<h3 class=" mb-3">Features and Rules</h3>
<h5 class="">(Please write these in either numbered or bulleted forms)</h5>
<hr>
<p class="mb-3">Features that you provide for your customers (For example:Bats,Balls,Clothes)(Optional):</p> 

<textarea class="form-control mb-4 ckeditor" rows="5" name="footballform_info|features" id="cricfeatures"><?php if($_GET['page'] == 'editinfra'){echo $response['features'];}?></textarea>
<br>
<p class="mb-3">Rules(If any):</p>	
<textarea class="form-control mb-4 ckeditor" rows="5" name="footballform_info|rules" id="cricrules"><?php if($_GET['page'] == 'editinfra'){echo $response['rules'];}?></textarea>
</fieldset>
<fieldset class="border bg-white p-4 my-5 ad-feature bg-gray">
<h3 class=" mb-3">Timings</h3>
<h6 class=" mb-3">Monday</h6>

<div class="row" id="schedule">
<div class="col-md-6 ">
Opening times: 

<input type="time" name="infra_timings|monday_from" id="monfromtime" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['monday_from']."'";}else{echo "value=''";}?>/>
</div>
<div class="col-md-6 ">
Closing times: 

<input type="time" name="infra_timings|monday_to" id="montotime" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['monday_to']."'";}else{echo "value=''";}?>/>

</div>
</div>
<br>
<h6 class=" mb-3">Tuesday</h6>
<div class="row" id="schedule">

<div class="col-md-6 ">


Opening times: 

<input type="time" name="infra_timings|tuesday_from" id="tuefromtime" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['tuesday_from']."'";}else{echo "value=''";}?>/>

</div>
<div class="col-md-6">
Closing times: 

<input type="time" name="infra_timings|tuesday_to" id="montotime" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['tuesday_to']."'";}else{echo "value=''";}?>/>

</div>
</div>
<br>
<h6 class=" mb-3">Wednesday</h6>
<div class="row" id="schedule">

<div class="col-md-6 ">


Opening times: 

<input type="time" name="infra_timings|wednesday_from" id="wedfromtime" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['wednesday_from']."'";}else{echo "value=''";}?>/>

</div>
<div class="col-md-6 ">
Closing times: 

<input type="time" name="infra_timings|wednesday_to" id="wedtotime" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['wednesday_to']."'";}else{echo "value=''";}?>/>

</div>
</div>
<br>
<h6 class=" mb-3">Thursday</h6>
<div class="row" id="schedule">

<div class="col-md-6 ">


Opening times: 

<input type="time" name="infra_timings|thursday_from" id="thursfromtime" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['thursday_from']."'";}else{echo "value=''";}?>/>

</div>
<div class="col-md-6 ">
Closing times: 

<input type="time" name="infra_timings|thursday_to" id="thurstotime" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['thursday_to']."'";}else{echo "value=''";}?>/>

</div>
</div>
<br>
<h6 class=" mb-3">Friday</h6>
<div class="row" id="schedule">

<div class="col-md-6 ">

Opening times: 

<input type="time" name="infra_timings|friday_from" id="frifromtime" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['friday_from']."'";}else{echo "value=''";}?>/>

</div>
<div class="col-md-6 ">
Closing times: 

<input type="time" name="infra_timings|friday_to" id="fritotime" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['friday_to']."'";}else{echo "value=''";}?>/>

</div>
</div>
<br>
<h6 class=" mb-3">Saturday</h6>
<div class="row" id="schedule">
<br>
<div class="col-md-6 ">


Opening times: 

<input type="time" name="infra_timings|saturday_from" id="satfromtime" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['saturday_from']."'";}else{echo "value=''";}?>/>

</div>
<div class="col-md-6 ">
Closing times: 

<input type="time" name="infra_timings|saturday_to" id="sattotime" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['saturday_to']."'";}else{echo "value=''";}?>/>

</div>
</div>
<br>
<h6 class=" mb-3">Sunday</h6>
<div class="row" id="schedule">

<div class="col-md-6 ">


Opening times: 

<input type="time" name="infra_timings|sunday_from" id="sunfromtime" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['sunday_from']."'";}else{echo "value=''";}?>/>

</div>
<div class="col-md-6 ">
Closing times: 

<input type="time" name="infra_timings|sunday_to" id="suntotime" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['sunday_to']."'";}else{echo "value=''";}?>/>

</div>
</div>

</fieldset>

<fieldset class="border border-gary bg-white p-4 mb-2">
<h3 class=" mb-3">Add Image Gallery</h3>
<input type="hidden" class="form-control" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['ground_uid']."'";}else{echo "value='".$random_ground."'";}?> name="infra_images|ground_uid"/>
<div class="row">
<div class="col-md-6">
<input type="file" class="form-control mb-4" name="infra_images|image1|0|<?php if($_GET['page'] == 'editinfra'){echo $image1[1];}else{ echo $random_ground; }?>">
<?php
if($_GET['page'] == 'editinfra')
{	
	echo'
	Current Image:<br>
	<img src = "'.$response['image1'].'" class="img-fluid"/>';
}
?>
</div>

<div class="col-md-6">
<input type="file" class="form-control mb-4" name="infra_images|image2|0|<?php if($_GET['page'] == 'editinfra'){echo $image2[1];}else{ echo $random_ground; }?>">
<?php
if($_GET['page'] == 'editinfra')
{	
	echo'
	Current Image:<br>
	<img src = "'.$response['image2'].'" class="img-fluid"/>';
}
?>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<input type="file" class="form-control mb-4" name="infra_images|image3|0|<?php if($_GET['page'] == 'editinfra'){echo $image3[1];}else{ echo $random_ground; }?>">
<?php
if($_GET['page'] == 'editinfra')
{	
	echo'
	Current Image:<br>
	<img src = "'.$response['image3'].'" class="img-fluid"/>';
}
?>
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
<button type="submit" id="signup" value="signups" class="btn btn-primary">Submit</button>
</div>                                  
 </div>
 <br>
                              
 </div>
 <br>
                           

 </form>
 </div></div>
<?php include("footer.php"); ?>					