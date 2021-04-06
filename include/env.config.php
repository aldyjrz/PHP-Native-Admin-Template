<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "db_indoarsip";

$kon = mysqli_connect($server, $username, $password, $database) or die("Koneksi gagal - " . mysqli_connect_error());
