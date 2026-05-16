<?php

include "db.php";

$id = $_GET['id'];

$sql = "DELETE FROM marks WHERE id='$id'";

mysqli_query($conn, $sql);

header("Location: marks_report.php");

?>