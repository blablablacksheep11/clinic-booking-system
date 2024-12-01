<?php
session_start();
include("../include/database.php");

if (isset($_POST["submit"])) {
    $code1 = $_POST["code1"];
    $code2 = $_POST["code2"];
    $code3 = $_POST["code3"];
    $code4 = $_POST["code4"];
    $verificationcodetomatch = $_SESSION["verificationcode"];
    $verificationcode = $code1 . $code2 . $code3 . $code4;

    if ($verificationcode == $verificationcodetomatch) {
        header("Location: resetpass.php");
    } else {
        echo "<script>alert('Invalid verification code.');</script>";
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
            width: 4.5vw;
            height: 11vh;
            outline: none;
            border-radius: 5px;
            border: 1px solid grey;
            font-family: Roboto;
            font-size: 2.0rem;
            text-align: center;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
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
            width: 30%;
            height: 20%;
        }

        #back-hypertext {
            position: absolute;
            top: 4%;
            left: 2%;
            font-family: Roboto;
            text-decoration: none;
        }

        #form {
            display: flex;
            justify-content: space-evenly;
        }

        #submit-btn {
            position: absolute;
            height: 4vh;
            width: 10vw;
            top: 70%;
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
    <a href="forgotpassword.php" id="back-hypertext">Back</a>
    <p id="heading">Check&nbsp;&nbsp;your&nbsp;&nbsp;email</p>
    <p id="description">Enter the verification code that has been send to your email</p>
    <div id="form-container">
        <form action="verify.php" method="post" autocomplete="off" id="form">
            <input type="number" class="form-field" name="code1" id="code1">
            <input type="number" class="form-field" name="code2" id="code2">
            <input type="number" class="form-field" name="code3" id="code3">
            <input type="number" class="form-field" name="code4" id="code4">
            <input type="submit" id="submit-btn" name="submit" value="Verify" disabled>
        </form>
    </div>
</body>
<script>
    const code1 = document.getElementById("code1");
    const code2 = document.getElementById("code2");
    const code3 = document.getElementById("code3");
    const code4 = document.getElementById("code4");
    const submit = document.getElementById("submit-btn");
    let code1filled = false;
    let code2filled = false;
    let code3filled = false;
    let code4filled = false;

    code1.addEventListener("input", checkcode1);
    code2.addEventListener("input", checkcode2);
    code3.addEventListener("input", checkcode3);
    code4.addEventListener("input", checkcode4);
    code1.focus();

    function checkcode1() {
        if (code1.value.length == 1) {
            code1filled = true;
            code2.focus();
        } else {
            code1filled = false;
            submit.disabled = true;
            submit.style.backgroundColor = "#cbeeff";
            submit.removeEventListener("mouseover", hover);
            submit.removeEventListener("mouseout", unhover);
        }
        if (code1filled == true && code2filled == true && code3filled == true && code4filled == true) {
            submit.disabled = false;
            submit.style.backgroundColor = "#9dd1ea";
            submit.addEventListener("mouseover", hover);
            submit.addEventListener("mouseout", unhover);
        }
    }

    function checkcode2() {
        if (code2.value.length == 1) {
            code2filled = true;
            code3.focus();
        } else {
            code2filled = false;
            submit.disabled = true;
            submit.style.backgroundColor = "#cbeeff";
            submit.removeEventListener("mouseover", hover);
            submit.removeEventListener("mouseout", unhover);
        }
        if (code1filled == true && code2filled == true && code3filled == true && code4filled == true) {
            submit.disabled = false;
            submit.style.backgroundColor = "#9dd1ea";
            submit.addEventListener("mouseover", hover);
            submit.addEventListener("mouseout", unhover);
        }
    }

    function checkcode3() {
        if (code3.value.length == 1) {
            code3filled = true;
            code4.focus();
        } else {
            code3filled = false;
            submit.disabled = true;
            submit.style.backgroundColor = "#cbeeff";
            submit.removeEventListener("mouseover", hover);
            submit.removeEventListener("mouseout", unhover);
        }
        if (code1filled == true && code2filled == true && code3filled == true && code4filled == true) {
            submit.disabled = false;
            submit.style.backgroundColor = "#9dd1ea";
            submit.addEventListener("mouseover", hover);
            submit.addEventListener("mouseout", unhover);
        }
    }

    function checkcode4() {
        if (code4.value.length == 1) {
            code4filled = true;
        } else {
            code4filled = false;
            submit.disabled = true;
            submit.style.backgroundColor = "#cbeeff";
            submit.removeEventListener("mouseover", hover);
            submit.removeEventListener("mouseout", unhover);
        }
        if (code1filled == true && code2filled == true && code3filled == true && code4filled == true) {
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