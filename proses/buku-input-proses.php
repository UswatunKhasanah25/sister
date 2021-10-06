<?php 
    include '../koneksi.php';

    $id_buku = $_POST['id_buku'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun'];

    if (isset($_POST['simpan'])) {
        extract($_POST);
        $nama_file = $_FILES['cover']['name'];

        if (!empty($nama_file)) {
            $lokasi_file = $_FILES['cover']['tmp_name'];
            $tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
            $file_foto = $id_buku.".".$tipe_file;

            $folder = "../images/$file_foto";
            move_uploaded_file($lokasi_file, "$folder");
        } else {
            $file_foto = "-";
        }
        $sql = "INSERT INTO tbbuku VALUES('$id_buku','$judul','$pengarang','$penerbit','$tahun','$file_foto')";
        $query = mysqli_query($db, $sql);

        header("location:../index.php?p=buku");
    }
?>