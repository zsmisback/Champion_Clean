<?php 


function getall($sql){

include("connect.php");

$temp = '';
$result = mysqli_query($conn, $sql);

	
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
	 $temp = $row;
  }
  
  $post = $temp;
			



mysqli_close($conn);
	  return  $post;
}
?>