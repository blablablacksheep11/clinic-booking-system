<?php
session_start();
include("../include/database.php");
include("../include/patient-navbar.php");
include("../include/profile-sidebar-patient.php");

$id = $_SESSION["patientid"];
$sql = "SELECT * FROM patient_info WHERE id = '$id'";
$result = mysqli_query($connection, $sql);
$valuereturned = mysqli_fetch_assoc($result);

$_SESSION["patientid"] = $valuereturned["id"];
$_SESSION["patientname"] = $valuereturned["name"];
$_SESSION["patientemail"] = $valuereturned["email"];
$_SESSION["patientdob"] = $valuereturned["dob"];
$_SESSION["patientcontactnumber"] = $valuereturned["contact_number"];
$_SESSION["patienticnumber"] = $valuereturned["ic_number"];
$_SESSION["patientpassword"] = $valuereturned["password"];



if (isset($_POST['save'])) {
    //text-data processing
    $name = $_POST["name"];
    $email = $_POST["email"];
    $contactnumber = $_POST["contactnumber"];
    $icnumber = $_POST["icnumber"];
    $dob = $_POST["dob"];

    $_SESSION["patientname"] = $name;
    $_SESSION["patientemail"] = $email;
    $_SESSION["patientcontactnumber"] = $contactnumber;
    $_SESSION["patienticnumber"] = $icnumber;
    $_SESSION["patient"] = $dob;


    $sql = "UPDATE patient_info SET name = '$name', email = '$email', contact_number = '$contactnumber', ic_number = '$icnumber', dob = '$dob' WHERE id = '" . $_SESSION["patientid"] . "'";
    if (mysqli_query($connection, $sql)) {
        echo "<script>alert('Data updated successfully.');</script>";
    } else {
        echo "<script>alert('Failed to update data.');</script>";
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

        .form-field-short-right {
            position: absolute;
            width: 40%;
            height: 10%;
            margin-top: 1%;
            outline: none;
            border-radius: 5px;
            border: 1px solid grey;
            font-family: Roboto;
            font-size: 1.0rem;
            padding-left: 1.0%;
            left: 50%;
        }

        .form-field-short-left {
            position: absolute;
            width: 40%;
            height: 10%;
            margin-top: 1%;
            outline: none;
            border-radius: 5px;
            border: 1px solid grey;
            font-family: Roboto;
            font-size: 1.0rem;
            padding-left: 1.0%;
        }

        .form-field-long-narrow {
            position: absolute;
            width: 90%;
            height: 10%;
            margin-top: 1%;
            outline: none;
            border-radius: 5px;
            border: 1px solid grey;
            font-family: Roboto;
            font-size: 1.0rem;
            padding-left: 1.0%;
        }

        .form-label-left {
            color: grey;
            font-family: Roboto;
            font-size: 1.2rem;
            position: absolute;
        }

        .form-label-right {
            color: grey;
            font-family: Roboto;
            font-size: 1.2rem;
            position: absolute;
            left: 50%;
        }

        .submit-btn {
            position: absolute;
            height: 12%;
            width: 15%;
            top: 80%;
            left: 0%;
            background-color: #9dd1ea;
            color: white;
            border: none;
            border-radius: 10px;
            font-family: Roboto;
            display: block;
        }

        .submit-btn:hover {
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

        #patient-nav-btn {
            border: 3px solid white;
            background-color: #9dbdea;
        }

        #patient-nav-btn .fil0 {
            fill: white;
        }

        #patient-nav-btn .nav-btn-label {
            color: white;
        }

        #patient-nav-btn:hover {
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

        #general-nav-btn {
            border: 3px solid white;
            background-color: #9dbdea;
        }

        #general-nav-btn .side-nav-btn-label {
            color: white;
        }

        #general-nav-btn:hover {
            background-color: #70a5ef;
        }

        #form-container {
            position: absolute;
            top: 47%;
            left: 25%;
            border: 0px solid black;
            width: 50%;
            height: 40%;
            overflow: visible;
        }

        #img-container {
            position: absolute;
            top: 23%;
            left: 25%;
            width: 160px;
            height: 160px;
            overflow: hidden;
            border-radius: 100px;
        }

        #profile-picture {
            position: absolute;
            height: auto;
            width: 150%;
            top: -25%;
            left: -25%;
        }
    </style>
</head>

<body>
    <h1 id="heading">Profile / General  </h1>
    <div id="img-container">
        <img id="profile-picture" src="../pic/profile.png" alt="Profile Picture">
    </div>
    <div id="form-container">
        <form action="profile.php" method="post" autocomplete="off">
            <label for="name" class="form-label-left">Name:</label>
            <br>
            <input type="text" class="form-field-long-narrow" id="name" name="name" value="<?php echo $_SESSION["patientname"]; ?>">
            <br><br><br>
            <label for="dob" class="form-label-left">Date of Birth:</label>
            <label for="icnumber" class="form-label-right">IC Number:</label>
            <br>
            <input type="date" class="form-field-short-left" id="dob" name="dob" value="<?php echo $_SESSION["patientdob"]; ?>">
            <input type="text" class="form-field-short-right" id="icnumber" pattern="[0-9]{6}-[0-9]{2}-[0-9]{4}" placeholder="010123-07-1259" name="icnumber" value="<?php echo $_SESSION["patienticnumber"]; ?>">
            <br><br><br>
            <label for="email" class="form-label-left">Email:</label>
            <label for="contactnumber" class="form-label-right">Contact Number:</label>
            <br>
            <input type="email" class="form-field-short-left" id="email" name="email" value="<?php echo $_SESSION["patientemail"]; ?>">
            <input type="text" class="form-field-short-right" id="contactnumber" pattern="[0-9]{3}-[0-9]{7}" name="contactnumber" value="<?php echo $_SESSION["patientcontactnumber"]; ?>">
            <input type="submit" class="submit-btn" name="save" value="Save Changes">
        </form>
    </div>
    <script>
        const name = document.getElementById("name");
        const email = document.getElementById("email");

        name.addEventListener("input", toupper);
        email.addEventListener("input", tolower);

        function tolower() {
            this.value = this.value.toLowerCase();
        }

        function toupper() {
            this.value = this.value.toUpperCase();
        }
    </script>
</body>

</html>