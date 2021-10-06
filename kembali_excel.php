<?php
require("vendor/autoload.php");
require("koneksi.php");

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$nomor = 0;
$query = 'SELECT * FROM tbkembali ORDER BY idkembali';
$q_tampil_kembali = mysqli_query($db, $query);

$spreadsheet = new Spreadsheet();
$spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Daftar Transaksi Pengembalian')
            ->setCellValue('A3', 'No')
            ->setCellValue('B3', 'ID Pengembalian')
            ->setCellValue('C3', 'Kode Nama Anggota')
            ->setCellValue('D3', 'Kode Judul Buku')
            ->setCellValue('E3', 'Waktu Peminjaman')
            ->setCellValue('F3', 'Waktu Pengembalian')
            ->setCellValue('G3', 'Status');

$sheet = $spreadsheet->getActiveSheet();

$index = 7;

if (mysqli_num_rows($q_tampil_kembali) >0) {
    while ($r_tampil_kembali = mysqli_fetch_array($q_tampil_kembali)) {

        $sheet->setCellValue('A'.$index, $nomor);
        $sheet->setCellValue('B'.$index, $r_tampil_kembali['idkembali']);
        $sheet->setCellValue('C'.$index, $r_tampil_kembali['idanggota']);
        $sheet->setCellValue('D'.$index, $r_tampil_kembali['idbuku']);
        $sheet->setCellValue('E'.$index, $r_tampil_kembali['pinjam']);
        $sheet->setCellValue('F'.$index, $r_tampil_kembali['waktu']);
        $sheet->setCellValue('G'.$index, $r_tampil_kembali['status']);

        $nomor++;
        $index++;
    }
}

$sheet->setTitle('Daftar Transaksi Pengembalian');
$spreadsheet->setActiveSheetIndex(0);

$filename = 'Daftar-Pengembalian-Saya.xlsx';

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