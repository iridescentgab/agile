<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>input data</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
  <style>
    .btn {
      background-color: #ffdef0 !important;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#ffdef0">
    <div class="container">
      <a  href=""> <img id="gambar" src="ndex.png" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        
      <li class="nav-item">
      <b><a class="nav-link active" aria-current="page" href="index.php">BACK</a></b>
      </li>

      <li class="nav-item">
      <b><a class="nav-link active" aria-current="page" href="element.php">ELEMENT</a></b>
      </li>

      <li class="nav-item">
      <b><a class="nav-link active" aria-current="page" href="us.php">ABOUT US</a></b>
      </li>

      </ul>
      </div>

    </div>
  </nav>
  
  <div>
  <style>
  body {
  background-color: white;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
  height: 100px;
}

#gambar {
  width: 400px;
  height: auto;
  right: 30px;
}
  </style>
  </div> 

    <?php
    require "koneksi.php";

    if (isset($_POST["submit"])) {
        $id                     = $_POST["id"];
        $nis                    = $_POST["nis"];
        $nama_lengkap           = $_POST["nama_lengkap"];
        $tgl_lahir              = $_POST["tgl_lahir"];
        $kelas                  = $_POST["kelas"];
        $jurusan                = $_POST["jurusan"];
        $email                  = $_POST["email"];
        $alamat                 = $_POST["alamat"];

        $q = mysqli_query($db, "SELECT * FROM data_siswa WHERE id='$id'");
        $cek = mysqli_num_rows($q);
        
        if ($cek == 0) {
          $query = "INSERT INTO data_siswa VALUES('','$nis','$nama_lengkap','$tgl_lahir','$kelas','$jurusan','$email','$alamat')";
          mysqli_query($db, $query);
        }
        header("location: list.php");
    }
    ?>
    <div class="container mt-5">
        <b><h3 class="text-center">Tambah Data Siswa</h3>
        <form method="POST" action="">
            <input type="hidden" name="id">
            <div class="form-floating mt-3 mb-3">
                <input type="text" class="form-control" placeholder="NIS" name="nis">
                <label for="nis">NIS</label>
            </div>
            <div class="form-floating mt-3 mb-3">
                <input type="text" class="form-control" placeholder="NAMA" name="nama_lengkap">
                <label for="nama_lengkap">NAMA</label>
            </div>
            <div class="form-floating mt-3 mb-3">
                <input type="date" class="form-control" placeholder="Tgl_lahir" name="tgl_lahir">
                <label for="tgl_lahir">TANGGAL LAHIR</label>
            </div>
            <div class="form-floating mb-3 mt-3">
                        <select class="form-select" name="kelas" required>
                        <option value="" selected hidden>pilihan</option>
                        <option>X</option>
                        <option>XI</option>
                        <option>XII</option>
                        </select>
                        <label for="kelas">KELAS</label>
                        </div>
                    
                        <div class="form-floating mb-3 mt-3">
                        <select class="form-select" name="jurusan" required>
                        <option value="" selected hidden>pilihan</option>
                        <option type="radio" value="TJAT">TJAT</option>
                        <option type="radio" value="TKJ">TKJ</option>
                        <option type="radio" value="RPL">RPL</option>
                        <option type="radio" value="DKV">DKV</option>
                        <option type="radio" value="ANIMASI">ANIMASI</option>
                        </select>
                        <label for="jurusan">JURUSAN</label>
                        </div>

            <div class="form-floating mt-3 mb-3">
                <input type="text" class="form-control" placeholder="email" name="email">
                <label for="email">EMAIL</label>
            </div>

            <div class="form-floating mt-3 mb-3">
                <input type="text" class="form-control" placeholder="alamat" name="alamat">
                <label for="alamat">ALAMAT</label>
            </div>
            <button type="submit" class="btn btn-dark text-dark" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>