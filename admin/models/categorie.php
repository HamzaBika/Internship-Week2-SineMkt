<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/furn-master/admin/config/db.php';

class Categorie extends db {
    private $Categorie_Id;
    private $Categorie_Name;
    private $Categorie_Img;
    private $Categorie_Description;

    public function getcategorieid(){
        return $this->Categorie_Id;
    }

    public function getcategoriename(){
        return $this->Categorie_Name ;
    }

    public function getcategorieimg(){
        return $this->Categorie_Img;
    }

    public function getcategoriedescription(){
        return $this->Categorie_Description;
    }

    public function getAllCategories(){
        $sql = "SELECT * FROM Categorie ORDER BY Categorie_Id ASC";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $categorieObjects = array();
        foreach ($categories as $categorie) {
            $categorieObject = new Categorie();
            $categorieObject->Categorie_Id = $categorie['Categorie_Id'];
            $categorieObject->Categorie_Name = $categorie['Categorie_Name'];
            $categorieObject->Categorie_Img = $categorie['Categorie_Img'];
            $categorieObject->Categorie_Description = $categorie['Categorie_Description'];
            $categorieObjects[] = $categorieObject;
        }
    
        return $categorieObjects;
    }
    
}
