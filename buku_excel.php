<?php
require("vendor/autoload.php");
require("koneksi.php");

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$nomor = 0;
$query = 'SELECT * FROM tbbuku ORDER BY idbuku';
$q_tampil_buku = mysqli_query($db, $query);

$spreadsheet = new Spreadsheet();
$spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Daftar Buku')
            ->setCellValue('A3', 'No')
            ->setCellValue('B3', 'ID Buku')
            ->setCellValue('C3', 'Judul')
            ->setCellValue('D3', 'Cover')
            ->setCellValue('E3', 'Pengarang')
            ->setCellValue('F3', 'Penerbit')
            ->setCellValue('G3', 'Tahun');

$sheet = $spreadsheet->getActiveSheet();

$index = 7;

if (mysqli_num_rows($q_tampil_buku) >0) {
    while ($r_tampil_buku = mysqli_fetch_array($q_tampil_buku)) {
        if (empty($r_tampil_buku['cover']) or ($r_tampil_buku['cover'] == '-')) {
            $cover = "admin-no-photo.jpg";
        } else {
            $cover = $r_tampil_buku['cover'];
        }

        $sheet->setCellValue('A'.$index, $nomor);
        $sheet->setCellValue('B'.$index, $r_tampil_buku['idbuku']);
        $sheet->setCellValue('C'.$index, $r_tampil_buku['judul']);
        $sheet->setCellValue('D'.$index, $r_tampil_buku['cover']);
        $sheet->setCellValue('E'.$index, $r_tampil_buku['pengarang']);
        $sheet->setCellValue('F'.$index, $r_tampil_buku['penerbit']);
        $sheet->setCellValue('F'.$index, $r_tampil_buku['tahun']);

        $nomor++;
        $index++;
    }
}

$sheet->setTitle('Daftar Buku Saya');
$spreadsheet->setActiveSheetIndex(0);

$filename = 'Daftar-Buku-Saya.xlsx';

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