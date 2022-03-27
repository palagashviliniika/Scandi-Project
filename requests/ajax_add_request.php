<?php

require '../classes/product_validator.class.php';
require '../classes/productscontr.class.php';

//instantiating validator class and sending add product submitted data
$validation = new validator($_POST);

//calling validateForm method
$errors = $validation->validateForm();

//checking if returned errors are empty or not
if ($errors){
    // if there are errors, we are sending data from the server side and turning php assoc array into json string
    print_r(json_encode($errors));
} else{

    //if there are no errors, we are saving product to the db
    $saveProduct = new ProductsContr($_POST);
    $saveProduct->setProductHandler();
}

?>