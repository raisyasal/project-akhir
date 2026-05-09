<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;

}
$id_user = $_SESSION['id_user'];
$data = mysqli_query($koneksi, "SELECT * FROM cicilan WHERE id_user ='$id_user'");


$total_bulan=0;
$aktif=0;
$lunas=0;

$data2 = mysqli_query($koneksi, "SELECT * FROM cicilan WHERE id_user ='$id_user'");

while ($d = mysqli_fetch_assoc($data2)) {
    if($d['status'] == 'aktif') {
        $aktif++;

        if($d['tenor'] > 0) {
            $total_bulan += $d['total_harga'] / $d['tenor'];
        }
    }

    if($d['status'] == 'lunas') {
        $lunas++;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
   
   <link rel="stylesheet" href="style.css"> 

</head>
<body>
    <header class="header">
     <h2>CicilKu</h2> 
     <div class="menu">
        <a href="#" class="active"><i class="bi bi-house"></i> Dashboard</a>
        <a href="tambah.php"><i class="bi bi-plus-circle"></i> Tambah Cicilan</a>
        <a href="riwayat.php"> <i class="bi bi-clock"></i> Riwayat</a>
</div>

     <div class="logout">
    <div class="logout-link">
         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
           
    </svg>

   <?php 
if(isset($_SESSION['username'])){
    echo $_SESSION['username'];
    ?>
     |
     <a href="logout.php" class="logout-link">
        <i class="bi bi-box-arrow-right"></i> Logout
</a>
     <?php
    } else {
    echo "Guest";
}
?>
</div>

    </header>

    <div class="summary">
        <div class="box blue">
           <span> Total Bulan Ini </span><br>
        <h3>Rp <?= number_format($total_bulan) ?></h3>
        <i class="bi bi-wallet2 icon"></i>
</div>

    <div class="box orange">
      <span>   Aktif  </span><br>
        <h3><?=$aktif?></h3>
        <i class="bi bi-folder2-open icon"></i>
</div>

<div class="box green">
    <span> Lunas </span> <br>
    <h3><?= $lunas?></h3>
    <i class="bi bi-check-circle icon"></i>
</div>

</div>

<hr>

<div class=container>

    <div class="main">
        
        <h3>Data Cicilan</h3>
        <div class="list">
            <?php while($row = mysqli_fetch_assoc($data)) {
                $cicilan = ($row['tenor']>0) ? $row['total_harga'] / $row['tenor']:0;
                ?>

            <div class="card">
                <h3><?= $row['nama_cicilan']?></h3>
                <hr>
                <p> Total: Rp<?= number_format($row['total_harga'])?></p>
                <p> Cicilan: Rp<?= number_format($cicilan)?>/bulan</p>
                <p> Terbayar: Rp<?= number_format($row['terbayar'])?></p>
                <p> Sisa: Rp<?= number_format($row['sisa_hutang'])?></p>

                <?php 
                $persen=0;
                if ($row['total_harga'] > 0) {
                $persen = floor(($row['terbayar'] / $row['total_harga']) * 100);
                }
                ?>
                <div class="progress">
                    <div class="progress-bar" style="width: <?= $persen ?>%"></div>
                </div>
                <div class="status-row">
                <span class="<?= $row['status']?>">
                    <?= $row['status']?>
                </span>
                <p><?= $persen ?>%</p>
</div>
                

                <br>

                <?php if ($row['status'] == 'aktif') { ?>
                <a href ="bayar.php?id=<?= $row['id_cicilan']?>" class="btn bayar">Bayar</a>
                <?php } else { ?>
                <button class='btn bayar disabled'> Lunas </button>
            <?php } ?>
            <div class="aksi-bawah">
                <a href ="edit.php?id=<?= $row['id_cicilan']?>" class="btn edit">Edit</a>
                <a href ="delete.php?id=<?= $row['id_cicilan']?>" class="btn hapus">Hapus</a>
</div>
</div>
<?php 
            } ?>

</div>
</div>
</div>

<footer class="footer">
    <p> © 2026 CicilKu | Kelola cicilan lebih mudah</p>
</footer>
</body>
</html>