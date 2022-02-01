<?php
require_once('../includes/session.php');

include '../classes/dbh.c.php';
include '../classes/product.c.php';
include '../classes/product_ctrl.c.php';

if (isset($_POST['update'])) {

    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $sku = $_POST['sku'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $size = $_POST['size'];
    $category = $_POST['category'];


    $product = new ProductCtrl();
    $product->setProperties($pid, $name, $sku, $description, $price, $status, $size, $category);
    $product->removeImgs();
    $product->validateUpload();
    $product->updatePrdct();
    $product->uploadStatus();

    header('refresh:5; url=../pages/update_product.php?status=productUpdated');
    exit();
}
