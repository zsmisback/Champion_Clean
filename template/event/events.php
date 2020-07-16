<?php include 'header.php'; ?>
<section class="ad-post bg-gray py-5">
    <div class="container">
	<h2>Add An Event</h2>
  <form method="post" enctype="multipart/form-data">
<?php if(isset($error_mysql)){echo $error_mysql;}  ?>
<input type="hidden" class="form-control" id="" value="<?php echo $_SESSION['uid']; ?>" name="events|uid"/> 
<input type="hidden" class="form-control" id="" value="<?php echo $random_event; ?>" name="events|event_id"/> 
    <div class="form-group">
      <label for="email">Event Name:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter Event Name" name="events|name">
    </div>
    <div class="form-group">
      <label for="pwd">Location:</label>
      <textarea class="form-control" id="pwd" placeholder="Enter Location" name="events|location"></textarea>
    </div>
	<div class="row">
    <div class="form-group col-sm-6">
      <label for="email">Start Date:</label>
      <input type="date" class="form-control" id="email" placeholder="Enter Event Name" name="events|start_date">
    </div>
	<div class="form-group col-sm-6">
      <label for="email">Start Time:</label>
      <input type="time" class="form-control" id="email" placeholder="Enter Event Name" name="events|start_time">
    </div>
	</div>
	<div class="row">
    <div class="form-group col-sm-6">
      <label for="email">End Date:</label>
      <input type="date" class="form-control" id="email" placeholder="Enter Event Name" name="events|end_date">
    </div>
	<div class="form-group col-sm-6">
      <label for="email">End Time:</label>
      <input type="time" class="form-control" id="email" placeholder="Enter Event Name" name="events|end_time">
    </div>
	</div>
	<div class="form-group">
      <label for="pwd">Description:</label>
      <textarea class="form-control" id="pwd" placeholder="Enter Description" name="events|description"></textarea>
    </div>
	<div class="form-group">
      <label for="email">Previous Events:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter Previous Event Name" name="events|previous_events">
    </div>
	<div class="form-group">
      <label for="email">List Sponsors (List seperated by comma):</label>
      <input type="text" class="form-control" id="email" placeholder="List Sponsors" name="events|sponsors">
    </div>
	<div class="form-group">
      <label for="email">Co-Host:</label>
      <input type="text" class="form-control" id="email" placeholder="Co-Host" name="events|co_host">
    </div>
	<div class="form-group">
      <label for="email">Number of Footfall:</label>
      <input type="text" class="form-control" id="email" placeholder="Footfall" name="events|footfall">
    </div>
	<div class="form-group">
      <label for="email">Sports which will be played (List seperated by comma):</label>
      <input type="text" class="form-control" id="email" placeholder="Sports" name="events|sports">
    </div>
	<div class="form-group">
      <label for="pwd">Add a banner Image:</label>
	  <br>
      <input type="file" name="events|image|0|<?php echo $random_event; ?>"/>
    </div>
	<h4 class='text-center'>Add Event Schedule</h4>
		<div class="form-group">
      <label for="email">Entry Name:</label>
      <textarea class="form-control" id="email" placeholder="Entry Name" name="events|entry_name"></textarea>
	  	<div class="row">
    <div class="form-group col-sm-6">
      <label for="email">Start Date:</label>
      <input type="date" class="form-control" id="email" placeholder="Enter Event Name" name="events|entry_start_date">
    </div>
	<div class="form-group col-sm-6">
      <label for="email">Start Time:</label>
      <input type="time" class="form-control" id="email" placeholder="Enter Event Name" name="events|entry_start_time">
    </div>
	</div>
	<div class="row">
    <div class="form-group col-sm-6">
      <label for="email">End Date:</label>
      <input type="date" class="form-control" id="email" placeholder="Enter Event Name" name="events|entry_end_date">
    </div>
	<div class="form-group col-sm-6">
      <label for="email">End Time:</label>
      <input type="time" class="form-control" id="email" placeholder="Enter Event Name" name="events|entry_end_time">
    </div>
	</div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  <br>
	</div>
</section>		
<?php include 'footer.php'; ?>