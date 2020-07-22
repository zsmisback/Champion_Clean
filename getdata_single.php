<?php 


function singletable( $table, $where = "", $param = "*" ){

include("connect.php");

$sql = "SELECT ".$param." FROM ".$table."  ". $where;
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {	
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
	 
	 $temp = $row;
  }
  
  foreach(array_keys($temp) as $key)
	{
		$new_key = $table."|".$key;
		$post[$new_key] = $temp[$key];
	}
			
} else {
	$post["error"] = "Not Found";
}


mysqli_close($conn);
	  return  $post;
}
?>
