<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<body>
<?php 
      IF(isset($_GET['pesan'])){
        $pesan = $_GET['pesan'];
        if($pesan == 'input'){
            echo'<script>
            alert("produk berhasil Di Input");</script>';
        }elseif($pesan == 'update'){
            echo'<script>
            alert("Produk Di Update");</script>';
        }elseif($pesan == 'delete'){
            echo'<script>
            alert("produk Berhasil Di Delete");</script>';
        }
    }
    ?>
    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">Rent A Car</h2>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="#">BERANDA</a></li>
                    <li><a href="#">PILIHAN</a></li>
                    <li><a href="#">ABOUT</a></li>
                    <li><a href="#">LOGIN</a></li>
                    <li><a href="#">LOGOUT</a></li>
                </ul>
            </div>
        </div> 
        <div class="content">
            <h1>Kami Adalah Solusi Terbaik<br><span>Pilihan Rental Mobil</span> <br>Anda</h1>
            <p class="par">Temukan mobil pilihan anda ditempat kami
                <br> pilihan terbaik anda</p>
                </div>
                </div>
        </div>
    </div>
    <br>
    <br>

    <!-- Gallery -->
    <section id="gallery">
      <div class="container">
        <div class="row text-center mb-3">
          <div class="col">
            <h2>Daftar Mobil</h2>
          </div>
        </div>
        
        <div class="row justify-content-center">
        <?php 
        include 'koneksi.php';

        $query_mysqli = mysqli_query($koneksi, "SELECT * FROM mobil");
        $nomor = 1;
        while ($data = mysqli_fetch_assoc($query_mysqli)){
            
        
        ?>
          <div class="col-md-4 mb-3">
            <div class="card">
              <img src="images/<?= $data ['gambar'] ?>" class="card-img-top" alt="Gallery1" />
              <div class="card-body">
                <h4><?= $data ['nama'] ?></h4>
                <p class="card-text">Rp.<?=number_format($data['harga'],2)?></p>
                <a class="btn btn-danger" href="delete.php?no=<?= $data['id'] ?>">delete</a>
                <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#update<?= $data['id'] ?>" href="">update</a>
                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#view<?= $data['id'] ?>" href="">view</a>

              </div>
            </div>
          </div>
          <!-- ini modal buata update -->
          <div class="modal fade" id="update<?= $data['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" action="update.php" enctype="multipart/form-data">
          <label  class="form-label" for="">nama</label>
          <input type="hidden" name="id" value="<?= $data ['id'] ?>">
          <input class="form-control" name="nama" type="text" value="<?= $data ['nama'] ?>">
          <br>
          <label class="form-label" for="">merk</label>
          <input  class="form-control" name="merk" type="text" value="<?= $data ['merk'] ?>">
          <br>
          <label class="form-label"  for="">jenis</label>
          <input type="text" name="jenis"  class="form-control" value="<?= $data ['jenis'] ?>">
          <br>
          <labe  class="form-label" class="form-label"l for="">harga</label>
          <input  class="form-control" name="harga" type="number" value="<?= $data ['harga'] ?>">
          <br>
          <label class="form-label" for="">Deeskripsi</label>
          <input  class="form-control" name="deskripsi" type="text" value="<?= $data ['deskripsi'] ?>">
          <br>
          <div class="form-group">
                                         <label>Gambar Produk</label>
                                            <input name="gambar" class="form-control" type="file">
                                            <img width="130" src="images/<?= $data['gambar'] ?>" alt="" width="600px">
                                            <input type="hidden" name="gambar_old" value="<?= $data['gambar'] ?>">
                                        </div>
 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>
          <!-- ini akhir modal update -->

          <!-- ini modal buata view -->
          <div class="modal fade" id="view<?= $data['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form >
          <label  class="form-label" for="">nama</label>
          <input type="hidden" name="id" value="<?= $data ['id'] ?>">
          <input class="form-control" name="nama" type="text" value="<?= $data ['nama'] ?>" readonly>
          <br>
          <label class="form-label" for="">merk</label>
          <input  class="form-control" name="merk" type="text" value="<?= $data ['merk'] ?>" readonly>
          <br>
          <label class="form-label"  for="">jenis</label>
          <input type="text" name="jenis"  class="form-control" value="<?= $data ['jenis'] ?>" readonly>
          <br>
          <labe  class="form-label" class="form-label"l for="">harga</label>
          <input  class="form-control" name="harga" type="number" value="<?= $data ['harga'] ?>" readonly>
          <br>
          <label class="form-label" for="">Deeskripsi</label>
          <input  class="form-control" name="deskripsi" type="text" value="<?= $data ['deskripsi'] ?>" readonly>
          <br>
          <div class="form-group">
                                         <label>Gambar Produk</label>
                                        <br>
                                            <img width="130" src="images/<?= $data['gambar'] ?>" alt="" width="600px">
                                            <input type="hidden" name="gambar_old" value="<?= $data['gambar'] ?>">
                                        </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
          <!-- ini akhir modal view -->
          <?php 
        }
         ?>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="#ffffff"
          fill-opacity="1"
          d="M0,192L34.3,202.7C68.6,213,137,235,206,224C274.3,213,343,171,411,154.7C480,139,549,149,617,170.7C685.7,192,754,224,823,240C891.4,256,960,256,1029,245.3C1097.1,235,1166,213,1234,213.3C1302.9,213,1371,235,1406,245.3L1440,256L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"
        ></path>
      </svg>
    </section>
    <!-- Akhir Gallery -->

    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>