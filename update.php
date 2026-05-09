<?php
include 'koneksi.php';
$id = $_POST['id_cicilan'];
$nama_cicilan = $_POST['nama_barang'];
$total_harga = $_POST['total_harga'];
$tenor = $_POST['tenor'];


$query = mysqli_query($koneksi, "UPDATE cicilan SET
    nama_cicilan = '$nama_cicilan', total_harga = '$total_harga',tenor = '$tenor'
    WHERE id_cicilan = '$id';");

if ($query) {
   header("Location: dashboard.php");
exit;
} else {
    echo "Proses Update Gagal";
}
?>