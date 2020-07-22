<?php include_once("header.php"); ?>
<section class="page-search">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Advance Search -->
				<div class="advance-search">
					<form action="index.php?page=search" method="get">
					<input type="hidden" name="page" value="search"/>
						<div class="row">	
                           <div class="col-md-3">
                               <div class="form-group">									
                                 <select class="border w-100 form-control" placeholder="" name="sport">
									<option value="cricket">Cricket</option>
									<option value="football">Football</option>
									<option value="basketball">BasketBall</option>
									<option value="kickboxing">Kickboxing</option>
									<!--<option value="mma">MMA</option>-->
								</select>
                                </div>
                            </div> 						
                            <div class="col-md-3">
                                <div class="form-group">									
                                    <select class="border w-100 form-control" placeholder="" name="type">
									<option value="Coach">Coach</option>
									<option value="Fitness">Fitness Trainer</option>
									<option value="Referee">Referee / Umpire</option>
									<option value="Commentator">Commentator</option>
									<option value="Medical">Medical Staff</option>
									<option value="Blogger">Blogger</option>
									</select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">									
                                    <select class="border w-100 form-control" placeholder="" name="city">
									<?php
									
									foreach($response3 as $city)
									{
										echo'<option value='.$city['city'].'>'.$city['city'].'</option>';
									}
									?>
									</select>
                                </div>
                            </div>  
 
								
                            <div class="col-md-3">
                             <button type="submit" class="btn btn-primary  pl-5 pr-5">Go !</button>
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
			<!--	<div class="category-search-filter">
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
				</div> -->

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
		if(isset($_GET['sport']) || isset($_GET['type']) || isset($_GET['city']))
		{
				
		if(empty($response))
		{
		echo "No results found";
		}
		else
		{
		
		
		foreach($response as $trainers)
		{
		
		echo'<div class="row p-lg-3 p-sm-5 p-4">
				<div class="col-lg-4 align-self-center">
					
			 <a href="index.php?page=trainerdetails&id='.$trainers['uid'].'"><img src="'.$trainers['profilepic'].'" class="img-fluid" alt=""></a>
					
				</div>
				<div class="col-lg-8">
					<div class="row">
						<div class="col-lg-9 col-md-10">
							<div class="ad-listing-content">
								<div>
								<a href="index.php?page=trainerdetails&id='.$trainers['uid'].'"><h2 class="font-weight-bold">'.$trainers['name'].'</h2></a>
									<p class="font-weight-bold">'.$trainers['type'].'</p>
								</div>
								<ul class="list-inline mt-2 mb-3">';
								 $sports = explode(",",$trainers['sports']);
								foreach($sports as $sport)
								{
									echo'<li class="list-inline-item"><i class="fa fa-flag-checkered" aria-hidden="true"></i> '.ucwords($sport).'</li>';
								}
								echo'									
								</ul>								
								<p class="pr-5">'.$trainers['about_us'].'</p>
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
							<a href="index.php?page=trainerdetails&id='.$trainers['uid'].'"><button class="btn-success">Know More</button></a>
						</div>						
						</div>
					</div>
				</div>
			</div>
		</div>';
		}
		
	}
}
	else
	{
		if($response == 0)
		{
			echo "No results found";
		}
		foreach($response as $trainers)
		{
		
		echo'<div class="row p-lg-3 p-sm-5 p-4">
				<div class="col-lg-4 align-self-center">
					
					<a href="index.php?page=trainerdetails&id='.$trainers['uid'].'"><img src="'.$trainers['profilepic'].'" class="img-fluid" alt=""></a>
					
				</div>
				<div class="col-lg-8">
					<div class="row">
						<div class="col-lg-9 col-md-10">
							<div class="ad-listing-content">
								<div>
								<a href="index.php?page=trainerdetails&id='.$trainers['uid'].'">	<h2 class="font-weight-bold">'.$trainers['name'].'</h2></a>
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
	}
		?>
		<!-- pagination -->
				<div class="pagination justify-content-center py-4">
					<nav aria-label="Page navigation example">
						<ul class="pagination">
						<?php
				
			if(empty($results))
			{
				
			}
			else
			{
				if($results['totalRows'] < 12)
				{
					echo "";
				}
				else
				{	
				
					if($results['count'] == 1)
					{
						echo"";
					}
					else
					{
						if(isset($_GET['sport']) && isset($_GET['type']) && isset($_GET['city']))
						{
						echo'<li class="page-item">
								<a class="page-link" href="index.php?page=search&sport='.$_GET['sport'].'&type='.$_GET['type'].'&city='.$_GET['city'].'&count='.$results['prev'].'" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
									<span class="sr-only">Previous</span>
								</a>
							</li>';
						}
						else
						{
						echo'<li class="page-item">
								<a class="page-link" href="index.php?page=search&count='.$results['prev'].'" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
									<span class="sr-only">Previous</span>
								</a>
							</li>';
						}
					}
							for($pageNumbers=1;$pageNumbers<=$results['total_pages'];$pageNumbers++) :
						  if(isset($_GET['sport']) && isset($_GET['type']) && isset($_GET['city']))
							{
								echo'
								<li class="page-item"><a class="page-link" href="index.php?page=search&sport='.$_GET['sport'].'&type='.$_GET['type'].'&city='.$_GET['city'].'&count='.$pageNumbers.'">'.$pageNumbers.'</a></li>';
							}
							else
							{
								echo'
								<li class="page-item"><a class="page-link" href="index.php?page=search&count='.$pageNumbers.'">'.$pageNumbers.'</a></li>';
							}
							endfor;
							if(isset($_GET['sport']) && isset($_GET['type']) && isset($_GET['city']))
							{
							echo'<li class="page-item">
								<a class="page-link" href="index.php?page=search&sport='.$_GET['sport'].'&type='.$_GET['type'].'&city='.$_GET['city'].'&count='.$results['next'].'" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
									<span class="sr-only">Next</span>
								</a>
							</li>';
							}
							else
							{
							echo'<li class="page-item">
								<a class="page-link" href="index.php?page=search&count='.$results['next'].'" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
									<span class="sr-only">Next</span>
								</a>
							</li>';
							}
				}
			}
							
							?>
						</ul>
					</nav>
				</div>
				<!-- pagination -->
			</div>
		</div>
	</div>
</section>
<?php include_once("footer.php"); ?>