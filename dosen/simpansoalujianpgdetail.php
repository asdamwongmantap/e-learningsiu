<?php
include "config/koneksi.php";
// include "config/library.php";
$id_soalujian=trim($_POST['id_soalujian']);
$id_soal=trim($_POST['id_soal']);





if (empty($id_soalujian)){
  echo "<script>alert('Anda Belum Mengisi Kode inputujian'); window.location = 'media.php?hal=inputujianpg'</script>";
}
elseif (empty($id_soal)){
  echo "<script>alert('Anda Belum Memilih Soal'); window.location = 'media.php?hal=inputujianpg&id_soalujian=$id_soalujian'</script>";
}
else{

	
 
    mysql_query("INSERT INTO tbl_soaldetail(id_soalujian,
                                    id_soal) 
                            VALUES('$_POST[id_soalujian]',
								   '$_POST[id_soal]')");
								   
	
								   
  
  echo "<script>alert('Silahkan Input Soal Yang Akan Diberikan'); window.location = 'media.php?hal=inputsoalujianpg&id_soalujian=$id_soalujian'</script>";
}
?>