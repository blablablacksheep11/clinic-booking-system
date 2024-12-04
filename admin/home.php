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

        #des-container {
            font-family: Roboto;
            font-size: 1.1rem;
            text-align: justify;
            position: absolute;
            top: 45%;
            left: 5%;
            border: 0px solid black;
            width: 60%;
        }

        #img-container {
            background-color: red;
            position: absolute;
            top: 25%;
            left: 70%;
            width: 20%;
            height: 60%;
            overflow: hidden;
        }

        #heading {
            font-family: Roboto;
            position: absolute;
            top: 30%;
            left: 5%;
            font-size: 4.0rem;
            font-weight: 500;
        }

        #img {
            position: absolute;
            height: 100%;
            width: auto;
            left: -10%;
        }

        #manage-btn {
            position: absolute;
            height: 8%;
            width: 13%;
            top: 74%;
            left: 5%;
            background-color: #9dd1ea;
            color: white;
            border: none;
            border-radius: 10px;
            font-family: Roboto;
        }

        #manage-btn:hover {
            background-color: #84c8e8;
        }

        #home-nav-btn {
            border: 3px solid white;
            background-color: #9dbdea;
        }

        #home-nav-btn .svg {
            fill: white;
        }

        #home-nav-btn .nav-btn-label {
            color: white;
        }

        #home-nav-btn:hover {
            background-color: #70a5ef;
        }
    </style>
</head>

<body>
    <h1 id="heading">Healthsync Clinic</h1>
    <div id="des-container">
        <p>
            Welcome to Healthsync, your trusted pediatric clinic dedicated to the health and well-being of your child. At Healthsync, we understand that every stage of childhood comes with its own set of challenges and milestones.
            That's why we provide compassionate, comprehensive care that is tailored to meet the unique needs of children, from newborns and toddlers to adolescents and young adults.
        </p>
        <p>
            At Healthsync, we believe that building strong, trusting relationships with both our young patients and their families is key to providing the best care possible. We take the time to listen to your concerns and answer your questions,
            ensuring that you feel supported and informed in making decisions about your child's health.
        </p>
    </div>
    <div id="img-container">
        <img src="../pic/clinicbuilding2.jpg" id="img">
    </div>
    <button id="manage-btn">Manage Appointment</button>
</body>
<script>
    document.getElementById("manage-btn").addEventListener("click", function() {
        window.location.href = "../admin/appointment.php";
    })
</script>

</html>