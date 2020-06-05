<?php

use Foder\controller\StudentManager;

require_once '../vendor/autoload.php';
$id=$_REQUEST["id"];
$studentManager = new StudentManager();
$studentManager->delete($id);
header("location: ../index.php");
