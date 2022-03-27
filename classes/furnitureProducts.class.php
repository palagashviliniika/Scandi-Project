<?php
require_once ('products.class.php');

//furniture model that extends products class
class FurnitureProducts extends Products{

    //method to get furniture from the database as an assoc array
    public function getProduct($type){
        $sql = "SELECT id, sku, name, price, productType, height, width, length FROM products WHERE productType = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$type]);

        $results = $stmt->fetchAll();
        return $results;
    }

    //method to save furniture in a db
    public function setProduct($postData){
        $sql = "INSERT INTO products (sku, name, price, productType, height, width, length) VALUES (?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$postData['sku'], $postData['name'], $postData['price'], $postData['productType'], $postData['height'],$postData['width'],$postData['length']]);
    }
}

?>