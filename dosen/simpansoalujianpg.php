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

	
 
    mysql_query("INSERT INTO tbl_soal(id_soalujian,
                                    kd_mk,
                                    kd_kelas,
                                    nid,
									waktu,
									tipe,
									tgl_ujian) 
                            VALUES('$_POST[id_soalujian]',
									'$_POST[kdmk]',
                                   '$_POST[kdkelas]',             
                                   '$_POST[nid]',
								   '$_POST[waktu]',
								   '$_POST[tipe]',
								   '$_POST[tgl_ujian]')");
								   
	
								   
  
  echo "<script>alert('Silahkan Input Soal Yang Akan Diberikan'); window.location = 'media.php?hal=inputsoalujianpg&id_soalujian=$id_soalujian'</script>";
}
?>