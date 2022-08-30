<?php include_once("functions.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <title>View Data Orang</title>
</head>

<body>
    <h1>Tambah Data Orang</h1>
    <a href="view_orang.php"><button>View Orang</button></a>
    <form method="post" name="frm" action="simpan_orang.php">
        <table border="1">
            <tr>
                <td>NIK</td>
                <td><input type="text" name="nik" size="17" maxlength="16"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" size="31" maxlength="30"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" size="31" maxlength="30"></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td><input type="date" name="tgl_lahir"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td><select name="jenis_kelamin">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select></td>
            </tr>
            <tr>
                <td>No Handphone</td>
                <td><input type="text" name="no_hp" size="14" maxlength="13"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="TblSimpan" value="Simpan"></td>
            </tr>
        </table>
    </form>
</body>

</html>