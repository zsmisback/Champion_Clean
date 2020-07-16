<!--============================
=            Footer            =
=============================-->

<footer class="footer section section-sm">
  <!-- Container Start -->
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-7 offset-md-1 offset-lg-0">
        <!-- About -->
        <div class="block about">
          <!-- footer logo -->
          <!--<img src="images/logo.png" alt="">-->
          <!-- description -->
          <p class="alt-color">To build a platform for the Athletes - Empowering Indian talents by developing skills, utilizing experiences and other sports resources under one roof.</p>
        </div>
      </div>
     
      <!-- Link list -->
	  <div class="col-lg-2 col-md-3 offset-md-1 offset-lg-0">
        <div class="block">
          <h4>Quick Links</h4>
          <ul>
		   <li><a href="index.php?page=home">Home</a></li>
	  <?php
      
	 if(!isset($_SESSION['uid']) || !$_SESSION['uid'])
	 {
	   echo'
	  
            <li><a href="infra.php?page=home">Infrastructure</a></li>
            <li><a href="trainer.php?page=home">Trainers</a></li>
            <li><a href="vendor.php?page=home">Vendors</a></li>';
			}
			
		?>	
            <li><a href="event.php?page=home">Events</a></li>
           </ul>
        </div>
      </div>
	 
	 <div class="col-lg-2 col-md-7">
	          <div class="block">
          <h4>Contact Number</h4>
		  <ul>
		  <li>(+91)7021980307 - <br>(+91)9930221715</li>
		  </ul>
		  </div>
	  </div>
	  	 <div class="col-lg-2 col-md-7">
	          <div class="block">
          <h4>Address</h4>
		  <ul>
		  <li>IP 3, RIICO Growth Center, Phase II, Abu, Rajasthan 307026</li>
		  </ul>
		  </div>
	  </div>
      <!-- Promotion 
      <div class="col-lg-4 col-md-7">
        App promotion
        <div class="block-2 app-promotion">
          <div class="mobile d-flex">
            <a href="">
               Icon 
              <img src="images/footer/phone-icon.png" alt="mobile-icon">
            </a>
            <p>Get the Dealsy Mobile App and Save more</p>
          </div>
          <div class="download-btn d-flex my-3">
            <a href="#"><img src="images/apps/google-play-store.png" class="img-fluid" alt=""></a>
            <a href="#" class=" ml-3"><img src="images/apps/apple-app-store.png" class="img-fluid" alt=""></a>
          </div>
        </div>
      </div>-->
    </div>
  </div>
  <!-- Container End -->
</footer>
<!-- Footer Bottom -->
<footer class="footer-bottom">
  <!-- Container Start -->
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-12">
        <!-- Copyright -->
        <div class="copyright">
          <p>Copyright © <script>
              var CurrentYear = new Date().getFullYear()
              document.write(CurrentYear)
            </script>. All Rights Reserved Champion.in</a></p>
        </div>
      </div>
      <div class="col-sm-6 col-12">
        <!-- Social Icons -->
        <ul class="social-media-icons text-right">
          <li><a class="fa fa-facebook" href="https://www.facebook.com/themefisher" target="_blank"></a></li>
          <li><a class="fa fa-twitter" href="https://www.twitter.com/themefisher" target="_blank"></a></li>
          <li><a class="fa fa-pinterest-p" href="https://www.pinterest.com/themefisher" target="_blank"></a></li>
          <li><a class="fa fa-vimeo" href=""></a></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Container End -->
  <!-- To Top -->
  <div class="top-to">
    <a id="top" class="" href="#"><i class="fa fa-angle-up"></i></a>
  </div>
</footer>

<!-- JAVASCRIPTS -->
<script src="plugins/jQuery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/popper.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap-slider.js"></script>
  <!-- tether js -->
<script src="plugins/tether/js/tether.min.js"></script>
<script src="plugins/raty/jquery.raty-fa.js"></script>
<script src="plugins/slick-carousel/slick/slick.min.js"></script>
<script src="plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script src="plugins/fancybox/jquery.fancybox.pack.js"></script>
<script src="plugins/smoothscroll/SmoothScroll.min.js"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
<script src="plugins/google-map/gmap.js"></script>
<script src="js/script.js"></script>

</body>

</html>