<?php

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Styles/main.css">
    <title>Document</title>

<!--including font awesome cdn for icons-->
    <script
            src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/c55fd663d8.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="nav">
        <div class="container">
            <div class="title">
                <a class="fa fa-solid fa-store" href="index.php"></a>
                <a class="name" href="index.php">Task Page</a>
            </div>
            <div class="navbar">

<!--------------directing to add page on click-->
                <button onclick="window.location.href = 'add.php'">
                    <i class="fa-solid fa-cart-plus"></i>    
                        ADD
                </button>

<!--------------delete form submit btn. sending checked ids to the delete request-->
                <button id="delete-product-btn" form="delete_product_form" value="Delete" name="delete-product-btn">
                    <i class="fa-solid fa-trash"></i>
                    MASS DELETE
                </button>
            </div>
        </div>
    </div>