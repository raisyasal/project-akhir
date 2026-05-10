<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    unset($_SESSION['emailErr']);
    unset($_SESSION['usernameErr']);
    unset($_SESSION['passwordErr']);

    $formValid = true;

if (empty($_POST['email'])) {
        $_SESSION['emailErr'] = "Email tidak boleh kosong";
        $formValid = false;
} else {
    $email = htmlspecialchars($_POST['email']);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['emailErr'] = "Format email tidak valid";
            $formValid = false;
}
}

if (empty($_POST['username'])) {
        $_SESSION['usernameErr'] = "Username tidak boleh kosong";
        $formValid = false;
    } else {
        $username = htmlspecialchars($_POST['username']);
        if(strlen($username) > 20) {
            $_SESSION['usernameErr'] = "Username tidak boleh lebih dari 20 karakter";
            $formValid = false;
        } 
    }


if (empty($_POST['password'])) {
        $_SESSION['passwordErr'] = "Password tidak boleh kosong";
        $formValid = false;
} else {
    $password = $_POST['password'];
    if (strlen($password) < 6) {
        $_SESSION['passwordErr'] = "Password minimal 6 karakter";
        $formValid = false;
    }
}

if (!$formValid){
    header("Location: register.php");
    exit;
}

mysqli_query($koneksi, "INSERT INTO user (username,email,password) VALUES ('$username','$email','$password')");
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
                <div class="input-box">
                <input type="text" name="username" placeholder="Username" required>
                <i class="bi bi-person-fill"></i>
            </div>
            <p class="text-danger error"><?= $_SESSION['usernameErr'] ?? ''; ?></p>

             <div class="input-box">
                <input type="text" name="email" placeholder="Email" required>
               <i class="bi bi-envelope-at-fill"></i>
            </div>
                <p class="text-danger error"><?= $_SESSION['emailErr'] ?? ''; ?></p>

            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class="bi bi-lock-fill"></i>
            </div>
                <p class="text-danger error"><?= $_SESSION['passwordErr'] ?? ''; ?></p>
                <br>
                <button type="submit" name="register" class="tombol">Register</button>
        
</form>

<?php
unset($_SESSION['emailErr']);
unset($_SESSION['usernameErr']);
unset($_SESSION['passwordErr']);
?>

</div>

        <div class="right-panel">
        <h1> Selamat Datang Kembali! </h1>
        <p> Sudah Memiliki akun?</p>
        <a href="login.php"> Login </a>
        </div>
    
</div>
</body>
</html>