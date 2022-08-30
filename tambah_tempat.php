<?php include_once("functions.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <title>View Data Tempat Vaksin</title>
</head>

<body>
    <h1>Tambah Data Tempat Vaksin</h1>
    <a href="view_tempat.php"><button>View Tempat Vaksin</button></a>
    <form method="post" name="frm" action="simpan_tempat.php">
        <table border="1">
            <tr>
                <td>Kode Rumah sakit</td>
                <td><input type="text" name="kd_rs" size="6" maxlength="5"></td>
            </tr>
            <tr>
                <td>Nama Rumah sakit</td>
                <td><input type="text" name="nama_rs" size="31" maxlength="30"></td>
            </tr>
            <tr>
                <td>Jam operasional</td>
                <td><input type="time" name="jam_operasional" size="9" maxlength="8"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="TblSimpan" value="Simpan"></td>
            </tr>
        </table>
    </form>
</body>

</html>