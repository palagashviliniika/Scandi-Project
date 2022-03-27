<?php

header('Content-type: text/plain');

//sending appropriate template address to the ajax call in app.js according to the product type to show the required input fields
if(!empty($_POST['address1'])){
    $address = $_POST['address1'];

//trying to read markup template file into a string and sending it to ajax call as a response
    try {
        echo file_get_contents('../' . $address);
    } catch (Exception $e) {
        echo $e;
    }

}

?>