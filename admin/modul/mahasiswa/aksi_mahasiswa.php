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
  mysql_query("DELETE FROM tbl_mahasiswa WHERE nim='$_GET[id]'");
  header('location:../../media.php?p=datamahasiswa');
}

// Input Data Kelas
elseif ($act=='input'){
   
    mysql_query("INSERT INTO tbl_mahasiswa(nim,
                                    namamhs,
                                    jeniskelamin,
                                    alamat,
                                    kota,
                                    tempatlahir,
									tgllahir,
                                    email,
                                    kd_kelas) 
                            VALUES('$_POST[nim]',
									'$_POST[namamhs]',
                                   '$_POST[jeniskelamin]',
                                   '$_POST[alamat]',                           
                                   '$_POST[kota]',
                                   '$_POST[tempatlahir]',
								   '$_POST[tgllahir]',                           
                                   '$_POST[email]',
                                   '$_POST[kdkelas]')");
  header('location:../../media.php?p=datamahasiswa');
  
}

// Update Data Kelas
elseif ($act=='update'){
    mysql_query("UPDATE tbl_mahasiswa SET namamhs = '$_POST[namamhs]',
                                   jeniskelamin = '$_POST[jeniskelamin]',
                                   alamat       = '$_POST[alamat]',
                                   kota      = '$_POST[kota]',
                                   tempatlahir  = '$_POST[tempatlahir]',
								   tgllahir       = '$_POST[tgllahir]',
                                   email      = '$_POST[email]',
                                   kd_kelas    = '$_POST[kdkelas]'
                             WHERE nim   = '$_POST[id]'");
    header('location:../../media.php?p=datamahasiswa');
}
}
?>
