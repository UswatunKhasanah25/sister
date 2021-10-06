<?php 
    include "../koneksi.php";
?>
<link rel="stylesheet" type="text/css" href="../style.css">
<h3>Data Buku</h3>
<div id="content">
    <table border="1" id="tabel-tampil">
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
        <tbody>
            <?php 
                $nomor = 1;
                $query = "SELECT * FROM tbbuku ORDER BY idbuku DESC";
                $q_tampil_buku = mysqli_query($db, $query);

                if (mysqli_num_rows($q_tampil_buku) >0) {
                    while ($r_tampil_buku = mysqli_fetch_array($q_tampil_buku)) {
                        if (empty($r_tampil_buku['cover']) or ($r_tampil_buku['cover'] == '-')) {
                            $cover = "admin-no-photo.jpg";
                        } else {
                            $cover = $r_tampil_buku['cover'];
                        }
            ?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $r_tampil_buku['idbuku']; ?></td>
                <td><?php echo $r_tampil_buku['judul']; ?></td>
                <td><img src="../images/<?php echo $cover; ?>" width="70px" height="70px"></td>
                <td><?php echo $r_tampil_buku['pengarang']; ?></td>
                <td><?php echo $r_tampil_buku['penerbit']; ?></td>
                <td><?php echo $r_tampil_buku['tahun']; ?></td>
            </tr>
            <?php 
                        $nomor++;
                    }
                }
            ?>
        </tbody>
    </table>
    <script>
        window.print();
    </script>
</div>