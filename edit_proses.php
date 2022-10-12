<?php

include("koneksi.php");

if(isset($_POST['simpan'])){

    $nis        = $POST['nis'];
    $nama       = $POST['nama'];
    $kelas      = $POST['kelas'];
    $jurusan    = $POST['jurusan'];

    $sql = "UPDATE siswa SET nama='$nama', kelas='$kelas', jurusan='$jurusan' WHERE nis=$nis";
    $query = mysqli_query($db, $sql);

    if ($query){
        header('location: list.php');
    } else{
        die("gagal menyimpan perubahan");
    }
} else { 
    die("akses dilarang....");
}
?>