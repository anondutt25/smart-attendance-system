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
    <title>Report</title>
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
        <h2>Attendance Report</h2>
    </div>

    <!-- Card -->
    <div class="card">

        <!-- Date Filter -->
        <form method="GET">

            <input type="date" name="date">

            <button class="btn">Search</button>

            <a href="report.php" class="btn">
                All
            </a>

        </form>

        <br>

        <!-- Table -->
        <table border="1" width="100%" cellpadding="10">

            <tr>
                <th>Name</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

<?php

if(isset($_GET['date']) && $_GET['date'] != ""){

    $date = $_GET['date'];

    $sql = "SELECT attendance.id,
            students.name,
            attendance.date,
            attendance.status

            FROM attendance

            JOIN students
            ON attendance.student_id = students.student_id

            WHERE attendance.date='$date'";

}else{

    $sql = "SELECT attendance.id,
            students.name,
            attendance.date,
            attendance.status

            FROM attendance

            JOIN students
            ON attendance.student_id = students.student_id

            ORDER BY attendance.date DESC";
}

$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){

    if($row['status'] == "Present"){
        $color = "green";
    }else{
        $color = "red";
    }

    echo "<tr>

            <td>{$row['name']}</td>

            <td>{$row['date']}</td>

            <td style='color:$color'>
                {$row['status']}
            </td>

            <td>

                <a href='delete.php?id={$row['id']}'
                onclick=\"return confirm('Delete attendance?')\">

                Delete

                </a>

            </td>

          </tr>";
}
?>

        </table>

    </div>

</div>

</body>
</html>