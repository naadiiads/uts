<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
include ('koneksi.php'); 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pemrograman Web</title>
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
                //mengecek apakah proses update dan delete sukses/gagal
                if (@$_GET['status']!==NULL) {
                    $status = $_GET['status'];
                    if ($status=='ok') {
                        echo '<br><br><div class="alert alert-success" role="alert">Data berhasil di simpan</div>';
                    }
                    elseif($status=='err'){
                        echo '<br><br><div class="alert alert-danger" role="alert">Data telah di hapus</div>';
                    }
                }
            ?>

            <h2 style="margin: 30px 0 30px 0;">Bus</h2>
            <div class="table-responsive">
                <table border = "1">
                    <thead>
                        <tr>
                            <th>ID Bus</th>
                            <th>Plat</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        //proses menampilkan data dari database:
                        //siapkan query SQL
                        $query = "SELECT * FROM bus";
                        $result = mysqli_query($koneksi,$query);
                        ?>

                        <?php while($data = mysqli_fetch_array($result)): ?>
                        <tr>
                            <td><?php echo $data['id_bus'];  ?></td>
                            <td><?php echo $data['plat'];  ?></td>
                            <td><?php echo $data['status'];  ?></td>
                            <td>
                            <a href="<?php echo "update_bus.php?id_bus=".$data['id_bus']; ?>" class="btn btn-outline-warning btn-sm"> Update</a>
                            &nbsp;&nbsp;
                            <a href="<?php echo "delete_bus.php?id_bus=".$data['id_bus']; ?>" class="btn btn-outline-danger btn-sm"> Delete</a>
                            </td>
                        </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>

            <h2 style="margin: 30px 0 30px 0;">Driver</h2>
            <div class="table-responsive">
                <table border = "1">
                    <thead>
                        <tr>
                            <th>Id Driver</th>
                            <th>Nama</th>
                            <th>No Sim</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        //proses menampilkan data dari database:
                        //siapkan query SQL
                        $query = "SELECT * FROM driver";
                        $driver = mysqli_query($koneksi,$query);
                        ?>

                        <?php while($item = mysqli_fetch_array($driver)): ?>
                        <tr>
                            <td><?php echo $item['id_driver'];  ?></td>
                            <td><?php echo $item['nama'];  ?></td>
                            <td><?php echo $item['no_sim'];  ?></td>
                            <td><?php echo $item['alamat'];  ?></td>
                            <td>
                            <a href="update_driver.php?id_driver=<?php echo $item['id_driver']; ?>" class="btn btn-outline-warning btn-sm"> Update</a>
                            &nbsp;&nbsp;
                            <a href="delete_driver.php?id_driver=<?php echo $item['id_driver']; ?>" class="btn btn-outline-danger btn-sm"> Delete</a>
                            </td>
                        </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>

            <h2 style="margin: 30px 0 30px 0;">Kondektur</h2>
            <div class="table-responsive">
                <table border = "1">
                    <thead>
                        <tr>
                        <th>Id Kondektur</th>
                        <th>Nama</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        //proses menampilkan data dari database:
                        //siapkan query SQL
                        $query = "SELECT * FROM kondektur";
                        $kondektur = mysqli_query($koneksi,$query);
                        ?>

                        <?php while($kondek = mysqli_fetch_array($kondektur)): ?>
                        <tr>
                            <td><?php echo $kondek['id_kondektur'];  ?></td>
                            <td><?php echo $kondek['nama'];  ?></td>
                            <td>
                            <a href="update_kondektur.php?id_kondektur=<?php echo $kondek['id_kondektur']; ?>" class="btn btn-outline-warning btn-sm"> Update</a>
                            &nbsp;&nbsp;
                            <a href="delete_kondektur.php?id_kondektur=<?php echo $kondek['id_kondektur']; ?>" class="btn btn-outline-danger btn-sm"> Delete</a>
                            </td>
                        </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>

            <h2 style="margin: 30px 0 30px 0;">Trans UPN</h2>
            <div class="table-responsive">
                <table border = "1">
                    <thead>
                        <tr>
                            <th>Id Trans Upn</th>
                            <th>Id Kondektur</th>
                            <th>Id Bus</th>
                            <th>Id Driver</th>
                            <th>Jumlah Km</th>
                            <th>Tanggal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        //proses menampilkan data dari database:
                        //siapkan query SQL
                        $query = "SELECT * FROM trans_upn";
                        $trans = mysqli_query($koneksi,$query);
                        ?>

                        <?php while($upn = mysqli_fetch_array($trans)): ?>
                        <tr>
                            <td><?php echo $upn['id_trans_upn'];  ?></td>
                            <td><?php echo $upn['id_kondektur'];  ?></td>
                            <td><?php echo $upn['id_bus'];  ?></td>
                            <td><?php echo $upn['id_driver'];  ?></td>
                            <td><?php echo $upn['jumlah_km'];  ?></td>
                            <td><?php echo $upn['tanggal'];  ?></td>
                            <td>
                            <a href="update_trans.php?id_trans_upn=<?php echo $upn['id_trans_upn']; ?>" class="btn btn-outline-warning btn-sm"> Update</a>
                            &nbsp;&nbsp;
                            <a href="delete_trans.php?id_trans_upn=<?php echo $upn['id_trans_upn']; ?>" class="btn btn-outline-danger btn-sm"> Delete</a>
                            </td>
                        </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </main>
        </div>
    </div>
</body>
</html>