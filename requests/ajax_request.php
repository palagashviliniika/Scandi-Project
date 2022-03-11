<?php

header('Content-type: text/plain');

if(!empty($_POST['address1'])){
    $address = $_POST['address1'];

    try {
        echo file_get_contents('../' . $address);
    } catch (Exception $e) {
        echo $e;
    }

}

?>