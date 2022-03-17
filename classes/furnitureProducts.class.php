<?php
require_once ('products.class.php');


class FurnitureProducts extends Products{

    public function getProduct($type){
        $sql = "SELECT id, sku, name, price, productType, height, width, length FROM products WHERE productType = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$type]);

        $results = $stmt->fetchAll();
        return $results;
    }

    public function setProduct($postData){
        $sql = "INSERT INTO products (sku, name, price, productType, height, width, length) VALUES (?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$postData['sku'], $postData['name'], $postData['price'], $postData['productType'], $postData['height'],$postData['width'],$postData['length']]);
    }
}

?>