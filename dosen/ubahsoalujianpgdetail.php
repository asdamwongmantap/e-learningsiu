<?php
include "config/koneksi.php";
// include "config/library.php";
$id_soalujian=trim($_POST['id_soalujian']);
$idsoal=trim($_POST['id_soal']);






if (empty($id_soalujian)){
  echo "<script>alert('Anda Belum Mengisi Kode Ujian'); window.location = 'media.php?hal=lihatujianpg'</script>";
}
elseif (empty($idsoal)){
  echo "<script>alert('Anda Belum Memilih Soal'); window.location = 'media.php?hal=lihatujianpg'</script>";

else{

	
 
    mysql_query("UPDATE tbl_soaldetail SET 
									 id_soal='$_POST[id_soal]'
							WHERE (id_soalujian='$_POST[id_soalujian]') AND
							(id_soal='$_POST[id_soal]')");
								   
	
								   
  
  echo "<script>alert('EDIT HEADER SOAL BERHASIL'); window.location = 'media.php?hal=lihatujianpg&id_soalujian=$id_soalujian'</script>";
}
?>