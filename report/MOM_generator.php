<?php

include 'back_end.php';

?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>MOM generator</title>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
 <script src="allowonlynumbers.js"></script>
	<link rel="stylesheet" href="assets/css/formstyle.css">
	<script src="ckeditor/ckeditor.js"></script>
	<style>
	
	</style>
  </head>
  <body>



				
				
					
<div class='container'>					
<form name="infrastructure" id="infras" method="post">

<h2>M.O.M Generator</h2>
<hr>


Date: Format example: (6/2/2020)
<input type="text" class="form-control mb-4" name="date" id="mom_date" placeholder="Please type in the date in d/m/y format" value="<?php echo $date; ?>">
Topic/Agenda: 
<input type="text" class="form-control mb-4" name="topic" id="topics" placeholder="Please type in the meetings topic" value="<?php echo $topic; ?>">
<br>
Participants/Members in the meeting: Format example: (Resheil,Zama)
<input type="text" class="form-control mb-4" name="participants" id="participantss" placeholder="Please type in the name of the members in the meeting" value="<?php echo $participants; ?>">
<br>
Summary of the meeting:
<textarea class="form-control mb-4" rows="5" name="summary" id="summarys" placeholder="Summary of the meeting"><?php echo $summary; ?></textarea>

<br>
Outcome/Conclusion of the meeting:
<textarea class="form-control mb-4" rows="5" name="outcome" id="outcomes" placeholder="Outcome of the meeting"><?php echo $outcome; ?></textarea>

<br>
Discussion in the next meeting:
<textarea class="form-control mb-4" rows="5" name="discussion" id="discussions" placeholder="Discussion of the next meeting"><?php echo $discussion; ?></textarea>
<br>

<p id="error" class="text-center"><?php echo $error; ?></p>
<div class="row">
<div class="col-md-6">
<button type="submit" id="signup" name="sign" value="signups" class="btn btn-primary">Submit</button>
</div>
                                  
 </div>
 <br>
                           

 </form>
 </div>

<script>



</script>
							  
</body>
</html>	