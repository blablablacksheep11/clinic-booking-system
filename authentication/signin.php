<?php
include("../include/database.php");

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT password FROM user_info WHERE email = '$email'";
    $result = mysqli_query($connection, $sql);
    $valuereturned = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) == 1) {
        if (password_verify($password, $valuereturned["password"])) {
            header("Location: ../patient/home.php");
        } else {
            echo "<script>alert('Invalid password.');</script>";
        }
    } else {
        echo "<script>alert('Account not found.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthSync</title>
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

        .form-label {
            color: grey;
            font-family: Roboto;
            font-size: 1.2rem;
            position: absolute;
        }

        .form-field {
            position: absolute;
            width: 100%;
            height: 13%;
            margin-top: 3%;
            outline: none;
            border-radius: 5px;
            border: 1px solid grey;
            font-family: Roboto;
            font-size: 1.0rem;
            padding-left: 2.5%;
        }

        #left-container {
            position: absolute;
            width: 50vw;
            height: 100vh;
            left: 0%;
            overflow: hidden;
        }

        #leftimg {
            position: absolute;
            height: 100%;
        }

        #right-container {
            position: absolute;
            width: 50vw;
            height: 100vh;
            right: 0%;
            background-color: transparent;
            display: flex;
            justify-content: center;
        }

        #form-container {
            position: absolute;
            top: 45%;
            width: 40%;
            height: 30%;
            border: 0px solid black;
            border-radius: 5px;
            display: flex;
        }

        #submit-btn {
            margin: 0%;
            position: absolute;
            width: 80%;
            height: 13%;
            top: 73%;
            left: 10%;
            background-color: #b6def1;
            color: white;
            border: none;
            border-radius: 5px;
            outline: none;
            font-family: Roboto;
        }

        #fgtpass-hypertext {
            position: absolute;
            right: 0%;
            font-family: Roboto;
            text-decoration: none;
        }

        #fgtpass-hypertext-container {
            position: absolute;
            top: 59%;
            width: 100%;
            background-color: transparent;
            display: flex;
            justify-content: center;
        }

        #logo-container {
            position: absolute;
            width: 60%;
            height: auto;
            top: 0%;
            background-color: transparent;
        }

        #logo {
            position: absolute;
            width: 100%;
            height: auto;
        }

        #newuser-hypertext {
            font-family: Roboto;
            text-decoration: none;
        }

        #newuser-hypertext-container {
            position: absolute;
            top: 87%;
            width: 100%;
            background-color: transparent;
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div id="left-container">
        <img src="../pic/clinicroom.jpg" id="leftimg">
    </div>
    <div id="right-container">
        <div id="logo-container">
            <img src="../pic/logo.png" id="logo">
        </div>
        <div id="form-container">
            <form method="post" action="signin.php" autocomplete="off">
                <label for="email" class="form-label">Email Address:</label>
                <br>
                <input type="email" class="form-field" id="email" name="email" required>
                <br><br><br>
                <label for="password" class="form-label">Password:</label>
                <br>
                <input type="password" class="form-field" id="password" name="password" required>
                <div id="fgtpass-hypertext-container">
                    <a href="forgotpassword.php" id="fgtpass-hypertext">Forgot Password? </a>
                </div>
                <input type="submit" id="submit-btn" value="Sign In" name="submit" disabled>
                <div id="newuser-hypertext-container">
                    <a href="signup.php" id="newuser-hypertext">I'm a new user</a>
                </div>
            </form>
        </div>
    </div>
    <script>
        const email = document.getElementById("email");
        const password = document.getElementById("password");
        const submit = document.getElementById("submit-btn");
        let emailfilled = false;
        let passwordfilled = false;

        email.addEventListener("input", checkemail);
        password.addEventListener("input", checkpassword);

        function checkemail() {
            if (email.value.length > 0) {
                emailfilled = true
            } else {
                emailfilled = false;
                submit.disabled = true;
                submit.style.backgroundColor = "#cbeeff";
                submit.removeEventListener("mouseover", hover);
                submit.removeEventListener("mouseout", unhover);
            }
            if (emailfilled == true && passwordfilled == true) {
                submit.disabled = false;
                submit.style.backgroundColor = "#9dd1ea";
                submit.addEventListener("mouseover", hover);
                submit.addEventListener("mouseout", unhover);
            }
        }

        function checkpassword() {
            if (password.value.length > 0) {
                passwordfilled = true
            } else {
                passwordfilled = false;
                submit.disabled = true;
                submit.style.backgroundColor = "#cbeeff";
                submit.removeEventListener("mouseover", hover);
                submit.removeEventListener("mouseout", unhover);
            }
            if (emailfilled == true && passwordfilled == true) {
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
</body>

</html>