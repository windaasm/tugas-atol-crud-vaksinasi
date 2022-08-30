<?php include_once("functions.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <title>View Data Orang</title>
</head>

<body>
    <h1>Data Orang</h1>
    <?php
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        if (isset($_POST["tblCari"])) {
            $cari = $_POST["cari"];
        } else {
            $cari = "";
        }

        $sql = "SELECT nik, nama, alamat, tgl_lahir, jenis_kelamin, no_hp 
        FROM orang WHERE nik LIKE '%$cari%' or nama LIKE '%$cari%' or alamat LIKE '%$cari%' or tgl_lahir LIKE '%$cari%' or 
        jenis_kelamin LIKE '%$cari%'";
        $res = $db->query($sql);
        if ($res) {
    ?>
            <a href="tambah_orang.php">Tambah Orang Baru</a> |
            <a href="index_admin.php">Kembali ke Index</a>
            <form action="" method="POST">
                <br>
                <input type="text" name="cari" id="">
                <input type="submit" name="tblCari" value="Dicari">
            </form>
            <br>
            <table border="1">
                <tr>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>No Handphone</th>
                    <th>Option</th>
                </tr>
                <?php
                $data = $res->fetch_all(MYSQLI_ASSOC); // ambil seluruh baris data
                foreach ($data as $barisdata) { // telusuri satu per satu
                ?>
                    <tr>
                        <td><?php echo $barisdata["nik"]; ?></td>
                        <td><?php echo $barisdata["nama"]; ?></td>
                        <td><?php echo $barisdata["alamat"]; ?></td>
                        <td><?php echo $barisdata["tgl_lahir"]; ?></td>
                        <td align="center"><?php echo $barisdata["jenis_kelamin"]; ?></td>
                        <td><?php echo $barisdata["no_hp"]; ?></td>
                        <td><a href="form_edit_orang.php?nik=<?php echo $barisdata["nik"] ?>">Edit</a>
                            | <a href="konfirmasi_hapus_orang.php?nik=<?php echo $barisdata["nik"] ?>">Hapus</a></td>
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