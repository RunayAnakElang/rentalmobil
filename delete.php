<?php 
     include 'koneksi.php';

     // get nomor dari url prarameter
     $no = $_GET['no'];
     mysqli_query($koneksi, "DELETE FROM mobil WHERE id='$no'");
     //  pindah ke halaman index dengan pesan
     header("location:dashboard.php?pesan=delete");
?>
