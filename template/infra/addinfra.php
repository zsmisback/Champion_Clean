<?php include_once("header.php"); ?>

<section class="ad-post bg-gray py-5">
    <div class="container">
        <form method="get" enctype="multipart/form-data">
<?php if(isset($error_mysql)){echo "<br>".$error_mysql;} ?>
<input type="hidden" value="addinfra" name="page"/>


<h2>Infrastructure registration</h2>
<hr>


<h3 class="text-center">Infrastructure Information</h3>
<hr>


 <div class="form-group">									
  <select class="border w-100 form-control" placeholder="" name="sport">
	<option value="cricket">Cricket</option>
	<option value="football">Football</option>
	<option value="basketball">BasketBall</option>
	<option value="kickboxing">Kickboxing</option>
	<option value="rifleshooting">Rifle Shooting</option>
	<!--<option value="mma">MMA</option> -->
	</select>
    </div>






<div class="row">
<div class="col-md-6">
<button type="submit" id="signup" value="signups" class="btn btn-primary">Add</button>
</div>
                                  
 </div>
 <br>
                           

 </form>

    </div>
</section>
    <script>
$(document).ready(function(){
	$("#search").keyup(function(){
		var search = $("#search").val();
		if(search.length > 2)
	{
		$.ajax({
			url:"getcities_infra.php",
			method:"POST",
			data:{search:search},
			success:function(data){
				$('#cities').html(data);
			}
		})
		$(document).on('click','li',function(){
			$('#search').val($(this).text());
		});
	}	
	});
	
});
</script>
<?php include_once("footer.php"); ?>