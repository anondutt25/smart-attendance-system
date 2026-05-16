<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
}

include "db.php";

?>

<!DOCTYPE html>
<html>
<head>

<title>Marks Report</title>

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

<div class="topbar">

<h2>Marks Report</h2>

</div>

<div class="card">

<table class="table">

<tr>

<th>ID</th>

<th>Student ID</th>

<th>Course</th>

<th>Mid</th>

<th>Final</th>

<th>Total</th>

<th>Grade</th>

<th>Action</th>

</tr>

<?php

$sql = "SELECT * FROM marks";

$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){

$total =
$row['mid_marks']
+
$row['final_marks'];


// Grade
if($total >= 80){
    $grade = "A+";
}
elseif($total >= 70){
    $grade = "A";
}
elseif($total >= 60){
    $grade = "B";
}
elseif($total >= 50){
    $grade = "C";
}
else{
    $grade = "F";
}

echo "<tr>

<td>".$row['id']."</td>

<td>".$row['student_id']."</td>

<td>".$row['course_name']."</td>

<td>".$row['mid_marks']."</td>

<td>".$row['final_marks']."</td>

<td>".$total."</td>

<td>".$grade."</td>

<td>

<a href='delete_marks.php?id=".$row['id']."'
onclick=\"return confirm('Delete Marks?')\">

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