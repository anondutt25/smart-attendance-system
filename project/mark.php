<?php
include "db.php";

$id = $_POST['student_id'];
$status = $_POST['status'];
$date = date("Y-m-d");

$check = "SELECT * FROM attendance 
          WHERE student_id='$id' AND date='$date'";
$res = mysqli_query($conn, $check);

if(mysqli_num_rows($res) > 0){
    header("Location: index.php?msg=already");
}else{
    $sql = "INSERT INTO attendance (student_id, date, status)
            VALUES ('$id', '$date', '$status')";
    mysqli_query($conn, $sql);

    header("Location: index.php?msg=success");
}
?>