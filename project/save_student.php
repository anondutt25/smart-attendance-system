<?php
include "db.php";

$id = $_POST['student_id'];
$name = $_POST['name'];
$dept = $_POST['department'];

$sql = "INSERT INTO students (student_id, name, department)
        VALUES ('$id', '$name', '$dept')";

mysqli_query($conn, $sql);

echo "Student Added!";
?>