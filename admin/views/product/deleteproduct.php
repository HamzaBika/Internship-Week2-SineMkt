<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/FURN-MASTER/admin/controllers/productcontr.php';

if (isset($_POST["Product_Id"])) {
    $db = new Productcontr();
    $db->deleteProduct($_POST["Product_Id"]);
}
?>