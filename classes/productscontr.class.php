<?php

require_once ("dvdProducts.class.php");
require_once ("bookProducts.class.php");
require_once ("furnitureProducts.class.php");


class ProductsContr{
    public function setProductHandler($postData){
        $types = ['DVD'=>'DvdProducts', 'Book'=>'BookProducts', 'Furniture'=>'FurnitureProducts'];
        $className = $types[$postData['productType']];
        $modelToCall = new $className();
        $modelToCall->setProduct($postData);
    }
}

?>