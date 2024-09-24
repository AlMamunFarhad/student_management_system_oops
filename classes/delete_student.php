<?php

include_once 'Database.php';
include_once 'Student.php';

$database = new Database();
$db = $database->getConnection();

$student = new Student($db);

if (isset($_GET['id'])) {
    $student->id = $_GET['id'];

    if ($student->delete()) {
        header("Location: ../index.php");
    } 
}
?>


