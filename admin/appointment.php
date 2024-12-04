<?php
session_start();
include("../include/database.php");
include("../include/admin-navbar.php");

if(isset($_POST["edit"])){
    $id = $_POST["edit"];

    $sql = "SELECT * FROM appointment WHERE id = '$id'";
    $result = mysqli_query($connection, $sql);
    $valuereturned = mysqli_fetch_assoc($result);

    $_SESSION["appointmentdate"] = $valuereturned["date"];
    $_SESSION["appointmenttime"] = $valuereturned["time"];
    $_SESSION["appointmentpatientid"] = $valuereturned["patient_id"];
    $_SESSION["appointmentdoctorid"] = $valuereturned["doctor_id"];

    echo "<script>window.location.href = 'edit-appointment.php';</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--jQuery CDN-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <title>Document</title>
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
            display: flex;
            justify-content: center;
        }

        body::-webkit-scrollbar {
            display: none;
        }

        .appointment-item-even {
            position: relative;
            background-color: #d9d9d9;
            height: 7vh;
            width: 100%;
            display: flex;
            align-items: center;
        }

        .appointment-item-odd {
            position: relative;
            background-color: rgba(217, 217, 217, 0.56);
            height: 7vh;
            width: 100%;
            display: flex;
            align-items: center;
        }

        .date-label {
            position: absolute;
            left: 2%;
            font-family: Roboto;
            font-size: 1.0rem;
        }

        .time-label {
            position: absolute;
            left: 15%;
            font-family: Roboto;
            font-size: 1.0rem;
        }

        .patient-label {
            position: absolute;
            left: 35%;
            font-family: Roboto;
            font-size: 1.0rem;
        }

        .doctor-label {
            position: absolute;
            left: 53%;
            font-family: Roboto;
            font-size: 1.0rem;
        }

        .delete-btn {
            position: absolute;
            height: 60%;
            width: 7%;
            left: 91%;
            background-color: #ea9d9d;
            color: white;
            border: none;
            border-radius: 10px;
            font-family: Roboto;
        }

        .delete-btn:hover {
            background-color: #ff6f6f;
        }

        .edit-btn {
            position: absolute;
            height: 100%;
            width: 100%;
            background-color: #9deab0;
            color: white;
            border: none;
            border-radius: 10px;
            font-family: Roboto;
        }

        .edit-btn:hover {
            background-color: #6fff75;
        }

        #form {
            position: absolute;
            height: 60%;
            width: 7%;
            left: 83%;
        }

        #request-btn {
            position: absolute;
            height: 60%;
            width: 10%;
            left: 89%;
            top: 0%;
            background-color: #9dd1ea;
            color: white;
            border: none;
            border-radius: 10px;
            font-family: Roboto;
        }

        #request-btn:hover {
            background-color: #84c8e8;
        }

        #heading {
            font-family: Roboto;
            position: absolute;
            top: 14%;
            left: 3%;
            font-size: 2.0rem;
            font-weight: 400;
        }

        #content-container {
            background-color: transparent;
            border: 0px solid black;
            position: absolute;
            top: 22%;
            height: fit-content;
            width: 75%;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        #appointment-title-container {
            position: relative;
            background-color: transparent;
            height: 7vh;
            width: 100%;
            border: none;
        }

        #date-title {
            position: absolute;
            bottom: 10%;
            left: 2%;
            font-family: Roboto;
            font-size: 1.0rem;
        }

        #time-title {
            position: absolute;
            bottom: 10%;
            left: 15%;
            font-family: Roboto;
            font-size: 1.0rem;
        }

        #patient-title {
            position: absolute;
            bottom: 10%;
            left: 35%;
            font-family: Roboto;
            font-size: 1.0rem;
        }

        #doctor-title {
            position: absolute;
            bottom: 10%;
            left: 53%;
            font-family: Roboto;
            font-size: 1.0rem;
        }

        #create-btn:hover {
            background-color: #84c8e8;
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

        #empty-item {
            position: relative;
            background-color: #f1f1f1;
            height: 7vh;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #empty-label {
            position: absolute;
            font-family: Roboto;
        }
    </style>
</head>

<body>
    <h1 id="heading">Appointment</h1>
    <div id="content-container"></div>
    <script>
        $(document).ready(function() {
            $("#content-container").load("load-appointment.php");
            $(document).on("click", ".delete-btn", function(){
                var id = $(this).val();

                $.ajax({
                    url: "delete-appointment.php",
                    method: "POST",
                    data: {
                        id:id
                    },
                    success: function() {
                        $("#content-container").load("load-appointment.php");
                    }
                })
            })
        })
    </script>
</body>

</html>