<?php
session_start();
include("../include/database.php");

if (isset($_POST["timeslot"])) {
    $_SESSION["timeslot"] = $_POST["timeslot"];
    $_SESSION["appointmenttime2"] = $_POST["timeslot"];
}
