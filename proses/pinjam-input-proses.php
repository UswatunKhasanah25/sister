<?php 
    include '../koneksi.php';

    $id_pinjam = $_POST['id_pinjam'];
    $id_buku = $_POST['id_buku'];
    $id_anggota = $_POST['id_anggota'];
    $tanggal = $_POST['tanggal'];

    if (isset($_POST['simpan'])) {
        extract($_POST);

        $sql = "INSERT INTO tbpinjam VALUES('$id_pinjam','$id_buku','$id_anggota','$tanggal')";
        $query = mysqli_query($db, $sql);

        header("location:../index.php?p=pinjam");
    }
?>