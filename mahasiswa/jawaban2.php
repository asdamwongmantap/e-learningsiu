<?php
include "config/koneksi.php";
// include "config/library.php";
for ($i=0;$i++;){
$jumlahpg=$_POST['jumlahpg'];

$kdmk=$_POST['kdmk'];
$kdkelas=$_POST['kdkelas'];

$pilihan=$_POST["pilihan"];
$idsoal=$_POST["id"];

$idsoalujian=$_POST['idsoalujian'];
$idjawaban=$_POST['idjawaban'];

$tanggal=date("Y-m-d");

    $querytambah=mysql_query("INSERT INTO tbl_jawabansoalpg  values('$idjawaban','$idsoalujian','$kdmk','$kdkelas')");
	
	
			$querytambahdetail=mysql_query("INSERT INTO tbl_jawabansoalpgdetail(id_jawaban,id_soal) values('$idjawaban','$idsoal')");
			
}
?>