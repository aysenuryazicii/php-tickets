<?php
session_start();
ob_start();

include "databaseTicket.php";
include "databaseUser.php";

$id = $_GET['id'];
if (isset($_SESSION["ID"])) {
    header('Location:payment.php?id=' . $id . '');
} else {
    $_SESSION["alert"] = "Bilet almak için giriş yapmalısınız!";
    header("Location:Etkinlikler/Biletler.php");
}

mysqli_close($con);

ob_end_flush();
