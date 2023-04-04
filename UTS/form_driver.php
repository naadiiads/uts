<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
include 'koneksi.php'; 

$status = '';
//melakukan pengecekan apakah ada form yang dipost
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id_driver = $_POST['id_driver'];
  $nama = $_POST['nama'];
  $no_sim = $_POST['no_sim'];
  $alamat = $_POST['alamat'];
  //query SQL
  $query = "INSERT INTO driver (id_driver, nama, no_sim, alamat) VALUES('$id_driver','$nama','$no_sim','$alamat')";

  //eksekusi query
  $driver = mysqli_query($koneksi,$query);
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
    <title>Form Driver</title>
  </head>

  <body>
      <a class="navbar-brand" href="#">Pemrograman Web</a>

    <div class="container-fluid">
      <div class="row">
        <nav">
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
          
          <?php 
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data berhasil di simpan</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data gagal di simpan</div>';
              }
          ?>

          <h2 style="margin: 30px 0 30px 0;">Form Driver</h2>
          <form action="form_driver.php" method="POST">

            <div class="form-group">
              <label>Id Driver</label>
              <input type="text" class="form-control" placeholder="Id Driver" name="id_driver" required="required">
            </div>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" placeholder="Nama" name="nama" required="required">
            </div>
            <div class="form-group">
              <label>No Sim</label>
              <input type="text" class="form-control" placeholder="No Sim" name="no_sim" required="required">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" class="form-control" placeholder="Alamat" name="alamat" required="required">
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>