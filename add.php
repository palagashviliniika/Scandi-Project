<?php

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php include "templates/header.php" ?>

<section>
    <h3>Product Add</h3>
    <form id="product_form" action="add.php" method="POST">

        <label for="sku">SKU</label>
        <input type="text" id="sku" name="sku" value="" placeholder="Please provide SKU">
        <div class="error_sku"></div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="" placeholder="Please provide Name">
        <div class="error_name"></div>
        <label for="price">Price ($)</label>
        <input type="text" id="price" name="price" value="" placeholder="Please provide Price">
        <div class="error_price"></div>
        <label for="productType">Type Switcher</label>

        <select name="productType" id="productType" onchange="setForm(this.id)">
            <option value="empty">Select Type</option>
            <option value="DVD">DVD</option>
            <option value="Book">Book</option>
            <option value="Furniture">Furniture</option>
        </select>
        <div class="error_type"></div>

        <div id="prod_type">

        </div>

        <script>
            function setForm(productType){

                var productType = document.getElementById(productType);
                console.log(productType.value);

                var productTypes = { "empty":'', "DVD": 'templates/forms/dvd.form.php', "Book": 'templates/forms/book.form.php', "Furniture": 'templates/forms/furniture.form.php' };

                var address = productTypes[productType.value];

                //We are sending the address to the PHP to get the template

                $.ajax(
                    {
                    type: 'POST',
                    url: 'requests/ajax_request.php',
                    data: { address1:address },
                    success: function(response) {

                        // console.log(response); // it logs php form template

                        $("#prod_type").html(response);
                    }
                }
                );

                // return address;

                }
        </script>

        <input type="submit" id="submit" name="submit" value="submit">

        <script>

                $('#product_form').submit(function (event) {

                    event.preventDefault();

                    $.ajax({
                        type: 'post',
                        dataType: 'text',
                        url: 'requests/ajax_add_request.php',
                        data: $(this).serialize(),
                        success: function (response) {
                            console.log(response);
                            // response = JSON.parse(response);
                        }
                    });

                });

        </script>

    </form>
</section>

<?php include "templates/footer.php";?>

</body>
</html>
