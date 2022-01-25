<?php

include '../classes/dbh.c.php';
include '../classes/product.c.php';
include '../classes/product_ctrl.c.php';

$products = new ProductCtrl();
$products = $products->displayProduct();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/minimal.css" />

    <script src="../js/change_image.js"></script>


    <title>Products</title>
</head>

<body>
    <div class="wrapper">
        <?php
        foreach ($products as $product) {
        ?>
            <div>
                <div>
                    <img id="display-img-id" class="display-img" src=" ../uploads/<?php echo unserialize($product['files'])[0] ?>">

                    <!-- Need some work at this space, probably javascript. Following is just a placeholder -->

                    <div class="placeholder-img">
                        <?php
                        foreach (unserialize($product['files']) as $key => $filename) {
                        ?>
                            <div>
                                <img class="select-img" src="../uploads/<?php echo $filename ?>" onclick="nextImage(this, event);">
                            </div>
                        <?php
                        }
                        ?>
                    </div>

                </div>
                <div>Name: <?php echo $product['name'] ?>
                </div>
                <div>SKUs: <?php echo implode(' ', unserialize($product['sku'])) ?>
                </div>
                <div>Description: <?php echo $product['description'] ?>
                </div>
                <div>Prices: <?php echo implode(' ', unserialize($product['price'])) ?>
                </div>
                <div>Status: <?php echo $product['status'] ?>
                </div>
                <div>Sizes: <?php echo implode(' ', unserialize($product['size'])) ?>
                </div>
                <div>Category: <?php echo $product['category'] ?>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</body>

</html>
