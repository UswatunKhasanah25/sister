<?php
require("vendor/autoload.php");
require("koneksi.php");

use Dompdf\Dompdf;

$nomor = 1;
$query = 'SELECT * FROM tbpinjam ORDER BY idpinjam';
$q_tampil_pinjam = mysqli_query($db, $query);

$html = '<h1>Daftar Transaksi Peminjaman</h1>';
$html .= '<table width="100%" border="1" cellspacing="0" cellpadding="2">
			<thead>
				<tr>
                    <th id="label-tampil-no">No</th>
                    <th>ID Peminjaman</th>
                    <th>Kode Judul Buku</th>
                    <th>Kode Nama Anggota</th>
                    <th>Waktu Peminjaman</th>
				</tr>
			</thead>
			<tbody>';
                
                if (mysqli_num_rows($q_tampil_pinjam) >0) {
                    while ($r_tampil_pinjam = mysqli_fetch_array($q_tampil_pinjam)) {
                       
 $html .= '<tr>
                <td>'.$nomor.'</td>
                <td>'.$r_tampil_pinjam['idpinjam'].'</td>
                <td>'.$r_tampil_pinjam['idbuku'].'</td>
                <td>'.$r_tampil_pinjam['idanggota'].'</td>
                <td>'.$r_tampil_pinjam['tanggal'].'</td>
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