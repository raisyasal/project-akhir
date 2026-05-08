<?php
session_start();
include 'koneksi.php';

if(isset($_POST['username']) && isset($_POST['password'])){

$username = $_POST['username'];
$password = $_POST['password'];


if(strlen($password) < 6) {
    $_SESSION['error']="Password minimal 6 karakter!";
    header("Location: register.php");
    exit;
}
$cek = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");

if(mysqli_num_rows($cek)>0){
    $_SESSION['error']="Username sudah digunankan!";
header("Location: register.php");
exit;
}
mysqli_query($koneksi, "INSERT INTO user (username,password) VALUES ('$username','$password')");
header("Location: login.php");
exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>
<body class="tubuh">
  <div class="wrapper">
        <div class="kotak register">
            <form method="POST">
                <h1>Registrasi</h1>
                <?php
                if(isset($_SESSION['error'])) { ?>
                <div class="error">
                    <?= $_SESSION['error']; ?>
                </div>
                
                <?php 
                unset($_SESSION['error']);
                } ?>

                <div class="input-box">
                <input type="text" name="username" placeholder="Username" required>
                <i class="bi bi-person-fill"></i>
            </div>

             <div class="input-box">
                <input type="text" name="email" placeholder="Email" required>
               <i class="bi bi-envelope-at-fill"></i>
            </div>

            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class="bi bi-lock-fill"></i>
            </div>
        
                <button type="submit" name="register" class="tombol">Register</button>
        
</form>
</div>

        <div class="right-panel">
        <h1> Selamat Datang Kembali! </h1>
        <p> Sudah Memiliki akun?</p>
        <a href="login.php"> Login </a>
        </div>
    
</div>
</body>
</html>