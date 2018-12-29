<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../koneksi.php";

$r=mysql_fetch_array(mysql_query("SELECT * FROM tbl_pengguna where username='admin'"));

$pass_lama=$_POST['pass_lama'];
$pass_baru=$_POST['pass_baru'];

if (empty($_POST['pass_baru']) OR empty($_POST['pass_lama']) OR empty($_POST['pass_ulangi'])){
  echo "<p align=center>Anda harus mengisikan semua data pada form Ganti Password.<br />"; 
  echo "<a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a></p>";
}
else{ 
// Apabila password lama cocok dengan password admin di database
if ($pass_lama==$r['password']){
  // Pastikan bahwa password baru yang dimasukkan sebanyak dua kali sudah cocok
  if ($_POST['pass_baru']==$_POST['pass_ulangi']){
    mysql_query("UPDATE tbl_pengguna SET password = '$pass_baru' where username='admin'");
	  echo "<script>alert('Update Password Berhasil'); window.location = '../../media.php?p=gantipassword'</script>";
  }
  else{
	echo "<script>alert('Password baru yang anda masukkan tidak sama'); window.location = '../../media.php?p=gantipassword'</script>";
  }
}
else{
echo "<script>alert('Password Lama anda salah'); window.location = '../../media.php?p=gantipassword'</script>";
}
}
}
?>
