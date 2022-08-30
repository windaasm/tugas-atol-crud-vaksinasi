<?php include_once("functions.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Hapus Data Status</title>
</head>

<body>

    <h1>Hapus Data Status</h1>
    <?php
    if (isset($_POST["TblHapus"])) {
        $db = dbConnect();
        if ($db->connect_errno == 0) {
            $kd_status  = $db->escape_string($_POST["kd_status"]);
            // Susun query delete
            $sql = "DELETE FROM status_vaksin WHERE kd_status='$kd_status'";
            // Eksekusi query delete
            $res = $db->query($sql);
            if ($res) {
                if ($db->affected_rows > 0) // jika ada data terhapus
                    echo "Data berhasil dihapus.<br>";
                else // Jika sql sukses tapi tidak ada data yang dihapus
                    echo "Penghapusan gagal karena data yang dihapus tidak ada.<br>";
            } else { // gagal query
                echo "Data gagal dihapus. <br>";
            }
    ?>
            <a href="view_status.php"><button>View Status</button></a>
    <?php
        } else
            echo "Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>";
    }
    ?>
</body>

</html>