<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
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

        #hypertext-container{
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
                <input type="text" class="form-field-left" id="name" required>
                <input type="date" class="form-field-right" id="dob" required>
                <br><br><br><br>
                <label for="email" class="form-label-left">Email:</label>
                <label for="contactnumber" class="form-label-right">Contact Number:</label>
                <br>
                <input type="email" class="form-field-left" id="email" required>
                <input type="number" class="form-field-right" id="contactnumber" pattern="^\d{3}-\d{7}$" placeholder="016-3679616" required>
                <br><br><br><br>
                <label for="icnumber" class="form-label-left">IC Number:</label>
                <br>
                <input type="number" class="form-field-left" id="icnumber" pattern="^\d{6}-\d{2}-\d{4}$" required>
                <br><br><br><br>
                <label for="password" class="form-label-left">Password:</label>
                <label for="confirmpassword" class="form-label-right">Confirm Password:</label>
                <br>
                <input type="password" class="form-field-left" id="password" required>
                <input type="password" class="form-field-right" id="confirmpassword" required>
                <br><br><br><br><br>
                <input type="submit" id="submit-btn" value="Sign Up" disabled>
                <div id="hypertext-container">
                    <a href="signin.php" id="signin-hypertext">Already have an account? Sign In</a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>