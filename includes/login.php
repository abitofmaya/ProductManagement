<?php

if (isset($_POST['login'])) {
    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];

    include '../classes/dbh.c.php';
    include '../classes/signup_login.c.php';
    include '../classes/signup_login_ctrl.c.php';

    $signup = new SignUpLoginCtrl($uname, $pwd, $uname);
    $signup->logUser();

    header('location: ../index.php?error=none');
    exit();
}
