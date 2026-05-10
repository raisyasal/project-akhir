<?php
session_start();
include 'koneksi.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    unset($_SESSION['usernameErr']);
    unset($_SESSION['passwordErr']);

    $formValid = true;
    $username = $_POST['username'];
    $password = $_POST['password'];

$query = mysqli_query ($koneksi, "SELECT * FROM user WHERE BINARY username='$username'");
$user = mysqli_fetch_assoc($query);

if(!$user) {
        $_SESSION['usernameErr'] = "Username tidak ditemukan";
        $formValid = false;
    }
    else if($password != $user['password']){
        $_SESSION['passwordErr'] = "Password tidak valid";
        $formValid = false;
    }
    
    if(!$formValid){
        header("Location:login.php");
        exit;
    }

    $_SESSION['login'] = true;
    $_SESSION ['id_user'] = $user['id_user'];
    $_SESSION ['username'] = $user['username'];

    header("Location: dashboard.php");
    exit;

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
        <div class="form-box login">
            <form method="POST">
                <h1>Login</h1>
                <div class="input-box">
                <input type="text" name="username" placeholder="Username" required>
                <i class="bi bi-person-fill"></i>
            </div>
            <p class="error-text error"><?= $_SESSION['usernameErr'] ?? ''; ?></p>

            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class="bi bi-lock-fill"></i>
            </div>
            <p class="error-text error"><?= $_SESSION['passwordErr'] ?? ''; ?></p>
        
            <div class="remember-forget">
                 <label><input type="checkbox">Remember me</label>
                <a href="#"> Need Help?</a>
            </div>
<br>
                <button type="submit" name="login" class="tombol">Login</button>
                
</form>

<?php
    unset($_SESSION['usernameErr']);
    unset($_SESSION['passwordErr']);
    ?>
</div>

        <div class="left-panel">
        <h1> Hello, Selamat Datang! </h1>
        <p> Tidak Memiliki akun?</p>
        <a href="register.php"> Register </a>
        </div>
        
</div>
        

</body>
</html>