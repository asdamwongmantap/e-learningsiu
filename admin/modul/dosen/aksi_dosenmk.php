<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../koneksi.php";
// include "../../../config/library.php";
// include "../../../config/fungsi_thumb.php";
// include "../../../config/fungsi_seo.php";

$p=$_GET[p];
$act=$_GET[act];

// Hapus Data Kelas
if ($act=='hapus'){
  mysql_query("DELETE FROM tbl_dosenmk WHERE nid='$_GET[id]' AND kd_mk='$_GET[mk]' AND kd_kelas='$_GET[kelas]' AND thn_ajaran='$_GET[thn]' ");
  header('location:../../media.php?p=datadosenmatakuliah');
}

// Input Data Kelas
elseif ($act=='input'){
   
    mysql_query("INSERT INTO tbl_dosenmk(nid,
                                    kd_mk,
                                    kd_kelas,
                                    thn_ajaran) 
                            VALUES('$_POST[nid]',
									'$_POST[kd_mk]',
                                   '$_POST[kdkelas]',                           
                                   '$_POST[thn_ajaran]')");
  header('location:../../media.php?p=datadosenmatakuliah');
  
}
}
?>
