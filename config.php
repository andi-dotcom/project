<?php
/**
 * using mysqli_connect for database connection
 */
date_default_timezone_set('Asia/Jakarta');

session_start();

$databaseHost = 'localhost';
$databaseName = 'asgar';
$databaseUsername = 'root';
$databasePassword = '';

$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
if (!$con)
{
  die("Koneksi dengan MySQL gagal");
}

?>
