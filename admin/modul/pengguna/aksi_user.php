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

// Hapus Data Pengguna
if ($act=='hapus'){
  mysql_query("DELETE FROM tbl_pengguna WHERE username='$_GET[id]'");
  header('location:../../media.php?p=datapengguna');
}

// Input Data Pengguna
elseif ($act=='input'){
    mysql_query("INSERT INTO tbl_pengguna(username,
                                    password,
                                    level) 
                            VALUES('$_POST[username]',
									'$_POST[password]',                         
                                   '$_POST[level]')");
  header('location:../../media.php?p=datapengguna');
  
}
elseif ($act=='update'){
    mysql_query("UPDATE tbl_pengguna SET password = '$_POST[password]',
                                   level = '$_POST[level]'
                             WHERE username   = '$_POST[id]'");
	header('location:../../media.php?p=datapengguna');
							 }
	
}
?>