<?php
use Foder\controller\StudentManager;

require_once '../vendor/autoload.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $name = $_REQUEST["search"];
    if (empty($name)) {
        header("location: ../index.php");
    } else {
        $studentManager = new StudentManager();
        $students = $studentManager->search($name);
    }
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
<table border="1">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Age</th>
        <th>Address</th>
    </tr>
    <?php foreach ($students as $key => $student): ?>
        <tr>
            <td><?php echo ++$key ?></td>
            <td><?php echo $student->getName() ?></td>
            <td><?php echo $student->getAge() ?></td>
            <td><?php echo $student->getAddress() ?></td>

        </tr>
    <?php endforeach; ?>

</table>
</body>
</html>
