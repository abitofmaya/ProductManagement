<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a product</title>
</head>

<body>
    <section class="product">
        <div class="wrapper">
            <div class="product_create"></div>
            <form action="../includes/create.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="name" id="name_id" placeholder="name of the produt">
                <br>
                <input type="text" name="sku" id="sku_id" placeholder="sku">
                <br>
                <input type="text" name="description" id="description_id" placeholder="description">
                <br>
                <input type="text" name="price" id="price_id" placeholder="price">
                <br>
                <input type="text" name="status" id="status_id" placeholder="status">
                <br>
                <input type="text" name="size" id="size_id" placeholder="size">
                <br>
                <input type="text" name="category" id="category_id" placeholder="category">
                <br>
                Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <br><br>
                <button type="submit" name="create">Create</button>
                <p></p>
            </form>
        </div>
    </section>
</body>

</html>
<!-- product create page
    name
    sku
    description
    price
    status
    size
    category
    multiple image upload -->