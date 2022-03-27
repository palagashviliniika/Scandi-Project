<?php
//including products controller
include $_SERVER['DOCUMENT_ROOT'].'/Scandi Project/classes/productscontr.class.php';

// checking whether user clicked on delete btn, instantiating controller class and calling appropriate method
if (isset($_POST['delete-product-btn'])){
    $delete = new ProductsContr($_POST);
    $delete->deleteProducts();
}

?>