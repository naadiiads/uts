<?php
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
include ('koneksi.php');

$status = '';
$result = '';

//melakukan pengecekan apakah ada variable GET yang dikirim
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id_bus'])) {
        //query SQL
        $bus_up = $_GET['id_bus'];
        $query = "SELECT * FROM bus WHERE id_bus = '$bus_up'";

        //eksekusi query
        $result = mysqli_query($koneksi,$query);
    }
}

//melakukan pengecekan apakah ada form yang dipost

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_bus = $_POST['id_bus'];
    $plat = $_POST['plat'];
    $status = $_POST['status'];

    //query SQL
    $sql = "UPDATE bus SET id_bus='$id_bus', plat='$plat', status='$status' WHERE id_bus='$id_bus'";

    //eksekusi query
    $result = mysqli_query($koneksi,$sql);
    if ($result) {
        $status = 'ok';
    }
    else{
        $status = 'err';
    }

    //redirect ke halaman lain
    header('location: index.php?status='.$status);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Data Bus</title>
</head>

<body>
    <a class="navbar-brand" href="#">Pemrograman Web</a>

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

            <h2 style="margin: 30px 0 30px 0;">Update Data Bus</h2>
            <form action="update_bus.php" method="POST">
                <?php while($data = mysqli_fetch_array($result)): ?>
                    <div class="form-group">
                        <label>ID Bus</label>
                        <input type="text" class="form-control" name="id_bus" value="<?php echo $data['id_bus'];  ?>" required="required" readonly>
                    </div>
                    <div class="form-group">
                        <label>Plat</label>
                        <input type="text" class="form-control" name="plat" value="<?php ;  ?>" required="required">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <input type="text" class="form-control" name="status" value="<?php ;  ?>" required="required">
                    </div>
                <?php endwhile; ?>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
            </main>
        </div>
    </div>
</body>
</html>