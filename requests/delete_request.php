<?php
//include '/C:/xampp/htdocs/Scandi Project/classes/productscontr.class.php';
include $_SERVER['DOCUMENT_ROOT'].'/Scandi Project/classes/productscontr.class.php';

if (isset($_POST['delete-product-btn'])){
    $delete = new ProductsContr($_POST);
    $delete->deleteProducts();
}

?>