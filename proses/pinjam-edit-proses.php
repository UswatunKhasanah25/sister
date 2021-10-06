<?php 
    include '../koneksi.php';

    $id_pinjam = $_POST['id_pinjam'];
    $id_buku = $_POST['id_buku'];
    $id_anggota = $_POST['id_anggota'];
    $tanggal = $_POST['tanggal'];

    if (isset($_POST['simpan'])) {
        extract($_POST);

        mysqli_query($db, "UPDATE tbpinjam
                            SET idbuku='$id_buku', idanggota='$id_anggota', tanggal='$tanggal'
                            WHERE idpinjam='$id_pinjam'");

        header("location:../index.php?p=pinjam");
    }
?>