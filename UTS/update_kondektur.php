<?php
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
include ('koneksi.php');

$status = '';
$result = '';

//melakukan pengecekan apakah ada variable GET yang dikirim
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id_kondektur'])) {
        //query SQL
        $kondektur_up = $_GET['id_kondektur'];
        $query = "SELECT * FROM kondektur WHERE id_kondektur = '$kondektur_up'";

        //eksekusi query
        $kondektur = mysqli_query($koneksi,$query);
    }
}

//melakukan pengecekan apakah ada form yang dipost
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_kondektur = $_POST['id_kondektur'];
    $nama = $_POST['nama'];
    //query SQL
    $kondektur = "UPDATE kondektur SET nama='$nama' WHERE id_kondektur='$id_kondektur'";

    //eksekusi query
    $kondektur = mysqli_query($koneksi,$query);
    if ($kondektur) {
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
    <title>Update Data Kondektur</title>
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

            <h2 style="margin: 30px 0 30px 0;">Update Data Kondektur</h2>
            <form action="update_kondektur.php" method="POST">
                <?php while($kondek = mysqli_fetch_array($kondektur)): ?>
                <div class="form-group">
                    <label>Id Kondektur</label>
                    <input type="text" class="form-control" name="id_kondektur" value="<?php ;  ?>" required="required" readonly>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama" value="<?php ;  ?>" required="required">
                </div>
                <?php endwhile; ?>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </main>
        </div>
    </div>
</body>
</html>
