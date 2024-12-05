<?php
session_start();
include("../include/database.php");
include("../include/admin-navbar.php");


if (isset($_POST['next'])) {
    //image processing
    if (isset($_FILES["picture"])) {
        $filename = $_FILES['picture']['name'];
        $filetmp = $_FILES['picture']['tmp_name'];
        $filesize = $_FILES['picture']['size'];
        $fileerror = $_FILES['picture']['error'];
        $filetype = $_FILES['picture']['type'];

        $fileext = explode(".", $filename);
        $fileactualext = strtolower(end($fileext));

        $allowedfileext = array("jpg", "jpeg", "png");

        if (in_array($fileactualext, $allowedfileext)) {
            if ($fileerror === 0) {
                if ($filesize < 300000) {
                    if ($filename == $_SESSION["doctorpicture"]) {
                        $_SESSION["doctorpicture"] = $filename;
                    } else {
                        $_SESSION["doctorpicture"] = $filename;
                        move_uploaded_file($filetmp, "../pic/$filename");
                    }
                } else {
                    echo "<script>alert('The picture you've selected is too large in size (" . ($filesize / 100) . "MB.)');</script>";
                }
            } else {
                echo "<script>alert('Failed to upload.');</script>";
            }
        } else {
            echo "<script>alert('The picture you've selected is not in the correct format. Please select again.');</script>";
        }
    }

    //text-data processing
    $name = $_POST["name"];
    $email = $_POST["email"];
    $contactnumber = $_POST["contact-number"];
    $specialist = $_POST["specialist"];
    $description = $_POST["description"];

    $sql = "SELECT * FROM doctor_info WHERE email = '$email'";
    $result = mysqli_query($connection, $sql);

    $sql1 = "SELECT * FROM patient_info WHERE email = '$email'";
    $result1 = mysqli_query($connection, $sql1);

    $sql2 = "SELECT * FROM admin_info WHERE email = '$email'";
    $result2 = mysqli_query($connection, $sql2);

    if (str_contains($email, "gmail.com") || str_contains($email, "outlook.com") || str_contains($email, "hotmail.com") || str_contains($email, "segi4u.my") || str_contains($email, "segi.edu.my")) {
        if (mysqli_num_rows($result) == 0 && mysqli_num_rows($result1) == 0 && mysqli_num_rows($result2) == 0) {

            $sql3 = "SELECT * FROM doctor_info WHERE contact_number = '$contactnumber'";
            $result3 = mysqli_query($connection, $sql3);
            if (mysqli_num_rows($result3) == 0) {
                $_SESSION["doctorname"] = $name;
                $_SESSION["doctoremail"] = $email;
                $_SESSION["doctorcontactnumber"] = $contactnumber;
                $_SESSION["doctorspecialist"] = $specialist;
                $_SESSION["doctordescription"] = $description;

                echo "<script>window.location.href = 'doctor-set-pass.php';</script>";
            } else {
                echo "<script>alert('Contact number already exists.');</script>";
            }
        } else {
            echo "<script>alert('Email already exists. Please provide another email address.');</script>";
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
    <!--jQuery CDN-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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

        .form-field-long-wide {
            position: absolute;
            width: 90%;
            height: 30%;
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
            top: 110%;
            left: 100%;
            background-color: #c9e6f3;
            color: white;
            border: none;
            border-radius: 10px;
            font-family: Roboto;
            display: block;
        }

        #heading {
            font-family: Roboto;
            position: absolute;
            top: 14%;
            left: 3%;
            font-size: 2.0rem;
            font-weight: 400;
        }

        #doctor-nav-btn {
            border: 3px solid white;
            background-color: #9dbdea;
        }

        #doctor-nav-btn .st0 {
            stroke: white;
        }

        #doctor-nav-btn .nav-btn-label {
            color: white;
        }

        #doctor-nav-btn:hover {
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
            height: 150%;
            left: -25%;
            top: -25%;
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

        #file-container {
            position: absolute;
            top: -45%;
            left: 30%;
            width: 28%;
            height: 15%;
            border: 0px solid black;
            display: flex;
            align-items: center;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1 id="heading">Doctor / New</h1>
    <div id="img-container">
        <img id="profile-picture" src="../pic/profile.png" alt="Profile Picture">
    </div>
    <div id="form-container">
        <form action="add-doctor.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <div id="file-container">
                <input type="file" name="picture" required>
            </div>
            <label for="name" class="form-label-left">Name:</label>
            <br>
            <input type="text" class="form-field-short-left" id="name" name="name" required>
            <br><br><br>
            <label for="email" class="form-label-left">Email:</label>
            <label for="contactnumber" class="form-label-right">Contact Number:</label>
            <br>
            <input type="email" class="form-field-short-left" id="email" name="email" required>
            <input type="text" class="form-field-short-right" id="contactnumber" name="contact-number" pattern="[0-9]{3}-[0-9]{7}" placeholder="016-3679616" required>
            <br><br><br>
            <label for="specialist" class="form-label-left">Specialist:</label>
            <br>
            <input type="text" class="form-field-long-narrow" id="specialist" name="specialist" required>
            <br><br><br>
            <label for="description" class="form-label-left">Description:</label>
            <br>
            <input type="text" class="form-field-long-wide" id="description" name="description" required>
            <input type="submit" class="submit-btn" id="submit-btn" name="next" value="Next" disabled>
        </form>
    </div>
    <script>
        const name = document.getElementById("name");
        const email = document.getElementById("email");
        const contactnumber = document.getElementById("contactnumber");
        const specialist = document.getElementById("specialist");
        const description = document.getElementById("description");
        const submit = document.getElementById("submit-btn");

        let namefilled = false;
        let emailfilled = false;
        let contactnumberfilled = false;
        let specialistfilled = false;
        let descriptionfilled = false;

        name.addEventListener("input", checkname);
        name.addEventListener("input", toupper);
        email.addEventListener("input", checkemail);
        email.addEventListener("input", tolower);
        contactnumber.addEventListener("input", checkcontactnumber);
        specialist.addEventListener("input", checkspecialist);
        description.addEventListener("input", checkdescription);

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
            if (namefilled == true && emailfilled == true && contactnumberfilled == true && specialistfilled == true && descriptionfilled == true) {
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
            if (namefilled == true && emailfilled == true && contactnumberfilled == true && specialistfilled == true && descriptionfilled == true) {
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
            if (namefilled == true && emailfilled == true && contactnumberfilled == true && specialistfilled == true && descriptionfilled == true) {
                submit.disabled = false;
                submit.style.backgroundColor = "#9dd1ea";
                submit.addEventListener("mouseover", hover);
                submit.addEventListener("mouseout", unhover);
            }
        }

        function checkspecialist() {
            if (specialist.value.length > 0) {
                specialistfilled = true;
            } else {
                specialistfilled = false;
                submit.disabled = true;
                submit.style.backgroundColor = "#cbeeff";
                submit.removeEventListener("mouseover", hover);
                submit.removeEventListener("mouseout", unhover);
            }
            if (namefilled == true && emailfilled == true && contactnumberfilled == true && specialistfilled == true && descriptionfilled == true) {
                submit.disabled = false;
                submit.style.backgroundColor = "#9dd1ea";
                submit.addEventListener("mouseover", hover);
                submit.addEventListener("mouseout", unhover);
            }
        }

        function checkdescription() {
            if (description.value.length > 0) {
                descriptionfilled = true;
            } else {
                descriptionfilled = false;
                submit.disabled = true;
                submit.style.backgroundColor = "#cbeeff";
                submit.removeEventListener("mouseover", hover);
                submit.removeEventListener("mouseout", unhover);
            }
            if (namefilled == true && emailfilled == true && contactnumberfilled == true && specialistfilled == true && descriptionfilled == true) {
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