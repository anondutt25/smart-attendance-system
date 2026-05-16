<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

include "db.php";

if(isset($_POST['submit'])){

    $student_id = $_POST['student_id'];
    $course_name = $_POST['course_name'];
    $mid_marks = $_POST['mid_marks'];
    $final_marks = $_POST['final_marks'];

    $sql = "INSERT INTO marks
    (student_id, course_name, mid_marks, final_marks)

    VALUES
    ('$student_id', '$course_name',
    '$mid_marks', '$final_marks')";

    mysqli_query($conn, $sql);

    echo "<script>
    alert('Marks Added Successfully');
    </script>";
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Add Marks</title>

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

<!-- Main -->
<div class="main">

    <!-- Topbar -->
    <div class="topbar">

        <h2>Add Marks</h2>

    </div>

    <!-- Card -->
    <div class="card">

        <form method="POST">

            <label>Student ID</label>

            <input type="text"
            name="student_id"
            required>

            <br><br>

            <label>Course Name</label>

            <input type="text"
            name="course_name"
            required>

            <br><br>

            <label>Mid Exam Marks</label>

            <input type="number"
            name="mid_marks"
            required>

            <br><br>

            <label>Final Exam Marks</label>

            <input type="number"
            name="final_marks"
            required>

            <br><br>

            <button class="btn"
            name="submit">

            Add Marks

            </button>

        </form>

    </div>

</div>

</body>
</html>