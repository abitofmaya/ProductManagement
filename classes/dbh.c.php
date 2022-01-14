<?php

class Dbh
{
    private $servername;
    private $username;
    private $password;
    private $dbname;

    public function __consruct()
    {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "root";
        $this->dbname = "prdctmgmt";
    }

    protected function connect()
    {

        try {
            $dbh = new PDO('mysql:host=' . $this->servername . ';dbname=' . $this->dbname, $this->username, $this->password);
            return $dbh;
        } catch (PDOException $e) {
            print 'Error!' . $e->getMessage() . '<br>';
        }
    }
}
