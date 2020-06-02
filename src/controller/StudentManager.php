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

    public function add($student)
    {
        $sql = "INSERT INTO `Students`(`Name`,`Age`,`Address`) VALUES (?,?,?) ";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(1, $student->getName());
        $stmt->bindParam(2, $student->getAge());
        $stmt->bindParam(3, $student->getAddress());
        return $stmt->execute();
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM Students WHERE Id= :Id';
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam('Id', $id);
         $stmt->execute();
    }

    public function search($name)

    {
        $sql = 'SELECT * FROM `Students` WHERE `Name` LIKE :name';
        $stmt = $this->database->prepare($sql);
        $stmt->bindValue(":name",'%'.$name.'%');
        $stmt->execute();
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