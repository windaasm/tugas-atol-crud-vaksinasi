<?php include_once("functions.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Hapus Data Orang</title>
</head>

<body>

    <h1>Hapus Data Tempat</h1>
    <?php
    if (isset($_POST["TblHapus"])) {
        $db = dbConnect();
        if ($db->connect_errno == 0) {
            $kdrs  = $db->escape_string($_POST["kdrs"]);
            // Susun query delete
            $sql = "DELETE FROM tempat_vaksin WHERE kd_rs='$kdrs'";
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
            <a href="view_tempat.php"><button>View tempat</button></a>
    <?php
        } else
            echo "Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>";
    }
    ?>
</body>

</html>