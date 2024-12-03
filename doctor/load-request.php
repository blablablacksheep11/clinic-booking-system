<?php
session_start();
include("../include/database.php");


echo "<div id='appointment-title-container'>";
echo "<label id='date-title'>Date</label>";
echo "<label id='time-title'>Time</label>";
echo "<label id='doctor-title'>Patient</label>";
echo "</div>";
$counter = 2;
$sql = "SELECT * FROM appointment WHERE status = 'Pending' AND doctor_id = '" . $_SESSION["doctorid"] . "' ORDER BY date";
$result = mysqli_query($connection, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($counter % 2 == 0) {
            $sql1 = "SELECT name FROM patient_info WHERE id = '" . $row["patient_id"] . "'";
            $result1 = mysqli_query($connection, $sql1);
            $patientname = mysqli_fetch_assoc($result1);

            echo "<div class='appointment-item-even'>";
            echo "<p class='date-label'>" . $row["date"] . "</p>";
            echo "<p class='time-label'>" . $row['time'] . "</p>";
            echo "<p class='doctor-label'>" . $patientname['name'] . "</p>";
            echo "<button class='accept-btn' value='" . $row['id'] . "'>Accept</button>";
            echo "<button class='reject-btn' value='" . $row['id'] . "'>Reject</button>";
            echo "</div>";
            $counter += 1;
        } else {
            $sql1 = "SELECT name FROM patient_info WHERE id = '" . $row["patient_id"] . "'";
            $result1 = mysqli_query($connection, $sql1);
            $patientname = mysqli_fetch_assoc($result1);
            echo "<div class='appointment-item-odd'>";
            echo "<p class='date-label'>" . $row['date'] . "</p>";
            echo "<p class='time-label'>" . $row['time'] . "</p>";
            echo "<p class='doctor-label'>" . $patientname['name'] . "</p>";
            echo "<button class='accept-btn' value='" . $row['id'] . "'>Accept</button>";
            echo "<button class='reject-btn' value='" . $row['id'] . "'>Reject</button>";
            echo "</div>";
            $counter += 1;
        }
    }
} else {
    echo "<div id='empty-item'>";
    echo "<label id='empty-label'>No appointment request found</label>";
    echo "</div>";
}
