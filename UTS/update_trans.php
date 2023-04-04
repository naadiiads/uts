<?php
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
include ('koneksi.php');

$status = '';
$result = '';

//melakukan pengecekan apakah ada variable GET yang dikirim
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id_trans_upn'])) {
        //query SQL
        $trans_up = $_GET['id_trans_upn'];
        $query = "SELECT * FROM trans_upn WHERE id_trans_upn = '$trans_up'";

        //eksekusi query
        $trans = mysqli_query($koneksi,$query);
    }
}

//melakukan pengecekan apakah ada form yang dipost
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_trans_upn = $_POST['id_trans_upn'];
    $id_kondektur = $_POST['id_kondektur'];
    $id_bus = $_POST['id_bus'];
    $id_driver = $_POST['id_driver'];
    $jumlah_km = $_POST['jumlah_km'];
    $tanggal = $_POST['tanggal'];

    //query SQL
    $sql = "UPDATE trans_upn SET id_kondektur='$id_kondektur', id_bus='$id_bus', id_driver='$id_driver', jumlah_km='$jumlah_km', tanggal='$tanggal' WHERE id_trans_upn='$id_trans_upn'";

    //eksekusi query
    $trans = mysqli_query($koneksi,$sql);
    if ($trans) {
        $status = 'ok';
    }
    else{
        $status = 'err';
    }

    //redirect ke halaman lain
    header('Location: index.php?status='.$status);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Data Trans UPN</title>
</head>

<body>
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Pemrograman Web</a>

    <div class="container-fluid">
        <div class="row">
            <nav>
                <div class="sidebar-sticky">
                    <ul class="nav flex-column" style="margin-top:100px;">
                        <li class="nav-item">
                            <a class="nav-link active" href="<?php echo "index.php"; ?>">Halaman depan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo "form_bus.php"; ?>">Tambah Data Bus</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo "form_driver.php"; ?>">Tambah Data Driver</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo "form_kondektur.php"; ?>">Tambah Data Kondektur</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo "form_trans.php"; ?>">Tambah Data Trans</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo "gajidriver.php"; ?>">Gaji Driver</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo "gajikondektur.php"; ?>">Gaji Kondektur</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo "statusbus.php"; ?>">Status Bus</a>
                        </li>
                    </ul>
                </div>
            </nav>

        <main role="main">

            <h2 style="margin: 30px 0 30px 0;">Update Data Trans UPN</h2>
            <form action="update_customer.php" method="POST">
                <?php while($upn = mysqli_fetch_array($trans)): ?>
                <div class="form-group">
                    <label>Id Trans UPN</label>
                    <input type="text" class="form-control" name="Id Trans UPN" value="<?php echo $upn['id_trans_upn'];  ?>" required="required" readonly>
                </div>
                <div class="form-group">
                    <label>Id Kondektur</label>
                    <input type="text" class="form-control" name="id_kondektur" value="<?php ;  ?>" required="required">
                </div>
                <div class="form-group">
                    <label>id bus</label>
                    <input type="text" class="form-control" name="id bus" value="<?php ;  ?>" required="required">
                </div>
                <div class="form-group">
                    <label>Id Driver</label>
                    <input type="text" class="form-control" name="id driver" value="<?php ;  ?>" required="required">
                </div>
                <div class="form-group">
                    <label>Jumlah KM</label>
                    <input type="text" class="form-control" name="Jumlah Km" value="<?php ;  ?>" required="required">
                </div>
                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="text" class="form-control" name="tanggal" value="<?php ;  ?>" required="required">
                </div>
                <?php endwhile; ?>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </main>
        </div>
    </div>
</body>
</html>