<?php include_once("functions.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Data Tempat vaksin</title>
</head>

<body>
    <h1>Edit Data Tempat vaksin</h1>
    <?php
    if (isset($_GET["kdrs"])) {
        $db = dbConnect();
        $kdrs = $db->escape_string($_GET["kdrs"]);
        if ($dataTempat = getDataTempat($kdrs)) { // cari data tempat, kalau ada simpan di $datatempat
    ?>
            <a href="view_tempat.php"><button>View Tempat Vaksin</button></a>
            <form method="post" name="frm" action="update_tempat.php">
                <table border="1">
                    <tr>
                        <td>Kode Rumah sakit</td>
                        <td><input type="text" name="kdrs" size="6" maxlength="5" value="<?php echo $dataTempat["kd_rs"]; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Nama Rumah sakit</td>
                        <td><input type="text" name="namars" size="31" maxlength="30" value="<?php echo $dataTempat["nama_rs"]; ?>"></td>
                    </tr>
                    <tr>
                        <td>Jam Operasional</td>
                        <td><input type="time" name="jam" size="9" maxlength="8" value="<?php echo $dataTempat["jam_operasional"]; ?>"></td>
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
            echo "Kode RS dengan nomor : $kdrs tidak ada. Pengeditan dibatalkan";
        ?>
    <?php
    } else
        echo "Kode RS tidak ada. Pengeditan dibatalkan.";
    ?>
</body>

</html>