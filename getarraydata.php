<?php 


function getallarray($sql){

include("connect.php");


$result = mysqli_query($conn, $sql);

$temp = array();
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
	 $temp[] = $row;
  }
  
  $post = $temp;
			



mysqli_close($conn);
	  return  $post;
}
?>