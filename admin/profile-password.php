<?php
session_start();
include("../include/database.php");
include("../include/admin-navbar.php");
include("../include/profile-sidebar-admin.php");

if (isset($_POST["save"])) {
    $oldpassword = $_POST["oldpassword"];
    $newpassword = $_POST["newpassword"];

    $sql = "SELECT password FROM admin_info WHERE id = '" . $_SESSION["adminid"] . "'";
    $result = mysqli_query($connection, $sql);
    $password = mysqli_fetch_assoc($result);
    if (password_verify($oldpassword, $password["password"])) {
        $hashedpassword = password_hash($newpassword, PASSWORD_BCRYPT);

        $sql = "UPDATE admin_info SET password = '$hashedpassword' WHERE id = '" . $_SESSION["adminid"] . "'";
        if (mysqli_query($connection, $sql)) {
            echo "<script>alert('Password updated successfully.');</script>";
        }
    } else{
        echo "<script>alert('Old password is incorrect.');</script>";
    }
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

        .form-field-long-narrow {
            position: absolute;
            width: 90%;
            height: 10%;
            margin-top: 1%;
            outline: none;
            border-radius: 5px;
            border: 1px solid grey;
            font-family: Roboto;
            font-size: 1.0rem;
            padding-left: 1.0%;
        }

        .form-label-left {
            color: grey;
            font-family: Roboto;
            font-size: 1.2rem;
            position: absolute;
        }

        .submit-btn {
            position: absolute;
            height: 12%;
            width: 15%;
            top: 55%;
            left: 75%;
            background-color: #9dd1ea;
            color: white;
            border: none;
            border-radius: 10px;
            font-family: Roboto;
            display: block;
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

        #patient-nav-btn {
            border: 3px solid white;
            background-color: #9dbdea;
        }

        #patient-nav-btn .fil0 {
            fill: white;
        }

        #patient-nav-btn .nav-btn-label {
            color: white;
        }

        #patient-nav-btn:hover {
            background-color: #70a5ef;
        }

        #password-nav-btn {
            border: 3px solid white;
            background-color: #9dbdea;
        }

        #password-nav-btn .side-nav-btn-label {
            color: white;
        }

        #password-nav-btn:hover {
            background-color: #70a5ef;
        }

        #form-container {
            position: absolute;
            top: 27%;
            left: 25%;
            border: 0px solid black;
            width: 50%;
            height: 40%;
            overflow: visible;
        }
    </style>
</head>

<body>
    <h1 id="heading">Patient / Edit</h1>
    <div id="form-container">
        <form action="profile-password.php" method="post" autocomplete="off">
            <label for="oldpassword-field" class="form-label-left">Old-password:</label>
            <br>
            <input type="password" class="form-field-long-narrow" id="oldpassword-field" name="oldpassword">
            <br><br><br><br>
            <label for="newpassword-field" class="form-label-left">New-password:</label>
            <br>
            <input type="password" class="form-field-long-narrow" id="newpassword-field" name="newpassword">
            <input type="submit" class="submit-btn" name="save" value="Change">
        </form>
    </div>

</body>

</html>