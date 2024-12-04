<?php
session_start();
include("../include/database.php");
include("../include/doctor-navbar.php");

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST["delete"])) {
    $id = $_POST["delete"];

    $sql = "UPDATE appointment SET requested = '1' WHERE id = '$id'";
    $result = mysqli_query($connection, $sql);

    $sql = "SELECT * FROM appointment WHERE id = '$id'";
    $result = mysqli_query($connection, $sql);
    $valuereturned = mysqli_fetch_assoc($result);

    $sql1 = "SELECT email, name FROM admin_info WHERE id = 1";
    $result1 = mysqli_query($connection, $sql1);
    $valuereturned1 = mysqli_fetch_assoc($result1);

    $sql2 = "SELECT name FROM patient_info WHERE id = '" . $valuereturned["patient_ id"] . "'";
    $result2 = mysqli_query($connection, $sql2);
    $patientname = mysqli_fetch_assoc($result2);

    //Load Composer's autoloader
    require '../vendor/autoload.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'lamyongqin@gmail.com';                     //SMTP username
        $mail->Password   = 'iqqaycqzbjclatjs';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('lamyongqin@gmail.com', "Dr. " . $_SESSION["doctorname"]);
        $mail->addAddress($valuereturned1["email"], $valuereturned1["name"]);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Request to delete appointment';
        $mail->Body    = "Dear " . $valuereturned1["name"] . ", <br><br><b>&nbsp;&nbsp;&nbsp;&nbsp;You have received an appointment request from " . $_SESSION["doctorname"] . ", who wishes to delete an appointment with " . $patientname["name"] . " on " . $valuereturned["date"] . ", " . $valuereturned["time"] . ".</b>";

        if ($mail->send()) {
            echo "<script>alert('Your delete appointment request has been sent. You will be notified once your request is accepted.');</script>";
        }
    } catch (Exception $e) {
        echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
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

        .accept-btn {
            position: absolute;
            height: 60%;
            width: 8%;
            left: 81%;
            background-color: #9deab0;
            color: white;
            border: none;
            border-radius: 10px;
            font-family: Roboto;
        }

        .accept-btn:hover {
            background-color: #6fff75;
        }

        .reject-btn {
            position: absolute;
            height: 60%;
            width: 8%;
            left: 90.5%;
            background-color: #ea9d9d;
            color: white;
            border: none;
            border-radius: 10px;
            font-family: Roboto;
        }

        .reject-btn:hover {
            background-color: #ff6f6f;
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

        #create-btn:hover {
            background-color: #84c8e8;
        }

        #request-nav-btn {
            border: 3px solid white;
            background-color: #9dbdea;
        }

        #request-nav-btn .svg {
            fill: white;
        }

        #request-nav-btn .nav-btn-label {
            color: white;
        }

        #request-nav-btn:hover {
            background-color: #70a5ef;
        }
    </style>
</head>

<body>
    <h1 id="heading">Request</h1>
    <div id="content-container"></div>
    <script>
        $(document).ready(function() {
            $("#content-container").load("load-request.php");
            $(document).on("click", ".accept-btn", function(e){
                e.preventDefault();
                var id = $(this).val();

                $.ajax({
                    url: "process-request.php",
                    method: "POST",
                    data: {
                        status: "accept",
                        id: id
                    },
                    success: function(){
                        $("#content-container").load("load-request.php");
                    }
                })
            })

            $(document).on("click", ".reject-btn", function(e){
                e.preventDefault();
                var id = $(this).val();

                $.ajax({
                    url: "process-request.php",
                    method: "POST",
                    data: {
                        status: "reject",
                        id: id
                    },
                    success: function(){
                        $("#content-container").load("load-request.php");
                    }
                })
            })
        })
    </script>
</body>

</html>