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
    <title>Percentage</title>
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
        <h2>Attendance Percentage</h2>
    </div>

    <!-- Card -->
    <div class="card">

        <table border="1" width="100%" cellpadding="10">
            <tr>
                <th>Student ID</th>
                <th>Total Class</th>
                <th>Present</th>
                <th>Percentage</th>
            </tr>

<?php
$sql = "SELECT student_id,
        COUNT(*) as total,
        SUM(status='Present') as present
        FROM attendance
        GROUP BY student_id";

$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){
    $percent = ($row['present'] / $row['total']) * 100;

    echo "<tr>
            <td>{$row['student_id']}</td>
            <td>{$row['total']}</td>
            <td>{$row['present']}</td>
            <td>".round($percent,2)."%</td>
          </tr>";
}
?>

        </table>

    </div>

</div>

</body>
</html>