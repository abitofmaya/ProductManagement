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
                <input type="password" name="pwd" id="pwd_id" placeholder="Password">
                <br>
                <input type="text" name="email" id="email_id" placeholder="email">
                <br>
                <button type="submit" name="submit">Register</button>
                <p></p>
            </form>
            <div class="index_login_register">
                <form action="includes/login.php" method="POST">
                    <input type="text" name="uname" id="uname_id" placeholder="Username">
                    <br>
                    <input type="password" name="pwd" id="pwd_id" placeholder="Password">
                    <br>
                    <button type="submit" name="login">Log In</button>
                </form>
            </div>
        </div>
    </section>
    <?php
    ?>

</body>

</html>