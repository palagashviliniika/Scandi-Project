<?php

require '../classes/product_validator.class.php';

$validation = new validator($_POST);
$errors = $validation->validateForm();

print_r($errors);

?>