<?php

if (isset($_GET['productid'])) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/furn-master/admin/controllers/productcontr.php';

    $productId = $_GET['productid'];
    $a = new Productcontr();
    $a->restoreProduct($productId);
}
?>