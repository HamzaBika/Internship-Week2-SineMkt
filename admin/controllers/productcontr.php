<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/furn-master/admin/models/product.php';

class Productcontr extends Product
{

    public function getproductbyid($id)
    {
        $sql = "SELECT * FROM Product WHERE Product_Id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $productObjects = array();
        foreach ($products as $product) {
            $productObject = new Product();
            $productObject->Product_Name = $product['Product_Name'];
            $productObject->Product_Img = $product['Product_Img'];
            $productObject->Product_Description = $product['Product_Description'];
            $productObject->Product_Price = $product['Product_Price'];
            $productObject->Product_Profit = $product['Product_Profit'];
            $productObject->Product_Note = $product['Product_Note'];
            $productObject->Product_Ettiquette = $product['Product_Ettiquette'];
            $productObject->Product_Categorie = $product['Product_Categorie'];
            $productObjects[] = $productObject;
        }

        return $productObjects;
    }

    // Function to get all active Products
    public function getProducts()
    {
        $sql = "SELECT * FROM Product WHERE is_active = 1 ORDER BY Product_Id ASC";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $patientObjects = array();
        foreach ($products as $product) {
            $productObject = new Product();
            $productObject->Product_Id = $product['Product_Id'];
            $productObject->Product_Name = $product['Product_Name'];
            $productObject->Product_Img = $product['Product_Img'];
            $productObject->Product_Description = $product['Product_Description'];
            $productObject->Product_Price = $product['Product_Price'];
            $productObject->Product_Profit = $product['Product_Profit'];
            $productObject->Product_Note = $product['Product_Note'];
            $productObject->Product_Ettiquette = $product['Product_Ettiquette'];
            $productObject->Product_Categorie = $product['Product_Categorie'];
            $productObjects[] = $productObject;
        }

        return $productObjects;
    }

    // Function to restore the product
    public function restoreProduct($id)
    {
        $sql = "UPDATE Product SET is_active = 1 WHERE Product_Id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "Product with ID " . $id . " has been restored successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    // Function to get all deleted products
    public function getinactiveProducts()
    {
        $sql = "SELECT * FROM Product WHERE is_active = 0 ORDER BY Product_Id ASC";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $productObjects = array();
        foreach ($products as $product) {
            $productObject = new Product();
            $productObject->Product_Id = $product['Product_Id'];
            $productObject->Product_Name = $product['Product_Name'];
            $productObject->Product_Img = $product['Product_Img'];
            $productObject->Product_Description = $product['Product_Description'];
            $productObject->Product_Price = $product['Product_Price'];
            $productObject->Product_Profit = $product['Product_Profit'];
            $productObject->Product_Note = $product['Product_Note'];
            $productObject->Product_Ettiquette = $product['Product_Ettiquette'];
            $productObject->Product_Categorie = $product['Product_Categorie'];
            $productObjects[] = $productObject;
        }

        return $productObjects;
    }

    // function delete Product
    public function deleteProduct($id)
    {
        $sql = "DELETE FROM Product WHERE Product_Id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "Product with ID " . $id . " has been deleted successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }
    }
    // Function to soft delete Product (mark as inactive)
    public function softDeleteProduct($id)
    {
        $sql = "UPDATE Product SET is_active = 0 WHERE Product_Id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "Product with ID " . $id . " has been moved to trash successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    // function insert Product
    public function insertProduct($name, $img, $descr, $price, $profit, $note, $ettiq, $cate)
    {
        $name = $this->connect()->quote($name);
        $img = $this->connect()->quote($img);
        $descr = $this->connect()->quote($descr);
        $price = (int) $price;
        $profit = (int) $profit;
        $note = $this->connect()->quote($note);
        $ettiq = $this->connect()->quote($ettiq);
        $cate = (int) $cate;

        $query = "INSERT INTO Product (Product_Name, Product_Img, Product_Description, Product_Price, Product_Profit, Product_Note, Product_Ettiquette, Product_Categorie) 
        VALUES ($name, $img, $descr, $price, $profit, $note, $ettiq, $cate)";

        if ($this->connect()->exec($query) !== false) {
            echo '<div class="alert alert-success" role="alert">
                   Product inserted successfully.
                   </div>';

            header("Location: manageproducts.php");
            exit();
        } else {
            echo "Error: " . print_r($this->connect()->errorInfo(), true);
        }
    }


    public function updateProduct($name, $img, $descr, $price, $profit, $note, $ettiq, $cate, $productId)
    {
        $query = "UPDATE Product SET Product_Name = ?, Product_Img = ?, Product_Description = ?, Product_Price = ?, Product_Profit = ?, Product_Note = ?, Product_Ettiquette = ?, Product_Categorie = ? WHERE Product_Id = ?";

        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$name, $img, $descr, $price, $profit, $note, $ettiq, $cate, $productId]);

        if ($stmt->rowCount() > 0) {
            echo '<div class="alert alert-success" role="alert">
            <?php $this->name ?> . " Product inserted successfully.
            </div>';

            // Redirect to manageproducts.php after successful update
            header("Location: manageproducts.php");
            exit();
        } else {
            echo "Error updating Product: " . print_r($stmt->errorInfo(), true);
        }
    }
}
