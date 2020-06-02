<?php

class DBconnect
{
    protected $dsn;
    protected $username;
    protected $password;

    public function __construct()
    {
        $this->dsn = "mysql:host=localhost;dbname=Students_manager";
        $this->username = "root";
        $this->password = "Anhquan123@";
    }

    public function connect()
    {
        try {
            return new PDO($this->dsn, $this->username, $this->password);
        }catch (PDOException $exception) {
            echo  $exception->getMessage();
            exit();
        }
    }
}