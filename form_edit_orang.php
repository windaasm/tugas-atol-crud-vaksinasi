<?php include_once("functions.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Data Orang</title>
</head>

<body>
    <h1>Edit Data Orang</h1>
    <?php
    if (isset($_GET["nik"])) {
        $db = dbConnect();
        $nik = $db->escape_string($_GET["nik"]);
        if ($dataOrang = getDataOrang($nik)) { // cari data Orang, kalau ada simpan di $dataOrang
    ?>
            <a href="view_orang.php"><button>View Orang</button></a>
            <form method="post" name="frm" action="update_orang.php">
                <table border="1">
                    <tr>
                        <td>NIK</td>
                        <td><input type="text" name="nik" size="17" maxlength="16" value="<?php echo $dataOrang["nik"]; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td><input type="text" name="nama" size="31" maxlength="30" value="<?php echo $dataOrang["nama"]; ?>"></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><input type="text" name="alamat" size="31" maxlength="30" value="<?php echo $dataOrang["alamat"]; ?>"></td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td><input type="date" name="tgl_lahir" value="<?php echo $dataOrang["tgl_lahir"]; ?>"></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td><select name="jenis_kelamin">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="L" <?= "L" == $dataOrang['jenis_kelamin'] ? " selected" : ""; ?>>Laki-laki</option>
                                <option value="P" <?= "P" == $dataOrang['jenis_kelamin'] ? " selected" : ""; ?>>Perempuan</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td>No Handphone</td>
                        <td><input type="text" name="no_hp" size="14" maxlength="13" value="<?php echo $dataOrang["no_hp"]; ?>"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="TblUpdate" value="Update">
                            <input type="reset">
                        </td>
                    </tr>
                </table>
            </form>
        <?php
        } else
            echo "NIK dengan nomor : $Nik tidak ada. Pengeditan dibatalkan";
        ?>
    <?php
    } else
        echo "NIK tidak ada. Pengeditan dibatalkan.";
    ?>
</body>

</html>