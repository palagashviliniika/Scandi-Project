<?php
require 'classes/productsview.class.php';

//$dvd = new ProductsView();
//$dvds = $dvd -> showTypes('DVD', 'DvdProducts');
//
//$book = new ProductsView();
//$books = $book -> showTypes('Book', 'BookProducts');
//
//$furniture = new ProductsView();
//$furnitures = $furniture -> showTypes('Furniture', 'FurnitureProducts');


//$products = array_merge($dvds, $books, $furnitures);

$products = new ProductsView();
$results = $products->showAll();

asort($results);
print_r($results);

?>

<!doctype html>
<html lang="en">

<?php include 'templates/header.php'; ?>


<h4>Browse Products!</h4>

<div class="container">
    <div class="row">

        <?php foreach ($results as $result){ ?>

        <div class="column">
            <div class="card">
                <div class="card_content">
                    <h5><?php echo htmlspecialchars($result['sku']); ?></h5>
                    <h3><?php echo  htmlspecialchars($result['name']); ?></h3>
                    <h4><?php echo  htmlspecialchars($result['price']).'$'  ; ?></h4>
                    <h4><?php echo  htmlspecialchars(@$result['size'])  ; ?></h4>
                </div>
            </div>
        </div>

        <?php } ?>

    </div>
</div>

<?php include 'templates/footer.php'; ?>

</html>