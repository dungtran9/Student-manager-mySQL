<?php
include_once "src/Student.php";
include_once "src/controller/StudentManager.php";
include_once "src/database/DBconnect.php";
$studentManager = new StudentManager();
$students = $studentManager->getAll();

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
    <form method="get" action="action/search.php">
        <input type="text" name="search" placeholder="search with Name">
        <input type="submit" value="Search">
    </form>
    <tr>
        <th>Stt</th>
        <th>Id</th>
        <th>Name</th>
        <th>Age</th>
        <th>Address</th>
        <td colspan="2"><a href="action/add.php">Add</a></td>

    </tr>
    <?php foreach ($students as $key => $student): ?>
        <tr>
            <td><?php echo ++$key ?></td>
            <td><?php echo $student->getId() ?></td>
            <td><?php echo $student->getName() ?></td>
            <td><?php echo $student->getAge() ?></td>
            <td><?php echo $student->getAddress() ?></td>
            <td><a onclick="return confirm('update?')" href="action/update.php?id=<?php echo $student->getId()?>">Update</a></td>

            <td><a onclick="return confirm('ban chac chan muon xoa?')" href="action/delete.php?id=<?php echo $student->getId()?>">Delete</a></td>

        </tr>
    <?php endforeach; ?>

</table>

</body>
</html>
