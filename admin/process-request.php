<?php
session_start();
include("../include/database.php");

if (isset($_POST["approveid"])) {
    $id = $_POST["approveid"];
    $sql = "DELETE FROM appointment WHERE id = '$id'";
    mysqli_query($connection, $sql);
} else if (isset($_POST["rejectid"])) {
    $id = $_POST["rejectid"];
    $sql = "UPDATE appointment SET requested = '0' WHERE id = '$id'";
    mysqli_query($connection, $sql);
}
