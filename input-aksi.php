<?php 
include "koneksi.php";

$nama_barang = $_POST['nama_barang'];
$merk = $_POST['merk'];
$jenis = $_POST['jenis'];
$harga = $_POST['harga'];
$des = $_POST['des'];

$nama = $_FILES['gambar']['name'];
$tipe = $_FILES['gambar']['type'];
$tmp = $_FILES['gambar']['tmp_name'];
$error = $_FILES['gambar']['error'];
$size = $_FILES['gambar']['size'];

$ext = pathinfo($nama, PATHINFO_EXTENSION);

$extension = strtolower($ext);
$allowed_extension = array('png', 'jpg', 'jpeg');
$new_image_name = uniqid("image-", true) . "." . $extension;
$upload_path = 'images/' . $new_image_name;
$move = move_uploaded_file($tmp, $upload_path);

if ($error == 0) {
   
    if (in_array($extension, $allowed_extension) === true) {
       
        $sql = $koneksi->query("INSERT INTO `mobil`(
            `id`,
            `nama`,
            `merk`,
            `jenis`,
            `gambar`,
            `harga`,
            `deskripsi`
        )
        VALUES(
            DEFAULT,
            '$nama_barang',
            '$merk',
            '$jenis',
            '$new_image_name',
            '$harga',
            '$des'
        )");
        // echo $sql;
        if ($sql) {
            echo "<script>alert('Berhasil')</script>";
        } else {
            echo "<script>alert('G Berhasil')</script>";
        }
    }
} else {
    echo "<script>alert('G Berhasil')</script>";
}

    // header("location:dashboard.php");
    echo "
    <pre>";
    echo "</pre>"
?>
