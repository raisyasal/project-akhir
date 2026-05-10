<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;

}

$id = $_GET['id'];
$cek = mysqli_query($koneksi, "SELECT status FROM cicilan WHERE id_cicilan='$id'");
$data= mysqli_fetch_assoc($cek);

if ($data['status'] == 'lunas') {
$query = mysqli_query($koneksi, "DELETE FROM cicilan WHERE id_cicilan = '$id'"); 

           header("Location: dashboard.php");
           exit;

           
           
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gagal Hapus</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
   
   <link rel="stylesheet" href="style.css"> 

</head>
<body class="warning-body">
    <div class="warning-card">
        <div class="warning-top">
            <i class="bi bi-exclamation-triangle"></i>
</div>

<div class="warning-content">
    <h2> Peringatan </h2>
    <p> Data tidak bisa dihapus <br> karena cicilan belum lunas. </p>

    <a href="dashboard.php" class="warning-btn">
        Kembali
    </a>
</div>   
</body>
</html>