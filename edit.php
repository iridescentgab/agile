<?php
include "koneksi.php";

$id = $_GET['id'];

if (isset($_POST["submit"])) {
  $nis             = $_POST["nis"];
  $nama_lengkap    = $_POST["nama_lengkap"];
  $tgl_lahir       = $_POST["tgl_lahir"];
  $kelas           = $_POST["kelas"];
  $jurusan         = $_POST["jurusan"];
  $email           = $_POST["email"];
  $alamat          = $_POST["alamat"];


  $q = mysqli_query($db, "UPDATE data_siswa SET nis='$nis', nama_lengkap='$nama_lengkap', tgl_lahir='$tgl_lahir', kelas='$kelas', jurusan='$jurusan', email='$email', alamat='$alamat' WHERE id='$id'");
  if ($q) {
    header("location:list.php");
  }
}
$q = mysqli_query($db, "SELECT * FROM data_siswa WHERE id='$id'");
$data_siswa = mysqli_fetch_array($q);?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>GITHUB</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .btn {
      background-color: #ffdef0 !important;
    }
  </style>
</head>

<body>  
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
    <div class="container mt-5">
        <h3 class="text-center">Edit Data Siswa</h3>
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?php echo $data_siswa['id']; ?>">
            <div class="form-floating mt-3 mb-3">
                <input type="text" class="form-control" placeholder="NIS" name="nis" value="<?php echo $data_siswa['nis']; ?>">
                <label for="nis">NIS</label>
            </div>
            <div class="form-floating mt-3 mb-3">
                <input type="text" class="form-control" placeholder="NAMA" name="nama_lengkap" <?php echo $data_siswa['nama_lengkap']; ?>>
                <label for="nama_lengkap">NAMA</label>
            </div>
            <div class="form-floating mt-3 mb-3">
                <input type="date" class="form-control" placeholder="Tgl_lahir" name="tgl_lahir" <?php echo $data_siswa['tgl_lahir']; ?>>
                <label for="tgl_lahir">TANGGAL LAHIR</label>
            </div>
            <div class="form-floating mb-3 mt-3">
                        <select class="form-select" name="kelas" required>
                        <option value="<?php echo $data_siswa['kelas']; ?>" selected hidden><?php echo $data_siswa['kelas']; ?></option>
                        <option type="radio" value="X">X</option>
                        <option type="radio" value="XI">XI</option>
                        <option type="radio" value="XII">XII</option>
                        </select>
                        <label for="kelas">KELAS</label>
                        </div>
                    
                        <div class="form-floating mb-3 mt-3">
                        <select class="form-select" name="jurusan" required>
                        <option value="<?php echo $data_siswa['jurusan']; ?>" selected hidden><?php echo $data_siswa['jurusan']; ?></option>
                        <option type="radio" value="TJAT">TJAT</option>
                        <option type="radio" value="TKJ">TKJ</option>
                        <option type="radio" value="RPL">RPL</option>
                        <option type="radio" value="DKV">DKV</option>
                        <option type="radio" value="ANIMASI">ANIMASI</option>
                        </select>
                        <label for="jurusan">JURUSAN</label>
                        </div>
            <div class="form-floating mt-3 mb-3">
                <input type="text" class="form-control" placeholder="TANGGAL LAHIR" name="email" value="<?php echo $data_siswa['email']; ?>">
                <label for="nis">EMAIL</label>
            <div class="form-floating mt-3 mb-3">
                <input type="text" class="form-control" placeholder="ALAMAT" name="alamat" value="<?php echo $data_siswa['alamat']; ?>">
                <label for="alamat">ALAMAT</label>
            </div>
            <button type="submit" class="btn btn-dark text-dark" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>