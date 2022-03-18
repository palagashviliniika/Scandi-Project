<?php

    include 'includes/autoloader.inc.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script
            src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous">
    </script>
</head>

<body>
    <nav>
        <div class="container">
            <a href="index.php">Task Page</a>
            <ul>
                <li><a href="add.php"><button>ADD</button></a></li>
                <li><button id="delete-product-btn" form="delete_product_form" value="Delete" name="delete-product-btn">MASS DELETE</button></li>
            </ul>
        </div>
    </nav>