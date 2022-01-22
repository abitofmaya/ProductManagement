<?php

class Product extends Dbh
{
    protected function setProduct($name, $sku, $description, $price, $status, $size, $category, $uploadedFiles)
    {
        $sql = 'INSERT INTO  `products` (`name`,`sku`,`description`,`price`,`status`,`size`,`category`,`files`) VALUES (?,?,?,?,?,?,?,?)';
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute(array($name, serialize($sku), $description, serialize($price), $status, serialize($size), $category, serialize($uploadedFiles)))) { // use array() for multiple parameters
            $stmt = null;
            header('location: ../pages/create_product.php?error=stmtfailed');
            exit();
        }
        $stmt = null;
    }

    protected function getProducts()
    {
        $sql = 'SELECT * FROM  `products`';
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute()) { // use array() for multiple parameters
            $stmt = null;
            header('location: ../pages/view_product.php?error=stmtfailed');
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header('location: ../pages/view_product.php?error=noProductsFound');
            exit();
        }

        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;

        return $products;
    }
}
