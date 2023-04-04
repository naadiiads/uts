<?php
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
include ('koneksi.php');

$status = '';
$result = '';

//melakukan pengecekan apakah ada variable GET yang dikirim
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id_driver'])) {
        //query SQL
        $driver_up = $_GET['id_driver'];
        $query = "SELECT * FROM driver WHERE id_driver = '$driver_up'";

        //eksekusi query
        $driver = mysqli_query($koneksi,$query);
    }
}

//melakukan pengecekan apakah ada form yang dipost
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_driver = $_POST['id_driver'];
    $nama = $_POST['nama'];
    $no_sim = $_POST['no_sim'];
    $alamat = $_POST['alamat'];

    //query SQL
    $driver = "UPDATE driver SET nama='$nama', no_sim='$no_sim', alamat='$alamat' WHERE id_driver='$id_driver'";

    //eksekusi query
    $driver = mysqli_query($koneksi,$sql);
    if ($driver) {
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
    <title>Update Data Driver</title>
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
            <h2 style="margin: 30px 0 30px 0;">Update Data Driver</h2>
            <form action="update_driver.php" method="POST">
                <?php while($item = mysqli_fetch_array($driver)): ?>
                <div class="form-group">
                    <label>Id Driver</label>
                    <input type="text" class="form-control" name="Id Driver" value="<?php echo $item['id_driver'];  ?>" required="required" readonly>
                </div>
                <div class="form-group">
                    <label>No Sim</label>
                    <input type="text" class="form-control" name="No Sim" value="<?php ;  ?>" required="required">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea type="text" class="form-control" name="Alamat" value="<?php ;  ?>" required="required"></textarea>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input class="form-control" name="Nama" value="<?php ;  ?>" required="required">
                </div>
                <?php endwhile; ?>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </main>
        </div>
    </div>
</body>
</html>
