<?php
require 'classes/productsview.class.php';
include 'requests/delete_request.php';

//instantiating view class
$products = new ProductsView();

//fetching all products as a single associative array
$results = $products->getAll();

?>

<!doctype html>
<html lang="en">

<!--including header-->
<?php include 'templates/header.php'; ?>

<div class="products">
    <div class="container">

        <h1>Browse Products!</h1>

<!------Creating form to send checked ids to the delete request-->
        <form action="requests/delete_request.php" method="post" id="delete_product_form">

            <div class="section">

<!--------------Starting foreach loop on products array to show them as a single product-->
                <?php foreach ($results as $product){ ?>

                    <div class="card">

                        <div class="checkbox">

<!--------------------------delete checkbox, setting its value to product id-->
                            <label for="">
                                <input type="checkbox" class="delete-checkbox" name="delete-checkbox[]" value="<?php $products->showID($product); ?>">
                                Choose to delete
                            </label>
                        </div>

                        <div class="card_content">

<!--------------------------calling methods to show product info-->
                            <h5><?php $products->showSku($product); ?></h5>
                            <h3><?php $products->showName($product); ?></h3>
                            <h5><?php $products->showPrice($product); ?></h5>
                            <h5><?php $products->showAttribute($product); ?></h5>
                        </div>
                    </div>

<!--------------endig foreach loop-->
                <?php } ?>

            </div>

        </form>

    </div>
</div>

<!--including footer-->
<?php include 'templates/footer.php'; ?>

</html>