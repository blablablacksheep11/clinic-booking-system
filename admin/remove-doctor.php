<?php
session_start();
include("../include/database.php");

$id = $_POST["id"];
$sql = "DELETE FROM doctor_info WHERE id = '$id'";
mysqli_query($connection, $sql);

$sql = "DELETE FROM appointment WHERE doctor_id = '$id'";
mysqli_query($connection, $sql);

?>