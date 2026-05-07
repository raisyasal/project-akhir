<?php
include 'koneksi.php';

if(isset($_POST['username']) && isset($_POST['password'])){

$username = $_POST['username'];
$password = $_POST['password'];

mysqli_query($koneksi, "INSERT INTO user (username,password) VALUES ('$username','$password')");

header("Location: login.php");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>
<body class="tubuh">
 <div class="wrapper">
        <form method="POST">
            <h1>Registrasi</h1>
            <h3>Buat akun Anda</h3>
            <div class="input-box">
                <input type="text" name="username" placeholder="Username" required>
                <i class="bi bi-person-fill"></i>
            </div>

            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class="bi bi-lock-fill"></i>
            </div>
            
            <div class="remember-forget">
                <label><input type="checkbox">Remember me</label>
                <a href="#"> Need Help?</a>
            </div>
                <button type="submit" name="login" class="tombol">Sign Up</button>

            <div class="register-link">
                    <p>Sudah punya akun?<a href="login.php">Login</a></p>
            </div>
</form>
</div>
</body>
</html>