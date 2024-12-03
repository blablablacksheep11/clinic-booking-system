<?php
session_start();
include("../include/database.php");

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST["id"])) {
    $id = $_POST["id"];

    $sql = "SELECT * FROM appointment WHERE id = '$id'";
    $result = mysqli_query($connection, $sql);
    $valuereturned = mysqli_fetch_assoc($result);

    $sql1 = "SELECT email, name FROM admin_info WHERE id = 1";
    $result1 = mysqli_query($connection, $sql1);
    $valuereturned1 = mysqli_fetch_assoc($result1);

    $sql2 = "SELECT name FROM patient_info WHERE id = '" . $valuereturned["patientid"] . "'";
    $result2 = mysqli_query($connection, $sql2);
    $patientname = mysqli_fetch_assoc($result2);

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
        $mail->Password   = 'secret';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('lamyongqin@gmail.com', "Dr. " . $_SESSION["doctorname"]);
        $mail->addAddress($valuereturned1["email"], $valuereturned1["name"]);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Request to delete appointment';
        $mail->Body    = "Dear " . $valuereturned1["name"] . ", <br><br><b>&nbsp;&nbsp;&nbsp;&nbsp;You have received an appointment request from " . $_SESSION["doctorname"] . ", who wishes to delete an appointment with " . $patientname["name"] . " on " . $valuereturned["date"] . ", " . $valuereturned["time"] . ".</b>";

        $mail->send();
    } catch (Exception $e) {
    }
} else{
    echo "<script>alert('Your delete appointment request has been sent. You will be notified once your request is accepted.');</script>";
}
