<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/minimal.css" />

    <title>Product Management</title>
</head>

<body>
    <section class="index">
        <div class="wrapper">
            <div class="index-signup common">
                <form action="includes/signup.php" method="POST">
                    <div>
                        <input class="input-box" type="text" name="uname" id="uname_id" placeholder="Username">
                    </div>
                    <div>
                        <input class="input-box" type="text" name="email" id="email_id" placeholder="email">
                    </div>
                    <div>
                        <input class="input-box" type="password" name="pwd" id="pwd_id" placeholder="Password">
                    </div>
                    <div>
                        <button class="btn" type="submit" name="submit">Register</button>
                    </div>
                </form>
            </div>
            <div class="index-login common">
                <?php
                if (isset($_SESSION['id'])) {
                ?>
                    <form action="includes/logout.php" method="POST">
                        <div>
                            <input class="input-box" type="text" name="uname" id="uname_id" placeholder="Username or Email" disabled>
                        </div>
                        <div>
                            <input class="input-box" type="password" name="pwd" id="pwd_id" placeholder="Password" disabled>
                        </div>
                        <div>
                            <button class="btn" type="submit" name="logout"><?php echo 'Log out ' . $_SESSION['uname']; ?></button>
                        </div>
                    </form>
                <?php
                } else {
                ?>
                    <form action="includes/login.php" method="POST">
                        <div>
                            <input class="input-box" type="text" name="uname" id="uname_id" placeholder="Username or Email">
                        </div>
                        <div>
                            <input class="input-box" type="password" name="pwd" id="pwd_id" placeholder="Password">
                        </div>
                        <div>
                            <button class="btn" type="submit" name="login">Log In</button>
                        </div>
                    </form>
                <?php
                }
                ?>
            </div>
            <div class="index-create">
                <div>
                    <a href="./pages/create_product.php">Create a product</a>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
