<?php
require("vendor/autoload.php");
require("koneksi.php");

use Dompdf\Dompdf;

$nomor = 1;
$query = 'SELECT * FROM tbkembali ORDER BY idkembali';
$q_tampil_kembali = mysqli_query($db, $query);

$html = '<h1>Daftar Transaksi Pengembalian</h1>';
$html .= '<table width="100%" border="1" cellspacing="0" cellpadding="2">
			<thead>
				<tr>
                    <th id="label-tampil-no">No</th>
                    <th>ID Pengembalian</th>
                    <th>Nama Anggota</th>
                    <th>Judul Buku</th>
                    <th>Waktu Peminjaman</th>
                    <th>Waktu Pengembalian</th>
                    <th>Status</th>
				</tr>
			</thead>
			<tbody>';
                
                if (mysqli_num_rows($q_tampil_kembali) >0) {
                    while ($r_tampil_kembali = mysqli_fetch_array($q_tampil_kembali)) {
                       
 $html .= '<tr>
                <td>'.$nomor.'</td>
                <td>'.$r_tampil_kembali['idkembali'].'</td>
                <td>'.$r_tampil_kembali['idanggota'].'</td>
                <td>'.$r_tampil_kembali['idbuku'].'</td>
                <td>'.$r_tampil_kembali['pinjam'].'</td>
                <td>'.$r_tampil_kembali['waktu'].'</td>
                <td>'.$r_tampil_kembali['status'].'</td>
            </tr>' ;  
            
            $nomor++;
                    }
                } 
            
$html .= '</tbody></html>';  

$dompdf = new Dompdf();
$dompdf->set_option('isRemoteEnabled', TRUE);

$dompdf->load_html($html);
$dompdf->setPaper('a4', 'landscape');
$dompdf->render();
$dompdf->stream();
?>