<?php

$db=mysqli_connect("localhost","root","","biodata_agile");

if (!$db){
    die("Gagal Terhubung Ke Database: " . mysqli_connect_error());
}

?>