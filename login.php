<?php
session_start();
include 'koneksi.php';

if(isset($_POST['username']) && isset($_POST['password'])) {

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query ($koneksi, "SELECT * FROM user WHERE BINARY username='$username' AND BINARY password='$password'");


if(mysqli_num_rows($query) > 0){
   $_SESSION['username']=$username;
    header("Location: dashboard.php");
    exit;
} else {
    header("location:salah.php");
}
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
<body>
    <div class="Login">
    <div class="login">
        <form method="POST">
         
            <h1>CicilKu</h1>
            <h5>Masuk ke akun Anda</h5>

            <div class="input">
                <label for="floatingUsername">Username</label>
                <input type="text" class="form-control" id="floatingUsername" placeholder="Username" name="username" required>
                <i class="bi bi-person-fill"></i>
            </div>
            <div class="input">
                <label for="floatingPassword">Password</label>
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
            
            </div>
            <button type="submit" name="login" class="btn btn-primary">Sign In</button>
        </form>
        <div class="akun">
            <p> Belum punya akun? <a href="register.php">Sign Up</a></p>
        </div>

</div>
</body>
</html>