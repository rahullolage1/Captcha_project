<?php

$server = "localhost";
$username = "root";
$password = "root";
$dbname = "captcha";

$conn = mysqli_connect($server, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed");
}
