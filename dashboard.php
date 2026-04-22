
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
    <a href="logout.php" class="btn btn-outline-primary">Logout</a>
</div>
    </header>
<div class=container>
    <div class="tambahbayar">
        <h3>Data Cicilan</h3>
        <p>Keloala semua cicilan</p>
       <a href="tambah.php" class="btn btn-primary">+ Tambah Cicilan</a>
      <a href="bayar.php" class="btn btn-outline-primary">Bayar Cicilan</a>
        <hr>
    </div>
    <div class="tampilan">
        <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24"  
fill="currentColor" viewBox="0 0 24 24" >
<!--Boxicons v3.0.8 https://boxicons.com | License  https://docs.boxicons.com/free-->
<path d="M20 7H4c-1.1 0-2 .9-2 2v11c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2v-2h-5c-1.1 0-2-.9-2-2v-3c0-1.1.9-2 2-2h5V9c0-1.1-.9-2-2-2"></path>
<path d="M17 13h5v3h-5zm-.43-10.82a1 1 0 0 0-.93-.11L8.01 5H17V3c0-.33-.16-.64-.43-.82"></path>
</svg>
        <h5> Belum ada cicilan</h5>
        <p>Tambahkan Cicilan baru untuk memulai</p>
    </div>
</div>
</body>
</html>