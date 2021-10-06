<div id="label-page"><h3>Input Data Buku</h3></div>
<div id="content">
    <form action="proses/buku-input-proses.php" method="post" enctype="multipart/form-data">
    <table id="tabel-input">
        <tr>
            <td class="label-formulir">COVER</td>
            <td class="isian-formulir"><input type="file" name="cover" class="isian-formulir isian-formulir-border"></td>
        </tr>
        <tr>
            <td class="label-formulir">ID Buku</td>
            <td class="isian-formulir"><input type="text" name="id_buku" class="isian-formulir isian-formulir-border"></td>
        </tr>
        <tr>
            <td class="label-formulir">Judul</td>
            <td class="isian-formulir"><input type="text" name="judul" class="isian-formulir isian-formulir-border"></td>
        </tr>
        <tr>
            <td class="label-formulir">Pengarang</td>
            <td class="isian-formulir"><input type="text" name="pengarang" class="isian-formulir isian-formulir-border"></td>
        </tr>
        <tr>
            <td class="label-formulir">Penerbit</td>
            <td class="isian-formulir"><input type="text" name="penerbit" class="isian-formulir isian-formulir-border"></td>
        </tr>
        <tr>
            <td class="label-formulir">Tahun</td>
            <td class="isian-formulir"><input type="text" name="tahun" class="isian-formulir isian-formulir-border"></td>
        </tr>
        <tr>
            <td class="label-formulir"></td>
            <td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" class="tombol"></td>
        </tr>
    </table>
</form>
</div>