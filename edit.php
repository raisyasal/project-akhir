<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;

}
$id_cicilan = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM cicilan WHERE id_cicilan ='$id_cicilan'");
$data = mysqli_fetch_array($query);
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
     <h2>CicilKu</h2> 
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

    
        <div class="tambah">
            <h3>Edit Cicilan</h3>
             <p> Perbarui detail cicilan Anda </p>
             <hr>
                <form action="update.php" method="POST">
                    <input type="hidden" name="id_cicilan" value="<?= $data['id_cicilan'] ?>">

                    <label>Nama Barang</label><br>
                         <input type="text" name="nama_barang" placeholder="Masukkan nama barang" value="<?= $data['nama_cicilan'] ?>"readonly><br><br>

                    <label>Total Harga (Rp) </label><br>
                            <input type="number" name="total_harga" placeholder="Masukkan harga" value="<?= $data['total_harga'] ?>" required><br><br>

                    <label> Tenor (bulan)</label><br>
                            <input type="number" name="tenor" placeholder="Contoh: 12" value="<?= $data['tenor'] ?>" required><br><br>

                <div class="mt-3 d-grid gap-2">
                 <button type="submit" name="simpan" class="btn btn-primary"> Simpan Cicilan </button>
    <button type="button" onclick="window.location.href='dashboard.php'" class="btn btn-outline-secondary">Batal</button>
                        </div>
                </form>

            </div>

            <footer class="footer">
    <p> © 2026 CicilKu | Kelola cicilan lebih mudah</p>
</footer>    
      
</body>
</html>