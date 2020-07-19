<?php include 'header.php'; ?>
<div class="container-fluid" style="margin-top: 50px;">
   
   <h2 class='text-center pb-5'>List Of Enquiries</h2>
                 
      <table class='table table-darktable-hover mb-5'>
        <thead>
          <tr>
            <th>Name</th>
            
            <th>Email</th>
            <th>Contact</th>
            <th>Alternate Contact</th>
            <th>Enquiry</th>
          </tr>
        </thead>
        <tbody>
          <?php 	
         if(empty($results['post']))
		 {
			 echo "<h3>No Queries</h3>";
		 }
	foreach($results['post'] as $queries)
	{
    echo"<tr>
	    <td>$queries[name]</td>
        <td>$queries[email]</td>
        <td>$queries[contact_number]</td>
		<td>$queries[alt_contact_number]</td>
        <td>$queries[query]</td>
      </tr>";
	}
	 ?>
          
        </tbody>
      </table>
    </div>
	<br><br>
<?php include 'footer.php'; ?>

