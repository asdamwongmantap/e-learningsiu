<?php
include "config/koneksi.php";
// include "config/library.php";
$id_soalujian=trim($_POST['id_soalujian']);
$kdmk=trim($_POST['kdmk']);
$kd_kelas=trim($_POST['kdkelas']);
$nid=trim($_POST['nid']);
$waktu=trim($_POST['waktu']);
$tipe=trim($_POST['tipe']);
$tgl_ujian=trim($_POST['tgl_ujian']);





if (empty($id_soalujian)){
  echo "<script>alert('Anda Belum Mengisi Kode inputujian'); window.location = 'media.php?hal=inputujianpg'</script>";
}
elseif (empty($kdmk)){
  echo "<script>alert('Anda Belum Mengisi Mata Kuliah'); window.location = 'media.php?hal=inputujianpg'</script>";
}
elseif (empty($kd_kelas)){
  echo "<script>alert('Anda Belum Mengisi Kelas'); window.location = 'media.php?hal=inputujianpg'</script>";
}
elseif (empty($nid)){
  echo "<script>alert('Anda Belum Mengisi NID'); window.location = 'media.php?hal=inputujianpg'</script>";
}

else{

	
 
    mysql_query("UPDATE tbl_soal SET kd_mk='$_POST[kdmk]',
									 kd_kelas='$_POST[kdkelas]',
									 nid='$_POST[nid]',
									 waktu='$_POST[waktu]',
									 tipe='$_POST[tipe]',
									 tgl_ujian='$_POST[tgl_ujian]'
							WHERE id_soalujian='$_POST[id_soalujian]'");
								   
	
								   
  
  echo "<script>alert('EDIT HEADER SOAL BERHASIL'); window.location = 'media.php?hal=lihatujianpg&id_soalujian=$id_soalujian'</script>";
}
?>