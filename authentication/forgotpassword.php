<?php
session_start();
include("../include/database.php");

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendemail()
{
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
        $mail->addAddress($_SESSION["mailto"]);     //Add a recipient
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Verification code for password reset';
        $mail->Body    = "Only one step left to reset your password. Please use this verification code:  <br> <b>" . $_SESSION["verificationcode"] . "</b>";

        if ($mail->send()) {
            echo "<script>alert('Verification code has been send to " . $_SESSION["mailto"] . "');</script>";
            echo "<script>window.location.href = 'verify.php';</script>";
        }
    } catch (Exception $e) {
        echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
    }
}

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $_SESSION["mailto"] = $email;

    if (str_contains($email, "gmail.com") || str_contains($email, "outlook.com") || str_contains($email, "hotmail.com") || str_contains($email, "segi4u.my") || str_contains($email, "segi.edu.my")) {

        //search from patient table
        $sql = "SELECT id FROM patient_info WHERE email = '$email'";
        $result = mysqli_query($connection, $sql);
        $valuereturned = mysqli_fetch_assoc($result);

        //search form doctor table
        $sql1 = "SELECT id FROM doctor_info WHERE email = '$email'";
        $result1 = mysqli_query($connection, $sql1);
        $valuereturned1 = mysqli_fetch_assoc($result1);

        //search from admin table
        $sql2 = "SELECT id FROM admin_info WHERE email = '$email'";
        $result2 = mysqli_query($connection, $sql2);
        $valuereturned2 = mysqli_fetch_assoc($result2);

        //if email is found in patient tables
        if (mysqli_num_rows($result) == 1) {
            $_SESSION["entity"] = "patient";
            $_SESSION["action"] = "fgt-pass";
            $_SESSION["userid"] = $valuereturned["id"];
            $verificationcode = rand(1000, 9999);
            $_SESSION["verificationcode"] = $verificationcode;
            sendemail();
            echo "<script>alert('Account not found.');</script>";
        } 

        //if email is found in doctor table
         else if (mysqli_num_rows($result1) == 1) {
            $_SESSION["entity"] = "doctor";
            $_SESSION["action"] = "fgt-pass";
            $_SESSION["userid"] = $valuereturned1["id"];
            $verificationcode = rand(1000, 9999);
            $_SESSION["verificationcode"] = $verificationcode;
            sendemail();
        } 
        
        //if email is found in admin table
        else if (mysqli_num_rows($result2) == 1) {
            $_SESSION["entity"] = "admin";
            $_SESSION["action"] = "fgt-pass";
            $_SESSION["userid"] = $valuereturned2["id"];
            $verificationcode = rand(1000, 9999);
            $_SESSION["verificationcode"] = $verificationcode;
            sendemail();
        } 
        
        //if email is not found in any table
        else {
            echo "<script>alert('Account not found.');</script>";
        }
    } else {
        echo "<script>alert('Invalid email address.');</script>";
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
            top: 30%;
        }

        #description {
            margin: 0%;
            padding: 0%;
            font-size: 1.8rem;
            font-weight: 400;
            font-family: Roboto;
            background-color: transparent;
            position: absolute;
            top: 45%;
        }

        #form-container {
            position: absolute;
            border: 0px solid black;
            top: 55%;
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
            top: 70%;
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
    <a href="signin.php" id="return-hypertext">Return to Sign In</a>
    <p id="heading">Forgot&nbsp;&nbsp;Password</p>
    <p id="description">Enter your email, we'll send you the verification code to reset the password</p>
    <div id="form-container">
        <form action="forgotpassword.php" method="post" autocomplete="off">
            <input type="email" class="form-field" id="email" name="email" required>
            <input type="submit" id="submit-btn" name="submit" disabled>
        </form>
    </div>
</body>
<script>
    const email = document.getElementById("email");
    const submit = document.getElementById("submit-btn");
    let emailfilled = false;

    email.addEventListener("input", checkemail);
    email.addEventListener("input", tolower);

    function checkemail() {
        if (email.value.length > 0) {
            emailfilled = true;
        } else {
            emailfilled = false;
            submit.disabled = true;
            submit.style.backgroundColor = "#cbeeff";
            submit.removeEventListener("mouseover", hover);
            submit.removeEventListener("mouseout", unhover);
        }
        if (emailfilled == true) {
            submit.disabled = false;
            submit.style.backgroundColor = "#9dd1ea";
            submit.addEventListener("mouseover", hover);
            submit.addEventListener("mouseout", unhover);
        }
    }

    function tolower() {
        this.value = this.value.toLowerCase();
    }

    function hover() {
        submit.style.backgroundColor = "#84c8e8";
    }

    function unhover() {
        submit.style.backgroundColor = "#9dd1ea";
    }
</script>

</html>