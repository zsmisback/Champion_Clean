<?php include_once("header.php"); ?>

<section class="ad-post bg-gray py-5">
    <div class="container">
        <form method="post" enctype="multipart/form-data">
<?php if(isset($error_mysql)){echo "<br>".$error_mysql;} ?>


<input type="hidden" value="<?php echo $_SESSION['uid']; ?>" name="infra_details|randomid"/>




<h3 class="text-center">Delete Infrastructure Information</h3>
<hr>
Please enter your vpcode:<br>
<input type="text" />
<div class="row">
<div class="col-md-6">
<button type="submit" id="signup" value="signups" class="btn btn-danger">Delete</button>
</div>
                                  
 </div>
 <br>
                           

 </form>

    </div>
</section>

<?php include 'footer.php'; ?>