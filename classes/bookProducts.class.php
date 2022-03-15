<?php
require_once ('products.class.php');


class BookProducts extends Products
{

    public function getProduct()
    {

    }

    public function setProduct($postData)
    {
        $sql = "INSERT INTO products (sku, name, price, productType, weight) VALUES (?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$postData['sku'], $postData['name'], $postData['price'], $postData['productType'], $postData['weight']]);
    }
}

?>