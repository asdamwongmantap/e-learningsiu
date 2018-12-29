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
  mysql_query("DELETE FROM tbl_kelas WHERE kd_kelas='$_GET[id]'");
  header('location:../../media.php?p=datakelas');
}

// Input Data Kelas
elseif ($act=='input'){
   
    mysql_query("INSERT INTO tbl_kelas(kd_kelas,
                                    thn_akademik,
                                    nid,
                                    jenjang,
                                    jurusan) 
                            VALUES('$_POST[kd_kelas]',
                                   '$_POST[thn_akademik]',
                                   '$_POST[nid]',                           
                                   '$_POST[jenjang]',
                                   '$_POST[jurusan]')");
  header('location:../../media.php?p=datakelas');
  
}

// Update Data Kelas
elseif ($act=='update'){
    mysql_query("UPDATE tbl_kelas SET thn_akademik = '$_POST[thn_akademik]',
                                   nid       = '$_POST[nid]',
                                   jenjang      = '$_POST[jenjang]',
                                   jurusan        = '$_POST[jurusan]'
                             WHERE kd_kelas   = '$_POST[id]'");
    header('location:../../media.php?p=datakelas');
}
}
?>
