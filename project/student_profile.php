<?php

session_start();

include "db.php";

if($_SESSION['role'] != "student"){

header("Location: login.php");

}

$student_id = $_SESSION['student_id'];

$sql = "SELECT * FROM marks

WHERE student_id='$student_id'";

$result = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>
<head>

<title>Student Profile</title>

<style>

body{

font-family:Arial;

background:#f1f5f9;

padding:40px;
}

.card{

background:white;

padding:30px;

border-radius:15px;

box-shadow:0 5px 15px rgba(0,0,0,0.2);
}

table{

width:100%;

border-collapse:collapse;

margin-top:20px;
}

th{

background:#2563eb;

color:white;

padding:12px;
}

td{

padding:10px;

border-bottom:1px solid #ddd;

text-align:center;
}

</style>

</head>
<body>

<div class="card">

<h2>
Student Profile
</h2>

<p>
Student ID:
<?php echo $student_id; ?>
</p>

<h3>
Exam Marks
</h3>

<table>

<tr>

<th>Course</th>

<th>Mid</th>

<th>Final</th>

</tr>

<?php

while($row = mysqli_fetch_assoc($result)){

echo "<tr>

<td>".$row['course_name']."</td>

<td>".$row['mid_marks']."</td>

<td>".$row['final_marks']."</td>

</tr>";
}

?>

</table>

</div>

</body>
</html>