<?php 
    include "../koneksi.php";
?>
<link rel="stylesheet" type="text/css" href="../style.css">
<h3>Data Transaksi Pengembalian</h3>
<div id="content">
    <table border="1" id="tabel-tampil">
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
        <tbody>
            <?php 
                $nomor = 1;
                $query = "SELECT * FROM tbkembali ORDER BY idkembali DESC";
                $q_tampil_kembali = mysqli_query($db, $query);

                if (mysqli_num_rows($q_tampil_kembali) >0) {
                    while ($r_tampil_kembali = mysqli_fetch_array($q_tampil_kembali)) {
            ?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $r_tampil_kembali['idkembali']; ?></td>
                <td><?php
                            $q_tampil_anggota = mysqli_query($db, "SELECT * FROM tbanggota");
                            if (mysqli_num_rows($q_tampil_anggota) >0) {
                                while ($r_tampil_anggota = mysqli_fetch_array($q_tampil_anggota)) {
                                    if ($r_tampil_kembali['idanggota'] == $r_tampil_anggota['idanggota']) {
                                        echo $r_tampil_anggota['nama'];
                                    }
                                }
                            }
                        ?></td>
                <td><?php
                            $q_tampil_buku = mysqli_query($db, "SELECT * FROM tbbuku");
                            if (mysqli_num_rows($q_tampil_buku) >0) {
                                while ($r_tampil_buku = mysqli_fetch_array($q_tampil_buku)) {
                                    if ($r_tampil_kembali['idbuku'] == $r_tampil_buku['idbuku']) {
                                        echo $r_tampil_buku['judul'];
                                    }
                                }
                            }
                        ?></td>
                <td><?php echo $r_tampil_kembali['pinjam']; ?></td>
                <td><?php echo $r_tampil_kembali['waktu']; ?></td>
                <td><?php echo $r_tampil_kembali['status']; ?></td>
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