<?php
session_start();
$_SESSION = [];
session_destroy();
echo "<script>window.location.replace('../authentication/signin.php');</script>";
?>