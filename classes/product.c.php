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
}
