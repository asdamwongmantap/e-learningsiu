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
  mysql_query("DELETE FROM tbl_dosen WHERE nid='$_GET[id]'");
  header('location:../../media.php?p=datadosen');
}

// Input Data Kelas
elseif ($act=='input'){
   
    mysql_query("INSERT INTO tbl_dosen(nid,
                                    namadsn,
                                    jeniskelamin,
                                    alamat,
                                    kota,
                                    tempatlahir,
									tgllahir,
                                    email) 
                            VALUES('$_POST[nid]',
									'$_POST[namadsn]',
                                   '$_POST[jeniskelamin]',
                                   '$_POST[alamat]',                           
                                   '$_POST[kota]',
                                   '$_POST[tempatlahir]',
								   '$_POST[tgllahir]',                           
                                   '$_POST[email]')");
  header('location:../../media.php?p=datadosen');
  
}

// Update Data Kelas
elseif ($act=='update'){
    mysql_query("UPDATE tbl_dosen SET namadsn = '$_POST[namadsn]',
                                   jeniskelamin = '$_POST[jeniskelamin]',
                                   alamat       = '$_POST[alamat]',
                                   kota      = '$_POST[kota]',
                                   tempatlahir   = '$_POST[tempatlahir]',
								   tgllahir       = '$_POST[tgllahir]',
                                   email      = '$_POST[email]'
                             WHERE nid  = '$_POST[id]'");
    header('location:../../media.php?p=datadosen');
}
}
?>
