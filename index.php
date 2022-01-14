<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
</head>

<body>
    <section class="index_login">
        <div class="wrapper">
            <div class="index_login_signup"></div>
            <form action="includes/signup.php" method="POST">
                <input type="text" name="uname" id="uname_id" placeholder="Username">
                <br>
                <input type="text" name="email" id="email_id" placeholder="email">
                <br>
                <input type="password" name="pwd" id="pwd_id" placeholder="Password">
                <br>
                <button type="submit" name="submit">Register</button>
                <p></p>
            </form>
            <div class="index_login_login">
                <form action="includes/login.php" method="POST">
                    <input type="text" name="uname" id="uname_id" placeholder="Username or Email">
                    <br>
                    <input type="password" name="pwd" id="pwd_id" placeholder="Password">
                    <br>
                    <?php
                    if (isset($_SESSION['id'])) {
                    ?>
                        <button type="submit" name="login" disabled>Log In</button>
                    <?php
                    } else {
                    ?>
                        <button type="submit" name="login">Log In</button>
                    <?php
                    }
                    ?>
                </form>
            </div>
            <div class="index_login_logout">
                <form action="includes/logout.php" method="POST">
                    <p></p>
                    <?php
                    if (isset($_SESSION['id'])) {
                    ?>
                        <button type="submit" name="logout"><?php echo 'Log out ' . $_SESSION['uname']; ?></button>
                    <?php
                    } else {
                    ?>
                        <button type="submit" name="logout">Not logged</button>
                    <?php
                    }
                    ?>
                </form>
            </div>
            <div class="index_create">
                <p></p>
                <a href="./pages/create_product.php">Create a product</a>
            </div>
        </div>
    </section>
</body>

</html>