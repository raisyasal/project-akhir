<?php
session_start();
include "koneksi.php";

if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
    
}

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM cicilan WHERE id_cicilan='$id'");
$data = mysqli_fetch_assoc($query);

$cicilan = ($data['tenor']>0) ? $data['total_harga'] / $data['tenor']:0;

if(isset($_POST['bayar'])) {
$terbayar_baru = $data['terbayar'] + $cicilan;
$sisa_baru = $data['total_harga'] - $terbayar_baru;

if($sisa_baru <=0) {
    $sisa_baru =0;
    $status = "lunas";
} else {
    $status ="aktif";
}

mysqli_query($koneksi , "UPDATE cicilan SET 
terbayar='$terbayar_baru',
sisa_hutang='$sisa_baru',
status='$status'
WHERE id_cicilan='$id'
");

header("Location: dashboard.php");
exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bayar Cicilan</title>

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
   
   <link rel="stylesheet" href="style.css"> 
</head>

<body>
    
    <header class="header">
     <h2>CicilKu</h2> 
    <div class="logout">
    <a href="logout.php" class="logout-link">
         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
           
    </svg>

   <?php 
if(isset($_SESSION['username'])){
    echo $_SESSION['username'];
     echo ' | <i class="bi bi-box-arrow-right"></i> Logout</a>';
     } else {
    echo "Guest";
}
?>
    </header>
 <div class="bayar-card">
            <h3>Bayar Cicilan </h3>
             <p> Lakukan pembayaran cicilan </p>
             <hr>
        
             <div class="info">
                <h6 class="nama"><?= $data['nama_cicilan'] ?></h6>
            
                <div class ="row">
                    <span>Total</span>
                    <p>Rp<?= number_format($data['total_harga']) ?></p>
                </div>

                <div class= "row">
                    <span>Cicilan/Bulan</span>
                    <p>Rp<?= number_format($cicilan) ?></p>
                </div>

                <div class= "row">
                    <span>Sisa</span>
                    <p>Rp<?= number_format($data['sisa_hutang']) ?></p>
                </div>
</div>

<hr>

<form method="POST">
    <div class="aksi">
        <a href="dashboard.php" class="batal"> Batal </a>
        <button type="submit" name="bayar" class="bayar-btn">
            Bayar Sekarang
        </button>
</div>
</form>
</div>
</body>
</html>