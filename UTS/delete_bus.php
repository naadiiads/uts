<?php 
include ('koneksi.php'); 

$status = '';
$result = '';

//melakukan pengecekan apakah ada form yang dipost
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id_bus'])) {
        //query SQL
        $bus_del = $_GET['id_bus'];
        $query = "DELETE FROM bus WHERE id_bus = '$bus_del'"; 

        //eksekusi query
        $result = mysqli_query($koneksi,$query);

        if ($result) {
            $status = 'dok';
        }
        else{
            $status = 'derr';
        }

        //redirect ke halaman lain
        header('Location: index.php?status='.$status);
    }  
}
?>