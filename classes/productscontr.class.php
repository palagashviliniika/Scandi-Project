<?php

require_once ("dvdProducts.class.php");
require_once ("bookProducts.class.php");
require_once ("furnitureProducts.class.php");
require_once ("products.class.php");


class ProductsContr{
    private $postData;

    public function __construct($postData){
        $this->postData=$postData;
    }

    public function setData($postData){
        $this->postData=$postData;
    }

    public function getData(){
        return $this->postData;
    }

    public function setProductHandler(){
        $types = ['DVD'=>'DvdProducts', 'Book'=>'BookProducts', 'Furniture'=>'FurnitureProducts'];
        $className = $types[$this->postData['productType']];
        $modelToCall = new $className();
        $modelToCall->setProduct($this->postData);
    }

    public function deleteProducts(){
        if (empty($this->postData['delete-checkbox'])){
            header('Location: index.php');
        } else {

            foreach ($_POST['delete-checkbox'] as $checkbox){
                Products::deleteProducts($checkbox);
            }
            header('Location: index.php');
        }
    }
}

?>