<?php
session_start();
include("../include/database.php");


echo "<div id='appointment-title-container'>";
echo "<label id='date-title'>Date</label>";
echo "<label id='time-title'>Time</label>";
echo "<label id='patient-title'>Patient</label>";
echo "<label id='doctor-title'>Doctor</label>";
echo "<button id='request-btn'>View Request</button>";
echo "</div>";
$counter = 2;
$sql = "SELECT * FROM appointment WHERE status = 'Approved' ORDER BY date";
$result = mysqli_query($connection, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($counter % 2 == 0) {
            $sql1 = "SELECT name FROM patient_info WHERE id = '" . $row["patient_id"] . "'";
            $result1 = mysqli_query($connection, $sql1);
            $patientname = mysqli_fetch_assoc($result1);

            $sql2 = "SELECT name FROM doctor_info WHERE id = '" . $row["doctor_id"] . "'";
            $result2 = mysqli_query($connection, $sql2);
            $doctorname = mysqli_fetch_assoc($result2);

            echo "<div class='appointment-item-even'>";
            echo "<p class='date-label'>" . $row["date"] . "</p>";
            echo "<p class='time-label'>" . $row['time'] . "</p>";
            echo "<p class='patient-label'>" . $patientname['name'] . "</p>";
            echo "<p class='doctor-label'>" . $doctorname['name'] . "</p>";
            echo "<button type='submit' class='delete-btn' name='delete' value='" . $row['id'] . "'>Delete</button>";
            echo "<form action='appointment.php' method='post' id='form'>";
            echo "<button type='submit' class='edit-btn' name='edit' value='" . $row['id'] . "'>Edit</button>";
            echo "</form>";
            echo "</div>";
            $counter += 1;
        } else {
            $sql1 = "SELECT name FROM patient_info WHERE id = '" . $row["patient_id"] . "'";
            $result1 = mysqli_query($connection, $sql1);
            $patientname = mysqli_fetch_assoc($result1);

            $sql2 = "SELECT name FROM doctor_info WHERE id = '" . $row["doctor_id"] . "'";
            $result2 = mysqli_query($connection, $sql2);
            $doctorname = mysqli_fetch_assoc($result2);

            echo "<div class='appointment-item-odd'>";
            echo "<p class='date-label'>" . $row['date'] . "</p>";
            echo "<p class='time-label'>" . $row['time'] . "</p>";
            echo "<p class='patient-label'>" . $patientname['name'] . "</p>";
            echo "<p class='doctor-label'>" . $doctorname['name'] . "</p>";
            echo "<button type='submit' class='delete-btn' name='delete' value='" . $row['id'] . "'>Delete</button>";
            echo "<form action='appointment.php' method='post' id='form'>";
            echo "<button type='submit' class='edit-btn' name='edit' value='" . $row['id'] . "'>Edit</button>";
            echo "</form>";
            echo "</div>";
            $counter += 1;
        }
    }
    echo "<script>document.getElementById('request-btn').addEventListener('click', function(){window.location.href = 'request.php';})</script>";
} else {
    echo "<div id='empty-item'>";
    echo "<label id='empty-label'>No upcoming appointment</label>";
    echo "</div>";
    echo "<script>document.getElementById('request-btn').addEventListener('click', function(){window.location.href = 'request.php';})</script>";
}
