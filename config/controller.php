<?php

// Menampilkan data
function select($query)
{
    // Panggil database
    global $db;

    $result = mysqli_query($db, $query);
    $rows = [];

    while ($row = mysqli_fetch_array($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function create_barang($post)
{
    global $db;

    $nama = $post['nama'];
    $jumlah = $post['jumlah'];
    $harga = $post['harga'];

    $query = "INSERT INTO barang VALUES ('', '$nama', '$jumlah', '$harga', CURRENT_TIMESTAMP())";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// Fungsi mengubah data barang
function update_barang($post)
{
    global $db;

    $id_barang = $post['id_barang'];

    $nama = strip_tags($post['nama']);
    $jumlah = strip_tags($post['jumlah']);
    $harga = strip_tags($post['harga']);

    $query = "UPDATE barang SET nama = '$nama', jumlah = '$jumlah', harga = '$harga' WHERE id_barang = $id_barang";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// Fungsi menghapus data barang
function delete_barang($id_barang)
{
    global $db;

    // Query hapus data barang 
    $query = "DELETE FROM barang WHERE id_barang = $id_barang";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// Fungsi menambah data siswa
function create_siswa($post)
{
    global $db;

    $nama = strip_tags($post['nama']);
    $jurusan = strip_tags($post['jurusan']);
    $jk = strip_tags($post['jk']);
    $telepon = strip_tags($post['telepon']);
    $alamat = strip_tags($post['alamat']);
    $email = strip_tags($post['email']);
    $foto = upload_file();

    // check upload foto
    if (!$foto) {
        return false;
    }

    $query = "INSERT INTO siswa VALUES ('', '$nama', '$jurusan', '$jk', '$telepon', '$alamat', '$email' , '$foto')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// Fungsi mengubah data siswa
function upload_file()
{
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    // check file yang diupload
    $extensifileValid = ['jpg', 'jpeg', 'png'];
    $extensifile = explode('.', $namaFile);
    $extensifile = strtolower(end($extensifile));

    // check format/extensifile
    if (!in_array($extensifile, $extensifileValid)) {
        echo "<script>
            alert('File yang diupload bukan gambar');
            document.location.href = 'tambah-siswa.php';
        </script>";
        die();
    }

    // check ukuran file max 2MB
    if ($ukuranFile > 2000000) {
        echo "<script>
            alert('Ukuran file max 2MB');
            document.location.href = 'tambah-siswa.php';
        </script>";
        die();
    }

    // generate nama file baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensifile;

    // pindahkan file ke folder
    move_uploaded_file($tmpName, 'assets/images/' . $namaFileBaru);
    return $namaFileBaru;
}

// Fungsi menghapus data siswa
function delete_siswa($id_siswa)
{
    global $db;

    // ambil foto sesuai data yang dipilih
    $foto = select("SELECT foto FROM siswa WHERE id_siswa = $id_siswa")[0];
    unlink("assests/images/" . $foto['foto']);

    // Query hapus data siswa
    $query = "DELETE FROM siswa WHERE id_siswa = $id_siswa";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// Fungsi mengubah data siswa
function update_siswa($post)
{
    global $db;

    $id_siswa = $post['id_siswa'];
    $nama = strip_tags($post['nama']);
    $jurusan = strip_tags($post['jurusan']);
    $jk = strip_tags($post['jk']);
    $telepon = strip_tags($post['telepon']);
    $alamat = strip_tags($post['alamat']);
    $email = strip_tags($post['email']);
    $fotoLama = strip_tags($post['fotoLama']);

    // check upload foto baru atau tidak
    if ($_FILES['foto']['error'] == 4) {
        $foto = $fotoLama;
    } else {
        $foto = upload_file();
    }

    // Query update data siswa
    $query = "UPDATE siswa SET nama = '$nama', jurusan = '$jurusan', jk = '$jk', telepon = '$telepon', alamat = '$alamat', email = '$email', foto = '$foto' WHERE id_siswa = $id_siswa";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi tambah akun
function create_akun($post)
{
    global $db;

    $nama = strip_tags($post['nama']);
    $username = strip_tags($post['username']);
    $email = strip_tags($post['email']);
    $password = strip_tags($post['password']);
    $level = strip_tags($post['level']);

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // query tambah data
    $query = "INSERT INTO akun VALUES ('', '$nama', '$username', '$email', '$password', '$level')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}
function update_akun($post)
{
    global $db;

    $id_akun = strip_tags($post['id_akun']);
    $nama = strip_tags($post['nama']);
    $username = strip_tags($post['username']);
    $email = strip_tags($post['email']);
    $password = strip_tags($post['password']);
    $level = strip_tags($post['level']);

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // query tambah data
    $query = "UPDATE akun SET nama = '$nama', username = '$username', email = '$email', password = '$password', level = '$level' WHERE id_akun = $id_akun";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function delete_akun($id_akun)
{
    global $db;

    // Query hapus data akun
    $query = "DELETE FROM akun WHERE id_akun = $id_akun";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}
