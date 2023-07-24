<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/furn-master/admin/config/db.php';

class Product extends db{
    Protected $Product_Id;
    Protected $Product_Name;
    Protected $Product_Img;
    Protected $Product_Description;
    Protected $Product_Price;
    Protected $Product_Profit;
    Protected $Product_Note;
    Protected $Product_Ettiquette;
    Protected $Product_Categorie;

    Public function getproductid(){
        return $this->Product_Id;
    }

    Public function getproductname(){
        return $this->Product_Name;
    }

    Public function getproductimg(){
        return $this->Product_Img;
    }

    Public function getproductdesc(){
        return $this->Product_Description;
    }

    Public function getproductprice(){
        return $this->Product_Price;
    }

    Public function getproductprofit(){
        return $this->Product_Profit;
    }

    Public function getproductnote(){
        return $this->Product_Note;
    }

    Public function getproductettiq(){
        return $this->Product_Ettiquette;
    }

    Public function getproductcat(){
        return $this->Product_Categorie;
    }

}