<?php include_once("functions.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Data Status vaksin</title>
</head>

<body>
    <h1>Edit Data Status vaksin</h1>
    <?php
    if (isset($_GET["kd_status"])) {
        $db = dbConnect();
        $kd_status = $db->escape_string($_GET["kd_status"]);
        if ($dataStatus = getDataStatus($kd_status)) { // cari data Status, kalau ada simpan di $dataStatus
    ?>
            <a href="view_status.php"><button>View Status Vaksin</button></a>
            <form method="post" name="frm" action="update_status.php">
                <table border="1">
                    <tr>
                        <td>Kode status</td>
                        <td><input type="text" name="kd_status" size="12" maxlength="13" value="<?php echo $dataStatus["kd_status"]; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Nama Orang</td>
                        <td><select name="nik">
                                <option>Pilih Nama</option>
                                <?php
                                $dataOrang = getListNama();
                                foreach ($dataOrang as $data) {
                                    echo "<option value=\"" . $data["nik"] . "\"";
                                    if ($data["nik"] == $dataStatus["nik"]) {
                                        echo " selected";
                                    }
                                    echo ">" . $data["nama"] . "</option>";
                                }
                                ?>
                            </select></td>
                    </tr>
                    <tr>
                        <td>Dosis</td>
                        <td><select name="dosis">
                                <option value="">Pilih Dosis Vaksin</option>
                                <option value="1" <?= 1 == $dataStatus['dosis'] ? " selected" : ""; ?>>1</option>
                                <option value="2" <?= 2 == $dataStatus['dosis'] ? " selected" : ""; ?>>2</option>
                                <option value="Booster" <?= "booster" == $dataStatus['dosis'] ? " selected" : ""; ?>>Booster</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td>Tanggal vaksin</td>
                        <td><input type="date" name="tgl_vaksin" value="<?php echo $dataStatus["tgl_vaksin"]; ?>"></td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td><select name="keterangan">
                                <option value="">Pilih Dosis Vaksin</option>
                                <option value="sudah" <?= "sudah" == $dataStatus['keterangan'] ? " selected" : ""; ?>>Sudah vaksin</option>
                                <option value="belum" <?= "belum" == $dataStatus['keterangan'] ? " selected" : ""; ?>>Belum vaksin</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td>Nama Rumah sakit</td>
                        <td><input type="text" name="kd_rs" size="6" maxlength="5" value="<?php echo $dataStatus["kd_rs"]; ?>"></td>
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
            echo "Kode status dengan nomor : $kd_status tidak ada. Pengeditan dibatalkan";
        ?>
    <?php
    } else
        echo "Kode status tidak ada. Pengeditan dibatalkan.";
    ?>
</body>

</html>