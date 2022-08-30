<?php include_once("functions.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <title>View Data Status Vaksin</title>
</head>

<body>
    <h1>Tambah Data Status Vaksin</h1>
    <a href="view_status.php"><button>View Status Vaksin</button></a>
    <form method="post" name="frm" action="simpan_status.php">
        <table border="1">
            <tr>
                <td>Kode status</td>
                <td><input type="text" name="kd_status" size="12" maxlength="13"></td>
            </tr>
            <tr>
                <td>Dosis</td>
                <td><select name="dosis">
                        <option value="">Pilih Dosis Vaksin</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="booster">Booster</option>
                    </select></td>
            </tr>
            <tr>
                <td>Tanggal vaksin</td>
                <td><input type="date" name="tgl_vaksin"></td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td><select name="keterangan">
                        <option value="">Pilih Keterangan</option>
                        <option value="sudah">Sudah Vaksin</option>
                        <option value="belum">Belum Vaksin</option>
                    </select></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><select name="nik">
                        <option value="">Pilih Nama</option>
                        <?php
                        $dataOrang = getListNama();
                        foreach ($dataOrang as $data) {
                            echo "<option value=\"" . $data["nik"] . "\">" . $data["nama"] . "</option>";
                        }
                        ?>
            </tr>
            <tr>

</html>
<td>Nama RS</td>
<td><select name="kd_rs">
        <option value="">Pilih Nama Rumah sakit</option>
        <?php
        $dataTempat = getListNamaRS();
        foreach ($dataTempat as $data) {
            echo "<option value=\"" . $data["kd_rs"] . "\">" . $data["nama_rs"] . "</option>";
        }
        ?>
    </select></td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="TblSimpan" value="Simpan"></td>
</tr>
</table>
</form>
</body>