<?php
session_start();
ob_start();
extract($_POST);
include "../databaseTicket.php";

$query = "INSERT INTO tickets_info(name, date, price, quantity ) VALUES ('$name', '$date', '$price', '$quantity')";
$sql = mysqli_query($con, $query);

header("Location:Admin.php");


ob_end_flush();
session_destroy();
