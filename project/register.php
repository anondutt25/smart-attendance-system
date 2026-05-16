<?php

include "db.php";

if(isset($_POST['submit'])){

$username = $_POST['username'];

$password = $_POST['password'];

$student_id = $_POST['student_id'];


// Insert user
$sql = "INSERT INTO users
(username,password,role,student_id)

VALUES
('$username','$password',
'student','$student_id')";

mysqli_query($conn,$sql);

echo "<script>

alert('Account Created Successfully');

window.location='login.php';

</script>";

}

?>

<!DOCTYPE html>
<html>
<head>

<title>Create Account</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial;
}

body{

height:100vh;

display:flex;

justify-content:center;

align-items:center;

background:linear-gradient(
135deg,
#0f172a,
#2563eb);
}

.card{

width:400px;

background:white;

padding:40px;

border-radius:20px;

box-shadow:0 10px 30px rgba(0,0,0,0.3);
}

.card h2{

text-align:center;

margin-bottom:25px;

color:#1e3a8a;
}

.card input{

width:100%;

padding:14px;

margin-bottom:20px;

border:1px solid #ccc;

border-radius:10px;

outline:none;
}

.card button{

width:100%;

padding:14px;

border:none;

border-radius:10px;

background:#2563eb;

color:white;

font-size:16px;

cursor:pointer;
}

.card button:hover{

background:#1e40af;
}

</style>

</head>
<body>

<div class="card">

<h2>
Create Student Account
</h2>

<form method="POST">

<input type="text"
name="student_id"
placeholder="Student ID"
required>

<input type="text"
name="username"
placeholder="Username"
required>

<input type="password"
name="password"
placeholder="Password"
required>

<button name="submit">

Create Account

</button>

</form>

</div>

</body>
</html>