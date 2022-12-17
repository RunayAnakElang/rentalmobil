<?php 
$koneksi = mysqli_connect("localhost:8889", "root", "root", "rentalmobil");

//cek koneksi
if(mysqli_connect_errno()){
    echo "Koneksi databse gagal : ". mysqli_connect_error();

}

?>