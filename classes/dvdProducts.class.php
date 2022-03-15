<?php

class DvdProducts extends Products {

    public function getProduct($const){

    }

    public function setProduct($postData){
        $sql = "INSERT INTO products (sku, name, price, productType, size) VALUES (?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$postData['sku'],$postData['name'],$postData['price'],$postData['productType'],$postData['size']]);
    }
}
?>