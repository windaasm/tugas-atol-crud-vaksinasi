<?php include_once("functions.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Penyimpanan Data Orang</title>
</head>

<body>
    <h1>Penyimpanan Data Orang</h1>
    <?php
    if (isset($_POST["TblSimpan"])) {
        $db = dbConnect();
        // begin validasi
        $pesansalah = "";
        // Bersihkan data
        $nik        = $db->escape_string($_POST["nik"]);
        $nama        = $db->escape_string($_POST["nama"]);
        $alamat      = $db->escape_string($_POST["alamat"]);
        $tgl_lahir    = $db->escape_string($_POST["tgl_lahir"]);
        $jenis_kelamin = $db->escape_string($_POST["jenis_kelamin"]);
        $no_hp        = $db->escape_string($_POST["no_hp"]);

        // validasi nik
        if (strlen($nik) == 0 || !is_numeric($nik) || strlen($nik) != 16)
            $pesansalah .= "Nik harus berupa angka dan terdiri dari 16 digit<br>";
        // validasi nama
        if (strlen($nama) == 0)
            $pesansalah .= "Nama harus diisi!<br>";
        // validasi alamat
        if (strlen($alamat) == 0)
            $pesansalah .= "Alamat tidak boleh kosong!<br>";
        // validasi tgl lahir
        if (strlen($tgl_lahir) == 0)
            $pesansalah .= "Tanggal lahir harus dipilih!<br>";
        // validasi jenis kelamin
        $jenis_kelamin = strtoupper($_POST["jenis_kelamin"]);
        if (($jenis_kelamin != "L") && ($jenis_kelamin != "P"))
            $pesansalah .= "Jenis kelamin hanya boleh Laki-laki atau Perempuan.<br>";
        // validasi no hp
        if (!is_string($no_hp) || strlen($no_hp) == 0)
            $pesansalah .= "No Hp tidak boleh kosong dan harus berupa angka!<br>";

        if ($pesansalah == "") {
            echo "Tidak terjadi kesalahan. Semua data valid. Data akan disimpan ke database";
            //disini ditulis script untuk simpan data form ke database
            if ($db->connect_errno == 0) {
                // Susun query insert
                $sql = "INSERT INTO Orang ()
                    VALUES('$nik','$nama','$alamat','$tgl_lahir','$jenis_kelamin','$no_hp')";
                // Eksekusi query insert
                $res = $db->query($sql);
                if ($res) {
                    if ($db->affected_rows > 0) { // jika ada penambahan data
    ?>
                        Data berhasil disimpan.<br>
                        <a href="view_orang.php"><button>View Orang</button></a>
                    <?php
                    }
                } else {
                    ?>
                    Data gagal disimpan karena NIK Orang mungkin sudah ada.<br>
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