<!DOCTYPE html>
<html>
<head>

<title>Login</title>

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

.container{

width:850px;

height:500px;

background:white;

border-radius:20px;

overflow:hidden;

display:flex;

box-shadow:0 10px 30px rgba(0,0,0,0.4);
}

/* Left */

.left{

width:50%;

background:linear-gradient(
135deg,
#2563eb,
#1e3a8a);

color:white;

display:flex;

flex-direction:column;

justify-content:center;

align-items:center;

padding:40px;
}

.left h1{

font-size:45px;

margin-bottom:20px;

text-align:center;
}

.left p{

font-size:18px;

text-align:center;
}

/* Right */

.right{

width:50%;

display:flex;

justify-content:center;

align-items:center;

background:#f8fafc;
}

.login-box{

width:80%;
}

.login-box h2{

font-size:35px;

margin-bottom:10px;

color:#1e3a8a;
}

.login-box p{

margin-bottom:25px;

color:gray;
}

.login-box input,
.login-box select{

width:100%;

padding:14px;

margin-bottom:20px;

border:1px solid #ccc;

border-radius:10px;

outline:none;
}

.login-box button{

width:100%;

padding:14px;

border:none;

border-radius:10px;

background:#2563eb;

color:white;

font-size:17px;

cursor:pointer;
}

</style>

</head>
<body>

<div class="container">

<div class="left">

<h1>
Smart Attendance System
</h1>

<p>
Admin and Student Portal
</p>

</div>

<div class="right">

<div class="login-box">

<h2>Login</h2>

<p>
Enter account details
</p>

<form action="login_process.php"
method="POST">

<select name="role">

<option value="admin">
Admin
</option>

<option value="student">
Student
</option>

</select>

<input type="text"
name="username"
placeholder="Username"
required>

<input type="password"
name="password"
placeholder="Password"
required>

<button type="submit">

Login

</button>

</form>

<br>

<p style="text-align:center;">

don't have an account?

<a href="register.php">

Create Account

</a>

</p>

</div>

</div>

</div>

</body>
</html>