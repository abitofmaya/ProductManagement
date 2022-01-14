<?php

class SignUpCtrl extends SignUp
{
    private $uname;
    private $pwd;
    private $email;

    public function __construct($uname, $pwd, $email)
    {
        parent::__consruct();
        $this->uname = $uname;
        $this->pwd = $pwd;
        $this->email = $email;
    }

    public function signUpUser()
    {
        if ($this->emptyInput() == false) {
            header('location: ../index.php?error=emptyinput');
            exit();
        }
        if ($this->invalidUname() == false) {
            header('location: ../index.php?error=invalidUsername');
            exit();
        }
        if ($this->invalidEmail() == false) {
            header('location: ../index.php?error=invalidEmail');
            exit();
        }
        if ($this->existCheck() == false) {
            header('location: ../index.php?error=alreadyRegistered');
            exit();
        }
        $this->setUser($this->uname, $this->pwd, $this->email);
    }

    // Check for empty submission
    private function emptyInput()
    {
        if ((empty($this->uname) || empty($this->pwd) || empty($this->email))) {
            return false;
        }
        return true;
    }

    // Check for invalid username; lowercase letters and numbers only; length 32 charachers
    private function invalidUname()
    {
        if (!preg_match("/^[a-z][a-z0-9]{7,31}$/", $this->uname)) {
            return false;
        }
        return true;
    }

    // Email validation
    private function invalidEmail()
    {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }

    // Check if email already registered
    private function existCheck()
    {
        if (!$this->checkUser($this->email)) {
            return false;
        }
        return true;
    }
}
