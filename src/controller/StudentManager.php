<?php
namespace Foder\controller;
use Foder\database\DBconnect;
use Foder\Student;

class  StudentManager
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
        $sql = "INSERT INTO `Students`(`Name`,`Age`,`Address`) VALUES (:Name,:Age,:Address) ";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':Name', $student->getName());
        $stmt->bindParam(':Age', $student->getAge());
        $stmt->bindParam(':Address', $student->getAddress());
        return $stmt->execute();
    }
    public function getData($id){
        $sql = "SELECT * FROM Students WHERE Id ='$id'";
        $stmt = $this->database->query($sql);
        $result = $stmt->fetch();
        $data = new Student($result["Name"], $result["Age"], $result["Address"]);
        return $data;
    }
    public function update($student){
        $sql =' UPDATE Students SET  Name= :Name, Age= :Age, Address= :Address WHERE Id= :Id';
        $stmt= $this->database->prepare($sql);
        $stmt->bindParam(':Id', $student->getId());
        $stmt->bindParam(':Name', $student->getName());
        $stmt->bindParam(':Age', $student->getAge());
        $stmt->bindParam(':Address', $student->getAddress());
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
        $stmt->bindValue(':name','%'.$name.'%');
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