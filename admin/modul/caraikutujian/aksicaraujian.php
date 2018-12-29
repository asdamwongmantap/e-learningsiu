<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";

$p=$_GET[p];
$act=$_GET[act];

// Update cara pembelian
  mysql_query("UPDATE modul SET static_content = '$_POST[isi]'
                            WHERE id_modul     = '$_POST[id]'");
  
  echo "<script>alert('Update Cara Pembelian Berhasil'); window.location = '../../media.php?p=carabeli'</script>";

  header('location:../../media.php?p=carabeli');

}
?>
