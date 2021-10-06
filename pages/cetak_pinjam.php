<?php 
    include "../koneksi.php";

    $id_pinjam = $_GET['id'];
    $q_tampil_pinjam = mysqli_query($db, "SELECT * FROM tbpinjam WHERE idpinjam = '$id_pinjam'");
    $r_tampil_pinjam = mysqli_fetch_array($q_tampil_pinjam);

?>
<div id="label-page"><h3>Kartu Peminjaman</h3></div>
<div id="content">
    <table id="tabel-input">
        <tr>
            <td class="label-formulir">ID Peminjaman</td>
            <td class="isian-formulir"><?php echo $r_tampil_pinjam['idpinjam']; ?></td>
        </tr>
        <tr>
            <td class="label-formulir">Judul Buku</td>
            <td><?php
                $q_tampil_buku = mysqli_query($db, "SELECT * FROM tbbuku");
                    if (mysqli_num_rows($q_tampil_buku) >0) {
                        while ($r_tampil_buku = mysqli_fetch_array($q_tampil_buku)) {
                            if ($r_tampil_pinjam['idbuku'] == $r_tampil_buku['idbuku']) {
                                echo $r_tampil_buku['judul'];
                            }
                        }
                    }
                ?></td>
        </tr>
        <tr>
            <td class="label-formulir">Nama Anggota</td>
            <td><?php
                $q_tampil_anggota = mysqli_query($db, "SELECT * FROM tbanggota");
                    if (mysqli_num_rows($q_tampil_anggota) >0) {
                        while ($r_tampil_anggota = mysqli_fetch_array($q_tampil_anggota)) {
                            if ($r_tampil_pinjam['idanggota'] == $r_tampil_anggota['idanggota']) {
                                echo $r_tampil_anggota['nama'];
                            }
                        }
                    }
                ?></td>
        </tr>
        <tr>
            <td class="label-formulir">Waktu Peminjaman </td>
            <td class="isian-formulir"><?php echo $r_tampil_pinjam['tanggal']; ?></td>
        </tr>
    </table>
</div>
<script>
    window.print();
</script>