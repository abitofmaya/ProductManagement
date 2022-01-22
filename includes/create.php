<?php
include '../classes/dbh.c.php';
include '../classes/product.c.php';
include '../classes/product_ctrl.c.php';

if (isset($_POST['create'])) {

    $name = $_POST['name'];
    $sku = $_POST['sku'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $size = $_POST['size'];
    $category = $_POST['category'];


    $product = new ProductCtrl();
    $product->setProperties($name, $sku, $description, $price, $status, $size, $category);
    $product->validateUpload();
    // header('location: ../pages/create_product.php');
}
