<?php
session_start();
include("../include/database.php");
include("../include/admin-navbar.php");
include("../include/mini-sidenavbar-doctor.php");


$id = $_SESSION["doctorid"];
$sql = "SELECT * FROM doctor_info WHERE id = '$id'";
$result = mysqli_query($connection, $sql);
$valuereturned = mysqli_fetch_assoc($result);

$_SESSION["doctorid"] = $valuereturned["id"];
$_SESSION["doctorname"] = $valuereturned["name"];
$_SESSION["doctoremail"] = $valuereturned["email"];
$_SESSION["doctorcontactnumber"] = $valuereturned["contact_number"];
$_SESSION["doctorspecialist"] = $valuereturned["specialist"];
$_SESSION["doctordescription"] = $valuereturned["description"];
$_SESSION["doctorpicture"] = $valuereturned["picture"];
$_SESSION["doctorpassword"] = $valuereturned["password"];

$id = $_SESSION["doctorid"];
$sql1 = "SELECT * FROM doctor_info WHERE id = '$id'";
$result1 = mysqli_query($connection, $sql1);
$valuereturned1 = mysqli_fetch_assoc($result1);
$_SESSION["originaldoctorpicture"] = $valuereturned1["picture"];


if (isset($_POST['save'])) {
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

    $_SESSION["doctorname"] = $name;
    $_SESSION["doctoremail"] = $email;
    $_SESSION["doctorcontactnumber"] = $contactnumber;
    $_SESSION["doctorspecialist"] = $specialist;
    $_SESSION["doctordescription"] = $description;


    $sql = "UPDATE doctor_info SET name = '$name', email = '$email', contact_number = '$contactnumber', specialist = '$specialist', description = '$description', picture = '".$filename."' WHERE id = '" . $_SESSION["doctorid"] . "'";
    if (mysqli_query($connection, $sql)) {
        $_SESSION["doctorpicture"] = $filename;
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
            left: -28%;
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
    <h1 id="heading">Doctor / Edit</h1>
    <div id="img-container">
        <img id="profile-picture" src="../pic/<?php echo $_SESSION["doctorpicture"]; ?>" alt="Profile Picture">
    </div>
    <div id="form-container">
        <form action="edit-doctor.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <div id="file-container">
                <input type="file" name="picture" required>
            </div>
            <label for="name" class="form-label-left">Name:</label>
            <br>
            <input type="text" class="form-field-short-left" id="name" name="name" value="<?php echo $_SESSION["doctorname"]; ?>">
            <br><br><br>
            <label for="email" class="form-label-left">Email:</label>
            <label for="contactnumber" class="form-label-right">Contact Number:</label>
            <br>
            <input type="email" class="form-field-short-left" id="email" name="email" value="<?php echo $_SESSION["doctoremail"]; ?>">
            <input type="text" class="form-field-short-right" id="contactnumber" pattern="[0-9]{3}-[0-9]{7}" name="contact-number" value="<?php echo $_SESSION["doctorcontactnumber"]; ?>">
            <br><br><br>
            <label for="specialist" class="form-label-left">Specialist:</label>
            <br>
            <input type="text" class="form-field-long-narrow" id="specialist" name="specialist" value="<?php echo $_SESSION["doctorspecialist"]; ?>">
            <br><br><br>
            <label for="description" class="form-label-left">Description:</label>
            <br>
            <input type="text" class="form-field-long-wide" id="description" name="description" value="<?php echo $_SESSION["doctordescription"]; ?>">
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