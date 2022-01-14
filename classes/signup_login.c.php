<?php

class SignUpLogin extends Dbh
{
    protected function checkUser($uname, $email)
    {
        $sql = 'SELECT `email` FROM `users` WHERE `uname`= ? AND `email`= ?';
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute(array($uname, $email))) { // use array() for multiple parameters
            $stmt = null;
            header('location: ../index.php?error=stmtfailed');
            exit();
        }

        if ($stmt->rowCount() > 0) {
            return false;
        }

        return true;
    }

    protected function setUser($uname, $pwd, $email)
    {
        $sql = 'INSERT INTO  `users` (`uname`,`pwd`,`email`) VALUES (?,?,?)';
        $stmt = $this->connect()->prepare($sql);

        $pwd_hash = password_hash($pwd, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($uname, $pwd_hash, $email))) { // use array() for multiple parameters
            $stmt = null;
            header('location: ../index.php?error=stmtfailed');
            exit();
        }
        $stmt = null;
    }

    protected function getUser($uname, $pwd)
    {
        $sql = 'SELECT `pwd` FROM `users` WHERE `uname` = ? OR `email` = ?';
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute(array($uname, $uname))) { // use array() for multiple parameters
            $stmt = null;
            header('location: ../index.php?error=stmtfailed');
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header('location: ../index.php?error=usernotfound');
            exit();
        }

        $pwd_hash = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $verify_pwd = password_verify($pwd, $pwd_hash[0]['pwd']);

        if (!$verify_pwd) {
            $stmt = null;
            header('location: ../index.php?error=invalidPassword');
            exit();
        }
        $sql = 'SELECT * FROM `users` WHERE `uname` = ? OR `email` = ? AND `pwd`=?';
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute(array($uname, $uname, $pwd))) {
            $stmt = null;
            header('location: ../index.php?error=stmtfailed');
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header('location: ../index.php?error=usernotfound');
            exit();
        }

        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        session_start();
        $_SESSION['id'] = $user[0]['uid'];
        $_SESSION['uname'] = $user[0]['uname'];

        $stmt = null;
    }
}
