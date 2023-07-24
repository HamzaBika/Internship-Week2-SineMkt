<?php
session_start();
include('includes/config.php');

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
  <!-- meta data -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <!--font-family-->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

  <!-- title of site -->
  <title>Blog Page</title>

  <!-- For favicon png -->
  <link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png" />

  <!--font-awesome.min.css-->
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">

  <!--linear icon css-->
  <link rel="stylesheet" href="assets/css/linearicons.css">

  <!--animate.css-->
  <link rel="stylesheet" href="assets/css/animate.css">

  <!--owl.carousel.css-->
  <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">

  <!--bootstrap.min.css-->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">

  <!-- bootsnav -->
  <link rel="stylesheet" href="assets/css/bootsnav.css">

  <!--style.css-->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/blog.css">
  <!--responsive.css-->
  <link rel="stylesheet" href="assets/css/responsive.css">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<?php include('includes/header.php'); ?>

	<!--blog start -->
	<section >
<div class="Blogpage" >
                <?php
              $pid = $_GET['Blog_Id'];
              $query = mysqli_query($con, "SELECT * FROM Blog where Blog_Id=$pid");
              while ($row = mysqli_fetch_array($query)) {
              ?>
              <div class="Blogimg">
              <img  src="assets/images/blog/<?php echo htmlentities($row['Blog_Image']); ?>" alt="blog image">		
              </div>
              <div class="Blogdetails" >
              <h2><?php echo htmlentities($row['Blog_Title']); ?></a></h2>
			  <h3>By <?php echo htmlentities($row['Blog_Author']); ?></a> / <?php echo htmlentities($row['Blog_Postingdate']); ?></h3>
              </div>
              <div class="Blogcontent" >
                   <p>
						<?php echo htmlentities($row['Blog_Contenu']); ?>
					</p>
              </div>
					<?php
					}
					?>
                     </div>
	</section><!--/.blog-->
	<!--blog end -->


<?php include('includes/footer.php'); ?>


<!-- Include all js compiled plugins (below), or include individual files as needed -->

<script src="assets/js/jquery.js"></script>

<!--modernizr.min.js-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

<!--bootstrap.min.js-->
<script src="assets/js/bootstrap.min.js"></script>

<!-- bootsnav js -->
<script src="assets/js/bootsnav.js"></script>

<!--owl.carousel.js-->
<script src="assets/js/owl.carousel.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>


<!--Custom JS-->
<script src="assets/js/custom.js"></script>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/main.js"></script>


</body>

</html>