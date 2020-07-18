<?php 


function getpagination($sql,$numRows = 12){

include("connect.php");


$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {	
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
	 $temp[] = $row;
  }
        $count = isset($_GET['count']) ? $_GET['count'] : 1;
        $start = 1;
		$prev = $count - 1;
        $next = $count + 1;
		$total_records = mysqli_num_rows($result);
		$total_pages = ceil($total_records/$numRows);
		$post = $temp;
			
} else {
	$post["error"] = "Not Found";
}


mysqli_close($conn);
	  return(array("post"=>$post,"next"=>$next,"prev"=>$prev,"total_pages"=>$total_pages,"total_records"=>$total_records));
}
?>