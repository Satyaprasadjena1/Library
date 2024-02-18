<?php
session_start();
require 'config/database.php';
if (isset($_POST['nsubmit'])) {
    $selectemail = $connection->query("SELECT * FROM `register` WHERE `User_Email` = '" . $_POST['nemail'] . "' ");
    $countemail = $selectemail->num_rows;
    if ($countemail == 1) {
        $newotp = 'NO-' . rand(1000, 5555);
        $updateotp = $connection->query("UPDATE `register` SET `user_email_otp`= '$newotp' WHERE `User_Email` = '" . $_POST['nemail'] . "' ");
        if ($updateotp) {
            $_SESSION['updateotp'] = $_POST['nemail'];
            echo "<script>alert('otp is sent to your email check for otp')</script>";
            echo "<script>window.location.replace('forgotpassword.php')</script>";
        }
    }
}
if (isset($_POST['nosubmit'])) {
    $newotp = 'NO-' . $_POST['notp'];
    $selectotp = $connection->query("SELECT * FROM `register` WHERE `User_Email`='" . $_SESSION['updateotp'] . "' AND `user_email_otp`= '$newotp'");
    $count = $selectotp->num_rows;
    if ($count == 1) {
        $updateotp = $connection->query("UPDATE `register` SET `user_type`= '1' WHERE `User_Email` = '" . $_SESSION['updateotp'] . "' ");
        if ($updateotp) {
            echo "<script>window.location.replace('readprofile.php')</script>";
        }
    } else {
        echo "<script>alert('otp didnt match')</script>";

        echo "<script>window.location.replace('forgotpassword.php')</script>";
    }
}
