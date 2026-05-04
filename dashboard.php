<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['user'])) {
    header("Location: salah.php");
    exit;

}

$data = mysqli_query($koneksi, "SELECT * FROM cicilan");

$total_bulan=0;
$aktif=0;
$lunas=0;

$data2 = mysqli_query($koneksi, "SELECT * FROM cicilan");

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
        <a href="#" class="active"> Dashboard</a>
        <a href="tambah.php">Tambah Cicilan</a>
</div>

     <div class="logout">
    <a href="logout.php" class="logout-link">
         <i class="bi bi-box-arrow-right"></i> Logout</a>
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
                <p> Total: Rp<?= number_format($row['total_harga'])?></p>
                <p> Cicilan: Rp<?= number_format($cicilan)?>/bulan</p>
                <p> Terbayar: Rp<?= number_format($row['terbayar'])?></p>
                <p> Sisa: Rp<?= number_format($row['sisa_hutang'])?></p>

                <?php 
                $persen=0;
                if ($row['total_harga'] > 0) {
                $persen = ($row['terbayar'] / $row['total_harga']) * 100;
                }
                ?>
                <div class="progress">
                    <div class="progress-bar" style="width: <?= $persen ?>%"></div>
                </div>
                <div class="status-row">
                <span class="<?= $row['status']?>">
                    <?= $row['status']?>
                </span>
                <p><?= round($persen) ?>%</p>
</div>
                

                <br>

                <?php if ($row['status'] == 'aktif') { ?>
                <a href ="bayar.php?id=<?= $row['id_cicilan']?>" class="btn bayar">Bayar</a>
                <?php } else { ?>
                <button class='btn bayar disabled'> Lunas </button>
            <?php } ?>
                <a href ="hapus.php?id=<?= $row['id_cicilan']?>" class="btn hapus">Hapus</a>

</div>
<?php 
            } ?>

</div>
</div>
</div>
</body>
</html>