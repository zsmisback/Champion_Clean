<?php include 'header.php'; ?>
<section class="ad-post bg-gray py-5">
    <div class="container">
	<h2>Add An Event</h2>
  <form method="post" enctype="multipart/form-data">
<?php if(isset($error_mysql)){echo $error_mysql;}  ?>
<input type="hidden" class="form-control" id="" value="<?php echo $_SESSION['uid']; ?>" name="events|uid"/> 
<input type="hidden" class="form-control" id="" <?php if($_GET['page'] == 'editevents'){echo "value='".$response['event_id']."'";}else{echo "value='".$random_event."'";}?> name="events|event_id"/> 
<input type="hidden" class="form-control" id="" value="<?php echo $_SESSION['uid']; ?>" name="events_schedule|uid"/> 
<input type="hidden" class="form-control" id="" <?php if($_GET['page'] == 'editevents'){echo "value='".$response['event_id']."'";}else{echo "value='".$random_event."'";}?> name="events_schedule|event_id"/> 
    <div class="row">
	<div class="col-sm-6">
	<div class="form-group">
      <label for="email">Event Name:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter Event Name" name="events|name" <?php if($_GET['page'] == 'editevents'){echo "value='".$response['name']."'";}?>>
    </div>
	</div>
	<div class="col-sm-6">
	<label for="name " class="control-label">City (All Capital Letters:For Example = MUMBAI)</label>
	<input type="text" id="search" class="form-control py-2" name="events|city" <?php if($_GET['page'] == 'editevents'){echo "value='".$response['city']."'";}?>>
	<br>
	<div id="cities">
	
	</div>
	</div>
	</div>
    <div class="form-group">
      <label for="pwd">Location:</label>
      <textarea class="form-control" id="pwd" placeholder="Enter Location" name="events|address"><?php if($_GET['page'] == 'editevents'){echo $response['address'];}?></textarea>
    </div>
	<div class="row">
    <div class="form-group col-sm-6">
      <label for="email">Start Date:</label>
      <input type="date" class="form-control" id="email" placeholder="Enter Event Name" name="events_schedule|start_date" <?php if($_GET['page'] == 'editevents'){echo "value='".$response['start_date']."'";}?>>
    </div>
	<div class="form-group col-sm-6">
      <label for="email">Start Time:</label>
      <input type="time" class="form-control" id="email" placeholder="Enter Event Name" name="events_schedule|start_time" <?php if($_GET['page'] == 'editevents'){echo "value='".$response['start_time']."'";}?>>
    </div>
	</div>
	<div class="row">
    <div class="form-group col-sm-6">
      <label for="email">End Date:</label>
      <input type="date" class="form-control" id="email" placeholder="Enter Event Name" name="events_schedule|end_date" <?php if($_GET['page'] == 'editevents'){echo "value='".$response['end_date']."'";}?>>
    </div>
	<div class="form-group col-sm-6">
      <label for="email">End Time:</label>
      <input type="time" class="form-control" id="email" placeholder="Enter Event Name" name="events_schedule|end_time" <?php if($_GET['page'] == 'editevents'){echo "value='".$response['end_time']."'";}?>>
    </div>
	</div>
	<div class="form-group">
      <label for="pwd">Description:</label>
      <textarea class="form-control" id="pwd" placeholder="Enter Description" name="events|summary"><?php if($_GET['page'] == 'editevents'){echo $response['summary'];}?></textarea>
    </div>
	<div class="form-group">
      <label for="email">Previous Events:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter Previous Event Name" name="events|previous_events" <?php if($_GET['page'] == 'editevents'){echo "value='".$response['previous_events']."'";}?>>
    </div>
	<div class="form-group">
      <label for="email">List Sponsors (List seperated by comma):</label>
      <input type="text" class="form-control" id="email" placeholder="List Sponsors" name="events|sponsors" <?php if($_GET['page'] == 'editevents'){echo "value='".$response['sponsors']."'";}?>>
    </div>
	<div class="form-group">
      <label for="email">Co-Host:</label>
      <input type="text" class="form-control" id="email" placeholder="Co-Host" name="events|co_host" <?php if($_GET['page'] == 'editevents'){echo "value='".$response['co_host']."'";}?>>
    </div>
	<div class="form-group">
      <label for="email">Number of Footfall:</label>
      <input type="text" class="form-control" id="email" placeholder="Footfall" name="events|footfall" <?php if($_GET['page'] == 'editevents'){echo "value='".$response['footfall']."'";}?>>
    </div>
	<label>Sports which will be held:</label>
	<div class="form-group">
      <label class="checkbox-inline"><input type="checkbox" name="events|sports[]" value="cricket" <?php if($_GET['page'] == 'editevents'){foreach($sports as $sport){if($sport === "cricket"){ echo 'checked';}}} ?>/> Cricket</label>
	  <label class="checkbox-inline"><input type="checkbox" name="events|sports[]" value="basketball" <?php if($_GET['page'] == 'editevents'){foreach($sports as $sport){if($sport === "basketball"){ echo 'checked';}}} ?>/> Basketball</label>
	  <label class="checkbox-inline"><input type="checkbox" name="events|sports[]" value="football" <?php if($_GET['page'] == 'editevents'){foreach($sports as $sport){if($sport === "football"){ echo 'checked';}}} ?>/> Football</label>
	  <label class="checkbox-inline"><input type="checkbox" name="events|sports[]" value="kickboxing" <?php if($_GET['page'] == 'editevents'){foreach($sports as $sport){if($sport === "kickboxing"){ echo 'checked';}}} ?>/> Kickboxing</label>
	  <label class="checkbox-inline"><input type="checkbox" name="events|sports[]" value="rifleshooting" <?php if($_GET['page'] == 'editevents'){foreach($sports as $sport){if($sport === "rifleshooting"){ echo 'checked';}}} ?>/> Rifleshooting</label>
	</div>
	
	<div class="form-group">
      <label for="pwd">Add a banner Image:</label>
	  <br>
      <input type="file" name="events|image|0|<?php if($_GET['page'] == 'editevents'){echo $image[1];}else{ echo $random_event; }?>"/><br><br>
	  	  <?php
		if($_GET['page'] == 'editevents')
		{	
		echo'
		Current Image:<br>
		<img src = "'.$response['image'].'" class="img-fluid"/>';
		}
		?>
    </div>
	<h4 class='text-center'>Registration Dates</h4>
	<label for="pwd"></label>
	<div class="row">
    <div class="form-group col-sm-6">
      <label for="email">Registration Start Date:</label>
      <input type="date" class="form-control" id="email" placeholder="Enter Event Name" name="events_schedule|registration_start_date" <?php if($_GET['page'] == 'editevents'){echo "value='".$response['registration_start_date']."'";}?>>
    </div>
	<div class="form-group col-sm-6">
      <label for="email">Registration End Date:</label>
      <input type="date" class="form-control" id="email" placeholder="Enter Event Name" name="events_schedule|registration_end_date" <?php if($_GET['page'] == 'editevents'){echo "value='".$response['registration_end_date']."'";}?>>
    </div>
	</div>
	<h4 class='text-center'>Add Event Schedule</h4>
		<div class="form-group">
      <label for="email">Entry Name:</label>
      <textarea class="form-control" id="email" placeholder="Entry Name" name="events|entry_name"><?php if($_GET['page'] == 'editevents'){echo $response['entry_name'];}?></textarea>
	  	<div class="row">
    <div class="form-group col-sm-6">
      <label for="email">Start Date:</label>
      <input type="date" class="form-control" id="email" placeholder="Enter Event Name" name="events_schedule|entry_start_date" <?php if($_GET['page'] == 'editevents'){echo "value='".$response['entry_start_date']."'";}?>>
    </div>
	<div class="form-group col-sm-6">
      <label for="email">Start Time:</label>
      <input type="time" class="form-control" id="email" placeholder="Enter Event Name" name="events_schedule|entry_start_time" <?php if($_GET['page'] == 'editevents'){echo "value='".$response['entry_start_time']."'";}?>>
    </div>
	</div>
	<div class="row">
    <div class="form-group col-sm-6">
      <label for="email">End Date:</label>
      <input type="date" class="form-control" id="email" placeholder="Enter Event Name" name="events_schedule|entry_end_date" <?php if($_GET['page'] == 'editevents'){echo "value='".$response['entry_end_date']."'";}?>>
    </div>
	<div class="form-group col-sm-6">
      <label for="email">End Time:</label>
      <input type="time" class="form-control" id="email" placeholder="Enter Event Name" name="events_schedule|entry_end_time" <?php if($_GET['page'] == 'editevents'){echo "value='".$response['entry_end_time']."'";}?>>
    </div>
	</div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  <br>
	</div>
</section>		
    <script>
$(document).ready(function(){
	$("#search").keyup(function(){
		var search = $("#search").val();
		if(search.length > 2)
	{
		$.ajax({
			url:"getcities.php?method=events",
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
<?php include 'footer.php'; ?>