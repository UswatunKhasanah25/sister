<?php
require("vendor/autoload.php");
require("koneksi.php");

use Dompdf\Dompdf;

$nomor = 1;
$query = 'SELECT * FROM tbbuku ORDER BY idbuku';
$q_tampil_buku = mysqli_query($db, $query);

$html = '<h1>Daftar Buku</h1>';
$html .= '<table width="100%" border="1" cellspacing="0" cellpadding="2">
			<thead>
				<tr>
                    <th id="label-tampil-no">No</th>
                    <th>ID Buku</th>
                    <th>Judul</th>
                    <th>Cover</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
				</tr>
			</thead>
			<tbody>';
                
                if (mysqli_num_rows($q_tampil_buku) >0) {
                    while ($r_tampil_buku = mysqli_fetch_array($q_tampil_buku)) {
                        if (empty($r_tampil_buku['cover']) or ($r_tampil_buku['cover'] == '-')) {
                            $cover = "admin-no-photo.jpg";
                        } else {
                            $cover = $r_tampil_buku['cover'];
                        }
                       
 $html .= '<tr>
                <td>'.$nomor.'</td>
                <td>'.$r_tampil_buku['idbuku'].'</td>
                <td>'.$r_tampil_buku['judul'].'</td>
                <td><img src="http://localhost/jwd_11/images/'.$cover.'" width="70px" height="70px"></td>
                <td>'.$r_tampil_buku['pengarang'].'</td>
                <td>'.$r_tampil_buku['penerbit'].'</td>
                <td>'.$r_tampil_buku['tahun'].'</td>
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