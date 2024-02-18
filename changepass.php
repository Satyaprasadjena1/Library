<?php
session_start();
require("config/database.php");
require_once("config/inputvalidation.php");
if ($_POST['register']) {
    if ($_POST['urpassword'] == $_POST['password_confirm']) {
        $phoneotp = 'PH-' . rand(1000, 5555);
        $updatepass = $connection->query("UPDATE `register` SET `user_password` = '" . md5input($_POST['password_confirm']) . "',`user_phone_otp`='$phoneotp' WHERE `User_email` = '" . $_SESSION['updateotp'] . "'");
        $_SESSION['email'] = $_SESSION['updateotp'];
        $_SESSION['phone'] = $_POST['phone'];
        echo "<script>window.location.replace('otp_verify.php')</script>";
    } else {
        echo "<script>alert('password doesnt match')</script>";
        echo "<script>window.location.replace('readprofile.php')</script>";
    }
} else {
    echo "<script>window.location.replace('home.php')</script>";
}
