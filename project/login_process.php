<?php

session_start();

include "db.php";

$username = $_POST['username'];

$password = $_POST['password'];

$role = $_POST['role'];

$sql = "SELECT * FROM users

WHERE username='$username'

AND password='$password'

AND role='$role'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){

$row = mysqli_fetch_assoc($result);

$_SESSION['user'] = $username;

$_SESSION['role'] = $role;

$_SESSION['student_id'] =
$row['student_id'];


// Admin
if($role == "admin"){

header("Location: index.php");

}

// Student
else{

header("Location: student_profile.php");

}

}

else{

echo "Invalid Login";

}

?>