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

        $sql = "INSERT INTO tbkembali VALUES('$id_kembali','$id_anggota','$id_buku','$pinjam','$waktu','$status')";
        $query = mysqli_query($db, $sql);

        header("location:../index.php?p=kembali");
    }