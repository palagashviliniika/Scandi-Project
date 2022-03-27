<?php
require_once ('products.class.php');

//dvd model that extends products class
class DvdProducts extends Products {

    //method to get dvds from the database as an assoc array
    public function getProduct($type){
        $sql = "SELECT id, sku, name, price, productType, size FROM products WHERE productType = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$type]);

        $results = $stmt->fetchAll();
        return $results;
    }

    //method to save dvd in a db
    public function setProduct($postData){
        $sql = "INSERT INTO products (sku, name, price, productType, size) VALUES (?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$postData['sku'],$postData['name'],$postData['price'],$postData['productType'],$postData['size']]);
    }
}

?>