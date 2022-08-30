<?php include_once("functions.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Pembaruan Data status vaksin</title>
</head>

<body>
    <h1>Pembaruan Data status vaksin</h1>
    <?php
    if (isset($_POST["TblUpdate"])) {
        $db = dbConnect();
        if ($db->connect_errno == 0) {
            // Bersihkan data
            $kd_status    = $db->escape_string($_POST["kd_status"]);
            $dosis       = $db->escape_string($_POST["dosis"]);
            $tgl_vaksin   = $db->escape_string($_POST["tgl_vaksin"]);
            $keterangan  = $db->escape_string($_POST["keterangan"]);
            $nik       = $db->escape_string($_POST["nik"]);
            $kd_rs     = $db->escape_string($_POST["kd_rs"]);
            // Susun query update
            $sql = "UPDATE status_vaksin SET 
			  dosis='$dosis',tgl_vaksin='$tgl_vaksin',keterangan='$keterangan',nik='$nik',kd_rs='$kd_rs'
              where kd_status='$kd_status'";

            // Eksekusi query update
            $res = $db->query($sql);
            if ($res) {
                if ($db->affected_rows > 0) { // jika ada update data
    ?>
                    Data berhasil diupdate.<br>
                    <a href="view_status.php"><button>View status</button></a>
                <?php
                } else { // Jika sql sukses tapi tidak ada data yang berubah
                ?>
                    Data berhasil diupdate tetapi tanpa ada perubahan data.<br>
                    <a href="javascript:history.back()"><button>Edit Kembali</button></a>
                    <a href="view_status.php"><button>View status vaksin</button></a>
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