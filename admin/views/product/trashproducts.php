<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SineMkt | Manage Products</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="../../assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../../assets/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../assets/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../assets/images/favic.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- Navbar-->
        <?php include("../../includes/navbar.php"); ?>
        <!-- / Navbar-->

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- left side bar -->
            <?php include("../../includes/leftsidebar.php"); ?>
            <!-- / left side bar -->

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">

                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Trash Products</h4>

                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Product
                                                    </th>
                                                    <th>
                                                        Name
                                                    </th>

                                                    <th>
                                                        Description
                                                    </th>
                                                    <th>
                                                        Price
                                                    </th>
                                                    <th>
                                                        Profit
                                                    </th>
                                                    <th>
                                                        Categorie
                                                    </th>
                                                    <th>
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                require_once $_SERVER['DOCUMENT_ROOT'] . '/furn-master/admin/controllers/productcontr.php';
                                                $product = new Productcontr();
                                                $allproducts = $product->getinactiveProducts();
                                                if (empty($allproducts)) {
                                                    echo '<tr><td colspan="7">No products in the trash.</td></tr>';
                                                } else {
                                                foreach ($allproducts as $products) {
                                                ?>
                                                    <tr>
                                                        <td class="py-1">
                                                            <img src="../../assets/images/products/<?php echo $products->getproductimg(); ?>" alt="image" />
                                                        </td>
                                                        <td>
                                                            <?php echo $products->getproductname(); ?>
                                                        </td>

                                                        <td>
                                                            <?php echo substr($products->getproductdesc(), 0, 10) . '...'; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $products->getproductprice(); ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $products->getproductprofit(); ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $products->getproductcat(); ?>
                                                        </td>

                                                        <td>
                                                            <button class="btn btn-success btn-sm" onclick="restoreProduct(<?php echo $products->getproductid(); ?>)"><i class="mdi mdi-backup-restore"></i></button>
                                                            <button class="btn btn-danger btn-sm" onclick="deleteProduct(<?php echo $products->getproductid(); ?>)"><i class="mdi mdi-backspace"></i></button>
                                                        </td>

                                                    </tr>

                                                <?php }} ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <!-- Footer -->
                <?php include("../../includes/footer.php"); ?>
                <!-- / Footer -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function deleteProduct(productId) {
            if (confirm("Are you sure you want to delete this Product?")) {
                $.ajax({
                    type: "POST",
                    url: "deleteproduct.php",
                    data: {
                        Product_Id: productId
                    },
                    success: function(response) {
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        alert("Error: " + error);
                    }
                });
            }
        }
    </script>
    <script>
    function restoreProduct(productId) {
        if (confirm("Are you sure you want to restore this product?")) {
            const url = 'restoreproduct.php?productid=' + productId;
            const xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        window.location.reload();
                    } else {
                        console.error(xhr.responseText);
                    }
                }
            };

            xhr.open('GET', url, true);
            xhr.send();
        }
    }
</script>


    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="../../assets/vendors/progressbar.js/progressbar.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/template.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../../assets/js/dashboard.js"></script>
    <script src="../../assets/js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->
</body>

</html>