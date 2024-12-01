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
            echo "<script>window.location.replace('verify.php');</script>";
        }
    } catch (Exception $e) {
        echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
    }
}

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    $contactnumber = $_POST["contactnumber"];
    $icnumber = $_POST["icnumber"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];

    $sql1 = "SELECT * FROM patient_info WHERE ic_number = '$icnumber'";
    $result1 = mysqli_query($connection, $sql1);
    $sql2 = "SELECT * FROM patient_info WHERE email = '$email'";
    $result2 = mysqli_query($connection, $sql2);

    if (mysqli_num_rows($result2) > 0) {
        echo "<script>alert('This email already registered.')</script>";
    } else if (mysqli_num_rows($result1) > 0) {
        echo "<script>alert('This IC number already registered.')</script>";
    } else if ($password != $confirmpassword) {
        echo "<script>alert('The password and confirm-password must be the same.');</script>";
    } else {
        $hashedpassword = password_hash($password, PASSWORD_BCRYPT);
        $_SESSION["name"] = $name;
        $_SESSION["dob"] = $dob;
        $_SESSION["email"] = $email;
        $_SESSION["mailto"] = $email;
        $_SESSION["contactnumber"] = $contactnumber;
        $_SESSION["icnumber"] = $icnumber;
        $_SESSION["password"] = $hashedpassword;
        $_SESSION["action"] = "signup";
        $verificationcode = rand(1000, 9999);
        $_SESSION["verificationcode"] = $verificationcode;
        sendemail();
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
            margin: 0%;
            padding: 0%;
        }

        .form-label-right {
            color: grey;
            font-family: Roboto;
            font-size: 1.2rem;
            position: absolute;
            left: 55%;
        }

        .form-field-right {
            position: absolute;
            width: 40%;
            height: 6%;
            margin-top: 1%;
            outline: none;
            border-radius: 5px;
            border: 1px solid grey;
            font-family: Roboto;
            font-size: 1.0rem;
            padding-left: 1.0%;
            left: 55%;
        }

        .form-label-left {
            color: grey;
            font-family: Roboto;
            font-size: 1.2rem;
            position: absolute;
            left: 5%;
        }

        .form-field-left {
            position: absolute;
            width: 40%;
            height: 6%;
            margin-top: 1%;
            outline: none;
            border-radius: 5px;
            border: 1px solid grey;
            font-family: Roboto;
            font-size: 1.0rem;
            padding-left: 1.0%;
            left: 5%;
        }

        #right-container {
            position: absolute;
            width: 30vw;
            height: 100vh;
            right: 0%;
            overflow: hidden;
        }

        #rightimg {
            position: absolute;
            height: 100%;
        }

        #right-filter {
            position: absolute;
            width: 30vw;
            height: 100vh;
            right: 0%;
            backdrop-filter: blur(4px);
        }

        #left-container {
            position: absolute;
            width: 70vw;
            height: 100vh;
            left: 0%;
            background-color: transparent;
            display: flex;
            justify-content: center;
        }

        #page-heading {
            position: absolute;
            top: 8%;
            font-family: Roboto;
            font-size: 3.5rem;
            font-weight: 400;
            color: grey;
        }

        #form-container {
            position: absolute;
            width: 70%;
            height: 70%;
            border: 0px solid black;
            top: 28%;
        }

        #submit-btn {
            margin: 0%;
            position: absolute;
            width: 30%;
            height: 6%;
            top: 69%;
            left: 35%;
            background-color: #b6def1;
            color: white;
            border: none;
            border-radius: 5px;
            outline: none;
            font-family: Roboto;
        }

        #signin-hypertext {
            font-family: Roboto;
            text-decoration: none;
        }

        #hypertext-container {
            position: absolute;
            top: 77%;
            width: 100%;
            background-color: transparent;
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div id="right-container">
        <img src="../pic/clinicroom2.jpg" id="rightimg">
    </div>
    <div id="right-filter"></div>
    <div id="left-container">
        <h1 id="page-heading">Sign Up</h1>
        <div id="form-container">
            <form method="post" action="signup.php" autocomplete="off">
                <label for="name" class="form-label-left">Name:</label>
                <label for="dob" class="form-label-right">Date of Birth:</label>
                <br>
                <input type="text" class="form-field-left" id="name" name="name" required>
                <input type="date" class="form-field-right" id="dob" name="dob" required>
                <br><br><br><br>
                <label for="email" class="form-label-left">Email:</label>
                <label for="contactnumber" class="form-label-right">Contact Number:</label>
                <br>
                <input type="email" class="form-field-left" id="email" name="email" required>
                <input type="text" class="form-field-right" id="contactnumber" name="contactnumber" pattern="[0-9]{3}-[0-9]{7}" placeholder="016-3679616" required>
                <br><br><br><br>
                <label for="icnumber" class="form-label-left">IC Number:</label>
                <br>
                <input type="text" class="form-field-left" id="icnumber" name="icnumber" pattern="[0-9]{6}-[0-9]{2}-[0-9]{4}" placeholder="010123-07-1259" required>
                <br><br><br><br>
                <label for="password" class="form-label-left">Password:</label>
                <label for="confirmpassword" class="form-label-right">Confirm Password:</label>
                <br>
                <input type="password" class="form-field-left" id="password" name="password" required>
                <input type="password" class="form-field-right" id="confirmpassword" name="confirmpassword" required>
                <input type="submit" id="submit-btn" name="submit" value="Sign Up" disabled>
                <div id="hypertext-container">
                    <a href="signin.php" id="signin-hypertext">Already have an account? Sign In</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        const name = document.getElementById("name");
        const dob = document.getElementById("dob");
        const email = document.getElementById("email");
        const contactnumber = document.getElementById("contactnumber");
        const icnumber = document.getElementById("icnumber");
        const password = document.getElementById("password");
        const confirmpassword = document.getElementById("confirmpassword");
        const submit = document.getElementById("submit-btn");

        let namefilled = false;
        let dobfilled = false;
        let emailfilled = false;
        let contactnumberfilled = false;
        let icnumberfilled = false;
        let passwordfilled = false;
        let confirmpasswordfilled = false;

        name.addEventListener("input", checkname);
        name.addEventListener("input", toupper);
        dob.addEventListener("input", checkdob);
        email.addEventListener("input", checkemail);
        email.addEventListener("input", tolower);
        contactnumber.addEventListener("input", checkcontactnumber);
        icnumber.addEventListener("input", checkicnumber);
        password.addEventListener("input", checkpassword);
        confirmpassword.addEventListener("input", checkconfirmpassword);

        function checkname() {
            if (name.value.length > 0) {
                namefilled = true;
            } else {
                namefilled = false;
                submit.disabled = true;
                submit.style.backgroundColor = "#cbeeff";
                submit.removeEventListener("mouseover", hover);
                submit.removeEventListener("mouseout", unhover);
            }
            if (namefilled == true && dobfilled == true && emailfilled == true && contactnumberfilled == true && icnumberfilled == true && passwordfilled == true && confirmpasswordfilled == true) {
                submit.disabled = false;
                submit.style.backgroundColor = "#9dd1ea";
                submit.addEventListener("mouseover", hover);
                submit.addEventListener("mouseout", unhover);
            }
        }

        function checkdob() {
            if (dob.value.length > 0) {
                dobfilled = true;
            } else {
                dobfilled = false;
                submit.disabled = true;
                submit.style.backgroundColor = "#cbeeff";
                submit.removeEventListener("mouseover", hover);
                submit.removeEventListener("mouseout", unhover);
            }
            if (namefilled == true && dobfilled == true && emailfilled == true && contactnumberfilled == true && icnumberfilled == true && passwordfilled == true && confirmpasswordfilled == true) {
                submit.disabled = false;
                submit.style.backgroundColor = "#9dd1ea";
                submit.addEventListener("mouseover", hover);
                submit.addEventListener("mouseout", unhover);
            }
        }

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
            if (namefilled == true && dobfilled == true && emailfilled == true && contactnumberfilled == true && icnumberfilled == true && passwordfilled == true && confirmpasswordfilled == true) {
                submit.disabled = false;
                submit.style.backgroundColor = "#9dd1ea";
                submit.addEventListener("mouseover", hover);
                submit.addEventListener("mouseout", unhover);
            }
        }

        function checkcontactnumber() {
            if (contactnumber.value.length > 0) {
                contactnumberfilled = true;
            } else {
                contactnumberfilled = false;
                submit.disabled = true;
                submit.style.backgroundColor = "#cbeeff";
                submit.removeEventListener("mouseover", hover);
                submit.removeEventListener("mouseout", unhover);
            }
            if (namefilled == true && dobfilled == true && emailfilled == true && contactnumberfilled == true && icnumberfilled == true && passwordfilled == true && confirmpasswordfilled == true) {
                submit.disabled = false;
                submit.style.backgroundColor = "#9dd1ea";
                submit.addEventListener("mouseover", hover);
                submit.addEventListener("mouseout", unhover);
            }
        }

        function checkicnumber() {
            if (icnumber.value.length > 0) {
                icnumberfilled = true;
            } else {
                icnumberfilled = false;
                submit.disabled = true;
                submit.style.backgroundColor = "#cbeeff";
                submit.removeEventListener("mouseover", hover);
                submit.removeEventListener("mouseout", unhover);
            }
            if (namefilled == true && dobfilled == true && emailfilled == true && contactnumberfilled == true && icnumberfilled == true && passwordfilled == true && confirmpasswordfilled == true) {
                submit.disabled = false;
                submit.style.backgroundColor = "#9dd1ea";
                submit.addEventListener("mouseover", hover);
                submit.addEventListener("mouseout", unhover);
            }
        }

        function checkpassword() {
            if (password.value.length > 0) {
                passwordfilled = true;
            } else {
                passwordfilled = false;
                submit.disabled = true;
                submit.style.backgroundColor = "#cbeeff";
                submit.removeEventListener("mouseover", hover);
                submit.removeEventListener("mouseout", unhover);
            }
            if (namefilled == true && dobfilled == true && emailfilled == true && contactnumberfilled == true && icnumberfilled == true && passwordfilled == true && confirmpasswordfilled == true) {
                submit.disabled = false;
                submit.style.backgroundColor = "#9dd1ea";
                submit.addEventListener("mouseover", hover);
                submit.addEventListener("mouseout", unhover);
            }
        }

        function checkconfirmpassword() {
            if (confirmpassword.value.length > 0) {
                confirmpasswordfilled = true;
            } else {
                confirmpasswordfilled = false;
                submit.disabled = true;
                submit.style.backgroundColor = "#cbeeff";
                submit.removeEventListener("mouseover", hover);
                submit.removeEventListener("mouseout", unhover);
            }
            if (namefilled == true && dobfilled == true && emailfilled == true && contactnumberfilled == true && icnumberfilled == true && passwordfilled == true && confirmpasswordfilled == true) {
                submit.disabled = false;
                submit.style.backgroundColor = "#9dd1ea";
                submit.addEventListener("mouseover", hover);
                submit.addEventListener("mouseout", unhover);
            }
        }

        function tolower() {
            this.value = this.value.toLowerCase();
        }

        function toupper() {
            this.value = this.value.toUpperCase();
        }

        function hover() {
            submit.style.backgroundColor = "#84c8e8";
        }

        function unhover() {
            submit.style.backgroundColor = "#9dd1ea";
        }
    </script>
</body>

</html>