<?php

include "../includes/autoloader.inc.php";

class ProductsContr{
    public function setProductHandler($postData){
        $types = ['DVD'=>'DvdProducts'];
        $className = $types[$postData['productType']];
        $modelToCall = new $className();
        $modelToCall->setProduct($postData);
    }
}

?>