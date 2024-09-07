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

// mengambil id siswa yang dipilih pengguna
$id_akun = (int)$_GET['id_akun'];

if (delete_akun($id_akun) > 0) {
    echo '<script>
        alert("Data Akun berhasil dihapus");
        document.location.href = "akun.php";
    </script>';
} else {
    echo '<script>
        alert("Data Akun berhasil dihapus");
        document.location.href = "akun.php";
    </script>';
}
