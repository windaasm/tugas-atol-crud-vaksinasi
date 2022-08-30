<?php include_once("functions.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Hapus Data status</title>
</head>

<body>
    <h1>Hapus Data status</h1>
    <?php
    if (isset($_GET["kd_status"])) {
        $db = dbConnect();
        $kd_status = $db->escape_string($_GET["kd_status"]);
        if ($dataStatus = getDataStatus($kd_status)) { // cari data produk, kalau ada simpan di $data
    ?>
            <a href="view_status.php"><button>View status</button></a>
            <form method="post" name="frm" action="hapus_status.php">
                <input type="hidden" name="kd_status" value="<?php echo $dataStatus["kd_status"]; ?>">
                <table border="1">
                    <tr>
                        <td>Kode status</td>
                        <td><?php echo $dataStatus["kd_status"]; ?></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td><?php echo $dataStatus["nik"]; ?></td>
                    </tr>
                    <tr>
                        <td>Dosis</td>
                        <td><?php echo $dataStatus["dosis"]; ?></td>
                    </tr>
                    <tr>
                        <td>Tgl Vaksin</td>
                        <td><?php echo $dataStatus["tgl_vaksin"]; ?></td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td><?php echo $dataStatus["keterangan"]; ?></td>
                    </tr>
                    <tr>
                        <td>Nama Rumah Sakit</td>
                        <td><?php echo $dataStatus["kd_rs"]; ?></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="TblHapus" value="Hapus"></td>
                    </tr>
                </table>
            </form>
        <?php
        } else
            echo "Kode status dengan nomor : $kd_status tidak ada. Penghapusan dibatalkan";
        ?>
    <?php
    } else
        echo "Kode status tidak ada. Penghapusan dibatalkan.";
    ?>
</body>

</html>