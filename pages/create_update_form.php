<?php
require_once('../includes/session.php');
?>

<section class="product">
    <div class="product_create">
        <form action="../includes/create.php" method="POST" enctype="multipart/form-data" id="form-id">
            <div id="name-id">
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
                <button id="submit-id" class="btn" type="submit" name="create">Create</button>
            </div>
        </form>
    </div>
</section>
