<?php include("header.php"); ?>					
					
<script src="ckeditor/ckeditor.js"></script>
<section class="ad-post bg-gray py-5">
    <div class="container">
                        <form method="post" enctype="multipart/form-data">						
						
<?php if(isset($error_mysql)){echo "<br>".$error_mysql;} ?>
<input type="hidden" class="form-control" id="" value="<?php echo $_SESSION['uid']; ?>" name="infra_images|uid"/>
<input type="hidden" class="form-control" id="" value="<?php echo $_SESSION['uid']; ?>" name="infra_sports|uid"/>
<input type="hidden" class="form-control" id="" name="infra_timings|ground_uid" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['ground_uid']."'";}else{echo "value='".$random_ground."'";}?>/>
<input type="hidden" class="form-control" id="" name="infra_sports|ground_uid" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['ground_uid']."'";}else{echo "value='".$random_ground."'";}?>/>
<input type="hidden" class="form-control" id="" name="infra_sports|sport" value="football" />
<?php
//Only add/update infra_details sports column when adding a new ground/turf 
if($_GET['page'] == 'addinfra')
{
	echo'
	<input type="hidden" class="form-control" id="" name="infra_details|randomid" value="'.$_SESSION['uid'].'"/>
	<input type="hidden" class="form-control" id="" name="infra_details|sports"'; if(empty($check['sports'])){echo "value='football'";}else{if(in_array("football",$sports)){echo "value='".$check['sports']."'";}else{array_push($sports,"football");echo "value='".implode(",",$sports)."'";}} echo' />';
																	/*If the sports column is empty,the input value will be football,if not,then check if the sports column already has the value football in it 
																	 using the $sports array created in the addinfra function using explode.If it exist then input value = The same value in the current sports column,if not,then push football to the existing $sports array and then turn the array into a string and input it in the input value*/
}																	
?>
<h2>Football registration</h2>
<hr>

<h5 class="">The Field</h5>
<br>
<div class="row">
<div class="col-md-6">
<input type="text" class="form-control mb-4" name="infra_sports|name_sports" id="cricground" placeholder="Football ground/turf name" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['name_sports']."'";}?>>
</div>
<div class="col-md-6">
<!--<label for="name " class="control-label">City (All Capital Letters:For Example = MUMBAI)</label>-->
<input type="text" id="search" class="form-control py-2" placeholder="City" name="infra_sports|city" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['city']."'";}?>>
<br>
<div id="cities">
	
</div>
</div>
</div>
<textarea class="form-control mb-4" rows="5" name="infra_sports|address_sports" placeholder="Address"><?php if($_GET['page'] == 'editinfra'){echo $response['address_sports'];}?></textarea>
<div class="row">
<div class="col-md-6">
<input type="text" class="form-control mb-4" name="infra_sports|custom_1" id="footfieldlength" placeholder="Football field length size (in meters)" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['custom_1']."'";}?>>
</div>
<div class="col-md-6">
<input type="text" class="form-control mb-4" name="infra_sports|custom_2" id="footfieldwidth" placeholder="Football field width size (in meters)" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['custom_2']."'";}?>>
</div>
</div>
<h5 class="">The Goal Area</h5>
<br>
<div class="row">
<div class="col-md-6">
<input type="text" class="form-control mb-4" name="infra_sports|custom_3" id="golength" placeholder="The goal area length size (in meters)" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['custom_3']."'";}?>>
</div>
<div class="col-md-6">
<input type="text" class="form-control mb-4" name="infra_sports|custom_4" id="gowidth" placeholder="The goal area width size (in meters)" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['custom_4']."'";}?>>
</div>
</div>
<h5 class="">The Penalty Area</h5>
<br>
<div class="row">
<div class="col-md-6">
<input type="text" class="form-control mb-4" name="infra_sports|custom_5" id="penlength" placeholder="The penalty area length size (in meters)" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['custom_5']."'";}?>>
</div>
<div class="col-md-6">
<input type="text" class="form-control mb-4" name="infra_sports|custom_6" id="penwidth" placeholder="The penalty area width size (in meters)" <?php if($_GET['page'] == 'editinfra'){echo "value='".$response['custom_6']."'";}?>>
</div>
</div>
<br>
<h5>Do you have sitting arrangements? :</h5>
<div class="row">
                  
