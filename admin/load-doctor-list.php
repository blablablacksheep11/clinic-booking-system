<?php
session_start();
include("../include/database.php");


echo "<div id='appointment-title-container'>";
echo "<label id='id-title'>Id</label>";
echo "<label id='name-title'>Name</label>";
echo "<label id='specialist-title'>Specialist</label>";
echo "<button id='new-btn'>New</button>";
echo "</div>";
$counter = 2;
$sql = "SELECT * FROM doctor_info ORDER BY id";
$result = mysqli_query($connection, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($counter % 2 == 0) {
            echo "<div class='appointment-item-even'>";
            echo "<p class='id-label'>" . $row["id"] . "</p>";
            echo "<p class='name-label'>" . $row['name'] . "</p>";
            echo "<p class='specialist-label'>" . $row['specialist'] . "</p>";
            echo "<button type='submit' class='remove-btn' name='remove' value='" . $row['id'] . "'>Remove</button>";
            echo "<form action='doctor.php' method='post' id='form'>";
            echo "<button type='submit' class='edit-btn' name='edit' value='" . $row['id'] . "'>Edit</button>";
            echo "</form>";
            echo "</div>";
            $counter += 1;
        } else {
            echo "<div class='appointment-item-odd'>";
            echo "<p class='id-label'>" . $row['id'] . "</p>";
            echo "<p class='name-label'>" . $row['name'] . "</p>";
            echo "<p class='specialist-label'>" . $row['specialist'] . "</p>";
            echo "<button type='submit' class='remove-btn' name='remove' value='" . $row['id'] . "'>Remove</button>";
            echo "<form action='doctor.php' method='post' id='form'>";
            echo "<button type='submit' class='edit-btn' name='edit' value='" . $row['id'] . "'>Edit</button>";
            echo "</form>";
            echo "</div>";
            $counter += 1;
        }
    }
    echo "<script>document.getElementById('request-btn').addEventListener('click', function(){window.location.href = 'request.php';})</script>";
} else {
    echo "<div id='empty-item'>";
    echo "<label id='empty-label'>No doctor found</label>";
    echo "</div>";
}
