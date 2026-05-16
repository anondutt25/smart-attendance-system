<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
}
include "db.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Attendance</title>
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
<!-- Main Content -->
<div class="main">

    <!-- Topbar -->
    <div class="topbar">
        <h2>Attendance Dashboard</h2>
    </div>

    <!-- Message Show -->
    <?php
    if(isset($_GET['msg'])){
        if($_GET['msg'] == 'success'){
            echo "<div class='card' style='color:green;'>Attendance Saved!</div>";
        }
        if($_GET['msg'] == 'already'){
            echo "<div class='card' style='color:red;'>Already Taken!</div>";
        }
    }
    ?>

    <!-- Attendance Form Card -->
    <div class="card">
        <h3>Take Attendance</h3>

        <form action="mark.php" method="POST">

            <!-- Student Dropdown -->
            <label>Student</label><br>
            <select name="student_id" required>
                <option value="">Select Student</option>
                <?php
                $res = mysqli_query($conn, "SELECT * FROM students");
                while($row = mysqli_fetch_assoc($res)){
                    echo "<option value='{$row['student_id']}'>{$row['name']}</option>";
                }
                ?>
            </select>

            <br><br>

            <!-- Status -->
            <label>Status</label><br>
            <select name="status" required>
                <option value="Present">Present</option>
                <option value="Absent">Absent</option>
            </select>

            <br><br>

            <!-- Submit Button -->
            <button class="btn">Submit</button>

        </form>
    </div>

</div>

</body>
</html>