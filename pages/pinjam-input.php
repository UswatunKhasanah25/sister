<div id="label-page"><h3>Input Data Transaksi Peminjaman</h3></div>
<div id="content">
    <form action="proses/pinjam-input-proses.php" method="post" enctype="multipart/form-data">
    <table id="tabel-input">
        <tr>
            <td class="label-formulir">ID Peminjaman</td>
            <td class="isian-formulir"><input type="text" name="id_pinjam" class="isian-formulir isian-formulir-border"></td>
        </tr>
        <tr>
        <td class="label-formulir">Judul Buku</td>
			<td class="isian-formulir">
				<select name="id_buku" class="isian-formulir isian-formulir-border">
					<option value="" select="selected">-- Pilih Judul Buku --</option>
                    <?php 
                        $nomor = 1;
                        $query = "SELECT * FROM tbbuku";
                        $q_tampil_buku = mysqli_query($db, $query);
        
                        if (mysqli_num_rows($q_tampil_buku) >0) {
                            while ($r_tampil_buku = mysqli_fetch_array($q_tampil_buku)) {
                                
                    ?>
                    <option value="<?php echo $r_tampil_buku['idbuku']; ?>"> <?php echo $r_tampil_buku['idbuku']." | ".$r_tampil_buku['judul']; ?></option>
                    <?php 
                        }
                    }
                    ?>
				</select>
		    </td>
        </tr>
        <tr>
        <td class="label-formulir">Nama Anggota</td>
			<td class="isian-formulir">
				<select name="id_anggota" class="isian-formulir isian-formulir-border">
					<option value="" select="selected">-- Pilih Nama Anggota --</option>
                    <?php 
                        $nomor = 1;
                        $query = "SELECT * FROM tbanggota";
                        $q_tampil_anggota = mysqli_query($db, $query);
        
                        if (mysqli_num_rows($q_tampil_anggota) >0) {
                            while ($r_tampil_anggota = mysqli_fetch_array($q_tampil_anggota)) {
                                
                    ?>
                    <option value="<?php echo $r_tampil_anggota['idanggota']; ?>"> <?php echo $r_tampil_anggota['idanggota']." | ".$r_tampil_anggota['nama']; ?></option>
                    <?php 
                        }
                    }
                    ?>
				</select>
			</td>
        </tr>
        <tr>
            <td class="label-formulir">Waktu Peminjaman</td>
            <td class="isian-formulir"><input type="date" name="tanggal" class="isian-formulir isian-formulir-border"></td>
        </tr>
        <tr>
            <td class="label-formulir"></td>
            <td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" class="tombol"></td>
        </tr>
    </table>
</form>
</div>