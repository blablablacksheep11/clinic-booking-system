<?php
session_start();
include("../include/database.php");
include("../include/admin-navbar.php");
unset($_SESSION["dategetted"]);
unset($_SESSION["doctorgetted"]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--jQuery CDN-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <title>Healthsync</title>

    <style>
        @font-face {
            font-family: Montserrat;
            src: url(../font/Montserrat-VariableFont_wght.ttf);
        }

        @font-face {
            font-family: Roboto;
            src: url(../font/RobotoFlex-VariableFont_GRAD\,XOPQ\,XTRA\,YOPQ\,YTAS\,YTDE\,YTFI\,YTLC\,YTUC\,opsz\,slnt\,wdth\,wght.ttf);
        }

        body {
            background-color: rgba(244, 244, 244, 0.46);
        }

        body::-webkit-scrollbar {
            display: none;
        }

        .form-field {
            position: absolute;
            height: 16%;
            outline: none;
            border-radius: 5px;
            border: 1px solid grey;
            font-family: Roboto;
            font-size: 1.0rem;
            margin-top: 1%;
        }

        .form-label {
            color: grey;
            font-family: Roboto;
            font-size: 1.2rem;
            position: absolute;
        }

        .doctor-name {
            font-family: Roboto;
            position: absolute;
            top: 73%;
        }

        .doctor-specialist {
            font-family: Roboto;
            position: absolute;
            top: 75%;
        }

        .doctor-description {
            font-family: Roboto;
            position: absolute;
            top: 81%;
            font-size: 0.8rem;
        }

        .timeslot-btn-disabled {
            font-family: Roboto;
            width: 23%;
            height: 75%;
            background-color: #d9d9d9;
            color: white;
            border: none;
            border-radius: 10px;
        }

        .timeslot-btn-enabled {
            font-family: Roboto;
            width: 23%;
            height: 75%;
            background-color: #9dd1ea;
            color: white;
            border: none;
            border-radius: 10px;
        }

        .timeslot-btn-enabled:hover {
            background-color: #6fd0ff;
        }

        .timeslot-btn-selected {
            font-family: Roboto;
            width: 23%;
            height: 75%;
            background-color: #34BDFF;
            color: white;
            border: none;
            border-radius: 10px;
        }

        .submit-btn {
            position: absolute;
            height: 8%;
            width: 13%;
            top: 75%;
            left: 10%;
            background-color: #c9e6f3;
            color: white;
            border: none;
            border-radius: 10px;
            font-family: Roboto;
            display: none;
        }

        #heading {
            font-family: Roboto;
            position: absolute;
            top: 14%;
            left: 3%;
            font-size: 2.0rem;
            font-weight: 400;
        }

        #form-container {
            background-color: transparent;
            border: 0px solid black;
            position: absolute;
            top: 27%;
            left: 10%;
            height: 30%;
            width: 50%;
        }

        #date-field {
            width: 26%;
            padding-left: 2%;
        }

        #doctor-list {
            width: 98%;
            padding-left: 2%;
        }

        #doctor-container {
            position: absolute;
            top: 27%;
            left: 70%;
            border: 0px solid black;
            height: 65%;
            width: 16%;
        }

        #timeslot-container {
            position: absolute;
            top: 60%;
            left: 10%;
            border: 0px solid black;
            height: 18%;
            width: 49%;
            display: flex;
            flex-direction: column;
        }

        #row1 {
            width: 100%;
            height: 50%;
            background-color: transparent;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        #row2 {
            width: 100%;
            height: 50%;
            background-color: transparent;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        #img-container {
            position: absolute;
            width: 100%;
            height: 70%;
            border-radius: 10px;
            overflow: hidden;
        }

        #img {
            position: absolute;
            width: 100%;
            height: auto;
        }

        #appointment-nav-btn {
            border: 3px solid white;
            background-color: #9dbdea;
        }

        #appointment-nav-btn .svg {
            fill: white;
        }

        #appointment-nav-btn .nav-btn-label {
            color: white;
        }

        #appointment-nav-btn:hover {
            background-color: #70a5ef;
        }
    </style>
