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
        </div>
    </div>

    <div class="add">

        <div class="container">

            <h3>Product Add</h3>

            <form id="product_form" action="add.php" method="POST">

                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="" placeholder="Please provide Name" oninput="clearErrorField(this.id)">
                <div id="error_name" class="error"></div>
                
                <div class="form1">
                    <div class="sku_input">
                        <label for="sku">SKU</label>
                        <input type="text" id="sku" name="sku" value="" placeholder="Please provide SKU" oninput="clearErrorField(this.id)">
                        <div id="error_sku" class="error"></div>
                    </div>

                    <div class="price_input">
                        <label for="price">Price ($)</label>
                        <input type="text" id="price" name="price" value="" placeholder="Please provide Price" oninput="clearErrorField(this.id)">
                        <div id="error_price" class="error"></div>
                    </div>  
                </div>

                <label for="productType">Type Switcher</label>

                <select name="productType" id="productType" onchange="setForm(this.id)" oninput="clearErrorField(this.id)">
                    <option value="empty" class="empty">Select Type</option>
                    <option value="DVD">DVD</option>
                    <option value="Book">Book</option>
                    <option value="Furniture">Furniture</option>
                </select>
                <div id="error_productType" class="error"></div>

                <div id="prod_type"></div>

                <input type="submit" id="submit" name="submit" value="Save" >
                <input type="button" id="cancel" name="cancel" value="Cancel" onclick="location.href = 'index.php';">

                <script src="js/app.js"></script>

            </form>

        </div>

    </div>

    <?php include "templates/footer.php";?>

</body>
</html>
