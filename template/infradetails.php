<?php include 'header.php'; ?>
<div class="container-fluid">
   <h1 style="text-align: center; margin-bottom: 50px; font-size: 45px;"><?php echo $response['name']; ?></h1>
   <div class="row">
     <div class="col-md-8 col-lg-8 col-sm-12" >
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="<?php echo $response['image1']; ?>" alt="First slide" style="height:800px;">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="<?php echo $response['image2']; ?>" alt="Second slide" style="height:800px;">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="<?php echo $response['image3']; ?>" alt="Third slide" style="height:800px;">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

      

     </div>

     
     <div class="col-md-4 col-lg-4 col-sm-12" >
        <div class="detail">
          <h1 class="mb-3"><?php echo $response['name']; ?></h1>
          <p><?php echo $response['address']; ?></p>
		  <h2>About Us</h2>
		  <p><?php echo $response['about_us']; ?></p>
		  <!--Table-->



  <h2 class=" pb-4" style="font-size: 28px;">Timings</h2>
             
  <table class="table table-responsive mb-4">
    <thead>
      <tr class="border">
		<th>Time</th>
        <th>Monday</th>
        <th>Tuesday</th>
        <th>Wedndesday</th>
        <th>Thursday</th>
        <th>Friday</th>
        <th>Saturday</th>
		<th>Sunday</th>
      </tr>
    </thead>
    <tbody>
      <tr class="border">
        <td>From</td>
      <td><?php echo $response['monday_from']; ?></td>
      <td><?php echo $response['tuesday_from']; ?></td>
	  <td><?php echo $response['wednesday_from']; ?></td>
      <td><?php echo $response['thursday_from']; ?></td>
      <td><?php echo $response['friday_from']; ?></td>
      <td><?php echo $response['saturday_from']; ?></td>
	  <td><?php echo $response['sunday_from']; ?></td>
     
       
      </tr>
      <tr class="border">
        <td>To</td>
      <td><?php echo $response['monday_to']; ?></td>
      <td><?php echo $response['tuesday_to']; ?></td>
	  <td><?php echo $response['wednesday_to']; ?></td>
      <td><?php echo $response['thursday_to']; ?></td>
      <td><?php echo $response['friday_to']; ?></td>
      <td><?php echo $response['saturday_to']; ?></td>
	  <td><?php echo $response['sunday_to']; ?></td>
       
      </tr>
      
     
     
    </tbody>
  </table>

         
          
     <h3 class="mb-2"><?php if($response['seats'] == 'seats'){echo '<span>Seats</span>';} if($response['locker_room'] == 'locker_room'){echo ' <span>Locker Room</span>';} if($response['showers'] == 'showers'){echo ' <span>Showers</span>';}?> </h3><br>


                       <?php
                    
				   if(!isset($_SESSION['uid']) || !$_SESSION['uid'])
                    {
	                 echo'<a href="index.php?page=login"><button type="button" class="btn py-3 px-5 " style="background-color: #146935 !important; color: #fff;">Contact Now</button></a>';
	
                   }
				   elseif($_SESSION['type'] !== "User")
				   {
					   echo"";
				   }
				   elseif($results['booked'] > 0)
				   {
					   echo'<button type="button" class="btn py-3 px-5 " style="background-color: #146935 !important; color: #fff;">Contacted</button>';
				   }
                   else
				   {					   
					 echo'<button type="button" class="btn py-3 px-5 " style="background-color: #146935 !important; color: #fff;" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Contact now</button>';
				   }
					 
                     
					 ?>  


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">
		<input type = "hidden" name="infra_enquiries|enquiry_for" value="<?php echo $response['randomid']; ?>"/>
		<input type = "hidden" name="infra_enquiries|enquiry_by" value="<?php echo $_SESSION['uid']; ?>"/>
		<input type = "hidden" name="infra_enquiries|name" value="<?php echo $_SESSION["name"]; ?>"/>
		<input type = "hidden" name="infra_enquiries|email" value="<?php echo $_SESSION["username"]; ?>"/>
		<input type = "hidden" name="infra_enquiries|contact_number" value="<?php echo $_SESSION["contact_no"]; ?>"/>
		<input type = "hidden" name="infra_enquiries|sports" value="<?php echo $_GET['sport']; ?>"/>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Alternate Contact Number:</label>
            <input type="number" class="form-control" id="recipient-name" name="infra_enquiries|alt_contact_number">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text" name="infra_enquiries|query"></textarea>
          </div>
		  <input type="submit" class="btn btn-primary" style="background-color: #146935 !important;" value="Confirm Contact"/>
        </form>
      </div>

    </div>
  </div>
</div>
          
        </div>
     
    
      </div>
   </div>
 </div>


 

    <!-- Container End -->
<!--Container-->
<section class="detail1">
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-8">
		 <h2>Specifications</h2>
		  		 
		<?php 
		 
		 //Get all the column names from a sportinfo_form
		  foreach($response2 as $column_names){
			  //Filter out/Remove the common parameters/column names
			  if($column_names['COLUMN_NAME'] == "id" || $column_names['COLUMN_NAME'] == 'uid' || $column_names['COLUMN_NAME'] == 'ground_uid' || $column_names['COLUMN_NAME'] == 'summary' || $column_names['COLUMN_NAME'] == 'features' || $column_names['COLUMN_NAME'] == 'rules'  || $column_names['COLUMN_NAME'] == 'seats' || $column_names['COLUMN_NAME'] == 'locker_room' || $column_names['COLUMN_NAME'] == 'showers')
			  {
				  echo "";
			  }
			  else
			  {
				  //Store the Uncommon parameters in an array
				  $columns[] = $column_names['COLUMN_NAME'];
			  }
		  }

		  ?> 
		  <!-- Display all the field information with the column name and their values -->
          <p><?php foreach($columns as $field_info){$fields = str_replace("_"," ",$field_info); echo''.ucwords($fields," ").' - '.$response[$field_info].' &nbspmeters<br>';} ?></p>

      <h2>Summary</h2>
		  <p><?php echo $response['summary']; ?></p>
      <h2>Features</h2>
      <p><?php echo $response['features']; ?></p>
      
      <h2>Rules</h2>
      <p><?php echo $response['rules']; ?></p>

    </div>
  </div>
</div>

</section>


<?php include 'footer.php'; ?>