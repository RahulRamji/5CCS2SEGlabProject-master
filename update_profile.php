<?php 
if (isset($_POST["update-profile"])) {
    require 'db_credentials.php';

    $email = $_GET['email'];
    $phone = $_POST['phone'];
    $address = $_POST['maddress'];

    $updateprofile = $mysqli->query("UPDATE member SET phone = '$phone', address = '$address'
                      WHERE email = '$email'");

if ($updateprofile) {
    header("Location: ../public/profile.php");
    exit();
     } else {
        header("Location: ../public/profile.php");
        exit();
     }

}     
?>