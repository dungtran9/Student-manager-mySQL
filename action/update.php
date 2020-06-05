<?php
use Foder\controller\StudentManager;
use Foder\Student;
require_once '../vendor/autoload.php';
$id=$_REQUEST['id'];
$studentManager = new StudentManager();
$result = $studentManager->getData($id);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
   $student01=new Student($name,$age,$address);
   $student01->setId($id);
    $studentManager->update($student01);
    header("location: ../index.php");
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
<form method="post">
    Name:
    <input type="text" name="name"  value="<?php echo $result->getName();?>"><br>
    Age:
    <input type="text" name="age" value="<?php echo $result->getAge();?>"><br>
    Address:
    <input type="text" name="address" value="<?php echo $result->getAddress();?>"><br>
    <input type="submit" name="update" value="update">
</form>

</body>
</html>
