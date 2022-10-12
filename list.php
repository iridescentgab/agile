<?php
include("koneksi.php");
if (@$_GET['proses'] == 'hapus') {
    $id = $_GET['id'];
    $hapus = mysqli_query($db, "DELETE FROM data_siswa WHERE id='$id'");
    if ($hapus) {
        $alertsuccess = "<div class='alert alert-success'>Data Berhasil Dihapus</div>";
        echo "<meta http-equiv='refresh', content='2; url=list.php'>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>list</title>
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
    <a href=""> <img id="gambar" src="ndex.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
            
    <div class="collapse navbar-collapse" id="navbarNav">

    <ul class="navbar-nav ms-auto">
    <b><a class="nav-link active" aria-current="page" href="index.php">BACK</a></b>
    </li>

    <li class="nav-item">
    <b><a class="nav-link active" aria-current="page" href="input.php">TAMBAH DATA</a></b>
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
    
<div class="container mt-5">
        <div class="card shadow">
            <div class="card-body">


                <h1 class="text-center">DATA SISWA</h1>
                <form action="" method="get" autocomplete="off">
                <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search" name="search" class="search">
                <button type="submit" class="btn btn-dark text-dark">Go</button>
                </div>
                </form>

                <table class="table table-hover table-bordered center text-center">
                <tr>
                <b>
                    <th>NO</th>
                    <th>NIS</th><b>
                    <th>Nama Lengkap</th>
                    <th>Tgl Lahir</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </b>
                </tr>

                    <?php
                    if (isset($_GET['search'])) {
                        $search = $_GET['search'];
                        $query = mysqli_query($db, "SELECT * FROM data_siswa WHERE nis lIKE '%" . $search . "%' OR nama_lengkap lIKE '%" . $search . "%' OR tgl_lahir lIKE '%" . $search . "%' OR kelas lIKE '%" . $search . "%' OR jurusan lIKE '%" . $search . "%' OR email LIKE '%" . $search . "%' OR alamat lIKE '%" . $search . "%'");
                    } else {
                        $query = mysqli_query($db, "SELECT * FROM data_siswa");
                    }
                    $id = 1;
                    while ($data_siswa = mysqli_fetch_array($query)) {
                    ?>

                        <tr>
                        <td> <?php echo $id++; ?> </td>
                        <td> <?php echo $data_siswa['nis'] ?> </td>
                        <td> <?php echo $data_siswa['nama_lengkap'] ?> </td>
                        <td> <?php echo $data_siswa['tgl_lahir'] ?> </td>
                        <td> <?php echo $data_siswa['kelas'] ?> </td>
                        <td> <?php echo $data_siswa['jurusan'] ?> </td>
                        <td> <?php echo $data_siswa['email'] ?> </td>
                        <td> <?php echo $data_siswa['alamat'] ?> </td>
                        <td>

                        <div>
                        <a href="edit.php?id=<?php echo $data_siswa['id'] ?>" class="btn btn-dark text-dark">EDIT</a>
                        <a href="?proses=hapus&&id=<?php echo $data_siswa['id'] ?>" class="btn btn-dark text-dark">HAPUS</a>
                        </div>
                        </td>
                        </tr>

                    <?php 
                } ?>
        </table>
    </div>
</div>
</div>
</body>


</html>