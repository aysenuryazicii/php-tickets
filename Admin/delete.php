<?php
session_start();
ob_start();

include "../databaseTicket.php";
include "../databaseUser.php";

$users = $_GET['users'];
$events = $_GET['events'];

if (isset($_SESSION["users"])) {
    mysqli_query($con, "DELETE FROM user WHERE id=$users");
    header("Location: Admin.php");
}
if (isset($_SESSION["events"])) {
    mysqli_query($con, "DELETE FROM tickets_info WHERE id=$events");
    header("Location: Admin.php");
}

mysqli_close($con);

ob_end_flush();
session_destroy();
