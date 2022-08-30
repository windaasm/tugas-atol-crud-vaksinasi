<?php include_once("functions.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Penyimpanan Data Status vaksin</title>
</head>

<body>
    <h1>Penyimpanan Data Status vaksin</h1>
    <?php
    if (isset($_POST["TblSimpan"])) {
        $db = dbConnect();
        // begin validasi
        $pesansalah = "";
        // Bersihkan data
        $kd_status  = $db->escape_string($_POST["kd_status"]);
        $dosis      = $db->escape_string($_POST["dosis"]);
        $tgl_vaksin = $db->escape_string($_POST["tgl_vaksin"]);
        $keterangan = $db->escape_string($_POST["keterangan"]);
        $nama       = $db->escape_string($_POST["nik"]);
        $nama_rs    = $db->escape_string($_POST["kd_rs"]);
        // validasi kode status
        if (strlen($kd_status) == 0 || strlen($kd_status) != 5)
            $pesansalah .= "Kode status tidak boleh kosong dan harus terdiri dari 5 digit<br>";
        // validasi dosis
        if (!is_string($dosis) || strlen($dosis) == 0)
            $pesansalah .= "Dosis harus berupa huruf dan tidak boleh kosong<br>";
        // validasi tgl vaksin
        if (strlen($tgl_vaksin) == 0)
            $pesansalah .= "Tanggal vaksin harus dipilih!<br>";
        // validasi keterangan
        if (!is_string($keterangan) || strlen($keterangan) == 0)
            $pesansalah .= "Keterangan harus berupa huruf dan tidak boleh kosong!<br>";
        // validasi nama
        if (strlen($nama) == 0)
            $pesansalah .= "Nama harus diisi!<br>";
        // validasi nama rs
        if (!is_string($nama_rs) || strlen($nama_rs) == 0)
            $pesansalah .= "Nama RS harus berupa huruf dan tidak boleh kosong<br>";

        if ($pesansalah == "") {
            echo "Tidak terjadi kesalahan. Semua data valid. Data akan disimpan ke database";
            // disini ditulis script untuk simpan data form ke database
            if ($db->connect_errno == 0) {
                // Susun query insert
                $sql = "INSERT INTO status_vaksin()
                    VALUES('$kd_status','$dosis','$tgl_vaksin','$keterangan','$nama','$nama_rs')";
                // Eksekusi query insert
                $res = $db->query($sql);
                if ($res) {
                    if ($db->affected_rows > 0) { // jika ada penambahan data
    ?>
                        Data berhasil disimpan.<br>
                        <a href="view_status.php"><button>View Status vaksin</button></a>
                    <?php
                    }
                } else {
                    ?>
                    Data gagal disimpan karena Kode status mungkin sudah ada.<br>
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