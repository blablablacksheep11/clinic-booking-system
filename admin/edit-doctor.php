<?php
session_start();
include("../include/database.php");
include("../include/admin-navbar.php");
include("../include/mini-sidenavbar.php");

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

        #heading {
            font-family: Roboto;
            position: absolute;
            top: 14%;
            left: 3%;
            font-size: 2.0rem;
            font-weight: 400;
        }

        #doctor-nav-btn {
            border: 3px solid white;
            background-color: #9dbdea;
        }

        #doctor-nav-btn .st0 {
            stroke: white;
        }

        #doctor-nav-btn .nav-btn-label {
            color: white;
        }

        #doctor-nav-btn:hover {
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

        #general-nav-btn {
            border: 3px solid white;
            background-color: #9dbdea;
        }

        #general-nav-btn .side-nav-btn-label {
            color: white;
        }

        #general-nav-btn:hover {
            background-color: #70a5ef;
        }

        #img-container {
            position: absolute;
            top: 23%;
            left: 25%;
            width: 160px;
            height: 160px;
            overflow: hidden;
            border-radius: 100px;
        }

        #profile-picture {
            position: absolute;
            height: auto;
            width: 150%;
            left: -28%;
        }
    </style>
</head>

<body>
    <h1 id="heading">Doctor / Edit</h1>
    <div id="img-container">
        <img id="profile-picture" src="../pic/<?php echo $_SESSION["doctorpicture"]; ?>" alt="Profile Picture">
    </div>
</body>

</html>