<?php

class SignUp extends Dbh
{
    protected function checkUser($email)
    {
        $sql = 'SELECT `email` FROM `users` WHERE `email`=?';
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute(array($email))) { // use array() for multiple parameters
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
}
