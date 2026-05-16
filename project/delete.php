<?php

include "db.php";

$id = $_GET['id'];

$sql = "DELETE FROM attendance WHERE id='$id'";

mysqli_query($conn, $sql);

header("Location: report.php");

?>