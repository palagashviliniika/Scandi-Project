<?php

require_once ('dbh.class.php');

//creating abstract model class that extends to db class
abstract class Products extends Dbh{

    //static method to delete selected products
    public static function deleteProducts($ids){
        $sql = "DELETE FROM products WHERE id IN ($ids)";
        $host = new Dbh();
        $stmt = $host->connect()->prepare($sql);
        $stmt->execute();
    }

    //static method to get skus as an array
    public static function getSku(){
        $sql = "SELECT sku FROM products";
        $host = new Dbh();
        $stmt = $host->connect()->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetchAll();
        return $results;
    }

    //rules for classes that extend this class
    abstract public function getProduct($type);

    abstract public function setProduct($postData);

}