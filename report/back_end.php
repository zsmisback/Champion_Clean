<?php

$date = '';
$topic = '';
$participants = '';
$summary = '';
$outcome = '';
$discussion = '';
$error = '';

if(isset($_POST['sign']))
{
	$date = $_POST['date'];
	$topic = $_POST['topic'];
	$participants = $_POST['participants'];
	$summary = $_POST['summary'];
	$outcome = $_POST['outcome'];
	$discussion = $_POST['discussion'];
	
	if(empty($date))
	{
		$error = "Please fill in the date";
	}
	elseif(empty($topic))
	{
		$error = "Please fill in the topic";
	}
	elseif(empty($participants))
	{
		$error = "Please fill in the participants";
	}
	elseif(empty($summary))
	{
		$error = "Please fill in the summary";
	}
	elseif(empty($outcome))
	{
		$error = "Please fill in the outcome";
	}
	elseif(empty($discussion))
	{
		$error = "Please fill in the next discussion";
	}
	else
	{    $file = "mom.txt";
		 $myfile = fopen($file, "w") or die("Unable to open file!");
         $txt = "Date:$date\n";
         fwrite($myfile, $txt);
         $txt = "Topic/Agenda:$topic\n";
         fwrite($myfile, $txt);
		 $txt = "Participants:$participants\n\n";
         fwrite($myfile, $txt);
		 $txt = "Summary:\n\n$summary\n\n";
         fwrite($myfile, $txt);
		 $txt = "Outcome/Conclusion:\n\n$outcome\n\n";
         fwrite($myfile, $txt);
		 $txt = "Discussion/Topic in the next meeting:\n\n$discussion\n\n";
         fwrite($myfile, $txt);
         fclose($myfile);
		 
		 header('Content-Description: File Transfer');
         header('Content-Disposition: attachment; filename='.basename($file));
         header('Expires: 0');
         header('Cache-Control: must-revalidate');
         header('Pragma: public');
         header('Content-Length: ' . filesize($file));
         header("Content-Type: text/plain");
		 ob_clean();  
         flush(); 
         readfile($file);
	}
}

?>