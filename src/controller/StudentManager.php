<?php
include_once "../database/DBconnect.php";
include_once "../Student.php";

class StudentManager
{
    protected $database;

    public function __construct()
    {
        $db = new DBconnect();
        $this->database = $db->connect();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM Students";
        $stmt = $this->database->query($sql);
        $result = $stmt->fetchAll();
        $arr = [];
        foreach ($result as $item) {
            $student = new Student($item["Name"], $item["Age"], $item["Address"]);
            $student->setId($item["Id"]);
            array_push($arr, $student);
        }
        return $arr;
    }
}