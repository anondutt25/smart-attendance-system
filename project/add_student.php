<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "db.php";

if(isset($_POST['submit'])){

    $id = $_POST['student_id'];
    $name = $_POST['name'];
    $dept = $_POST['department'];

    $sql = "INSERT INTO students(student_id,name,department)
            VALUES('$id','$name','$dept')";

    mysqli_query($conn,$sql);

    echo "Student Added Successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Student</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">

    <h2>Attendance</h2>

    <a href="index.php">📊 Dashboard</a>

    <a href="report.php">📋 Report</a>

    <a href="percentage.php">📈 Percentage</a>

    <a href="add_student.php">+ Add Student</a>

    <a href="marks.php">📝 Add Marks</a>

    <a href="marks_report.php">📄 Marks Report</a>

    <a href="logout.php">🚪 Logout</a>

</div>

<div class="main">

<div class="topbar">
    <h2>Add Student</h2>
</div>

<div class="card">

<form method="POST">

<input type="text"
name="student_id"
placeholder="Student ID"
required>

<br><br>

<input type="text"
name="name"
placeholder="Student Name"
required>

<br><br>

<input type="text"
name="department"
placeholder="Department"
required>

<br><br>

<button class="btn"
name="submit">
Add Student
</button>

</form>

</div>

</div>

</body>
</html>