<?php 
    $host   	= "localhost";
    $user   	= "root";
    $password	= "w2724p0h";
    $dbname 	= "coffee_shop";

    $konek = new mysqli($host, $user, $password, $dbname);

    if ($konek) {
    	// echo "Berhasil Konek ";
    }else{
    	die("Koneksi Gagal :".mysqli_connect_error());
    }
?>