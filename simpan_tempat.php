<?php include_once("functions.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Penyimpanan Data Tempat</title>
</head>

<body>
    <h1>Penyimpanan Data Tempat</h1>
    <?php
    if (isset($_POST["TblSimpan"])) {
        $db = dbConnect();
        // begin validasi
        $pesansalah = "";
        // Bersihkan data
        $kd_rs         = $db->escape_string($_POST["kd_rs"]);
        $nama_rs         = $db->escape_string($_POST["nama_rs"]);
        $jam_operasional = $db->escape_string($_POST["jam_operasional"]);

        // validasi kode rs
        if (!is_numeric($kd_rs) || strlen($kd_rs) == 0 || strlen($nik) != 3)
            $pesansalah .= "Kode RS harus berupa 3 digit angka dan tidak boleh kosong<br>";
        // validasi nama rs
        if (!is_string($nama_rs) || strlen($nama_rs) == 0)
            $pesansalah .= "Nama RS harus berupa huruf dan tidak boleh kosong<br>";
        // validasi jam operasional
        if (strlen($jam_operasional) == 0)
            $pesansalah .= "Jam Operasional tidak boleh kosong!<br>";

        if ($pesansalah == "") {
            echo "Tidak terjadi kesalahan. Semua data valid. Data akan disimpan ke database";
            // disini ditulis script untuk simpan data form ke database
            if ($db->connect_errno == 0) {
                // Susun query insert
                $sql = "INSERT INTO tempat_vaksin()
                    VALUES('$kd_rs','$nama_rs','$jam_operasional')";
                // Eksekusi query insert
                $res = $db->query($sql);
                if ($res) {
                    if ($db->affected_rows > 0) { // jika ada penambahan data
    ?>
                        Data berhasil disimpan.<br>
                        <a href="view_tempat.php"><button>View Tempat</button></a>
                    <?php
                    }
                } else {
                    ?>
                    Data gagal disimpan karena Kode RS mungkin sudah ada.<br>
                    <a href="javascript:history.back()"><button>Kembali</button></a>
    <?php
                }
            } else
                echo "Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>";
        } else {
            echo "Terjadi kesalahan sebagai berikut : <br>";
            echo $pesansalah;
            echo "<a href=\"javascript:history.back();\"><button>Kembali Ke Form</button></a>";
        }
        // end validasi
    } else
        echo "Isi data melalui Form!!!";
    ?>
</body>

</html>