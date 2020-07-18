<?php

include('connect.php');

if(isset($_POST['search']))
{
	$output = '';
	$sql = "SELECT DISTINCT city FROM trainer_details WHERE city LIKE '%".$_POST['search']."%'";
	$result = $conn->query($sql);
	$output ="<ul class='list-unstyled'>";
	while($row = $result->fetch_assoc())
	{
		$output .= '<li class="cits">'.$row['city'].'</li>
		             <hr>';
	}
	$output .="</ul>";
	echo $output;
}
?>