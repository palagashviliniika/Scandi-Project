<?php

require '../classes/product_validator.class.php';

$validation = new validator($_POST);
$errors = $validation->validateForm();

// we are sending data from the server side and turning php assoc array into json string
print_r(json_encode($errors));

?>