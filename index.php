<?php
require 'classes/productsview.class.php';
include 'requests/delete_request.php';

$dvdProducts = new ProductsView();
$dvds = $dvdProducts -> showTypes('DVD', 'DvdProducts');

$bookProducts = new ProductsView();
$books = $bookProducts -> showTypes('Book', 'BookProducts');

$furnitureProducts = new ProductsView();
$furnitures = $furnitureProducts -> showTypes('Furniture', 'FurnitureProducts');


?>

<!doctype html>
<html lang="en">
    
<?php include 'templates/header.php'; ?>

<div class="products">
    <div class="container">

        <h1>Browse Products!</h1>

        <form action="requests/delete_request.php" method="post" id="delete_product_form">

            <h2>Netflix? Who Needs Them?!</h2>

            <div class="section">

                <?php foreach ($dvds as $dvd){ ?>

                    <div class="card">

                        <div class="checkbox">
                            <label for="">
                                <input type="checkbox" class="delete-checkbox" name="delete-checkbox[]" value="<?php echo htmlspecialchars($dvd['id']); ?>">
                                Choose to delete
                            </label>
                        </div>

                        <div class="card_content">
                            <h5><?php echo htmlspecialchars($dvd['sku']); ?></h5>
                            <h3><?php echo htmlspecialchars($dvd['name']); ?></h3>
                            <h5><?php echo htmlspecialchars($dvd['price']).'$'; ?></h5>
                            <h5><?php echo 'Size: '.htmlspecialchars($dvd['size']).'MB'; ?></h5>
                        </div>
                    </div>
                

                <?php } ?>

            </div>

            <h2>a Book a Day Keeps Reality Away!</h2>

            <div class="section">

                <?php foreach ($books as $book){ ?>

                    <div class="card">

                        <div class="checkbox">
                            <label for="">
                                <input type="checkbox" class="delete-checkbox" name="delete-checkbox[]" value="<?php echo htmlspecialchars($book['id']); ?>">
                                Choose to delete
                            </label>
                        </div>

                        <div class="card_content">
                            <h5><?php echo htmlspecialchars($book['sku']); ?></h5>
                            <h3><?php echo htmlspecialchars($book['name']); ?></h3>
                            <h5><?php echo htmlspecialchars($book['price']).'$'; ?></h5>
                            <h5><?php echo 'Weight: '.htmlspecialchars($book['weight']).'KG'; ?></h5>
                        </div>
                    </div>

                <?php } ?>

            </div>

            <h2>Comfy, Right?</h2>

            <div class="section">

                <?php foreach ($furnitures as $furniture){ ?>

                    <div class="card">

                        <div class="checkbox">
                            <label for="">
                                <input type="checkbox" class="delete-checkbox" name="delete-checkbox[]" value="<?php echo htmlspecialchars($furniture['id']); ?>">
                                Choose to delete
                            </label>
                        </div>

                        <div class="card_content">
                            <h5><?php echo htmlspecialchars($furniture['sku']); ?></h5>
                            <h3><?php echo htmlspecialchars($furniture['name']); ?></h3>
                            <h5><?php echo htmlspecialchars($furniture['price']).'$'; ?></h5>
                            <h5><?php echo 'Dimensions: '.htmlspecialchars($furniture['height']).'x'.htmlspecialchars($furniture['width']).'x'.htmlspecialchars($furniture['length']); ?></h5>
                        </div>
                    </div>

                <?php } ?>

            </div>

        </form>

    </div>
</div>

<?php include 'templates/footer.php'; ?>

</html>