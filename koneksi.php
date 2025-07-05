<?php
$host     = "localhost";    // Biasanya "localhost"
$user     = "root";         // Username database Anda
$password = "";             // Kosongkan jika tidak ada password (XAMPP)
$database = "siaga_bencana"; // Nama database Anda

$conn = mysqli_connect($host, $user, $password, $database);

// Periksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
