<?php
require_once ('products.class.php');


class FurnitureProducts extends Products
{

    public function getProduct()
    {

    }

    public function setProduct($postData)
    {
        $sql = "INSERT INTO products (sku, name, price, productType, height, width, length) VALUES (?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$postData['sku'], $postData['name'], $postData['price'], $postData['productType'], $postData['height'],$postData['width'],$postData['length']]);
    }
}

?>