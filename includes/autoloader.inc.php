<?php

// Then we instantiate a class this inbuilt function sees it and automatically includes this task so we dont have to do it manually for all the classes!!!!!!

spl_autoload_register('myAutoLoader');

function myAutoLoader($className) {
    $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

    // this function checks whether where are any "INCLUDES" in the url or not
    if (strpos($url, 'includes') !== false ){
        $path = "../classes/";
    } else {
        $path = "classes/";
    }

    $ext = ".class.php";
    $fullPath = $path.$className.$ext;

    //this code gives us much cleaner error message!!!
    if (!file_exists($fullPath)){
        return false;
    }

    include_once $fullPath;
}

?>