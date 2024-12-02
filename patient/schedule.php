<?php
session_start();
include("../include/database.php");
include("../include/patient-navbar.php");
unset($_SESSION["dategetted"]);
unset($_SESSION["doctorgetted"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        .submit-btn {
            position: absolute;
            height: 8%;
            width: 70%;
            top: 94%;
            left: 15%;
            background-color: #9dd1ea;
            color: white;
            border: none;
            border-radius: 10px;
            font-family: Roboto;
        }

        .submit-btn:hover {
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
            top: 27%;
            height: 65%;
            width: 80%;
            display: flex;
            justify-content: space-between;
            overflow: visible;
        }

        #doctor-item {
            position: relative;
            background-color: transparent;
            height: 100%;
            width: 20%;
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

        #create-btn:hover {
            background-color: #84c8e8;
        }

        #schedule-nav-btn {
            border: 3px solid white;
            background-color: #9dbdea;
        }

        #schedule-nav-btn .svg {
            fill: white;
        }

        #schedule-nav-btn .nav-btn-label {
            color: white;
        }

        #schedule-nav-btn:hover {
            background-color: #70a5ef;
        }
    </style>
</head>
<body>
    
</body>
</html>