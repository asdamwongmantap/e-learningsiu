<?php
if(isset($_POST['btnSiswa'])){
//hitung jumlah form yang dikirim
$jumlah = count($_POST['nim']);

echo "<h1>Cetak semua form</h1>";
for($i=0; $i<$jumlah; $i++){
$urut = $i+1;
$nim = $_POST['nim'][$i];
$nama = $_POST['nama'][$i];
//jika mau dimasukkan ke databases, silahkan buat query anda disini
echo $urut." ".$nim ." ".$nama."<br />";
}

echo "<h1>Khusus NIM dan Nama yang tidak kosong</h1>";
//jika hanya akan memproses data yang nim dan namanya tidak kosong
for($a=0; $a<$jumlah; $a++){
$urut = $a+1;
$nim = $_POST['nim'][$a];
$nama = $_POST['nama'][$a];
if(trim($nim) !="" and trim($nama) !=""){
//jika mau dimasukkan ke databases, silahkan buat query anda disini
echo $urut." ".$nim ." ".$nama."<br />";
}
}
}
?>