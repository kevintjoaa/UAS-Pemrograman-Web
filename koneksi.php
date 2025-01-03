<?php
$servername = "localhost";
$database = "inventaris";
$username = "root";
$password = "";


// Koneksi ke database
$conn = mysqli_connect($servername, $username, $password, $database);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