<div class="col-md-6 form-group required">
<label class="radio-inline">
<input type="radio" name="infra_sports|seats" <?php if($_GET['page'] == 'editinfra'){if($response['seats'] == 'seats'){echo "checked";}}?> value="seats" > Yes
</label>
                     
</div>
                  
<div class="col-md-6 form-group required">
<label class="radio-inline">
<input type="radio" name="infra_sports|seats" <?php if($_GET['page'] == 'editinfra'){if(empty($response['seats'])){echo "checked";}}?> value=""> No
</label>
</div>
</div>
<h5>Do you provide locker rooms? :</h5>
<div class="row">
                  
<div class="col-md-6 form-group required">
<label class="radio-inline">
<input type="radio" name="infra_sports|locker_room" <?php if($_GET['page'] == 'editinfra'){if($response['locker_room'] == 'locker_room'){echo "checked";}}?> value="locker_room" > Yes
</label>
                     
</div>
                  
<div class="col-md-6 form-group required">
<label class="radio-inline">
<input type="radio" name="infra_sports|locker_room" <?php if($_GET['page'] == 'editinfra'){if(empty($response['locker_room'])){echo "checked";}}?> value=""> No
</label>
</div>
</div>
<h5>Do you provide shower rooms? :</h5>
<div class="row">
                  
<div class="col-md-6 form-group required">
<label class="radio-inline">
<input type="radio" name="infra_sports|showers" <?php if($_GET['page'] == 'editinfra'){if($response['showers'] == 'showers'){echo "checked";}}?> value="showers" > Yes
</label>
                     
</div>
                  
<div class="col-md-6 form-group required">
<label class="radio-inline">
<input type="radio" name="infra_sports|showers" <?php if($_GET['page'] == 'editinfra'){if(empty($response['showers'])){echo "checked";}}?> value=""> No
</label>
</div>
</div>
<!--<div class='form-check'>
		     <input type='checkbox' class='form-check-input mb-4' name='footballform_info|seats' value='seats' <?php if($_GET['page'] == 'editinfra'){if(!empty($response['seats'])){echo 'checked';}}?>>Do you provide seats?
			 </div><div class='form-check'>
		     <input type='checkbox' class='form-check-input mb-4' name='footballform_info|locker_room' value='locker_room' <?php if($_GET['page'] == 'editinfra'){if(!empty($response['locker_room'])){echo 'checked';}}?>>Do you provide locker rooms?
			 </div><div class='form-check'>
		     <input type='checkbox' class='form-check-input mb-4' name='footballform_info|showers' value='showers' <?php if($_GET['page'] == 'editinfra'){if(!empty($response['showers'])){echo 'checked';}}?>>Do you provide showers?
			 </div>-->
<br>
<textarea class="form-control mb-4" rows="5" name="infra_sports|summary" id="footsummary" placeholder="Add a summary about your football field"><?php if($_GET['page'] == 'editinfra'){echo $response['summary'];}?></textarea>


<fieldset class="border border-gary p-4 mb-5">
<h3 class=" mb-3">Features and Rules</h3>
<h5 class="">(Please write these in either numbered or bulleted forms)</h5>
<hr>
<p class="mb-3">Features that you provide for your customers (For example:Bats,Balls,Clothes)(Optional):</p> 

<textarea class="form-control mb-4 ckeditor" rows="5" name="infra_sports|features" id="cricfeatures"><?php if($_GET['page'] == 'editinfra'){echo $response['features'];}?></textarea>
<br>
<p class="mb-3">Rules(If any):</p>	
<textarea class="form-control mb-4 ckeditor" rows="5" name="infra_sports|rules" id="cricrules"><?php if($_GET['page'] == 'editinfra'){echo $response['rules'];}?></textarea>
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
 <script>
$(document).ready(function(){
	$("#search").keyup(function(){
		var search = $("#search").val();
		if(search.length > 2)
	{
		$.ajax({
			url:"getcities.php?method=sports",
			method:"POST",
			data:{search:search},
			success:function(data){
				$('#cities').html(data);
			}
		})
		$(document).on('click','li',function(){
			$('#search').val($(this).text());
		});
	}	
	});
	
});
</script>
<?php include("footer.php"); ?>					