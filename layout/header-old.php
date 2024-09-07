<?php

include "config/database.php";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">CRUD PHP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?php if ($_SESSION['level'] == 1 or $_SESSION['level'] == 2) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Barang</a>
                        </li>
                    <?php endif; ?>
                    <?php if ($_SESSION['level'] == 1 or $_SESSION['level'] == 3) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="siswa.php">Siswa</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="akun.php">Akun</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php" onclick="return confirm('Yakin ingin keluar ?');">Keluar</a>
                    </li>
                </ul>
            </div>
            <div>
                <a href=" #" class="navbar-brand"><?= $_SESSION['nama']; ?></a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->