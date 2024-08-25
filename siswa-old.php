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

// Membatasi halaman sesuai user login
if ($_SESSION['level'] != 1 and $_SESSION['level'] != 3) {
    echo "<script>
        alert('Perhatian anda tidak punya hak akses');
        document.location.href = 'crud-modal.php';
    </script>";
    exit;
}

$title = "Daftar Siswa";

include 'layout/header.php';
include 'config/controller.php';

// Menampilkan data siswa
$data_siswa = select("SELECT * FROM siswa ORDER BY id_siswa DESC");

?>

<div class="container mt-5">
    <h1><i class="fas fa-users"></i> Data Siswa</h1>
    <hr>

    <a href="tambah-siswa.php" class="btn btn-primary mb-1"><i class="fas fa-plus-circle"></i> Tambah</a>
    <a href="download-excel-siswa.php" class="btn btn-success mb-1"><i class="fas fa-file-excel"></i> Download Excel</a>
    <a href="download-pdf-siswa.php" class="btn btn-danger mb-1"><i class="fas fa-file-pdf"></i> Download PDF</a>

    <table class="table table-bordered table-striped mt-3" id="table">
        <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">Nama</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">No. Telp</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 ?>
            <?php foreach ($data_siswa as $siswa) : ?>
                <tr>
                    <th><?= $no++; ?></th>
                    <td><?= $siswa['nama'] ?></td>
                    <td><?= $siswa['jurusan'] ?></td>
                    <td><?= $siswa['jk'] ?></td>
                    <td><?= $siswa['telepon'] ?></td>
                    <td width="35%" class="text-center">
                        <a href="detail-siswa.php?id_siswa=<?= $siswa['id_siswa']; ?>" class="btn btn-primary"><i class="fas fa-eye"></i> Detail</a>
                        <a href="ubah-siswa.php?id_siswa=<?= $siswa['id_siswa']; ?>" class="btn btn-success"><i class="fas fa-edit"></i> Ubah</a>
                        <a href="hapus-siswa.php?id_siswa=<?= $siswa['id_siswa']; ?>" class="btn btn-danger" onclick="return confirm('Yakin data siswa akan dihapus?')"><i class="fas fa-trash-alt"></i> Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'layout/footer.php'; ?>