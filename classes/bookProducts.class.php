<?php
require_once ('products.class.php');

//book model that extends products class
class BookProducts extends Products{

    //method to get books from the database as an assoc array
    public function getProduct($type){
        $sql = "SELECT id, sku, name, price, productType, weight FROM products WHERE productType = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$type]);

        $results = $stmt->fetchAll();
        return $results;
    }

    //method to save book in a db
    public function setProduct($postData){
        $sql = "INSERT INTO products (sku, name, price, productType, weight) VALUES (?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$postData['sku'], $postData['name'], $postData['price'], $postData['productType'], $postData['weight']]);
    }
}

?>