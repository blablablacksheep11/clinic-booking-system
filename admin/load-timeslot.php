<?php
session_start();
include("../include/database.php");

if (isset($_POST['date'])) {
    $_SESSION["date"] = $_POST['date'];
    $_SESSION["dategetted"] = true;
    $_SESSION["appointmentdate2"] = $_POST['date'];
} else if ((isset($_SESSION["dategetted"]) && isset($_SESSION["doctorgetted"])) && isset($_SESSION["appointmenttime"])) {

    //first time run
    if (!isset($_SESSION['date']) && !isset($_SESSION['timeslot'])) {
        $date = $_SESSION["appointmentdate"];
        $doctorid = (int)$_SESSION["doctorid"];
        $unavailabletimeslot = [];

        $sql = "SELECT time FROM appointment WHERE date = '$date' AND doctor_id = '$doctorid'";
        $result = mysqli_query($connection, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $unavailabletimeslot[] = $row["time"];
        }

        echo "<div id='row1'>";

        $timeslots = ["9:00a.m. - 9:30a.m.", "9:30a.m. - 10:00a.m.", "10:00a.m. - 10:30a.m.", "10:30a.m. - 11:00a.m."];
        foreach ($timeslots as $timeslot) {
            if ((in_array($timeslot, $unavailabletimeslot)) && $timeslot == $_SESSION["appointmenttime"]) {
                echo "<button class='timeslot-btn-selected' value='$timeslot'>{$timeslot}</button>";
            } else if (in_array($timeslot, $unavailabletimeslot)) {
                echo "<button class='timeslot-btn-disabled' value='$timeslot'>{$timeslot}</button>";
            } else {
                echo "<button class='timeslot-btn-enabled' value='$timeslot'>{$timeslot}</button>";
            }
        }
        echo "</div>";
        echo "<div id='row2'>";
        $timeslots = ["11:00a.m. - 11:30a.m.", "11:30a.m. - 12:00p.m.", "2:00p.m. - 2:30p.m.", "2:30p.m. - 3:00p.m."];
        foreach ($timeslots as $timeslot) {
            if ((in_array($timeslot, $unavailabletimeslot)) && $timeslot == $_SESSION["appointmenttime"]) {
                echo "<button class='timeslot-btn-selected' value='$timeslot'>{$timeslot}</button>";
            } else if (in_array($timeslot, $unavailabletimeslot)) {
                echo "<button class='timeslot-btn-disabled' value='$timeslot'>{$timeslot}</button>";
            } else {
                echo "<button class='timeslot-btn-enabled' value='$timeslot'>{$timeslot}</button>";
            }
        }
        echo "</div>";
    } 
    
    //if only date changed but time not reselected
    else if (isset($_SESSION['date']) && !isset($_SESSION['timeslot'])) {
        $date = $_SESSION["date"];
        $doctorid = (int)$_SESSION["doctorid"];
        $unavailabletimeslot = [];

        $sql = "SELECT time FROM appointment WHERE date = '$date' AND doctor_id = '$doctorid'";
        $result = mysqli_query($connection, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $unavailabletimeslot[] = $row["time"];
        }

        echo "<div id='row1'>";

        $timeslots = ["9:00a.m. - 9:30a.m.", "9:30a.m. - 10:00a.m.", "10:00a.m. - 10:30a.m.", "10:30a.m. - 11:00a.m."];
        foreach ($timeslots as $timeslot) {
            if ((in_array($timeslot, $unavailabletimeslot)) && $timeslot == $_SESSION["appointmenttime"]) {
                echo "<button class='timeslot-btn-selected' value='$timeslot'>{$timeslot}</button>";
            } else if (in_array($timeslot, $unavailabletimeslot)) {
                echo "<button class='timeslot-btn-disabled' value='$timeslot'>{$timeslot}</button>";
            } else {
                echo "<button class='timeslot-btn-enabled' value='$timeslot'>{$timeslot}</button>";
            }
        }
        echo "</div>";
        echo "<div id='row2'>";
        $timeslots = ["11:00a.m. - 11:30a.m.", "11:30a.m. - 12:00p.m.", "2:00p.m. - 2:30p.m.", "2:30p.m. - 3:00p.m."];
        foreach ($timeslots as $timeslot) {
            if ((in_array($timeslot, $unavailabletimeslot)) && $timeslot == $_SESSION["appointmenttime"]) {
                echo "<button class='timeslot-btn-selected' value='$timeslot'>{$timeslot}</button>";
            } else if (in_array($timeslot, $unavailabletimeslot)) {
                echo "<button class='timeslot-btn-disabled' value='$timeslot'>{$timeslot}</button>";
            } else {
                echo "<button class='timeslot-btn-enabled' value='$timeslot'>{$timeslot}</button>";
            }
        }
        echo "</div>";
    } 
    
    //if both date and time got reselected
    else if (isset($_SESSION['date']) && isset($_SESSION['timeslot'])) {
        $date = $_SESSION["date"];
        $doctorid = (int)$_SESSION["doctorid"];
        $unavailabletimeslot = [];

        $sql = "SELECT time FROM appointment WHERE date = '$date' AND doctor_id = '$doctorid'";
        $result = mysqli_query($connection, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $unavailabletimeslot[] = $row["time"];
        }

        echo "<div id='row1'>";

        $timeslots = ["9:00a.m. - 9:30a.m.", "9:30a.m. - 10:00a.m.", "10:00a.m. - 10:30a.m.", "10:30a.m. - 11:00a.m."];
        foreach ($timeslots as $timeslot) {
            if ((in_array($timeslot, $unavailabletimeslot)) && $timeslot == $_SESSION["appointmenttime"]) {
                echo "<button class='timeslot-btn-selected' value='$timeslot'>{$timeslot}</button>";
            } else if (in_array($timeslot, $unavailabletimeslot)) {
                echo "<button class='timeslot-btn-disabled' value='$timeslot'>{$timeslot}</button>";
            } else {
                echo "<button class='timeslot-btn-enabled' value='$timeslot'>{$timeslot}</button>";
            }
        }
        echo "</div>";
        echo "<div id='row2'>";
        $timeslots = ["11:00a.m. - 11:30a.m.", "11:30a.m. - 12:00p.m.", "2:00p.m. - 2:30p.m.", "2:30p.m. - 3:00p.m."];
        foreach ($timeslots as $timeslot) {
            if ((in_array($timeslot, $unavailabletimeslot)) && $timeslot == $_SESSION["appointmenttime"]) {
                echo "<button class='timeslot-btn-selected' value='$timeslot'>{$timeslot}</button>";
            } else if (in_array($timeslot, $unavailabletimeslot)) {
                echo "<button class='timeslot-btn-disabled' value='$timeslot'>{$timeslot}</button>";
            } else {
                echo "<button class='timeslot-btn-enabled' value='$timeslot'>{$timeslot}</button>";
            }
        }
        echo "</div>";

    } 
    
    //if only timeslot reselected but date not changed
    else if (!isset($_SESSION['date']) && isset($_SESSION['timeslot'])) {
        $date = $_SESSION["appointmentdate"];
        $doctorid = (int)$_SESSION["doctorid"];
        $unavailabletimeslot = [];

        $sql = "SELECT time FROM appointment WHERE date = '$date' AND doctor_id = '$doctorid'";
        $result = mysqli_query($connection, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $unavailabletimeslot[] = $row["time"];
        }

        echo "<div id='row1'>";

        $timeslots = ["9:00a.m. - 9:30a.m.", "9:30a.m. - 10:00a.m.", "10:00a.m. - 10:30a.m.", "10:30a.m. - 11:00a.m."];
        foreach ($timeslots as $timeslot) {
            if ((in_array($timeslot, $unavailabletimeslot)) && $timeslot == $_SESSION["appointmenttime"]) {
                echo "<button class='timeslot-btn-selected' value='$timeslot'>{$timeslot}</button>";
            } else if (in_array($timeslot, $unavailabletimeslot)) {
                echo "<button class='timeslot-btn-disabled' value='$timeslot'>{$timeslot}</button>";
            } else {
                echo "<button class='timeslot-btn-enabled' value='$timeslot'>{$timeslot}</button>";
            }
        }
        echo "</div>";
        echo "<div id='row2'>";
        $timeslots = ["11:00a.m. - 11:30a.m.", "11:30a.m. - 12:00p.m.", "2:00p.m. - 2:30p.m.", "2:30p.m. - 3:00p.m."];
        foreach ($timeslots as $timeslot) {
            if ((in_array($timeslot, $unavailabletimeslot)) && $timeslot == $_SESSION["appointmenttime"]) {
                echo "<button class='timeslot-btn-selected' value='$timeslot'>{$timeslot}</button>";
            } else if (in_array($timeslot, $unavailabletimeslot)) {
                echo "<button class='timeslot-btn-disabled' value='$timeslot'>{$timeslot}</button>";
            } else {
                echo "<button class='timeslot-btn-enabled' value='$timeslot'>{$timeslot}</button>";
            }
        }
        echo "</div>";
    } 
}
