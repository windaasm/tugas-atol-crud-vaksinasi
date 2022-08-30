<?php include_once("functions.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Hapus Data Tempat vaksin</title>
</head>

<body>
    <h1>Hapus Data Tempat vaksin</h1>
    <?php
    if (isset($_GET["kdrs"])) {
        $db = dbConnect();
        $Nik = $db->escape_string($_GET["kdrs"]);
        if ($datatempat = getdatatempat($Nik)) { // cari data produk, kalau ada simpan di $data
    ?>
            <a href="view_tempat.php"><button>View Orang</button></a>
            <form method="post" name="frm" action="hapus_tempat.php">
                <input type="hidden" name="kdrs" value="<?php echo $datatempat["kd_rs"]; ?>">
                <table border="1">
                    <tr>
                        <td>Kode Rumah sakit</td>
                        <td><?php echo $datatempat["kd_rs"]; ?></td>
                    </tr>
                    <tr>
                        <td>Nama Rumah sakit</td>
                        <td><?php echo $datatempat["nama_rs"]; ?></td>
                    </tr>
                    <tr>
                        <td>Jam Operasional</td>
                        <td><?php echo $datatempat["jam_operasional"]; ?></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="TblHapus" value="Hapus"></td>
                    </tr>
                </table>
            </form>
        <?php
        } else
            echo "Kode RS dengan nomor : $kdrs tidak ada. Penghapusan dibatalkan";
        ?>
    <?php
    } else
        echo "Kode RS tidak ada. Penghapusan dibatalkan.";
    ?>
</body>

</html>