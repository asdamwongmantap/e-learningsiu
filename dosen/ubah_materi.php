<?php
include "config/koneksi.php";

$lokasi_file    = $_FILES['berkas']['tmp_name'];

$tipe  = $_FILES['berkas']['type'];
$ukuran = $_FILES['berkas']['size'];
$nama_file = $_FILES['berkas']['name'];
	
 // Apabila File tidak diganti
  if (empty($lokasi_file)){
   mysql_query("UPDATE tbl_materi SET kd_mk = '$_POST[kdmk]',
                                   kd_kelas = '$_POST[kdkelas]',
                                   judul_materi      = '$_POST[judul_materi]',
                                  deskripsi  = '$_POST[deskripsi]'
                             WHERE kd_materi   = '$_POST[id]'");

  
  echo "<script>alert('Edit Materi berhasil'); window.location = 'media.php?hal=materi'</script>";
  }
  else
  {
   mysql_query("UPDATE tbl_materi SET kd_mk = '$_POST[kdmk]',
                                   kd_kelas = '$_POST[kdkelas]',
                                   judul_materi      = '$_POST[judul_materi]',
                                  deskripsi  = '$_POST[deskripsi]',
								   filename='$nama_file'
                             WHERE kd_materi   = '$_POST[id]'");

  move_uploaded_file($_FILES['berkas']['tmp_name'], 'berkas/'.$_FILES['berkas']['name']);
  echo "<script>alert('Edit Materi berhasil'); window.location = 'media.php?hal=materi'</script>";
  
  }

?>