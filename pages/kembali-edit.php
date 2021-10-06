<?php 
    $id_kembali = $_GET['id'];
    $q_tampil_kembali = mysqli_query($db, "SELECT * FROM tbkembali WHERE idkembali = '$id_kembali'");
    $r_tampil_kembali = mysqli_fetch_array($q_tampil_kembali);

?>
<div id="label-page"><h3>Edit Data Transaksi Pengembalian</h3></div>
<div id="content">
    <form action="proses/kembali-edit-proses.php" method="post" enctype="multipart/form-data">
        <table id="tabel-input">
            <tr>
                <td class="label-formulir">ID Pengembalian</td>
                <td class="isian-formulir"><input type="text" name="id_kembali" value="<?php echo $r_tampil_kembali['idkembali'];?>" readonly="readonly" class="isian-formulir isian-formulir-border warna-formulir-disabled"></td>
            </tr>
            <tr>
                <td class="label-formulir">Nama Anggota</td>
			    <td class="isian-formulir">
                <select name="id_anggota" class="isian-formulir isian-formulir-border">
                <?php 
                        $nomor = 1;
                        $query = "SELECT * FROM tbanggota";
                        $q_tampil_anggota = mysqli_query($db, $query);
        
                        if (mysqli_num_rows($q_tampil_anggota) >0) {
                            while ($r_tampil_anggota = mysqli_fetch_array($q_tampil_anggota)) {
                                if ($r_tampil_kembali['idanggota'] == $r_tampil_anggota['idanggota']) {
                                ?>
                                    <option value="<?php echo $r_tampil_anggota['idanggota'];?>" selected><?php echo $r_tampil_anggota['idanggota']." | ".$r_tampil_anggota['nama'];?></option>
                                <?php 
                                }
                                ?>
                    <option value="<?php echo $r_tampil_anggota['idanggota'];?>"><?php echo $r_tampil_anggota['idanggota']." | ".$r_tampil_anggota['nama'];?></option>
                    <?php 
                        }
                    }
                    ?>
				</select>
			    </td>
            </tr>
            <tr>
                <td class="label-formulir">Judul Buku</td>
			    <td class="isian-formulir">
                <select name="id_buku" class="isian-formulir isian-formulir-border">
                <?php 
                        $nomor = 1;
                        $query = "SELECT * FROM tbbuku";
                        $q_tampil_buku = mysqli_query($db, $query);
        
                        if (mysqli_num_rows($q_tampil_buku) >0) {
                            while ($r_tampil_buku = mysqli_fetch_array($q_tampil_buku)) {
                                if ($r_tampil_kembali['idbuku'] == $r_tampil_buku['idbuku']) {
                                ?>
                                    <option value="<?php echo $r_tampil_buku['idbuku'];?>" selected><?php echo $r_tampil_buku['idbuku']." | ".$r_tampil_buku['judul'];?></option>
                                <?php 
                                }
                                ?>
                    <option value="<?php echo $r_tampil_buku['idbuku'];?>"><?php echo $r_tampil_buku['idbuku']." | ".$r_tampil_buku['judul'];?></option>
                    <?php 
                        }
                    }
                    ?>
				</select>
			    </td>
            </tr>
            <tr>
                <td class="label-formulir">Waktu Peminjaman</td>
                <td class="isian-formulir"><input type="date" name="pinjam" value="<?php echo $r_tampil_kembali['pinjam'];?>" class="isian-formulir isian-formulir-border "></td>
            </tr>
            <tr>
                <td class="label-formulir">Waktu Pengembalian</td>
                <td class="isian-formulir"><input type="date" name="waktu" value="<?php echo $r_tampil_kembali['waktu'];?>" class="isian-formulir isian-formulir-border "></td>
            </tr>
            <tr>
                <td class="label-formulir">Status</td>
                <?php 
                    if ($r_tampil_kembali['status']=="Terlambat") {
                        echo "<td class='isian-formulir'><input type='radio' name='status' value='Terlambat' checked>Terlambat</label></td>
                            </tr>
                <tr>
                    <td class='label-formulir'></td>
                    <td class='isian-formulir'><input type='radio' name='status' value='TidakTerlambat'>Tidak Terlambat</td>";
                    } elseif ($r_tampil_kembali['status']=="TidakTerlambat") {
                        echo "<td class='isian-formulir'><input type='radio' name='status' value='Terlambat'>Terlambat</label></td>
                            </tr>
                <tr>
                    <td class='label-formulir'></td>
                    <td class='isian-formulir'><input type='radio' name='status' value='TidakTerlambat checked'>Tidak Terlambat</td>";
                    }
                ?>
                <input type="text" name="status" value="<?php echo $r_tampil_kembali['status'];?>" class="isian-formulir isian-formulir-border">
                </td>
            </tr>
            <tr>
                <td class="label-formulir"></td>
                <td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" id="tombol-simpan"></td>
            </tr>
        </table>
    </form>
</div>