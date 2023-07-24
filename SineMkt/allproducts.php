
<!doctype html>
<html class="no-js" lang="en">

<head>
  <!-- meta data -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--font-family-->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

  <!-- title of site -->
  <title>All Products Page</title>

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

  <!--responsive.css-->
  <link rel="stylesheet" href="assets/css/responsive.css">


</head>

<body>

  <?php include('includes/header.php'); ?>

  <!--new-arrivals start -->
  <section id="new-arrivals" class="new-arrivals">
    <div class="container">
      <div class="section-header">
        <h2>All Products</h2>
      </div><!--/.section-header-->
      <div class="new-arrivals-content">
        <div class="row">
          <?php
          require_once $_SERVER['DOCUMENT_ROOT'] . '/furn-master/admin/controllers/productcontr.php';
          $product = new Productcontr();
          $allproducts = $product->getProducts();
          foreach ($allproducts as $products) {
          ?>
            <div class="col-md-3 col-sm-4">
              <div class="single-new-arrival">
                <div class="single-new-arrival-bg">
                  <img src="../admin/assets/images/products/<?php echo $products->getproductimg(); ?>" alt="new-arrivals images">
                  <div class="single-new-arrival-bg-overlay"></div>
                  <div class="sale bg-1">
                    <p>sale</p>
                  </div>
                  <div class="new-arrival-cart">
                    <p>
                      <span class="lnr lnr-cart"></span>
                      <a href="#">add <span>to </span> cart</a>
                    </p>
                    <p class="arrival-review pull-right">
                      <span class="lnr lnr-heart"></span>
                      <span class="lnr lnr-frame-expand"></span>
                    </p>
                  </div>
                </div>
                <h4><a href="#"> <?php echo $products->getproductname(); ?></a></h4>
                <p class="arrival-product-price">$ <?php echo $products->getproductprice(); ?></p>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
    </div><!--/.container-->
  </section><!--/.new-arrivals-->



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

</body>

</html>