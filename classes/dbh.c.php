<?php

class Dbh
{
    private $servername;
    private $username;
    private $password;
    private $dbname;

    protected function __consruct()
    {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "root";
        $this->dbname = "prdctmgmt";
    }

    protected function connect()
    {
        try {
            $dsn = 'mysql:host=' . $this->servername . ';dbname=' . $this->dbname;
            $pdo = new PDO($dsn, $this->username, $this->password);

            return $pdo;
        } catch (PDOException $e) {
            print 'Error!' . $e->getMessage() . '<br>';
        }
    }
}
