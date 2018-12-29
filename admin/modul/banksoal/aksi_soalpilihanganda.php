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
  mysql_query("DELETE FROM tbl_banksoalpg WHERE id_soal='$_GET[id]'");
  header('location:../../media.php?p=soalpilihan');
}

// Input Data Kelas
elseif ($act=='input'){
   
    mysql_query("INSERT INTO tbl_banksoalpg(id_soal,
                                    kd_mk,
                                    soal,
                                    pil_a,
                                    pil_b,
                                    pil_c,
									pil_d,
                                    kunci_jwb) 
                            VALUES('$_POST[id_soal]',
									'$_POST[kdmk]',
                                   '$_POST[soal]',
                                   '$_POST[pil_a]',                           
                                   '$_POST[pil_b]',
                                   '$_POST[pil_c]',
								   '$_POST[pil_d]',                           
                                   '$_POST[kunci_jwb]')");
  header('location:../../media.php?p=soalpilihan');
  
}

// Update Data Kelas
elseif ($act=='update'){
    mysql_query("UPDATE tbl_banksoalpg SET kd_mk = '$_POST[kdmk]',
                                   soal = '$_POST[soal]',
                                   pil_a       = '$_POST[pil_a]',
                                   pil_b      = '$_POST[pil_b]',
                                   pil_c  = '$_POST[pil_c]',
								   pil_d       = '$_POST[pil_d]',
                                   kunci_jwb      = '$_POST[kunci_jwb]'
                             WHERE id_soal   = '$_POST[id]'");
    header('location:../../media.php?p=soalpilihan');
}
}
?>
