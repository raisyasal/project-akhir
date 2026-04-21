<?php 

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'db_cicilan';
$port = 3306;

$koneksi = new mysqli($hostname, $username, $password, $database, $port);
if($koneksi->connect_error) {
    die("Koneksi gagal!");
} 

?>