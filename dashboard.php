<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['user'])) {
    header("Location: salah.php");
    exit;

}
$query = mysqli_query($koneksi, "SELECT * FROM cicilan");
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
     <h2>Sistem Cicilan</h2> 
     <div class="logout">
    <a href="logout.php" class="logout-link">
         <i class="bi bi-box-arrow-right"></i> Logout</a>
</div>
    </header>
<div class=container>
    <div class="title">
        <h3>Data Cicilan</h3>
        <p>Keloala semua cicilan</p>
       <a href="tambah.php" class="btn btn-primary">+ Tambah Cicilan</a>
      <a href="bayar.php" class="btn btn-outline-primary">Bayar Cicilan</a>
        <hr>
    </div>
    <div class="tampilan">
         <?php if (mysqli_num_rows($query) == 0) { ?>
        <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24"  
fill="currentColor" viewBox="0 0 24 24" >
<!--Boxicons v3.0.8 https://boxicons.com | License  https://docs.boxicons.com/free-->
<path d="M20 7H4c-1.1 0-2 .9-2 2v11c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2v-2h-5c-1.1 0-2-.9-2-2v-3c0-1.1.9-2 2-2h5V9c0-1.1-.9-2-2-2"></path>
<path d="M17 13h5v3h-5zm-.43-10.82a1 1 0 0 0-.93-.11L8.01 5H17V3c0-.33-.16-.64-.43-.82"></path>
</svg>
        <h5> Belum ada cicilan</h5>
        <p>Tambahkan Cicilan baru untuk memulai</p>
        <?php } else { ?>
         <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Total Harga</th>
                    <th>Terbayar</th>
                    <th>Sisa</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>

                <?php while ($data = mysqli_fetch_assoc($query)) { ?>

                    <tr>
                        <td><?= $data['id_cicilan'] ?></td>
                        <td><?= $data['nama_cicilan'] ?></td>
                        <td><?= $data['total_harga'] ?></td>
                        <td><?= $data['terbayar'] ?></td>
                        <td><?= $data['sisa_hutang'] ?></td>
                        <td><?= $data['status'] ?></td>
                        <td>
                            <a href="delete.php?id=<?= $data['id_cicilan'] ?>"class="btn btn-outline-primary">hapus</a>
                        </td>
                    </tr>

                <?php } ?>

            </table>

        <?php } ?>

    </div>
    </div>
</div>
</body>
</html>