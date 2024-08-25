<?php

session_start();

// Membatasi halaman sebelum login
if (!isset($_SESSION['login'])) {
    echo "<script>
        alert('Login dulu bro');
        document.location.href = 'login.php';
    </script>";
    exit;
}

include 'config/app.php';

// mengambil id barang yang dipilih pengguna
$id_barang = (int)$_GET['id_barang'];

if (delete_barang($id_barang) > 0) {
    echo '<script>
        alert("Data barang berhasil dihapus");
        document.location.href = "index.php";
    </script>';
} else {
    echo '<script>
        alert("Data barang berhasil dihapus");
        document.location.href = "index.php";
    </script>';
}