</head>

<body>
    <h1 id="heading">Appointment</h1>
    <div id="form-container">
        <form>
            <label for="patient-name-field" class="form-label">Patient</label>

            <br><br><br><br>
            <label for="date-field" class="form-label">Date:</label>
            <br>
            <input type="date" class="form-field" id="date-field">
            <br><br><br><br>
            <label for="doctor-list" class="form-label">Doctor:</label>
            <br>
            <select name="doctor" id="doctor-list" class="form-field">
                <option selected disabled>Select a doctor</option>
                <?php
                $sql = "SELECT * FROM doctor_info";
                $result = mysqli_query($connection, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <option value=<?php echo $row["id"]; ?>>Dr <?php echo $row["name"]; ?></option>
                <?php
                }
                if (isset($_SESSION["doctorselected"])) {
                    $doctorid = $_SESSION["doctorid"];
                    echo "<script>document.getElementById('doctor-list').value = '$doctorid';</script>";
                }
                ?>
            </select>
        </form>
    </div>
    <div id="doctor-container"></div>
    <div id="timeslot-container"></div>
    <form action="appointment.php" method="post">
        <input type="submit" class="submit-btn" id="submit-btn" value="Create Appointment" name="submit" disabled>
    </form>

    <script>
        $(document).ready(function() {
            $("#doctor-container").load("load-doctor.php");
            $(document).on("change", "#doctor-list", function(e) {
                e.preventDefault();
                $("#submit-btn").prop("disabled", true);
                $("#submit-btn").css("background-color", "#c9e6f3");
                $(document).off("mouseover", "#submit-btn");
                $(document).off("mouseout", "#submit-btn");
                var doctorid = $("#doctor-list").val();

                $.ajax({
                    url: "load-doctor.php",
                    method: "POST",
                    data: {
                        doctorid: doctorid
                    },
                    success: function() {
                        $("#doctor-container").load("load-doctor.php");
                        $("#timeslot-container").load("load-timeslot.php");
                    }
                })
            })

            $(document).on("change", "#date-field", function(e) {
                e.preventDefault();
                $("#submit-btn").prop("disabled", true);
                $("#submit-btn").css("background-color", "#c9e6f3");
                $(document).off("mouseover", "#submit-btn");
                $(document).off("mouseout", "#submit-btn");
                var date = $("#date-field").val();

                $.ajax({
                    url: "load-timeslot.php",
                    method: "POST",
                    data: {
                        date: date
                    },
                    success: function() {
                        $("#timeslot-container").load("load-timeslot.php");
                    }
                })
            })

            $(document).on("click", ".timeslot-btn-enabled", function(e) {
                e.preventDefault();
                $(".timeslot-btn-selected").removeClass("timeslot-btn-selected").addClass("timeslot-btn-enabled");
                $(this).removeClass("timeslot-btn-enabled").addClass("timeslot-btn-selected");
                var timeslot = $(this).val();

                $.ajax({
                    url: "set-time.php",
                    method: "POST",
                    data: {
                        timeslot: timeslot
                    },
                    success: function() {
                        $("#submit-btn").prop("disabled", false);
                        $("#submit-btn").css("background-color", "#9dd1ea");
                        $(document).on("mouseover", "#submit-btn", function() {
                            $("#submit-btn").css("background-color", "#84c8e8");
                        })
                        $(document).on("mouseout", "#submit-btn", function() {
                            $("#submit-btn").css("background-color", "#9dd1ea")
                        })
                    }
                })
            })

            $(document).on("click", ".timeslot-btn-selected", function(e) {
                e.preventDefault();
                $(this).removeClass("timeslot-btn-selected").addClass("timeslot-btn-enabled");
                $("#submit-btn").prop("disabled", true);
                $("#submit-btn").css("background-color", "#c9e6f3");
                $(document).off("mouseover", "#submit-btn");
                $(document).off("mouseout", "#submit-btn");
            })
        })
    </script>
</body>

</html>