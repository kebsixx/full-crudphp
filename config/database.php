<?php
$db = mysqli_connect("localhost", "root", "", "crud");

// cek koneksi
if (!$db) {
    echo "gagal";
}
