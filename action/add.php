<?php
use Foder\controller\StudentManager;
use Foder\Student;
require_once '../vendor/autoload.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $student = new Student($name, $age, $address);
    $studentDB = new StudentManager();
    $studentDB->add($student);
    header("Location:../index.php");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post" >
<label>Name</label>
<input type="text" name="name" required><br>
<label>Age</label>
<input type="text" name="age" required><br>
<label>Address</label>
<input type="text" name="address" required><br>
<input type="submit" value="ADD">
</form>
</body>
</html>