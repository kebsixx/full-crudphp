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
if (isset($_POST['tambah'])) {
    if (create_siswa($_POST) > 0) {
        echo "<script>
            alert('Data berhasil ditambahkan');
            document.location.href = 'siswa.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal ditambahkan');
            document.location.href = 'siswa.php';
        </script>";
    }
};
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-plus"></i> Tambah Siswa</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="siswa.php">Data Siswa</a></li>
                        <li class="breadcrumb-item active">Tambah Siswa</li>
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
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Siswa</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Siswa.." required>
                </div>
                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <select name="jurusan" id="jurusan" class="form-control" required>
                            <option value="">--- pilih jurusan ---</option>
                            <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                            <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                            <option value="Teknik Instalasi Tenaga Listrik">Teknik Instalasi Tenaga Listrik</option>
                            <option value="Teknik Logistik">Teknik Logistik</option>
                            <option value="Teknik Pemesinan">Teknik Pemesinan</option>
                        </select>
                    </div>
                    <div class="mb-3 col-6">
                        <label for="jk" class="form-label">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control" required>
                            <option value="">--- pilih jenis kelamin ---</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="telepon" class="form-label">No. Telepon</label>
                    <input type="number" class="form-control" id="telepon" name="telepon" placeholder="No. Telepon.." required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" id="alamat"></textarea>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email.." required>
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto..." onchange="previewImg()" required>

                    <img src="" alt="" class="img-thumbnail img-preview mt-2" width="200px">
                </div>

                <div class="mb-3">
                    <button type="submit" name="tambah" class="btn btn-primary float-end">Tambah</button>
                </div>
            </form>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<?php include 'layout/footer.php' ?>