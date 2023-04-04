<?php 
    include ('koneksi.php');
    $query = "SELECT * FROM driver";
    $result = mysqli_query($koneksi,$query);
    if ($result) {
        $status = 'ok';
    } else {
        $status = 'error';
    } 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Pemrograman Web
        </title>
        <style>
            .status_beroperasi {
                background-color: green;
                color: white;
            }
            .status_cadangan {
                background-color: yellow;
            }
            .status_rusak {
                background-color: red;
            }
        </style>
    </head>

    <body>
        <div>
                    <ul style="margin-top:100px;">
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
            <main role="main">
                <?php 
                    if ($status=='ok') {
                        echo '<br><br><div class="alert alert-success" role="alert">Data berhasil di simpan</div>';
                    }
                    elseif($status=='err'){
                        echo '<br><br><div class="alert alert-danger" role="alert">Data gagal di simpan</div>';
                    }
                ?>
            
            <!-- filter -->
            <form action="" method="GET">
                <label for="">Status</label>
                <select name="statusbus" id="statusbus" required>
                    <option value="">Pilih</option>
                    <option value="1">Beroperasi</option>
                    <option value="2">Cadangan</option>
                    <option value="0">Rusak</option>
                </select>
                <button type="submit">Pilih</button>
            </form>

                <h2 style="margin: 30px 0 30px 0;">Data Bus Trans UPN</h2>
                <div>
                    <table border="1">
                    <thead>
                        <tr>
                            <th>Id Bus</th>
                            <th>Plat</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                            if(isset($_GET['statusbus'])){
                                $statusbus = $_GET['statusbus'];
                                $query = "SELECT * FROM bus WHERE status = '$statusbus'";
                            } else{
                                $query = "SELECT * FROM bus";
                            }
                            $result = mysqli_query($koneksi,$query);
                        ?>

                        <?php while($data = mysqli_fetch_array($result)): ?>
                            <tr>
                                <td><?php echo $data['id_bus'];  ?></td>
                                <td><?php echo $data['plat'];  ?></td>
                                <td class="status_<?php if ($data['status'] == 1){ echo 'beroperasi';} elseif ($data['status'] == 2) { echo 'cadangan';} elseif ($data['status'] == 0){ echo 'rusak';} ?>">
                                <?php echo $data['status'];  ?></td>
                                <td>
                                <a href="<?php echo "update_bus.php?id=".$data['id_bus']; ?>"> Update</a>
                                &nbsp;&nbsp;
                                <a href="<?php echo "delete_bus.php?id=".$data['id_bus']; ?>"> Delete</a>
                                </td>
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                    </table>
                </div>
            </main>
        </div>
    </body>
</html>