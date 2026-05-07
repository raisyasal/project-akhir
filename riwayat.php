<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Riwayat</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

   
   <link rel="stylesheet" href="style.css"> 
</head>
<body>

  <header class="header">
     <h2>CicilKu</h2> 
     <div class="menu">
        <a href="dashboard.php"><i class="bi bi-house"></i> Dashboard</a>
        <a href="tambah.php"><i class="bi bi-plus-circle"></i> Tambah Cicilan</a>
        <a href="riwayat.php" class="active"> <i class="bi bi-clock"></i> Riwayat</a>
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

    <h3>Riwayat Pembayaran</h3>
   
 <footer class="footer">
    <p> 2026 CicilKu | Kelola cicilan lebih mudah</p>
</footer>    
      
</body>
</html>

