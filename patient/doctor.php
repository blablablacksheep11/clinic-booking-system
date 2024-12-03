<?php
session_start();
include("../include/database.php");
include("../include/patient-navbar.php");

if (isset($_POST["create"])) {
    $doctorid = $_POST["create"];
    $sql = "SELECT * FROM doctor_info WHERE id = '$doctorid'";
    $result = mysqli_query($connection, $sql);
    $valuereturned = mysqli_fetch_assoc($result);
    $_SESSION["doctorid"] = $valuereturned["id"];
    $_SESSION["doctorpicture"] = $valuereturned["picture"];
    $_SESSION["doctorname"] = $valuereturned["name"];
    $_SESSION["doctorspecialist"] = $valuereturned["specialist"];
    $_SESSION["doctordescription"] = $valuereturned["description"];
    $_SESSION["doctorselected"] = true;
    echo "<script>window.location.href = 'appointment.php';</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Google Font-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
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

        .doctor-name {
            font-family: Roboto;
            position: absolute;
            top: 68%;
        }

        .doctor-specialist {
            font-family: Roboto;
            position: absolute;
            top: 70%;
        }

        .doctor-description {
            font-family: Roboto;
            position: absolute;
            top: 76%;
            font-size: 0.8rem;
        }

        .submit-btn {
            position: absolute;
            height: 8%;
            width: 70%;
            top: 89%;
            left: 15%;
            background-color: #9dd1ea;
            color: white;
            border: none;
            border-radius: 10px;
            font-family: Roboto;
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

        #content-container {
            background-color: transparent;
            border: 0px solid black;
            position: absolute;
            top: 25%;
            height: 70%;
            width: 80%;
            display: flex;
            justify-content: space-between;
            gap: 30px;
            overflow-x: auto;
        }

        #content-container::-webkit-scrollbar {
            display: none;
        }

        #doctor-item {
            position: relative;
            background-color: transparent;
            height: 100%;
            min-width: 20%;
        }

        #img-container {
            position: absolute;
            width: 100%;
            height: 65%;
            border-radius: 10px;
            overflow: hidden;
        }

        #img {
            position: absolute;
            width: 100%;
            height: auto;
        }

        #create-btn:hover {
            background-color: #84c8e8;
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

        #left-arrow-btn {
            position: absolute;
            top: 45%;
            left: 3%;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 10%;
            width: fit-content;
            border: none;
            border-radius: 10px;
            background-color: transparent;
        }

        #left-arrow-btn:hover {
            background-color: #d9d9d9;
        }

        #right-arrow-btn {
            position: absolute;
            top: 45%;
            right: 3%;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 10%;
            width: fit-content;
            border-radius: 10px;
            background-color: transparent;
            border: none;
        }

        #right-arrow-btn:hover {
            background-color: #d9d9d9;
        }
    </style>
</head>

<body>
    <h1 id="heading">Doctor</h1>
    <div id="content-container">
        <?php
        $sql = "SELECT * FROM doctor_info";
        $result = mysqli_query($connection, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div id="doctor-item">
                <div id="img-container">
                    <img src="../pic/<?php echo $row['picture']; ?>" id="img">
                </div>
                <br>
                <b class="doctor-name"><?php echo $row['name']; ?></b>
                <br>
                <p class="doctor-specialist"><?php echo $row['specialist']; ?></p>
                <br>
                <p class="doctor-description"><?php echo $row['description']; ?></p>
                <form action="doctor.php" method="post">
                    <button type="submit" class="submit-btn" value=<?php echo strval($row['id']); ?> name="create" >Create Appointment</button>
                </form>
            </div>
        <?php
        }
        ?>
    </div>
    <button id="left-arrow-btn">
        <span class="material-symbols-outlined">chevron_left</span>
    </button>
    <button id="right-arrow-btn">
        <span class="material-symbols-outlined">chevron_right</span>
    </button>
    <script>
        const leftbtn = document.getElementById("left-arrow-btn");
        const rightbtn = document.getElementById("right-arrow-btn");

        rightbtn.addEventListener("click", function(){
            document.getElementById( "content-container" ).scrollLeft += 10;
        })

        leftbtn.addEventListener("click", function(){
            document.getElementById( "content-container" ).scrollLeft -= 10;
        })

        document.getElementById("content-container").addEventListener("wheel", function(e) {
            e.preventDefault();
        })


    </script>
</body>

</html>