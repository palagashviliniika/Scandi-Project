<?php

require_once ("dvdProducts.class.php");
require_once ("bookProducts.class.php");
require_once ("furnitureProducts.class.php");
require_once ("products.class.php");

//creating controller class
class ProductsContr{
    private $postData;

    //constructor
    public function __construct($postData){
        $this->postData=$postData;
    }

    //getter
    public function setData($postData){
        $this->postData=$postData;
    }

    //setter
    public function getData(){
        return $this->postData;
    }

    // method to save product in db
    public function setProductHandler(){
        $types = ['DVD'=>'DvdProducts', 'Book'=>'BookProducts', 'Furniture'=>'FurnitureProducts'];

        //instantiating and calling appropriate class
        $className = $types[$this->postData['productType']];
        $modelToCall = new $className();
        $modelToCall->setProduct($this->postData);
    }

//    method to delete products
    public function deleteProducts(){

        //if received post data is empty, user is redirected to index page
        if (empty($this->postData['delete-checkbox'])){
            header('Location: ../index.php');
        } else {

            //turning ids array into a string to use it in a sql query
            $string = implode(', ',$_POST['delete-checkbox']);

            //calling delete method and redirecting to index page
            Products::deleteProducts($string);
            header('Location: ../index.php');
        }
    }

    //method to get skus
    public static function getSkus(){
        $results = Products::getSku();
        return $results;
    }
}

?>