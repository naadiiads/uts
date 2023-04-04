<?php 
include ('koneksi.php'); 

$status = '';
$result = '';

//melakukan pengecekan apakah ada form yang dipost
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id_trans_upn'])) {
        //query SQL
        $trans_del = $_GET['id_trans_upn'];
        $query = "DELETE FROM trans_upn WHERE id_trans_upn = '$trans_del'"; 

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