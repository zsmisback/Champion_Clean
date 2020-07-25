<?php include("header.php"); ?>					
					
<script src="ckeditor/ckeditor.js"></script>
<section class="ad-post bg-gray py-5">
    <div class="container">
                        <form method="post" enctype="multipart/form-data">						
					
<?php if(isset($error_mysql)){echo "<br>".$error_mysql;} ?>
<input type="hidden" class="form-control" id="" value="<?php echo $_SESSION['uid']; ?>" name="infra_images|uid"/>
<input type="hidden" class="form-control" id="" value="<?php echo $_SESSION['uid']; ?>" name="basketballform_info|uid"/>
<input type="hidden" class="form-control" id="" name="infra_timings|ground_uid" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['ground_uid']."'";}else{echo "value='".$random_ground."'";}?>/>
<input type="hidden" class="form-control" id="" name="basketballform_info|ground_uid" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['ground_uid']."'";}else{echo "value='".$random_ground."'";}?>/>
<?php
//Only add/update infra_details sports column when adding a new ground/turf 
if($_GET['page'] == 'addinfra')
{
	echo'
	<input type="hidden" class="form-control" id="" name="infra_details|randomid" value="'.$_SESSION['uid'].'"/>
	<input type="hidden" class="form-control" id="" name="infra_details|sports"'; if(empty($check['sports'])){echo "value='basketball'";}else{if(in_array("basketball",$sports)){echo "value='".$check['sports']."'";}else{array_push($sports,"basketball");echo "value='".implode(",",$sports)."'";}} echo' />';
																	/*If the sports column is empty,the input value will be basketball,if not,then check if the sports column already has the value basketball in it 
																	 using the $sports array created in the addinfra function using explode.If it exist then input value = The same value in the current sports column,if not,then push basketball to the existing $sports array and then turn the array into a string and input it in the input value*/
}																	
?>
<h2>Basketball registration</h2>
<hr>
<h5 class="">The Court</h5>
<fieldset class="border border-gary p-4 mb-5">
<div class="row">
<div class="col-md-6">
<input type="text" class="form-control" name="basketballform_info|court_length" id="colength" placeholder="The Court length (in meters)" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['court_length']."'";}?>>
</div>
<div class="col-md-6">
<input type="text" class="form-control" name="basketballform_info|court_width" id="cowidth" placeholder="The Court width (in meters)" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['court_width']."'";}?>>
</div>
</div>
<br>
<div class="row">
<div class="col-md-4">
<h5 class="">The Rim</h5>
<input type="text" class="form-control" name="basketballform_info|court_rim" id="corimheight" placeholder="The rims height (in meters)" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['court_rim']."'";}?>>
</div>

<div class="col-md-4">
<h5 class="">The Center Circle</h5>
<input type="text" class="form-control" name="basketballform_info|center_circle" id="centcirclediameter" placeholder="The center circle diameter (in meters)" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['center_circle']."'";}?>>
</div>
<div class="col-md-4">
<h5 class="">The No Charge Zone arc</h5>
<input type="text" class="form-control" name="basketballform_info|nocharge_zone" id="nochzonearc" placeholder="The No Charge Zone arc (in meters)" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['nocharge_zone']."'";}?>>
</div>
</div>
<br>
<h5 class="">The 3 point line distance from the basket</h5>
<div class="row">
<div class="col-md-6">
<input type="text" class="form-control mb-4" name="basketballform_info|3point" id="3pointlinedist" placeholder="The 3 point line distance from the basket (in meters)" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['3point']."'";}?>>
</div>
<div class="col-md-6">
<input type="text" class="form-control mb-4" name="basketballform_info|3pointcor" id="3pointlinedistincor" placeholder="The 3 point line distance from the basket in corner (in meters)" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['3pointcor']."'";}?>>
</div>
</div>
<div class="row">
<div class="col-md-6">
<h5 class="">The Key(shaded lane or restricted area)</h5>
<input type="text" class="form-control mb-4" name="basketballform_info|the_key" id="thek" placeholder="The Key width (in meters)" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['the_key']."'";}?>>
</div>
<div class="col-md-6">
<h5 class="">Free-throw line distance</h5>
<input type="text" class="form-control mb-4" name="basketballform_info|freethrowline" id="freethr" placeholder="The Free throw line distance from point on the floor (in meters)" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['freethrowline']."'";}?>>
</div>
</div>
<br>
<div class='form-check'>
		     <input type='checkbox' class='form-check-input mb-4' name='basketballform_info|seats' value='seats' <?php if($_GET['page'] == 'editinfra'){if(!empty($response['seats'])){echo 'checked';}}?>>Do you provide seats?
			 </div><div class='form-check'>
		     <input type='checkbox' class='form-check-input mb-4' name='basketballform_info|locker_room' value='locker_room' <?php if($_GET['page'] == 'editinfra'){if(!empty($response['locker_room'])){echo 'checked';}}?>>Do you provide locker rooms?
			 </div><div class='form-check'>
		     <input type='checkbox' class='form-check-input mb-4' name='basketballform_info|showers' value='showers' <?php if($_GET['page'] == 'editinfra'){if(!empty($response['showers'])){echo 'checked';}}?>>Do you provide showers?
			 </div>
<br>
<textarea class="form-control mb-4" rows="5" name="basketballform_info|summary" id="basketsummary" placeholder="Add a summary about your basketball field"><?php if($_GET['page'] == 'editinfra'){echo $response['summary'];}?></textarea>


<fieldset class="border border-gary p-4 mb-5">
<h3 class=" mb-3">Features and Rules</h3>
<h5 class="">(Please write these in either numbered or bulleted forms)</h5>
<hr>
<p class="mb-3">Features that you provide for your customers (For example:Bats,Balls,Clothes)(Optional):</p> 

<textarea class="form-control mb-4 ckeditor" rows="5" name="basketballform_info|features" id="cricfeatures"><?php if($_GET['page'] == 'editinfra'){echo $response['features'];}?></textarea>
<br>
<p class="mb-3">Rules(If any):</p>	
<textarea class="form-control mb-4 ckeditor" rows="5" name="basketballform_info|rules" id="cricrules"><?php if($_GET['page'] == 'editinfra'){echo $response['rules'];}?></textarea>
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