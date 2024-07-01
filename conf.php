<?php
$conn = mysqli_connect("localhost", "root", "", "db_pendataan");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
// mysqli_close($conn);
