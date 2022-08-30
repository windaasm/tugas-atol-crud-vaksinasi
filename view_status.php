<?php include_once("functions.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <title>View Data Status</title>
</head>

<body>
    <h1>Data Status</h1>
    <?php
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        if (isset($_POST["tblCari"])) {
            $cari = $_POST["cari"];
        } else {
            $cari = "";
        }

        $sql = "SELECT status_vaksin.kd_status, status_vaksin.dosis, status_vaksin.tgl_vaksin, 
        status_vaksin.keterangan, orang.nama, tempat_vaksin.nama_rs
        FROM orang 
        JOIN status_vaksin on orang.nik = status_vaksin.nik
        JOIN tempat_vaksin on status_vaksin.kd_rs = tempat_vaksin.kd_rs
        WHERE status_vaksin.kd_status LIKE '%$cari%' or 
        status_vaksin.dosis LIKE '%$cari%' or 
        status_vaksin.tgl_vaksin LIKE '%$cari%' or 
        status_vaksin.keterangan LIKE '%$cari%' or 
        orang.nama LIKE '%$cari%' or 
        tempat_vaksin.nama_rs LIKE '%$cari%'";
        $res = $db->query($sql);
        if ($res) {
    ?>
            <a href="tambah_status.php">Tambah Status Vaksin</a> |
            <a href="index_admin.php">Kembali ke Index</a>
            <form action="" method="POST">
                <br>
                <input type="text" name="cari" id="">
                <input type="submit" name="tblCari" value="Dicari">
            </form>
            <br>
            <table border="1">
                <tr>
                    <th>Kode status</th>
                    <th>Nama</th>
                    <th>Dosis</th>
                    <th>Tanggal vaksin</th>
                    <th>Keterangan</th>
                    <th>Nama Rumah Sakit</th>
                    <th>Option</th>
                </tr>
                <?php
                $data = $res->fetch_all(MYSQLI_ASSOC); // ambil seluruh baris data
                foreach ($data as $barisdata) { // telusuri satu per satu
                ?>
                    <tr>
                        <td><?php echo $barisdata["kd_status"]; ?></td>
                        <td><?php echo $barisdata["nama"]; ?></td>
                        <td align="center"><?php echo $barisdata["dosis"]; ?></td>
                        <td><?php echo $barisdata["tgl_vaksin"]; ?></td>
                        <td><?php echo $barisdata["keterangan"]; ?></td>
                        <td><?php echo $barisdata["nama_rs"]; ?></td>
                        <td><a href="form_edit_status.php?kd_status=<?php echo $barisdata["kd_status"] ?>">Edit</a>
                            | <a href="konfirmasi_hapus_status.php?kd_status=<?php echo $barisdata["kd_status"] ?>">Hapus</a></td>
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