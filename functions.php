<?php
define("DEVELOPMENT", TRUE);
function dbConnect()
{
    $db = new mysqli("localhost", "root", "", "vaksin"); // Sesuaikan dengan konfigurasi server anda.
    return $db;
}

// digunakan untuk mengambil data sebuah orang
function getDataOrang($nik)
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT * from orang WHERE nik = '$nik'");
        if ($res) {
            if ($res->num_rows > 0) {
                $data = $res->fetch_assoc();
                $res->free();
                return $data;
            } else
                return FALSE;
        } else
            return FALSE;
    } else
        return FALSE;
}

//ngambil data tempat
function getdataTempat($kd_rs)
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT * from tempat_vaksin WHERE kd_rs = '$kd_rs'");
        if ($res) {
            if ($res->num_rows > 0) {
                $data = $res->fetch_assoc();
                $res->free();
                return $data;
            } else
                return FALSE;
        } else
            return FALSE;
    } else
        return FALSE;
}

// ngambil data status
function getDataStatus($kd_status)
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT * from status_vaksin WHERE kd_status = '$kd_status'");
        if ($res) {
            if ($res->num_rows > 0) {
                $data = $res->fetch_assoc();
                $res->free();
                return $data;
            } else
                return FALSE;
        } else
            return FALSE;
    } else
        return FALSE;
}

// ngambil list nama dari data orang
function getListNama()
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT * from orang order by nama");
        if ($res) {
            if ($res->num_rows > 0) {
                $data = $res->fetch_all(MYSQLI_ASSOC);
                $res->free();
                return $data;
            } else
                return FALSE;
        } else
            return FALSE;
    } else
        return FALSE;
}

// ngambil list nama rs dari data tempat
function getListNamaRS()
{
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT * from tempat_vaksin order by nama_rs");
        if ($res) {
            if ($res->num_rows > 0) {
                $data = $res->fetch_all(MYSQLI_ASSOC);
                $res->free();
                return $data;
            } else
                return FALSE;
        } else
            return FALSE;
    } else
        return FALSE;
}

function banner()
{
?>
    <div id="banner">
        <h1>Program Pengelolaan Data Vaksinasi</h1>
    </div>
<?php
}

function navigator()
{
?>
    <div id="navigator">
        | <a href="view_orang.php">Orang</a>
        | <a href="view_tempat.php">Tempat Vaksin</a>
        | <a href="view_status.php">Status Vaksin</a>
        | <a href="logout.php">Log Out</a>
    </div>
<?php
}

function showError($message)
{
?>
    <div style="background-color:#FAEBD7;padding:10px;border:1px solid red;margin:15px 0px">
        <?php echo $message; ?>
    </div>
<?php
}
?>