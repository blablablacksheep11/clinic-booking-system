<?php
session_start();
include("../include/database.php");

if ($_POST["status"] == "accept") {
    $id = $_POST["id"];

    $sql = "UPDATE appointment SET status = 'Approved' WHERE id ='$id'";
    mysqli_query($connection, $sql);
} else if ($_POST["status"] == "reject") {
    $id = $_POST["id"];

    $sql = "DELETE FROM appointment WHERE id ='$id'";
    mysqli_query($connection, $sql);
}
