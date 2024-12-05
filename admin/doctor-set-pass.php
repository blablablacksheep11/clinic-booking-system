<?php
session_start();
include("../include/database.php");
include("../include/admin-navbar.php");

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST["submit"])) {
    $password = $_POST["password"];
    $name =  $_SESSION["doctorname"];
    $email = $_SESSION["doctoremail"];
    $contactnumber = $_SESSION["doctorcontactnumber"];
    $specialist = $_SESSION["doctorspecialist"];
    $description = $_SESSION["doctordescription"];
    $picture = $_SESSION["doctorpicture"];

    $sql = "INSERT INTO doctor_info (name, email, contact_number, specialist, description, picture, password) VALUES ('$name','$email','$contactnumber','$specialist','$description','$picture','$password')";
    if (mysqli_query($connection, $sql)) {
        echo "<script>alert('Account created.');</script>";
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
            $mail->setFrom('lamyongqin@gmail.com', 'Healthsync Clinic');
            $mail->addAddress($email);     //Add a recipient
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Welcome to Healthsync Clinic';
            $mail->Body    = "Dear Dr. ".$name.",<br><br>We are pleased to inform you that your new account has been successfully created in the Healthsync Clinic Booking System. <br><br>To sign in, please use the following email address and the one-time password provided below:<br><br>Email: <b>".$email."</b><br>One-time password: <b>".$password."</b><br><br>For security purposes, you are encouraged to change your password after logging in. This can be done through the profile interface once you are signed into the system.";

            if ($mail->send()) {
                echo "<script>window.location.href = 'doctor.php';</script>";
            }
        } catch (Exception $e) {
            echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
        }
    }
}
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
            background-color: transparent;
            padding: 0%;
            margin: 0%;
            display: flex;
            justify-content: center;
        }

        .form-field {
            position: absolute;
            left: 25%;
            width: 50%;
            height: 40%;
            outline: none;
            border-radius: 5px;
            border: 1px solid grey;
            font-family: Roboto;
            font-size: 1.0rem;
            padding-left: 1.0%;
        }

        #heading {
            margin: 0%;
            padding: 0%;
            font-size: 4.0rem;
            font-weight: 400;
            font-family: Roboto;
            background-color: transparent;
            position: absolute;
            top: 35%;
        }

        #description {
            margin: 0%;
            padding: 0%;
            font-size: 1.8rem;
            font-weight: 400;
            font-family: Roboto;
            background-color: transparent;
            position: absolute;
            top: 50%;
        }

        #form-container {
            position: absolute;
            border: 0px solid black;
            top: 60%;
            width: 50%;
            height: 10%;
        }

        #return-hypertext {
            position: absolute;
            top: 4%;
            left: 2%;
            font-family: Roboto;
            text-decoration: none;
        }

        #submit-btn {
            position: absolute;
            height: 40%;
            width: 20%;
            top: 75%;
            left: 40%;
            margin: 0%;
            background-color: #c9e6f3;
            color: white;
            border: none;
            border-radius: 5px;
            outline: none;
            font-family: Roboto;
        }
    </style>
</head>

<body>
    <p id="heading">Create&nbsp;&nbsp;one&nbsp;-&nbsp;time&nbsp;&nbsp;password</p>
    <p id="description">Create a temporary password. The password is changeable by the doctor later.</p>
    <div id="form-container">
        <form action="doctor-set-pass.php" method="post" autocomplete="off">
            <input type="text" class="form-field" id="password" name="password" required>
            <input type="submit" id="submit-btn" name="submit" disabled>
        </form>
    </div>
</body>
<script>
    const email = document.getElementById("password");
    const submit = document.getElementById("submit-btn");
    let passwordfilled = false;

    password.addEventListener("input", checkemail);

    function checkemail() {
        if (password.value.length > 0) {
            passwordfilled = true;
        } else {
            passwordfilled = false;
            submit.disabled = true;
            submit.style.backgroundColor = "#cbeeff";
            submit.removeEventListener("mouseover", hover);
            submit.removeEventListener("mouseout", unhover);
        }
        if (passwordfilled == true) {
            submit.disabled = false;
            submit.style.backgroundColor = "#9dd1ea";
            submit.addEventListener("mouseover", hover);
            submit.addEventListener("mouseout", unhover);
        }
    }

    function hover() {
        submit.style.backgroundColor = "#84c8e8";
    }

    function unhover() {
        submit.style.backgroundColor = "#9dd1ea";
    }
</script>

</html>