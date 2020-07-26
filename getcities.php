<?php

include('connect.php');

if(isset($_POST['search']))
{
	$output = '';
	if($_GET['method'] == 'infra')
	{
	$sql = "SELECT DISTINCT city FROM infra_details WHERE city LIKE '%".$_POST['search']."%'";
	}
	elseif($_GET['method'] == 'trainer')
	{
	$sql = "SELECT DISTINCT city FROM trainer_details WHERE city LIKE '%".$_POST['search']."%'";
	}
	elseif($_GET['method'] == 'events')
	{
	$sql = "SELECT DISTINCT city FROM events WHERE city LIKE '%".$_POST['search']."%'";
	}
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