<?php
$url = 'localhost';
$username = 'root';
$password = '';
$con = mysqli_connect($url, $username, $password, "ticket");
$sorgu = mysqli_query($con, "SELECT * FROM tickets_info");
