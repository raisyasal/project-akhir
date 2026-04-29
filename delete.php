<?php
require 'koneksi.php';

$id = $_GET['id'];
$cek = mysqli_query($koneksi, "SELECT status FROM cicilan WHERE id_cicilan = '$id'");
$data = mysqli_fetch_assoc($cek);


if ($data['status'] == 'lunas') {
   $query = mysqli_query($koneksi, "DELETE FROM cicilan WHERE id_cicilan = '$id'"); 
        if($query){
            require 'dashboard.php';
        }else{
            echo "Data gagal dihapus";
        }

} else {
    echo "Status belum lunas,tidak bisa dihapus";
    require 'dashboard.php';
}
?>