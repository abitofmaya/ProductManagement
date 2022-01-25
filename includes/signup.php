<?php
if (isset($_POST['submit'])) {
    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];
    $email = $_POST['email'];

    include '../classes/dbh.c.php';
    include '../classes/signup_login.c.php';
    include '../classes/signup_login_ctrl.c.php';

    $signup = new SignUpLoginCtrl($uname, $pwd, $email);
    $signup->signUpUser();

    header('location: ../index.php?status=userRegistered');
    exit();
}
