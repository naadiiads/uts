<?php
    include('koneksi.php');
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
    <title>Gaji Driver Trans Bus UPN</title>
</head>
<body>
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
        </div>
        <main role="main">
            <?php  
                if (isset($_GET['bulan'])) {
                    $bulan = $_GET['bulan'];
                } else {
                    $bulan = 'semua';
                }
            ?>
            <h5>Bulan = <?= $bulan ?></h5>
            <p>Filter</p>
            <form action="" method="get">
                <select name="bulan" id="bulan" required>
                    <option value="januari">Januari</option>
                    <option value="februari">Februari</option>
                    <option value="Maret">Maret</option>
                    <option value="April">April</option>
                    <option value="Mei">Mei</option>
                    <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>
                    <option value="Agustus">Agustus</option>
                    <option value="September">September</option>
                    <option value="Oktober">Oktober</option>
                    <option value="November">November</option>
                    <option value="Desember">Desember</option>
                </select>
                <button type="submit">Pilih</button>
                <a href="gajidriver.php"><button type="button">Reset</button></a>
            </form>
            <table border="1">
                <thead>
                    <tr>
                        <th>Id Driver</th>
                        <th>Nama</th>
                        <th>Total KM</th>
                        <th>Harga per KM</th>
                        <th>Total Gaji</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($data = mysqli_fetch_array($result)): ?>
                        <tr>
                            <?php
                                $query = "SELECT SUM(jumlah_km) AS total_km FROM trans_upn WHERE id_driver = $data[id_driver] GROUP BY id_driver";
                                $result_jarak = mysqli_query($koneksi, $query);
                                $dataDriver = mysqli_fetch_assoc($result_jarak);
                                if($dataDriver === NULL) {
                                    $total_km = 0;
                                } else {
                                    $total_km = $dataDriver['total_km'];
                                }
                                $gaji_driver_perKM = 3000;
                                $gaji_driver = $total_km * $gaji_driver_perKM;
                            ?>
                            <td><?php echo $data['id_driver'] ?></td>
                            <td><?php echo $data['nama'] ?></td>
                            <td><?php echo $total_km; ?></td>
                            <td><?php echo $gaji_driver_perKM; ?></td>
                            <td><?php echo "Rp. ", $gaji_driver; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </main>
    </div>
</body>
</html>