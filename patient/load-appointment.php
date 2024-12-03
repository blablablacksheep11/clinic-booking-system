<?php
session_start();
include("../include/database.php");

if (isset($_POST["id"])) {
    $id = $_POST["id"];
    $sql = "DELETE FROM appointment WHERE id = '$id'";
    mysqli_query($connection, $sql);
} else {
    echo "<div id='appointment-title-container'>";
    echo "<label id='date-title'>Date</label>";
    echo "<label id='time-title'>Time</label>";
    echo "<label id='doctor-title'>Doctor</label>";
    echo "</div>";
    $counter = 2;
    $sql = "SELECT * FROM appointment WHERE status = 'Approved' AND patient_id = '".$_SESSION["patientid"]."' ORDER BY date";
    $result = mysqli_query($connection, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        if ($counter % 2 == 0) {
            $sql1 = "SELECT name FROM doctor_info WHERE id = '" . $row["doctor_id"] . "'";
            $result1 = mysqli_query($connection, $sql1);
            $doctorname = mysqli_fetch_assoc($result1);

            echo "<div class='appointment-item-even'>";
            echo "<p class='date-label'>" . $row["date"] . "</p>";
            echo "<p class='time-label'>" . $row['time'] . "</p>";
            echo "<p class='doctor-label'>Dr." . $doctorname['name'] . "</p>";
            echo "<button class='delete-btn' value='" . $row['id'] . "'>Delete</button>";
            echo "</div>";
            $counter += 1;
        } else {
            $sql1 = "SELECT name FROM doctor_info WHERE id = '" . $row["doctor_id"] . "'";
            $result1 = mysqli_query($connection, $sql1);
            $doctorname = mysqli_fetch_assoc($result1);
            echo "<div class='appointment-item-odd'>";
            echo "<p class='date-label'>" . $row['date'] . "</p>";
            echo "<p class='time-label'>" . $row['time'] . "</p>";
            echo "<p class='doctor-label'>Dr. " . $doctorname['name'] . "</p>";
            echo "<button class='delete-btn' value='" . $row['id'] . "'>Delete</button>";
            echo "</div>";
            $counter += 1;
        }
    }
}
