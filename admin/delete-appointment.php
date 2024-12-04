<?php
session_start();
include("../include/database.php");
include("../include/admin-navbar.php");

$id = $_POST["id"];

$sql = "DELETE FROM appointment WHERE id = '$id'";
mysqli_query($connection, $sql);
?>