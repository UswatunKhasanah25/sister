<?php
require("vendor/autoload.php");
require("koneksi.php");

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$nomor = 0;
$query = 'SELECT * FROM tbanggota ORDER BY idanggota';
$q_tampil_anggota = mysqli_query($db, $query);

$spreadsheet = new Spreadsheet();
$spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Daftar Anggota')
            ->setCellValue('A3', 'No')
            ->setCellValue('B3', 'ID Anggota')
            ->setCellValue('C3', 'Nama')
            ->setCellValue('D3', 'Foto')
            ->setCellValue('E3', 'Jenis Kelamin')
            ->setCellValue('F3', 'Alamat');

$sheet = $spreadsheet->getActiveSheet();

$index = 6;

if (mysqli_num_rows($q_tampil_anggota) >0) {
    while ($r_tampil_anggota = mysqli_fetch_array($q_tampil_anggota)) {
        if (empty($r_tampil_anggota['foto']) or ($r_tampil_anggota['foto'] == '-')) {
            $foto = "admin-no-photo.jpg";
        } else {
            $foto = $r_tampil_anggota['foto'];
        }

        $sheet->setCellValue('A'.$index, $nomor);
        $sheet->setCellValue('B'.$index, $r_tampil_anggota['idanggota']);
        $sheet->setCellValue('C'.$index, $r_tampil_anggota['nama']);
        $sheet->setCellValue('D'.$index, $r_tampil_anggota['foto']);
        $sheet->setCellValue('E'.$index, $r_tampil_anggota['jeniskelamin']);
        $sheet->setCellValue('F'.$index, $r_tampil_anggota['alamat']);

        $nomor++;
        $index++;
    }
}

$sheet->setTitle('Daftar Anggota Saya');
$spreadsheet->setActiveSheetIndex(0);

$filename = 'Daftar-Anggota-Saya.xlsx';

ob_end_clean();

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadhsheetml.sheet');
header('Content-Disposition: attachment; filename="' . $filename .'"');
header('Cache-Control: max-age=0');
header('Cache-Control: max-age=1');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: cache, must-revalidate');
header('Pragma: public');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit();
?>