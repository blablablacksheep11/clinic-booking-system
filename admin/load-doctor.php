<?php
session_start();
include("../include/database.php");

if (isset($_POST["doctorid"])) {
    $doctorid = $_POST["doctorid"];
    $sql = "SELECT * FROM doctor_info WHERE id = '$doctorid'";
    $result = mysqli_query($connection, $sql);
    $valuereturned = mysqli_fetch_assoc($result);
    $_SESSION["doctorid"] = $valuereturned["id"];
    $_SESSION["doctorpicture"] = $valuereturned["picture"];
    $_SESSION["doctorname"] = $valuereturned["name"];
    $_SESSION["doctorspecialist"] = $valuereturned["specialist"];
    $_SESSION["doctordescription"] = $valuereturned["description"];
    $_SESSION["doctorselected"] = true;
    
} else if (isset($_SESSION["doctorselected"])) {
    echo "<div id='img-container'>";
    echo "<img src='../pic/" . $_SESSION["doctorpicture"] . "' alt='Dr " . $_SESSION["doctorname"] . "' id='img'>";
    echo "</div>";
    echo "<br>";
    echo "<b class='doctor-name'>" . $_SESSION["doctorname"] . "</b>";
    echo "<br>";
    echo "<p class='doctor-specialist'>" . $_SESSION["doctorspecialist"] . "</p>";
    echo "<br>";
    echo "<p class='doctor-description'>" . $_SESSION["doctordescription"] . "</p>";

    $_SESSION["doctorgetted"] = true;
    unset($_SESSION["doctorselected"]);
}
