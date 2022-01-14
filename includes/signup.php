<?php
if (isset($_POST['submit'])) {
    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];
    $email = $_POST['email'];

    include '../classes/dbh.c.php';
    include '../classes/signup.c.php';
    include '../classes/signup_ctrl.c.php';

    $signup = new SignUpCtrl($uname, $pwd, $email);
    $signup->signUpUser();

    header('location: ../index.php?error=none');
}
