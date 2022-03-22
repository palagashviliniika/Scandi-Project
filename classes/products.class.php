<?php

require_once ('Dbh.class.php');

abstract class Products extends Dbh{

    public static function deleteProducts($ids){
        $sql = "DELETE FROM products WHERE id IN ($ids)";
        $host = new Dbh();
        $stmt = $host->connect()->prepare($sql);
        $stmt->execute();
    }

    public static function getSku(){
        $sql = "SELECT sku FROM products";
        $host = new Dbh();
        $stmt = $host->connect()->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetchAll();
        return $results;
    }

    abstract public function getProduct($type);

    abstract public function setProduct($postData);

}