<?php
require_once ('products.class.php');


class BookProducts extends Products{

    public function getProduct($type){
        $sql = "SELECT id, sku, name, price, productType, weight FROM products WHERE productType = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$type]);

        $results = $stmt->fetchAll();
        return $results;
    }

    public function setProduct($postData){
        $sql = "INSERT INTO products (sku, name, price, productType, weight) VALUES (?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$postData['sku'], $postData['name'], $postData['price'], $postData['productType'], $postData['weight']]);
    }
}

?>