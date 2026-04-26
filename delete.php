<?php
require 'koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM cicilan WHERE id_cicilan = '$id'"); 

if ($query) {
    
    require 'dashboard.php';
} else {
    echo "Data gagal dihapus";
}
?>