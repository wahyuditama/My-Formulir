<?php

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "tes_daftar";

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: ");
}
