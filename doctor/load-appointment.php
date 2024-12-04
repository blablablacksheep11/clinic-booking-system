<?php
session_start();
include("../include/database.php");


echo "<div id='appointment-title-container'>";
echo "<label id='date-title'>Date</label>";
echo "<label id='time-title'>Time</label>";
echo "<label id='patient-title'>Patient</label>";
echo "<button id='request-btn'>View Request</button>";
echo "</div>";
$counter = 2;
$sql = "SELECT * FROM appointment WHERE status = 'Approved' AND doctor_id = '" . $_SESSION["doctorid"] . "' ORDER BY date";
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
            echo "<p class='patient-label'>" . $patientname['name'] . "</p>";
            echo "<form action='schedule.php' method='post' id='form'>";
            if ($row["requested"] == "0") {
                echo "<button type='submit' class='delete-btn' name='delete' value='" . $row['id'] . "'>Delete</button>";
            } else if ($row["requested"] == "1") {
                echo "<button type='submit' class='delete-btn' name='delete' value='" . $row['id'] . "'>Request Again</button>";
            }
            echo "</form>";
            echo "</div>";
            $counter += 1;
        } else {
            $sql1 = "SELECT name FROM patient_info WHERE id = '" . $row["patient_id"] . "'";
            $result1 = mysqli_query($connection, $sql1);
            $patientname = mysqli_fetch_assoc($result1);
            echo "<div class='appointment-item-odd'>";
            echo "<p class='date-label'>" . $row['date'] . "</p>";
            echo "<p class='time-label'>" . $row['time'] . "</p>";
            echo "<p class='patient-label'>" . $patientname['name'] . "</p>";
            echo "<form action='schedule.php' method='post' id='form'>";
            if ($row["requested"] == "0") {
                echo "<button type='submit' class='delete-btn' name='delete' value='" . $row['id'] . "'>Delete</button>";
            } else if ($row["requested"] == "1") {
                echo "<button type='submit' class='delete-btn' name='delete' value='" . $row['id'] . "'>Request Again</button>";
            }
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
}
