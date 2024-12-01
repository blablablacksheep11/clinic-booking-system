<?php
session_start();
include("../include/database.php");

if(isset($_POST["submit"])){
    $email = $_POST["email"];

    $sql = "SELECT id FROM user_info WHERE email = '$email'";
    $result = mysqli_query($connection, $sql);
    $valuereturned = mysqli_fetch_column($result);

    if(mysqli_num_rows($result) == 0){
        echo "<script>alert('Account not found.');</script>";
    }else{
        $_SESSION["email"]=$email;
        header("Location: verify.php");
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
            padding-left: 2.5%;
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
            background-color: #b6def1;
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
        if (emailfilled == true) {
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