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
  mysql_query("DELETE FROM tbl_tugas WHERE kd_tugas='$_GET[id]'");
  header('location:../../media.php?p=listtugas');
}

// Input Data Kelas
elseif ($act=='input'){


$tipe  = $_FILES['berkas']['type'];
$ukuran = $_FILES['berkas']['size'];
$nama_file = $_FILES['berkas']['name'];
$lokasi_file    = $_FILES['berkas']['tmp_name'];

  
   
    mysql_query("INSERT INTO tbl_tugas(kd_tugas,
                                    kd_mk,
                                    kd_kelas,
                                    judultugas,
                                    deskripsi,
									filename) 
                            VALUES('$_POST[kd_tugas]',
									'$_POST[kdmk]',
                                   '$_POST[kdkelas]',
                                                             
                                   '$_POST[judultugas]',
                                   '$_POST[deskripsi]',
								   '$nama_file')");
								   
  move_uploaded_file($_FILES['berkas']['tmp_name'], 'berkas/'.$_FILES['berkas']['name']);
  header('location:../../media.php?p=listtugas');
  
 }


 
// Update Data Kelas
elseif ($act=='update'){
$lokasi_file    = $_FILES['berkas']['tmp_name'];
// Apabila File tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE tbl_tugas SET kd_mk = '$_POST[kdmk]',
                                   kd_kelas = '$_POST[kd_kelas]',
                                   
                                   judultugas      = '$_POST[judultugas]',
                                  deskripsi  = '$_POST[deskripsi]'
                                  
                             WHERE kd_tugas   = '$_POST[id]'");
    header('location:../../media.php?p=listtugas');
	}
	else
	{
	 mysql_query("UPDATE tbl_tugas SET kd_mk = '$_POST[kdmk]',
                                   kd_kelas = '$_POST[kd_kelas]',
                                   
                                   judultugas      = '$_POST[judultugas]',
                                  deskripsi  = '$_POST[deskripsi]',
                                   
								   filename= '$nama_file'
                             WHERE kd_tugas   = '$_POST[id]'");
    
	 move_uploaded_file($_FILES['berkas']['tmp_name'], 'berkas/'.$_FILES['berkas']['name']);
  header('location:../../media.php?p=listtugas');
	header('location:../../media.php?p=listtugas');
	
	}
	
}
}
?>
