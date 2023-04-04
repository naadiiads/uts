<?php 
include ('koneksi.php'); 

$status = '';
$result = '';

//melakukan pengecekan apakah ada form yang dipost
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id_driver'])) {
        //query SQL
        $driver_del = $_GET['id_driver'];
        $query = "DELETE FROM driver WHERE id_driver = '$driver_del'"; 

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
}
?>