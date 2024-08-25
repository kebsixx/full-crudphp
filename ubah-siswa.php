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

$title = "Tambah Siswa";

include "layout/header.php";
include "config/app.php";

// check apakah tombol tambah ditekan
if (isset($_POST['ubah'])) {
    if (update_siswa($_POST) > 0) {
        echo "<script>
            alert('Data berhasil diubah');
            document.location.href = 'siswa.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal diubah');
            document.location.href = 'siswa.php';
        </script>";
    }
};

// Mengambil id siswa dari url
$id_siswa = (int)$_GET['id_siswa'];

// Mengambil data siswa berdasarkan id siswa
$siswa = select("SELECT * FROM siswa WHERE id_siswa = $id_siswa")[0];

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-edit"></i>Ubah Siswa</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="siswa.php">Data Siswa</a></li>
                        <li class="breadcrumb-item active">Ubah Siswa</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_siswa" value="<?= $siswa['id_siswa']; ?>">
                <input type="hidden" name="fotoLama" value="<?= $siswa['foto']; ?>">

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Siswa</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Siswa.." value="<?= $siswa['nama']; ?>" required>
                </div>
                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <select name="jurusan" id="jurusan" class="form-control" required>
                            <?php $jurusan = $siswa['jurusan']; ?>
                            <option value="Teknik Komputer dan Jaringan" <?= $jurusan == "Teknik Komputer dan Jaringan" ? "selected" : "" ?>>Teknik Komputer dan Jaringan</option>
                            <option value="Rekayasa Perangkat Lunak" <?= $jurusan == "Rekayasa Perangkat Lunak" ? "selected" : "" ?>>Rekayasa Perangkat Lunak</option>
                            <option value="Teknik Instalasi Tenaga Listrik" <?= $jurusan == "Teknik Instalasi Tenaga Listrik" ? "selected" : "" ?>>Teknik Instalasi Tenaga Listrik</option>
                            <option value="Teknik Pemesinan" <?= $jurusan == "Teknik Pemesinan" ? "selected" : "" ?>>Teknik Pemesinan</option>
                            <option value="Teknik Logistik" <?= $jurusan == "Teknik Logistik" ? "selected" : "" ?>>Teknik Logistik</option>
                        </select>
                    </div>
                    <div class="mb-3 col-6">
                        <label for="jk" class="form-label">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control" required>
                            <?php $jk = $siswa['jk']; ?>
                            <option value="Laki-laki" <?= $siswa['jk'] == "Laki-laki" ? "selected" : "" ?>>Laki-laki</option>
                            <option value="Perempuan" <?= $siswa['jk'] == "Perempuan" ? "selected" : "" ?>>Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="telepon" class="form-label">No. Telepon</label>
                    <input type="text" class="form-control" id="telepon" name="telepon" placeholder="No. Telepon.." value="<?= $siswa['telepon']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea id="alamat" name="alamat" placeholder="Alamat.."><?= $siswa['alamat']; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email.." value="<?= $siswa['email']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" class="form-control" id="foto" name="foto" onchange="previewImg()">

                    <img src="assets/images/<?= $siswa['foto']; ?>" class="img-preview img-fluid mt-3" alt="Foto Siswa" width="100">
                </div>

                <button type="submit" name="ubah" class="btn btn-primary float-end">Ubah</button>
            </form>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<?php include 'layout/footer.php' ?>