<?php
session_start();
include("../include/database.php");
include("../include/admin-navbar.php");

if (isset($_POST["edit"])){
    $id = $_POST["edit"];
    $sql = "SELECT * FROM doctor_info WHERE id = '$id'";
    $result = mysqli_query($connection, $sql);
    $valuereturned = mysqli_fetch_assoc($result);

    $_SESSION["doctorid"] = $valuereturned["id"];
    $_SESSION["doctorname"] = $valuereturned["name"];
    $_SESSION["doctorcontactnumber"] = $valuereturned["contact_number"];
    $_SESSION["doctorspecialist"] = $valuereturned["specialist"];
    $_SESSION["doctordescription"] = $valuereturned["description"];
    $_SESSION["doctorpicture"] = $valuereturned["picture"];
    $_SESSION["doctorpassword"] = $valuereturned["password"];

    echo "<script>window.location.href = 'edit-doctor.php';</script>";
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

        .id-label {
            position: absolute;
            left: 2%;
            font-family: Roboto;
            font-size: 1.0rem;
        }

        .name-label {
            position: absolute;
            left: 10%;
            font-family: Roboto;
            font-size: 1.0rem;
        }

        .specialist-label {
            position: absolute;
            left: 30%;
            font-family: Roboto;
            font-size: 1.0rem;
        }

        .remove-btn {
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

        .remove-btn:hover {
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

        #new-btn {
            position: absolute;
            height: 60%;
            width: 7%;
            left: 92%;
            top: 0%;
            background-color: #9dd1ea;
            color: white;
            border: none;
            border-radius: 10px;
            font-family: Roboto;
        }

        #new-btn:hover {
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

        #id-title {
            position: absolute;
            bottom: 10%;
            left: 2%;
            font-family: Roboto;
            font-size: 1.0rem;
        }

        #name-title {
            position: absolute;
            bottom: 10%;
            left: 10%;
            font-family: Roboto;
            font-size: 1.0rem;
        }

        #specialist-title {
            position: absolute;
            bottom: 10%;
            left: 30%;
            font-family: Roboto;
            font-size: 1.0rem;
        }

        #create-btn:hover {
            background-color: #84c8e8;
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
    </style>
</head>

<body>
    <h1 id="heading">Doctor</h1>
    <div id="content-container"></div>
    <script>
        $(document).ready(function() {
            $("#content-container").load("load-doctor-list.php");
            $(document).on("click", ".remove-btn", function(){
                var id = $(this).val();

                $.ajax({
                    url: "remove-doctor.php",
                    method: "POST",
                    data: {
                        id:id
                    },
                    success: function() {
                        $("#content-container").load("load-doctor-list.php");
                    }
                })
            })
        })
    </script>
</body>

</html>