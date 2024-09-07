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
        document.location.href = 'akun.php';
    </script>";
    exit;
}

require 'config/app.php';

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A2', 'No');
$sheet->setCellValue('B2', 'Name');
$sheet->setCellValue('C2', 'Jurusan');
$sheet->setCellValue('D2', 'Jenis Kelamin');
$sheet->setCellValue('E2', 'Telepon');
$sheet->setCellValue('F2', 'Email');
$sheet->setCellValue('G2', 'Foto');

$data_siswa = select("SELECT * FROM siswa");

$no = 1;
$start = 3;

foreach ($data_siswa as $siswa) {
    $sheet->setCellValue('A' . $start, $no++)->getColumnDimension('A')->setAutoSize(true);
    $sheet->setCellValue('B' . $start, $siswa['nama'])->getColumnDimension('B')->setAutoSize(true);
    $sheet->setCellValue('C' . $start, $siswa['jurusan'])->getColumnDimension('C')->setAutoSize(true);
    $sheet->setCellValue('D' . $start, $siswa['jk'])->getColumnDimension('D')->setAutoSize(true);
    $sheet->setCellValue('E' . $start, $siswa['telepon'])->getColumnDimension('E')->setAutoSize(true);
    $sheet->setCellValue('F' . $start, $siswa['email'])->getColumnDimension('F')->setAutoSize(true);
    $sheet->setCellValue('G'. $start, 'http://localhost/crud-php/assets/images/'.$siswa['foto'])->getColumnDimension('G')->setAutoSize(true);

    $start++;
}

// table border
$styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
];

$border = $start -1;

$sheet->getStyle('A2:G'.$border)->applyFromArray($styleArray);

$writer = new Xlsx($spreadsheet);
$writer->save('Laporan Data Siswa.xlsx');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheet.sheet');
header('Content-Disposition: attachment;filename=Laporan Data Siswa.xlsx');
readfile('Laporan Data Siswa.xlsx');
unlink('Laporan Data Siswa.xlsx');
exit;
