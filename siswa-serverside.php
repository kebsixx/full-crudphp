<?php
include 'config/database.php';

if ($_GET['action'] == "table_data") {

    $columns = array(
        0 => 'id_siswa',
        1 => 'nama',
        2 => 'jurusan',
        3 => 'jk',
        4 => 'telepon',
        5 => 'id_siswa'
    );

    $querycount = $db->query("SELECT count(id_siswa) as jumlah FROM siswa");
    $datacount = $querycount->fetch_array();

    $totalData = $datacount['jumlah'];

    $totalFiltered = $totalData;

    $limit = $_POST['length'];
    $start = $_POST['start'];
    $order = $columns[$_POST['order']['0']['column']];
    $dir = $_POST['order']['0']['dir'];

    if (empty($_POST['search']['value'])) {
        $query = $db->query("SELECT id_siswa,nama,jurusan,jk,telepon FROM siswa ORDER BY $order $dir LIMIT $limit OFFSET $start");
    } else {
        $search = $_POST['search']['value'];
        $query = $db->query("SELECT id_siswa,nama,jurusan,jk,telepon FROM siswa WHERE nama LIKE '%$search%' OR telepon LIKE '%$search%' OR jurusan LIKE '%$search%' ORDER BY $order $dir LIMIT $limit OFFSET $start");

        $querycount = $db->query("SELECT count(id_siswa) as jumlah FROM siswa WHERE nama LIKE '%$search%' OR telepon LIKE '%$search%' OR jurusan LIKE '%$search%'");

        $datacount = $querycount->fetch_array();
        $totalFiltered = $datacount['jumlah'];
    }

    $data = array();
    if (!empty($query)) {
        $no = $start + 1;
        while ($value = $query->fetch_array()) {
            $nestedData['no'] = $no;
            $nestedData['nama'] = $value['nama'];
            $nestedData['jurusan'] = $value['jurusan'];
            $nestedData['jk'] = $value['jk'];
            $nestedData['telepon'] = $value['telepon'];
            $nestedData['aksi'] = '<div width="35%" class="text-center">
            <a href="detail-siswa.php?id_siswa=' . $value['id_siswa'] . '" class="btn btn-primary"><i class="fas fa-eye"></i> Detail</a>

            <a href="ubah-siswa.php?id_siswa=' . $value['id_siswa'] . '" class="btn btn-success"><i class="fas fa-edit"></i> Ubah</a>
            
            <a href="hapus-siswa.php?id_siswa=' . $value['id_siswa'] . '" class="btn btn-danger" onclick="return confirm("Yakin data siswa akan dihapus?")"><i class="fas fa-trash-alt"></i> Hapus</a>
        </div>';
            $data[] = $nestedData;
            $no++;
        }
    }

    $json_data = [
        "draw"            => intval($_POST['draw']),
        "recordsTotal"    => intval($totalData),
        "recordsFiltered" => intval($totalFiltered),
        "data"            => $data
    ];

    echo json_encode($json_data);
}
