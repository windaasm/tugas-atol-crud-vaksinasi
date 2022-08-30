<?php include_once("functions.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Pembaruan Data Tempat vaksin</title>
</head>

<body>
    <h1>Pembaruan Data Tempat vaksin</h1>
    <?php
    if (isset($_POST["TblUpdate"])) {
        $db = dbConnect();
        if ($db->connect_errno == 0) {
            // Bersihkan data
            $kdrs           = $db->escape_string($_POST["kdrs"]);
            $namars         = $db->escape_string($_POST["namars"]);
            $jamoperasional = $db->escape_string($_POST["jam"]);
            // Susun query update
            $sql = "UPDATE tempat_vaksin SET 
			  nama_rs='$namars',jam_operasional='$jamoperasional'
              where kd_rs=$kdrs";

            // Eksekusi query update
            $res = $db->query($sql);
            if ($res) {
                if ($db->affected_rows > 0) { // jika ada update data
    ?>
                    Data berhasil diupdate.<br>
                    <a href="view_tempat.php"><button>View Tempat</button></a>
                <?php
                } else { // Jika sql sukses tapi tidak ada data yang berubah
                ?>
                    Data berhasil diupdate tetapi tanpa ada perubahan data.<br>
                    <a href="javascript:history.back()"><button>Edit Kembali</button></a>
                    <a href="view_tempat.php"><button>View Tempat vaksin</button></a>
                <?php
                }
            } else { // gagal query
                ?>
                Data gagal diupdate.
                <a href="javascript:history.back()"><button>Edit Kembali</button></a>
                <?php
                echo "Error : " . $db->error;
                ?>
    <?php
            }
        } else
            echo "Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>";
    }
    ?>
</body>

</html>