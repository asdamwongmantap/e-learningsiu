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

// Hapus Data mk
if ($act=='hapus'){
  $sql=mysql_query("DELETE FROM tbl_kurikulum WHERE kd_mk='$_GET[id]'");
  
  $sql1=mysql_query("DELETE FROM tbl_matakuliah WHERE kd_mk='$_GET[id]'");
  header('location:../../media.php?p=datamatakuliah');
}

// Input Data mk
elseif ($act=='input'){
   
    mysql_query("INSERT INTO tbl_matakuliah(kd_mk,
                                    nma_mk,
                                    sks) 
                            VALUES('$_POST[kd_mk]',
									'$_POST[nma_mk]',
                                   '$_POST[sks]'                          
                                   )");
  header('location:../../media.php?p=datamatakuliah');
  
}

// Update Data mk
elseif ($act=='update'){
    mysql_query("UPDATE tbl_matakuliah SET nma_mk = '$_POST[nma_mk]',
                                   sks = '$_POST[sks]'
                             WHERE kd_mk   = '$_POST[id]'");
    header('location:../../media.php?p=datamatakuliah');
}
}
?>
