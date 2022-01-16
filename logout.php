<?php
session_start();
unset($_SESSION["ID"]);
unset($_SESSION["First_name"]);
unset($_SESSION["Last_name"]);
unset($_SESSION["Email"]);

if ($_SESSION["biletler"]) {
    header("Location:Etkinlikler/Biletler.php");
} else if ($_SESSION["main_page"]) {
    header("Location:Anasayfa/index.php");
}
session_destroy();
