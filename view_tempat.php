<?php include_once("functions.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <title>View Data Tempat Vaksin</title>
</head>

<body>
    <h1>Data Tempat Vaksin</h1>
    <?php
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        if (isset($_POST["tblCari"])) {
            $cari = $_POST["cari"];
        } else {
            $cari = "";
        }

        $sql = "SELECT kd_rs, nama_rs, jam_operasional
        FROM tempat_vaksin WHERE kd_rs LIKE '%$cari%' or nama_rs LIKE '%$cari%' or jam_operasional LIKE '%$cari%'";
        $res = $db->query($sql);
        if ($res) {
    ?>
            <a href="tambah_tempat.php">Tambah Tempat Vaksin Baru</a> |
            <a href="index_admin.php">Kembali ke Index</a>
            <form action="" method="POST">
                <br>
                <input type="text" name="cari" id="">
                <input type="submit" name="tblCari" value="Dicari">
            </form>
            <br>
            <table border="1">
                <tr>
                    <th>Kode Rumah sakit</th>
                    <th>Nama Rumah sakit</th>
                    <th>Jam Operasional</th>
                    <th>Option</th>
                </tr>
                <?php
                $data = $res->fetch_all(MYSQLI_ASSOC); // ambil seluruh baris data
                foreach ($data as $barisdata) { // telusuri satu per satu
                ?>
                    <tr>
                        <td><?php echo $barisdata["kd_rs"]; ?></td>
                        <td><?php echo $barisdata["nama_rs"]; ?></td>
                        <td><?php echo $barisdata["jam_operasional"]; ?></td>
                        <td><a href="form_edit_tempat.php?kdrs=<?php echo $barisdata["kd_rs"] ?>">Edit</a>
                            | <a href="konfirmasi_hapus_tempat.php?kdrs=<?php echo $barisdata["kd_rs"] ?>">Hapus</a></td>
                    </tr>
                <?php
                }
                ?>
            </table>
    <?php
            $res->free();
        } else
            echo "Gagal Eksekusi SQL" . (DEVELOPMENT ? " : " . $db->error : "") . "<br>";
    } else
        echo "Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>";
    ?>
</body>

</html>