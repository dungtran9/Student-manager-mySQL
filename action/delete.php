<?php
include_once "../src/controller/StudentManager.php";
include_once  "../src/database/DBconnect.php";
include_once  "../src/Student.php";
$id=$_REQUEST["id"];
$studentManager = new StudentManager();
$studentManager->delete($id);
header("location: ../index.php");
