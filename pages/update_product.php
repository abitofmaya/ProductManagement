<?php
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

    <script src="../js/insertField.js"></script>
    <script src="../js/addEntry.js"></script>

    <title>Update Product</title>
</head>

<body onload="insertField()">

    <?php
    include_once('./create_update_form.php')
    ?>

</body>

</html>
