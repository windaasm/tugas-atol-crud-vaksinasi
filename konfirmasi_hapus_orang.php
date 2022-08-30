<?php include_once("functions.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Hapus Data Orang</title>
</head>

<body>
    <h1>Hapus Data Orang</h1>
    <?php
    if (isset($_GET["nik"])) {
        $db = dbConnect();
        $nik = $db->escape_string($_GET["nik"]);
        if ($dataorang = getDataOrang($nik)) { // cari data orang, kalau ada simpan di $data
    ?>
            <a href="view_orang.php"><button>View Orang</button></a>
            <form method="post" name="frm" action="hapus_orang.php">
                <input type="hidden" name="nik" value="<?php echo $dataorang["nik"]; ?>">
                <table border="1">
                    <tr>
                        <td>NIK</td>
                        <td><?php echo $dataorang["nik"]; ?></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td><?php echo $dataorang["nama"]; ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><?php echo $dataorang["alamat"]; ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td><?php echo $dataorang["tgl_lahir"]; ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td><?php echo $dataorang["jenis_kelamin"]; ?></td>
                    </tr>
                    <tr>
                        <td>No Handphone</td>
                        <td><?php echo $dataorang["no_hp"]; ?></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="TblHapus" value="Hapus"></td>
                    </tr>
                </table>
            </form>
        <?php
        } else
            echo "NIK dengan nomor : $nik tidak ada. Penghapusan dibatalkan";
        ?>
    <?php
    } else
        echo "NIK tidak ada. Penghapusan dibatalkan.";
    ?>
</body>

</html>