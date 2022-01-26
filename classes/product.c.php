<?php

class Product extends Dbh
{
    protected function setProduct($name, $sku, $description, $price, $status, $size, $category, $uploadedFiles)
    {
        $pdo = $this->connect();

        $sql = 'INSERT INTO  `products` (`name`,`description`,`status`,`category`) VALUES (?,?,?,?)';
        $stmt = $pdo->prepare($sql);

        if (!$stmt->execute(array($name, $description, $status, $category))) {
            $stmt = null;
            header('location: ../pages/create_product.php?error=stmtfailed');
            exit();
        }

        $last_insert_id = $pdo->lastInsertId();

        $sql = 'INSERT INTO  `products-items` (`pid`, `sku`, `size`, `price`, `status`) VALUES (?,?,?,?,?)';
        $stmt = $pdo->prepare($sql);

        foreach ($sku as $key => $value) {
            if (!$stmt->execute(array($last_insert_id, $value, $size[$key], $price[$key], $status))) {
                $stmt = null;
                header('location: ../pages/create_product.php?error=stmtfailed');
                exit();
            }
        }

        $sql = 'INSERT INTO  `products-images` (`pid`, `files`, `status`) VALUES (?,?,?)';
        $stmt = $pdo->prepare($sql);

        foreach ($uploadedFiles as $file) {
            if (!$stmt->execute(array($last_insert_id, $file, $status))) {
                $stmt = null;
                header('location: ../pages/create_product.php?error=stmtfailed');
                exit();
            }
        }
        $stmt = null;
    }

    protected function getAllPID()
    {
        $sql = 'SELECT `pid` FROM `products`';
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute()) {
            $stmt = null;
            header('location: ../pages/view_product.php?error=stmtfailed');
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header('location: ../pages/view_product.php?error=noProductsFound');
            exit();
        }

        $pid = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;

        return $pid;
    }

    protected function getProducts($pid)
    {
        $sql = 'SELECT p.*, i.sku, i.size, i.price
                FROM products as p
                INNER JOIN `products-items` as i
                ON p.pid=i.pid
                WHERE p.pid = ?
                ORDER BY p.pid;';

        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute(array($pid))) { // use array() for multiple parameters
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

    protected function getImages($pid)
    {
        $sql = 'SELECT `products-images`.files
                FROM `products-images`
                where pid = ?';

        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute(array($pid))) {
            $stmt = null;
            header('location: ../pages/view_product.php?error=stmtfailed');
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header('location: ../pages/view_product.php?error=noProductsFound');
            exit();
        }

        $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;

        return $images;
    }

    protected function updateProduct($pid, $name, $sku, $description, $price, $status, $size, $category, $uploadedFiles)
    {
        $sql = 'UPDATE `products` SET `name`=?,`sku`=?,`description`=?,`price`=?,`status`=?,`size`=?,`category`=?,`files`=? WHERE `pid` = ?';
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute(array($name, serialize($sku), $description, serialize($price), $status, serialize($size), $category, serialize($uploadedFiles), $pid))) { // use array() for multiple parameters
            $stmt = null;
            header('location: ../pages/create_product.php?error=stmtfailed');
            exit();
        }
        $stmt = null;
    }

    protected function removeImages($pid)
    {
        $sql = 'SELECT `files` FROM  `products` WHERE `pid`= ?';
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute(array($pid))) { // use array() for multiple parameters
            $stmt = null;
            header('location: ../pages/view_product.php?error=stmtfailed');
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header('location: ../pages/view_product.php?error=noProductsFound');
            exit();
        }

        $files = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach (unserialize($files[0]['files']) as $file) {
            unlink('../uploads/' . $file);
        }
        $stmt = null;
    }
}
