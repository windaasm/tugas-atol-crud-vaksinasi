<?php include_once("functions.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Pembaruan Data Orang</title>
</head>

<body>
    <h1>Pembaruan Data Orang</h1>
    <?php
    if (isset($_POST["TblUpdate"])) {
        $db = dbConnect();
        //begin validasi
        $pesansalah = "";
        //validasi nama
        $nama = $db->escape_string($_POST["nama"]);
        if ((!is_string($nama)) && ($nama == 0)) {
            $pesansalah .= "Berat harus berupa angka, Dan tidak boleh kosong!!<br>";
        }
        // validasi alamat
        $alamat = $db->escape_string($_POST["alamat"]);
        if (strlen($_POST["alamat"]) == 0) {
            $pesansalah .= "Alamat tidak boleh kosong!<br>";
        }
        // validasi tgl lahir
        $tgl_lahir = $db->escape_string($_POST["tgl_lahir"]);
        if (strlen($_POST["tgl_lahir"]) == 0) {
            $pesansalah .= "Tanggal lahir harus dipilih!<br>";
        }
        // validasi jenis kelamin
        $jenis_kelamin = $db->escape_string($_POST["jenis_kelamin"]);
        $jenis_kelamin = strtoupper($_POST["jenis_kelamin"]);
        if (($jenis_kelamin != "L") && ($jenis_kelamin != "P")) {
            $pesansalah .= "Jenis kelamin hanya boleh Laki-laki atau Perempuan.<br>";
        }
        // validasi no hp
        $no_hp = $db->escape_string($_POST["no_hp"]);
        if (!is_string($_POST["no_hp"]) || strlen($_POST["no_hp"]) == 0) {
            $pesansalah .= "No Hp tidak boleh kosong dan harus berupa angka!<br>";
        }

        if ($pesansalah == "") {
            echo "Tidak terjadi kesalahan. Semua data valid. Data akan disimpan ke database";
        }

        if ($db->connect_errno == 0) {
            $nik = $db->escape_string($_POST["nik"]);
            $sql = "UPDATE Orang SET nik='$nik',
			  nama='$nama',alamat='$alamat',tgl_lahir='$tgl_lahir',
              jenis_kelamin='$jenis_kelamin',no_hp='$no_hp'
			  WHERE nik='$nik'";
            // Eksekusi query update
            $res = $db->query($sql);
            if ($res) {
                if ($db->affected_rows > 0) { // jika ada update data
    ?>
                    Data berhasil diupdate.<br>
                    <a href="view_orang.php"><button>View Orang</button></a>
                <?php
                } else { // Jika sql sukses tapi tidak ada data yang berubah
                ?>
                    Data berhasil diupdate tetapi tanpa ada perubahan data.<br>
                    <a href="javascript:history.back()"><button>Edit Kembali</button></a>
                    <a href="view_orang.php"><button>View Orang</button></a>
                <?php
                }
            } else { // gagal query
                ?>
                Data gagal diupdate.
                <a href="javascript:history.back()"><button>Edit Kembali</button></a>

    <?php
            }
        } else
            echo "Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>";
    }
    ?>

</body>

</html>