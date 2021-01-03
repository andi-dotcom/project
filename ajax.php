<?php
include 'config.php';
$kode_barang = $_GET['kode_barang'];
$query = mysqli_query($con, "select * from produk where kode_barang='$kode_barang'");
$prod = mysqli_fetch_array($query);
$data = array(
            'nama_barang'      =>  $prod['nama_barang'],
            'stok'   =>  number_format($prod['stok']),
            'harga_jual_hide'   =>  $prod['harga_jual'],
            'harga_jual'    =>  number_format($prod['harga_jual']),);
 echo json_encode($data);   
?> 