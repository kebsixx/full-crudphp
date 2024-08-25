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
$id_siswa = (int)$_GET['id_siswa'];

if (delete_siswa($id_siswa) > 0) {
    echo '<script>
        alert("Data Siswa berhasil dihapus");
        document.location.href = "siswa.php";
    </script>';
} else {
    echo '<script>
        alert("Data Siswa berhasil dihapus");
        document.location.href = "siswa.php";
    </script>';
}
