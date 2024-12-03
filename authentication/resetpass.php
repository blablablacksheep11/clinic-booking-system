<?php
session_start();
include("../include/database.php");

if (isset($_POST["submit"])) {
    $entity = $_SESSION["entity"];
    $userid = $_SESSION["userid"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];

    if ($password == $confirmpassword) {
        $hashedpassword = password_hash($password, PASSWORD_BCRYPT);

        $sql = "UPDATE `{$entity}_info` SET password = '$hashedpassword' WHERE id = '$userid'";
        mysqli_query($connection, $sql);
        echo "<script>alert('Password updated.');</script>";
        echo "<script>window.location.replace('signin.php');</script>";
    } else {
        echo "<script>alert('The password and confirm-password must be the same.');</script>";
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

        .form-label {
            color: grey;
            font-family: Roboto;
            font-size: 1.2rem;
            position: absolute;
            left: 25%;
        }

        .form-field {
            position: absolute;
            left: 25%;
            width: 50%;
            height: 13%;
            outline: none;
            border-radius: 5px;
            border: 1px solid grey;
            font-family: Roboto;
            font-size: 1.0rem;
            padding-left: 1.0%;
            margin-top: 1%;
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
            height: 30%;
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
            height: 4vh;
            width: 10vw;
            top: 65%;
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
    <p id="heading">Create&nbsp;&nbsp;new&nbsp;&nbsp;password</p>
    <p id="description">Enter your new password</p>
    <div id="form-container">
        <form method="post" action="resetpass.php" autocomplete="off">
            <label for="password" class="form-label">Password:</label>
            <br>
            <input type="password" class="form-field" id="password" name="password" required>
            <br><br><br>
            <label for="confirmpassword" class="form-label">Confirm-password:</label>
            <br>
            <input type="password" class="form-field" id="confirmpassword" name="confirmpassword" required>
            <input type="submit" id="submit-btn" value="Reset" name="submit" disabled>
        </form>
    </div>
</body>
<script>
    const password = document.getElementById("password");
    const confirmpassword = document.getElementById("confirmpassword");
    const submit = document.getElementById("submit-btn");
    let passwordfilled = false;
    let confirmpasswordfilled = false;

    password.addEventListener("input", checkpassword);
    confirmpassword.addEventListener("input", checkconfirmpassword);

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
        if (passwordfilled == true && confirmpasswordfilled == true) {
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
        if (passwordfilled == true && confirmpasswordfilled == true) {
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