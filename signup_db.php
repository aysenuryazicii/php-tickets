<?php
session_start();
ob_start();
extract($_POST);
include "databaseUser.php";

$query = "INSERT INTO user(First_Name, Last_Name, Email, Password ) VALUES ('$first_name', '$last_name', '$email', 'md5($pass)')";
$sql = mysqli_query($conn, $query);

if ($_SESSION["main_page"]) {
    header("Location:Anasayfa/index.php");
} else {
    header("Location:Etkinlikler/Biletler.php");
}

ob_end_flush();
