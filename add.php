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
        <input type="text" id="sku" name="sku" value="" placeholder="Please provide SKU" oninput="clearErrorField(this.id)">
        <div id="error_sku" class="error"></div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="" placeholder="Please provide Name" oninput="clearErrorField(this.id)">
        <div id="error_name" class="error"></div>
        <label for="price">Price ($)</label>
        <input type="text" id="price" name="price" value="" placeholder="Please provide Price" oninput="clearErrorField(this.id)">
        <div id="error_price" class="error"></div>
        <label for="productType">Type Switcher</label>

        <select name="productType" id="productType" onchange="setForm(this.id)" oninput="clearErrorField(this.id)">
            <option value="empty">Select Type</option>
            <option value="DVD">DVD</option>
            <option value="Book">Book</option>
            <option value="Furniture">Furniture</option>
        </select>
        <div id="error_productType" class="error"></div>

        <div id="prod_type"></div>

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

            }
        </script>

        <input type="submit" id="submit" name="submit" value="Save" >
        <input type="button" id="cancel" name="cancel" value="Cancel" onclick="location.href = 'index.php';">

        <script>

            // const inputElement = document.getElementById('error_sku');
            //
            // inputElement.addEventListener('change', (event) => {
            //     inputElement.innerHTML = "";
            // });

            function clearErrorField(IDtoClear){
                let fieldToClear = document.getElementById('error_' + IDtoClear);
                console.log(fieldToClear);
                fieldToClear.innerHTML = "";
            }


                $('#product_form').submit(function (event) {

                    event.preventDefault();

                    $.ajax({
                        type: 'post',
                        dataType: 'text',
                        url: 'requests/ajax_add_request.php',
                        data: $(this).serialize(),
                        success: function (response) {
                            console.log(response);

                            // turning json string into a js object
                            response = JSON.parse(response);

                            // console.log(Object.keys(response));
                            Object.keys(response).forEach((error) => {
                                let errorField = document.getElementById('error_'+error);

                                // console.log(errorField);

                                errorField.innerHTML = response[error];
                            })
                        }

                    });

                });

        </script>

    </form>
</section>

<?php include "templates/footer.php";?>

</body>
</html>
