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

$title = "Detail Siswa";

include 'layout/header.php';
include 'config/controller.php';

// Mengambil id_siswa dari URL
$id_siswa = (int)$_GET['id_siswa'];

// Menampilkan data siswa
$siswa = select("SELECT * FROM siswa WHERE id_siswa = $id_siswa")[0];

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-edit"></i>Detail Siswa</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="siswa.php">Data Siswa</a></li>
                        <li class="breadcrumb-item active">Detail Siswa</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <table class="table table-bordered table-striped mt-3">
                <tr>
                    <th>Nama</th>
                    <td><?= $siswa['nama']; ?></td>
                </tr>
                <tr>
                    <th>Jurusan</th>
                    <td><?= $siswa['jurusan']; ?></td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td><?= $siswa['jk']; ?></td>
                </tr>
                <tr>
                    <th>No. Telp</th>
                    <td><?= $siswa['telepon']; ?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td><?= $siswa['alamat']; ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?= $siswa['email']; ?></td>
                </tr>
                <tr>
                    <th>Foto</th>
                    <td>
                        <a href="assets/images/<?= $siswa['foto']; ?>">
                            <img src="assets/images/<?= $siswa['foto']; ?>" alt="<?= $siswa['nama']; ?>" width="200">
                        </a>
                    </td>
                </tr>
            </table>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<?php include 'layout/footer.php'; ?>