<?php

require '../classes/product_validator.class.php';
require '../classes/productscontr.class.php';

$validation = new validator($_POST);
$errors = $validation->validateForm();

if ($errors){
    // we are sending data from the server side and turning php assoc array into json string
    print_r(json_encode($errors));
} else{

    $saveProduct = new ProductsContr($_POST);
    $saveProduct->setProductHandler();
}

?>