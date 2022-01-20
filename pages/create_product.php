<?php
session_start();
require_once('../includes/session.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="../css/minimal.css" />

    <script src="../js/addEntry.js"></script>

    <title>Create a product</title>
</head>

<body>
    <section class="product">
        <div class="wrapper">
            <div class="product_create"></div>
            <form action="../includes/create.php" method="POST" enctype="multipart/form-data">
                <div>
                    <label>Name:</label>
                    <input class="input-box" type="text" name="name" placeholder="name of the produt">
                </div>
                <div id="sku-id">
                    <div>
                        <label>SKU:</label>
                        <input class="input-box" type="text" name="sku[]" placeholder="sku">
                        <button type="button" class="btn add-btn" onclick="addEntry();"><span class="bi-plus-lg"></span></button>
                    </div>
                </div>
                <div>
                    <label>Description:</label>
                    <input class="input-box" type="text" name="description" placeholder="description">
                </div>
                <div id="price-id">
                    <div>
                        <label>Price:</label>
                        <input class="input-box" type="text" name="price[]" placeholder="price">
                    </div>
                </div>
                <div>
                    <label>Status:</label>
                    <input class="input-box" type="text" name="status" placeholder="status">
                </div>
                <div id="size-id">
                    <div>
                        <label>Size:</label>
                        <input class="input-box" type="text" name="size[]" placeholder="size">
                    </div>
                </div>
                <div>
                    <label>Category:</label>
                    <input class="input-box" type="text" name="category" placeholder="category">
                </div>
                <div>
                    <label>Select image:</label>

                    <input class="btn" type="file" name="filesToUpload[]" multiple>
                </div>
                <div>
                    <button class="btn" type="submit" name="create">Create</button>
                </div>
            </form>
        </div>
    </section>
</body>

</html>
