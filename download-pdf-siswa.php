<?php

require __DIR__ . '/vendor/autoload.php';
require 'config/app.php';

use Spipu\Html2Pdf\Html2Pdf;

$data_siswa = select("SELECT * FROM siswa");

$content .= '
<page>
    <table border="1" align="center">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Jenis Kelamin</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Foto</th>
        </tr>';

$no = 1;
foreach ($data_siswa as $siswa) {
    $content .= '
                <tr>
                    <td>' . $no++ . '</td>
                    <td>' . $siswa['nama'] . '</td>
                    <td>' . $siswa['jurusan'] . '</td>
                    <td>' . $siswa['jk'] . '</td>
                    <td>' . $siswa['telepon'] . '</td>
                    <td>' . $siswa['email'] . '</td>
                    <td><img src="assets/images/' . $siswa['foto'] . '" width="50"></td>
                </tr>
            ';
}

$content .= '
    </table>
</page>
';

$html2pdf = new Html2Pdf();
$html2pdf->writeHTML($content);
ob_start();
$html2pdf->output('laporan-siswa.pdf');
