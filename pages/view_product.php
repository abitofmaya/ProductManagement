<?php

include '../classes/dbh.c.php';
include '../classes/product.c.php';
include '../classes/product_ctrl.c.php';

$products = new ProductCtrl();
$p_ids = $products->getPID();

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
        foreach ($p_ids as $key => $pid) {
            $prdcts = $products->displayProduct($pid['pid']);

            $sku = $size = $price = array();

            foreach ($prdcts as $key => $product) {
                array_push($sku, $product['sku']);
                array_push($size, $product['size']);
                array_push($price, $product['price']);
            }

            $images = $products->getImg($pid['pid']);
        ?>
            <div>
                <div>
                    <img id="display-img-id" class="display-img" src=" ../uploads/<?php echo $images[0]['files'] ?>">

                    <!-- Need some work at this space, probably javascript. Following is just a placeholder -->

                    <div class="placeholder-img">
                        <?php
                        foreach ($images as $key => $image) {
                        ?>
                            <div>
                                <img class="select-img" src="../uploads/<?php echo $image['files'] ?>" onclick="nextImage(this, event);">
                            </div>
                        <?php
                        }
                        ?>
                    </div>

                </div>
                <div>Name: <?php echo $product['name'] ?>
                </div>
                <div>SKUs: <?php echo implode(' ', $sku) ?>
                </div>
                <div>Description: <?php echo $product['description'] ?>
                </div>
                <div>Prices: <?php echo implode(' ', $price) ?>
                </div>
                <div>Status: <?php echo $product['status'] ?>
                </div>
                <div>Sizes: <?php echo implode(' ', $size) ?>
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
