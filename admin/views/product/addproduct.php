<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/furn-master/admin/controllers/productcontr.php';

// Function to get the next available number for the uploaded file
function getNextFileNumber($targetDirectory)
{
    $fileCounter = 16;
    while (file_exists($targetDirectory . 'P' . $fileCounter . '.jpg')) {
        $fileCounter++;
    }
    return $fileCounter;
}

if (isset($_POST["submit"])) {
    $a = new Productcontr();

    $Product_Name = $_POST['name'];
    $Product_Description = $_POST['description'];
    $Product_Price = $_POST['price'];
    $Product_Profit = $_POST['profit'];
    $Product_Note = $_POST['note'];
    $Product_Ettiquette = $_POST['etiquette'];
    $Product_Categorie = $_POST['categorie'];

    $targetDirectory = "../../assets/images/products/";
    $fileCounter = getNextFileNumber($targetDirectory);
    $customName = 'P' . $fileCounter . '.jpg';

    $targetFilePath = $targetDirectory . $customName;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
        $a->insertProduct($Product_Name, $customName, $Product_Description, $Product_Price, $Product_Profit, $Product_Note, $Product_Ettiquette, $Product_Categorie);
    } else {
        echo "The image has not uploaded";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SineMkt | Add Product</title>
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
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Add Product</h4>
                                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Name</label>
                                            <input type="text" class="form-control" name="name" id="exampleInputName1" placeholder="Product Name...">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputName1">Note</label>
                                            <input type="text" class="form-control" name="note" id="exampleInputName1" placeholder="Product Note...">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Etiquette</label>
                                            <input type="text" class="form-control" name="etiquette" id="exampleInputName1" placeholder="Product Etiquette...">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Price</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary text-white">$</span>
                                                </div>
                                                <input type="text" class="form-control" name="price" aria-label="Amount (to the nearest dollar)" />
                                                <div class="input-group-append">
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Profit</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary text-white">$</span>
                                                </div>
                                                <input type="text" class="form-control" name="profit" aria-label="Amount (to the nearest dollar)" />
                                                <div class="input-group-append">
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleSelectGender">Categorie</label>
                                            <select class="form-control" name="categorie" id="exampleSelectGender">
                                                <?php
                                                require_once $_SERVER['DOCUMENT_ROOT'] . '/furn-master/admin/models/categorie.php';
                                                $categorie = new Categorie();
                                                $allCategories = $categorie->getAllCategories();
                                                foreach ($allCategories as $categories) {
                                                ?>
                                                    <option value="<?php echo $categories->getcategorieid(); ?>"><?php echo $categories->getcategoriename(); ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <input type="text" class="form-control form-control-lg" name="description" placeholder="Description..." aria-label="Username" />
                                        </div>
                                        <div class="form-group">
                                            <label>File upload</label>
                                            <input type="file" name="image" class="file-upload-default">
                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                                </span>
                                            </div>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary me-2">Submit</button>
                                        <button class="btn btn-light">Cancel</button>
                                    </form>
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
    <!-- Plugin js for this page -->
    <script src="../../assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <script src="../../assets/vendors/select2/select2.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="../../assets/js/file-upload.js"></script>
    <script src="../../assets/js/typeahead.js"></script>
    <script src="../../assets/js/select2.js"></script>
</body>

</html>