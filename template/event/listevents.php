<?php include 'header.php'; ?>

<?php

foreach($response as $events)
{
echo' 
  <div class="card" style="width:400px">
    <img class="card-img-top" src="img_avatar1.png" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">John Doe</h4>
      <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
      <a href="event.php?page=editevents&id='.$events['event_id'].'" class="btn btn-primary">Edit</a>
	  <a href="event.php?page=editevents&id='.$events['event_id'].'" class="btn btn-primary">Edit</a>
    </div>
  </div>';
}
  
  ?>

<?php include 'footer.php'; ?>