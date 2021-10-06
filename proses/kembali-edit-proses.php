<?php 
    include '../koneksi.php';

    $id_kembali = $_POST['id_kembali'];
    $id_anggota = $_POST['id_anggota'];
    $id_buku = $_POST['id_buku'];
    $pinjam = $_POST['pinjam'];
    $waktu = $_POST['waktu'];
    $status = $_POST['status'];

    if (isset($_POST['simpan'])) {
        extract($_POST);

        mysqli_query($db, "UPDATE tbkembali
                            SET idanggota='$id_anggota', idbuku='$id_buku', pinjam='$pinjam', waktu='$waktu', status='$status'
                            WHERE idkembali='$id_kembali'");

        header("location:../index.php?p=kembali");
    }
?>