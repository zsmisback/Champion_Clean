<?php include_once("header.php"); ?>
<section class="page-search">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Advance Search -->
				<div class="advance-search">
					<form>
						<div class="form-row">
							<div class="form-group col-md-4">
								<input type="text" class="form-control my-2 my-lg-0" id="inputtext4" placeholder="What are you looking for">
							</div>
							<div class="form-group col-md-3">
								<input type="text" class="form-control my-2 my-lg-0" id="inputCategory4" placeholder="Category">
							</div>
							<div class="form-group col-md-3">
								<input type="text" class="form-control my-2 my-lg-0" id="inputLocation4" placeholder="Location">
							</div>
							<div class="form-group col-md-2">

								<button type="submit" class="btn btn-primary">Search Now</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="section-sm">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="category-search-filter">
					<div class="row">
						<div class="col-md-6">
							<strong>Short</strong>
							<select>
								<option>Most Recent</option>
								<option value="1">Most Popular</option>
								<option value="2">Lowest Price</option>
								<option value="4">Highest Price</option>
							</select>
						</div>
						<div class="col-md-6">
							<div class="view">
								<strong>Views</strong>
								<ul class="list-inline view-switcher">
									<li class="list-inline-item">
										<a href="category.html"><i class="fa fa-th-large"></i></a>
									</li>
									<li class="list-inline-item">
										<a href="category.html" class="text-info"><i class="fa fa-reorder"></i></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>

<?php 
/*
foreach($response as $ground)
	{
echo '
		<div class="ad-listing-list mt-20">
			<div class="row p-lg-3 p-sm-5 p-4">
				<div class="col-lg-4 align-self-center">
					<a href="single.html">
						<img src="images/products/products-2.jpg" class="img-fluid" alt="">
					</a>
				</div>
				<div class="col-lg-8">
					<div class="row">
						<div class="col-lg-9 col-md-10">
							<div class="ad-listing-content">
								<div>
									<h2 class="font-weight-bold">'.$ground['name'].'</h2>
									<p class="font-weight-bold">'.limitstring($ground['cricket_summary']).'</p>
								</div>
								<ul class="list-inline mt-2 mb-3">
									<li class="list-inline-item"><a href="category.html"> <i class="fa fa-flag-checkered" aria-hidden="true"></i> Cricket</a></li>
									<li class="list-inline-item"><a href=""><i class="fa fa-calendar"></i> 26th December</a></li>									
								</ul>								
								<p class="pr-5">'.limitstring($ground['cricket_features']).'</p>
								<button class="btn-success mb-2">See More details</button>
							</div>
						</div>
						<div class="col-lg-3 align-self-center">
							<div class="row">
							<div style="background-color:#EAEDED; width:100%;" class="p-4"><i class="fa fa-shower" aria-hidden="true"></i> Shower Room<br><i class="fa fa-lock" aria-hidden="true"></i> &nbsp&nbspLocker Room<br><i class="fa fa-users" aria-hidden="true"></i> Bleachers							
							</div>							
							<div style="background-color:#EAEDED; width:100%;" class="pl-4 pb-4 pr-4">							
							<div class="product-ratings float-lg">
							<h3>Rating</h3>
								<ul class="list-inline">
									<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
									<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
									<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
									<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
									<li class="list-inline-item"><i class="fa fa-star"></i></li>
								</ul>
								<h2 class="pt-2">Rs 2000</h2>
							</div>											
							<button class="btn-success">Make a Booking</button>
						</div>						
						</div>
					</div>
				</div>
			</div>
		</div>';
	}
*/

?>


		<div class="ad-listing-list mt-20">
		<?php
		foreach($response as $trainers)
		{
		
		echo'<div class="row p-lg-3 p-sm-5 p-4">
				<div class="col-lg-4 align-self-center">
					
						<img src="'.$trainers['profilepic'].'" class="img-fluid" alt="">
					
				</div>
				<div class="col-lg-8">
					<div class="row">
						<div class="col-lg-9 col-md-10">
							<div class="ad-listing-content">
								<div>
									<h2 class="font-weight-bold">'.$trainers['name'].'</h2>
									<p class="font-weight-bold">'.$trainers['type'].'</p>
								</div>
								<ul class="list-inline mt-2 mb-3">';
								 $sports = explode(",",$trainers['sports']);
								foreach($sports as $sport)
								{
									echo'<li class="list-inline-item"><i class="fa fa-flag-checkered" aria-hidden="true"></i> '.$sport.'</li>';
								}
								echo'<li class="list-inline-item"><a href=""><i class="fa fa-calendar"></i> 12th July</a></li>									
								</ul>								
								<p class="pr-5"></p>
							</div>
						</div>
						<div class="col-lg-3 align-self-center">
							<div class="row">
							<div style="background-color:#EAEDED; width:100%;" class="p-4">';
							if($trainers['question_1'] == 1)echo'<i class="fa fa-globe" aria-hidden="true"></i> Online Services<br>';
							if($trainers['question_2'] == 1)echo'<i class="fa fa-thumbs-up" aria-hidden="true"></i>Verified Member<br>';
							if($trainers['question_3'] == 1)echo'<i class="fa fa-clock-o" aria-hidden="true"></i> Flexible timings<br>';	
							if($trainers['question_4'] == 1)echo'<i class="fa fa-cutlery" aria-hidden="true"></i> Diet Plans<br>';	
							if($trainers['question_5'] == 1)echo'<i class="fa fa-music" aria-hidden="true"></i> Workout Music<br>';	
							
					   echo'</div>							
							<div style="background-color:#EAEDED; width:100%;" class="pl-4 pb-4 pr-4">							
							<div class="product-ratings float-lg">
							<h3>Rating</h3>
								<ul class="list-inline">
									<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
									<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
									<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
									<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
									<li class="list-inline-item"><i class="fa fa-star"></i></li>
								</ul>
								<h2 class="pt-2"></h2>
							</div>											
							<button class="btn-success"></button>
						</div>						
						</div>
					</div>
				</div>
			</div>
		</div>';
		}
		
		?>
		<!-- pagination -->
				<div class="pagination justify-content-center py-4">
					<nav aria-label="Page navigation example">
						<ul class="pagination">
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
									<span class="sr-only">Previous</span>
								</a>
							</li>
							<li class="page-item"><a class="page-link" href="#">1</a></li>
							<li class="page-item active"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
									<span class="sr-only">Next</span>
								</a>
							</li>
						</ul>
					</nav>
				</div>
				<!-- pagination -->
			</div>
		</div>
	</div>
</section>
<?php include_once("footer.php"); ?>