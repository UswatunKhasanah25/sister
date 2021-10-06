<?php
require("vendor/autoload.php");
require("koneksi.php");

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$nomor = 0;
$query = 'SELECT * FROM tbpinjam ORDER BY idpinjam';
$q_tampil_pinjam = mysqli_query($db, $query);

$spreadsheet = new Spreadsheet();
$spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Daftar Transaksi Peminjaman')
            ->setCellValue('A3', 'No')
            ->setCellValue('B3', 'ID Peminjaman')
            ->setCellValue('C3', 'Kode Judul Buku')
            ->setCellValue('D3', 'Kode Nama Anggota')
            ->setCellValue('E3', 'Waktu Peminjaman');

$sheet = $spreadsheet->getActiveSheet();

$index = 5;

if (mysqli_num_rows($q_tampil_pinjam) >0) {
    while ($r_tampil_pinjam = mysqli_fetch_array($q_tampil_pinjam)) {

        $sheet->setCellValue('A'.$index, $nomor);
        $sheet->setCellValue('B'.$index, $r_tampil_pinjam['idpinjam']);
        $sheet->setCellValue('C'.$index, $r_tampil_pinjam['idbuku']);
        $sheet->setCellValue('D'.$index, $r_tampil_pinjam['idanggota']);
        $sheet->setCellValue('E'.$index, $r_tampil_pinjam['tanggal']);

        $nomor++;
        $index++;
    }
}

$sheet->setTitle('Daftar Transaksi Peminjaman');
$spreadsheet->setActiveSheetIndex(0);

$filename = 'Daftar-Peminjaman-Saya.xlsx';

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