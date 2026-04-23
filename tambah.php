<?php
session_start();
include "koneksi.php";

if(!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
    
}

if (isset($_POST['simpan'])) {

    $nama = $_POST['nama_barang'];
    $total = $_POST['total_harga'];

    $terbayar = 0;
    $sisa = $total;
    $status = "aktif";

    mysqli_query($koneksi, "INSERT INTO cicilan 
    (nama_cicilan, total_harga, terbayar, sisa_hutang, status)
    VALUES 
    ('$nama', '$total', '$terbayar', '$sisa', '$status')");

    header("location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Cicilan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
   
   <link rel="stylesheet" href="style.css"> 
</head>
<body>

  <header class="header">
     <h2>Sistem Cicilan</h2> 
    <a href="logout.php" class="logout-link">
         <i class="bi bi-box-arrow-right"></i> Logout</a>
    </header>

    
        <div class="tambah">
            <h3>Tambah Cicilan</h3>
             <p> Masukkan detail cicilan </p>
             <hr>
                <form method="POST">

                    <label>Nama Barang</label><br>
                         <input type="text" name="nama_barang" placeholder="Masukkan nama barang"><br><br>

                    <label>Total Harga (Rp) </label><br>
                            <input type="number" name="total_harga" placeholder="Masukkan harga"><br><br>

                <div class="aksi">
                <button type="button" onclick="window.location.href='dashboard.php'" class="batal">
                    Batal
                </button>

                <button type="submit" name="simpan"  class="btn btn-primary">Simpan Cicilan</button>
                </div>
   

                 </form>
            </div>
        

</body>
</html>