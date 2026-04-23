<?php
session_start();
include "koneksi.php";

if(!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
    
}

if (isset($_POST['simpan'])) {

    $id = $_POST['id_cicilan'];
    $bayar = $_POST['total_harga'];

    if($bayar <= 0) {
        echo "Jumlah pembayaran tidak valid!";
        exit;
    }

    $query = mysqli_query($koneksi, "SELECT * FROM cicilan WHERE id_cicilan='$id'");
    $data = mysqli_fetch_assoc($query);


if($data) {

    if($bayar > $data['sisa_hutang']) {
        echo "Pembayaran melebihi sisa hutang!:";
        exit;
    }

    $terbayar_baru = $data['terbayar'] + $bayar;
    $sisa_baru = $data['total_harga'] - $terbayar_baru;


if ($sisa_baru <= 0) {
    $status = "lunas";
    $sisa_baru =0;

} else {
    $status ="aktif";

}

$query = mysqli_query($koneksi, "UPDATE cicilan SET
terbayar='$terbayar_baru',
sisa_hutang='$sisa_baru',
status='$status'
WHERE id_cicilan='$id'");

header("Location: dashboard.php");
exit;

    }
}

?>