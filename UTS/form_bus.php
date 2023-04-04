<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include 'koneksi.php'; 

  $status = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id_bus = $_POST['id_bus'];
      $plat = $_POST['plat'];
      $status = $_POST['status'];
      //query SQL
      $query = "INSERT INTO bus (id_bus, plat, status) VALUES('$id_bus','$plat','$status')";

      //eksekusi query
      $result = mysqli_query($koneksi,$query);
      if ($result) {
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
    <title>Form Bus</title>
  </head> 

  <body>
      <a class="navbar-brand" href="#">Pemrograman Web</a>

    <div>
      <div class="row">
        <nav>
          <div>
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

          <h2 style="margin: 30px 0 30px 0;">Form Bus</h2>
          <form action="form_bus.php" method="POST">

            <div class="form-group">
              <label>Id Bis</label>
              <input type="text" class="form-control" placeholder="ID" name="id_bus" required="required">
            </div>
            <div class="form-group">
              <label>Plat</label>
              <input type="text" class="form-control" placeholder="Plat Nomor" name="plat" required="required">
            </div>
            <div class="form-group">
              <label>Status</label>
              <input type="text" class="form-control" placeholder="Status" name="status" required="required">              
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>