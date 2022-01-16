<?php
$url = 'localhost';
$username = 'root';
$password = '';
$conn = mysqli_connect($url, $username, $password, "ticket");
$sorgu = mysqli_query($conn, "SELECT * FROM user");
